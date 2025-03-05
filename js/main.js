document.payment.account.addEventListener('focus', event => {
	document.querySelector('[label-for-account]').classList.add('is-placeholder')
})

document.payment.account.addEventListener('blur', event => {
	if (document.payment.account.value.length === 0)
		document
			.querySelector('[label-for-account]')
			.classList.remove('is-placeholder')
})

document.payment.amount.addEventListener('focus', event => {
	document.querySelector('[label-for-amount]').classList.add('is-placeholder')
})

document.payment.amount.addEventListener('blur', event => {
	if (document.payment.amount.value.length === 0)
		document
			.querySelector('[label-for-amount]')
			.classList.remove('is-placeholder')
})

document.payment.addEventListener('submit', e => {
	e.preventDefault()
	if(document.payment.id.value !== '') return;
	const account = document.payment.account
	const amount = document.payment.amount
	if (!validation(account, amount)) return console.log('Error')
	inputDisable(true)
	const data = {}
	data.stype = 'greatQr'
	data.account = document.payment.account.value
	data.amount = document.payment.amount.value
	data.platform = getMobileOperatingSystem()
	fetch('back', {
		method: 'POST',
		body: JSON.stringify(data),
	})
		.then(response => {
			if (!response.ok) {
				throw new Error('Error occurred!')
			}
			return response.json()
		})
		.then(data => {
			if ('status' in data && data['status'] == 'SUCCESS') {
				clearForm()
				setError(false, '')
				globalError()
				getQrLink(data['data']['id'], 0, true, 1000, data['platform'])
				if (data['platform'] == 'android' || data['platform'] == 'ios') {
					showMobileLink()
				} else {
					showQrCode(data['data']['sum'])
				}
			} else {
				if ('data' in data && 'text' in data['data']) setError(true, data['data']['text'])
			}
			inputDisable(false)
		})
		.catch(err => {
			setError(
				true,
				'Сервер не отвечает. Повторите запрос через несколько минут'
			)
			inputDisable(false)
		})
})

function validation(account, amount) {
	const intAccount = Number(account.value)
	const intAmount = Number(amount.value)
	flag = false
	textError = ''
	if (intAccount > 0 && intAccount < 1000000) {
		flag = true
	} else {
		textError = 'Номер договора должен быть числом больше 0.'
		account.style.backgroundColor = '#f88'
		setTimeout(() => {
			account.style.backgroundColor = 'rgba(0, 0, 0, 0)'
		}, 500)
	}
	if (intAmount < 10 || intAmount >= 15000) {
		flag = false
		if (textError == '') {
			textError = 'Сумма платежа должна быть больше 9 и меньше 15000.'
		} else {
			textError += '<br>Сумма платежа должна быть больше 9 и меньше 15000'
		}
		amount.style.backgroundColor = '#f88'
		setTimeout(() => (amount.style.backgroundColor = 'rgba(0, 0, 0, 0)'), 500)
	}
	if (flag) {
		setError(false, '')
		return true
	}
	setError(true, textError)
	return false
}

function setError(errorStatus = false, textError = '') {
	const elmError = document.querySelector('.wpcf7-form div.banking__error')
	if (errorStatus) {
		elmError.hidden = false
		elmError.innerHTML = textError
	} else {
		elmError.hidden = true
		elmError.innerHTML = ''
	}
}

function inputDisable(status) {
	if (status) {
		document.payment.account.disabled = true
		document.payment.amount.disabled = true
		document.payment.button.disabled = true
		document.querySelector('span.loader').hidden = false
		document.payment.button.style.visibility = 'hidden'
	} else {
		document.payment.account.disabled = false
		document.payment.amount.disabled = false
		document.payment.button.disabled = false
		document.querySelector('span.loader').hidden = true
		document.payment.button.style.visibility = 'visible'
	}
}

function clearForm() {
	document.payment.account.value = ''
	document.payment.amount.value = ''
}

function getQrLink(
	id,
	countError,
	status = true,
	timeInterval = 1000,
	platform = 'desktop'
) {
	if (countError < 60) {
		setTimeout(() => {
			const data = {}
			data.stype = 'getQrLink'
			data.id = id
			// data.amount = document.payment.amount.value
			data.getQr = status
			data.platform = getMobileOperatingSystem()
			fetch('back', {
				method: 'POST',
				body: JSON.stringify(data),
			})
				.then(response => {
					if (!response.ok) {
						throw new Error('Error occurred!')
					}
					return response.json()
				})
				.then(data => {
					if ('status' in data && data['status'] == 'SUCCESS') {
						switch (data['data']['statusQR']) {
							case 'CREATE':
								getQrLink(id, countError + 1, true, 1000, platform)
								break
							case 'NEW':
								if (status) {
									if (data['data']['qrUrl'] && data['data']['qrUrl'] !== '') {
										const link = document.querySelector('img.img-qr')
										link.src = data['data']['qrUrl']
										link.hidden = false
										document.querySelector('span.loader-qr').hidden = true
										getQrLink(id, 0, false, 3000, platform)
										if ('linkPayload' in data['data']) showLinks(data['data']['linkPayload'])
									} else {
										getQrLink(id, countError + 1, true, 1000, platform)
									}
								} else {
									getQrLink(id, 0, false, 3000, platform)
								}
								break
							case 'IN_PROGRESS':
								break
							case 'EXPIRED':
								resultPayment('Ошибка!', 'Время вышло. Повторите платёж', false)
								break
							case 'CANCELLED':
								resultPayment(
									'Ошибка!',
									'Платёж отменен. Повторите платёж',
									false
								)
								break
							// case 'PAID':
							// 	resultPayment('Спасибо!', 'Платёж прошел успешно', true)
							// 	break
							case 'PAID_CLOSE':
								switch (data['data']['paymentStatus']) {
									case 'SUCCESS':
										resultPayment('Спасибо!', 'Платёж прошел успешно', true)
										break
									case 'DECLINED':
										resultPayment(
											'Ошибка!',
											'Платёж отменён. Пожалуйста, повторите платёж',
											true
										)
										break
									case 'NO_INFO':
									default:
										resultPayment(
											'Ошибка!',
											'Платёж не прошёл. Пожалуйста, повторите платёж',
											false
										)
										break
								}
								break
							default:
								getQrLink(id, countError + 1, true, 1000, platform)
						}
					} else {
						getQrLink(id, countError + 1, true, 1000, platform)
					}
				})
				.catch(err => {
					getQrLink(id, countError + 1, true, 1000, platform)
				})
		}, timeInterval)
	} else {
		resultPayment('Ошибка!', 'Повторите платёж чуть позже', false)
	}
}

function showQrCode(sum) {
	document.querySelectorAll('section').forEach(itm => (itm.hidden = true))
	document.querySelector('h2.sum').innerHTML = Number(sum)
		.toLocaleString()
	document.querySelector('section.paymentQr').hidden = false
}

function showMobileLink() {
	document.querySelectorAll('section').forEach(itm => (itm.hidden = true))
	document.querySelector('section.payment-mobile').hidden = false
	document.querySelector('h2.sum').innerHTML = Number(sum).toLocaleString()
}

function resultPayment(title, text, status) {
	document.querySelectorAll('section').forEach(itm => itm.hidden=true)
	if (status) document.querySelector('img.payment-icon').src = 'success.svg'
	else document.querySelector('img.payment-icon').src = 'error.svg'
	document.querySelector('h2.payment-result-title').innerHTML = title
	document.querySelector('p.payment-result-text').innerHTML = text
	document.querySelector('section.payment-result').hidden = false
}

function globalError() {
	setTimeout(function () {
		if (document.querySelector('section.payment-result').hidden) {
			for (var i = 1; i < 99999; i++) {
				window.clearTimeout(i)
			}
			resultPayment('Ошибка!', 'Время действия QR кода закончилось', false)
		}
	}, 960000)
}

function getMobileOperatingSystem() {
	const userAgent = navigator.userAgent || navigator.vendor || window.opera

	if (/android/i.test(userAgent)) {
		return 'android'
	}

	if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
		return 'ios'
	}

	return 'unknown'
}

function setLinksBank (platform) {
	if (platform == 'ios' || platform == 'android') {
		document.querySelector('.bank-spinner').hidden = true
		document.querySelector('.list-bank').hidden = false

	}
}

function showLinks(arrLink) {
	document.querySelector('.bank-spinner').hidden = true
	document.querySelector('.list-bank').hidden = false
	createLink(arrLink)
}

function createLink (arrLink) {
	const conteinerLinks = document.querySelector('.list-bank')
	let link = ''
	arrLink.map(itm => {
		let strLink = itm.name
		if (itm.name.length > 18) strLink = strLink.substring(0,16) + '...'
		link += `<a href="${itm.url}" class="link-bank"><img src="${itm.logo}" alt="${itm.name}"><span>${strLink}</span></a>`
	})
	document.querySelector('.list-bank').innerHTML = link

}

document.get_ndog.addEventListener('submit', e => {
	e.preventDefault()
	setError(false, '')
	const data = {
		stype: 'get_ndog',
		street: document.get_ndog.street.value,
		home: document.get_ndog.home.value,
		korp: document.get_ndog.korp.value,
		fio: document.get_ndog.fio.value,
	}
	fetch('back', {
		method: 'POST',
		body: JSON.stringify(data),
	})
		.then(response => {
			if (!response.ok) {
				throw new Error('Error occurred!')
			}
			return response.json()
		})
		.then(data => {
			if (
				'status' in data &&
				data.status == 'SUCCESS' && data.data && data.data.ndog) {
				document.payment.account.value = data.data.ndog
				document.payment.account.style.backgroundColor = '#0f8'
				setTimeout(() => {
					document.payment.account.style.backgroundColor = 'rgba(0, 0, 0, 0)'
				}, 500)
			} else {
				setError(true, 'Не найден договор по введенным данным')
			}

		})
})