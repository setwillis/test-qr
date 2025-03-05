<?

echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';
echo '<meta charset="utf-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>Pay</title>';
echo '<link rel="stylesheet" href="css/main.css">';
echo '</head>';
echo '<body>';
echo '<section class="payment page-top">';
echo '<div class="container-for-logo">
      <a href="https://www.unetcom.ru"><img class="logo" src="https://www.unetcom.ru/wp-content/uploads/2022/05/logo1.svg" alt="Unet"></a>      
    </div>';
echo '<div class="container">';
echo '<div class="payment-bank">';
echo '<div class="cols cols-xl">';
echo '<div class="col-1-2 fadeInBottom">';
echo '<div class="banking fadeInBottom">';
echo '<h2 class="fz-34 inherit banking__title">Оплата услуг через QR код</h2>';
echo '<div class="hint">Комиссия 0%</div>';
echo '<div class="banking__row">';
echo '<div class="banking__form sbp form form-white">';
echo '<form class="wpcf7-form init" action="https://www.unetcom.ru/oplata-sbp2/" method="post" novalidate="novalidate" name="payment">';
echo '<div name="errInput" class="banking__error" hidden>Неизвестная ошибка</div>';
echo '<input type="text" name="id" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"/>';
echo '<p> <label label-for-account><span>Номер договора</span><span class="wpcf7-form-control-wrap">';
echo '<input class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" type="text" name="account" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Номер договора" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" style="background: none;"></span></label></p>';
echo '<p> <label label-for-amount><span>Сумма платежа</span><br><span class="wpcf7-form-control-wrap">';
echo '<input class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" type="text" name="amount" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Сумма платежа" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"></span></label>';
echo '</p>';
echo '<p> <input class="wpcf7-form-control has-spinner wpcf7-submit" type="submit" name="button" value="Оплатить">';
echo '<span class="loader" hidden></span>';
echo '</p>';
echo '<p>';
echo '</p>';
echo '<div class="form-info">Оплата производится через сервис Райффайзен банк</div>';
echo '</form>';
echo '<ul class="card-systems list">';
echo '<li><noscript><img class="img" src="https://www.unetcom.ru/wp-content/uploads/2022/05/visa1.svg" alt="alt"></noscript><img class="img ls-is-cached lazyloaded"';
echo 'src="https://www.unetcom.ru/wp-content/uploads/2022/05/visa1.svg" data-src="https://www.unetcom.ru/wp-content/uploads/2022/05/visa1.svg" alt="alt"></li>';
echo '<li><noscript><img class="img" src="https://www.unetcom.ru/wp-content/uploads/2022/05/mastercard1.svg" alt="alt"></noscript><img class="img ls-is-cached lazyloaded" src="https://www.unetcom.ru/wp-content/uploads/2022/05/mastercard1.svg" data-src="https://www.unetcom.ru/wp-content/uploads/2022/05/mastercard1.svg" alt="alt"></li>';
echo '<li><noscript><img class="img" src="https://www.unetcom.ru/wp-content/uploads/2022/05/mir1.svg" alt="alt"></noscript><img class="img ls-is-cached lazyloaded" src="https://www.unetcom.ru/wp-content/uploads/2022/05/mir1.svg" data-src="https://www.unetcom.ru/wp-content/uploads/2022/05/mir1.svg" alt="alt"></li>';
echo '<li><noscript><img class="img" src="https://www.unetcom.ru/wp-content/uploads/2022/05/jcb1.svg" alt="alt"></noscript><img class="img ls-is-cached lazyloaded" src="https://www.unetcom.ru/wp-content/uploads/2022/05/jcb1.svg" data-src="https://www.unetcom.ru/wp-content/uploads/2022/05/jcb1.svg" alt="alt"></li>';
echo '</ul>';
echo '</div>';
echo '<div class="banking__col">';
echo '<div class="banking__img"><noscript><img class="img" src="https://www.unetcom.ru/wp-content/webp-express/webp-images/uploads/2022/05/bank-card1.png.webp" alt="alt"></noscript><img class="img ls-is-cached lazyloaded" src="https://www.unetcom.ru/wp-content/webp-express/webp-images/uploads/2022/05/bank-card1.png.webp" data-src="https://www.unetcom.ru/wp-content/webp-express/webp-images/uploads/2022/05/bank-card1.png.webp" alt="alt"></div>';
echo '<div class="banking__link banking__prot">Защищённое соединение</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="col-1-2 fadeInBottom">';
echo '<div class="contract-check form width-md">';
echo '<h2 class="fz-34">Забыли номер договора?</h2>';
echo '<form class="wpcf7-form init" action="#" method="post" novalidate="novalidate" data-status="init" name="get_ndog">';
echo '<p> <label class=""><span>Улица</span><br><span class="wpcf7-form-control-wrap"> <input class="wpcf7-form-control wpcf7-text" type="text" name="street" placeholder="Улица"></span></label></p>';
echo '<p> <label class=""><span>Дом</span><br><span class="wpcf7-form-control-wrap"> <input class="wpcf7-form-control wpcf7-text" type="text" name="home" placeholder="Дом"></span></label>';
echo '</p>';
echo '<p> <label class=""><span>Корпус</span><br><span class="wpcf7-form-control-wrap"> <input class="wpcf7-form-control wpcf7-text" type="text" name="korp" placeholder="Корпус"></span></label>';
echo '</p>';
echo '<p> <label class=""><span>Фамилия и имя</span><br><span class="wpcf7-form-control-wrap"> <input class="wpcf7-form-control wpcf7-text" type="text" name="fio" placeholder="Фамилия и имя"></span></label></p>';
echo '<p> <input class="wpcf7-form-control wpcf7-submit" type="submit" value="Узнать номер договора"></p>';
echo '<div class="wpcf7-response-output" aria-hidden="true"></div>';
echo '</form>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="payment-bank__txt width-md wow fadeInBottom" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInBottom;">';
echo '<p>Услуга доступна только при положительном балансе, либо при активированном обещанном платеже</p>';
echo '<p>Средства поступают на счет в течении 15 минут, по вопросам оплаты вы можете обратиться в техподдержку по номеру +7 (812) 640-8-640<br> Для оплаты (ввода реквизитов Вашей карты) Вы будете перенаправлены на платёжный шлюз. Соединение с платёжным шлюзом и передача информации осуществляется в защищённом режиме с использованием протокола шифрования SSL. В случае если Ваш банк поддерживает технологию безопасного проведения интернет-платежей Verified By Visa, MasterCard SecureCode, MIR Accept, J-Secure для проведения платежа также может потребоваться ввод специального пароля.</p> <p>Настоящий сайт поддерживает 256-битное шифрование. Конфиденциальность сообщаемой персональной информации обеспечивается платёжным шлюзом. Введённая информация не будет предоставлена третьим лицам за исключением случаев, предусмотренных законодательством РФ. Проведение платежей по банковским картам осуществляется в строгом соответствии с требованиями платёжных систем МИР, Visa Int., MasterCard Europe Sprl, JCB.</p>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
echo '<section class="paymentQr" hidden>
    <div class="container container-for-qr">
      <div class="">
        <div class="col-for-qr form fadeInBottom">
          <img class="img" src="https://www.unetcom.ru/wp-content/uploads/2022/05/logo1.svg" alt="Unet">
          <h2 class="fz-34 sum">8 000</h2>
          <div class="scan-qr">
            <div class="container-img-qr">
              <img class="img-qr" src="" alt="QRcode" hidden>
              <span class="loader-qr" ></span>
            </div>
            <div class="instruction-qr">
              <h3>Отсканируйте QR‑код</h3>
              <p>Наведите камеру или отсканируйте код в приложении банка</p>
            </div>
          </div>
          <div class="logo-bank">
            <svg width="106" height="22" viewBox="0 0 106 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.032 9.35389V6.29789L17.136 5.19389V7.84189L18.096 8.80189L21.96 4.93789L22.912 5.88989C22.904 5.16989 22.76 3.08189 20.992 1.34589C19.088 -0.494107 17.024 0.337893 16.32 1.04189L12.464 4.89789L13.448 5.88189L11.456 7.88989L9.464 5.89789L10.448 4.91389L6.592 1.05789C5.888 0.353893 3.824 -0.478106 1.92 1.36189C0.152 3.09789 0.008 5.18589 0 5.90589L0.952 4.95389L4.816 8.81789L5.776 7.85789V5.20989L6.88 6.31389V9.36989L8.432 10.9139L0.784 18.5619L3.808 21.5779L11.456 13.9379L19.104 21.5859L22.128 18.5699L14.48 10.9139L16.032 9.35389Z" fill="#AFAAAA"></path><path d="M27.4587 12.2305H33.2269V14.0499H29.6133V15.9104H30.816C31.628 15.9104 32.664 16.0072 33.4474 16.778C33.6974 17.0344 33.8931 17.3387 34.0228 17.6726C34.1524 18.0064 34.2134 18.363 34.202 18.721C34.2138 19.0877 34.1533 19.4531 34.0238 19.7963C33.8943 20.1396 33.6984 20.4539 33.4474 20.7214C32.7608 21.4079 31.7678 21.5621 30.635 21.5621H27.4587V12.2305ZM30.4665 19.8287C30.7605 19.8287 31.291 19.8001 31.628 19.5348C31.745 19.432 31.8378 19.3046 31.8998 19.1618C31.9618 19.0189 31.9914 18.8641 31.9865 18.7085C31.9921 18.5407 31.9568 18.3741 31.8838 18.2229C31.8107 18.0718 31.702 17.9407 31.5671 17.8409C31.2301 17.6025 30.6852 17.59 30.4611 17.59H29.6079V19.8287H30.4665Z" fill="#AFAAAA"></path><path d="M40.0096 15.3153H42.0243V21.5567H40.0096V20.8003C39.8137 21.1097 39.5398 21.3621 39.2154 21.532C38.8909 21.7019 38.5275 21.7834 38.1616 21.7682C37.2653 21.7682 36.5107 21.5441 35.8314 20.8164C35.2339 20.1892 34.9069 19.3523 34.9208 18.4862C34.8994 17.5524 35.2465 16.6477 35.8869 15.9678C36.1736 15.6886 36.5131 15.4693 36.8855 15.3228C37.2579 15.1763 37.6557 15.1055 38.0558 15.1146C38.5935 15.1146 39.4414 15.24 40.015 16.0233L40.0096 15.3153ZM37.4482 17.287C37.299 17.4351 37.1813 17.6117 37.1021 17.8064C37.023 18.0011 36.984 18.2097 36.9875 18.4199C36.9779 18.8328 37.1282 19.2335 37.4069 19.5384C37.5622 19.6954 37.7474 19.8198 37.9515 19.9041C38.1556 19.9885 38.3745 20.0311 38.5953 20.0295C38.9889 20.0288 39.3663 19.8729 39.6457 19.5957C39.9563 19.2892 40.1333 18.8725 40.1383 18.4361C40.1433 17.9998 39.976 17.5791 39.6726 17.2655C39.3658 16.9883 38.9676 16.8339 38.5541 16.8317C38.1389 16.8358 37.7418 17.0025 37.4482 17.296V17.287Z" fill="#AFAAAA"></path><path d="M43.2414 15.3153H45.2561V17.4842H47.5093V15.3153H49.524V21.5567H47.5093V19.1135H45.2561V21.5638H43.2414V15.3153Z" fill="#AFAAAA"></path><path d="M50.741 15.3153H52.7647V17.7925L54.7992 15.3153H57.3086L54.6307 18.2191L57.4861 21.5638H54.8834L52.7647 18.7927V21.5638H50.741V15.3153Z" fill="#AFAAAA"></path><path d="M30.7461 0.22998C31.5581 0.22998 32.4525 0.342906 33.1946 1.00074C33.9923 1.6998 34.1052 2.61395 34.1052 3.26641C34.1052 4.44227 33.6571 5.1001 33.3075 5.46397C32.5655 6.21859 31.585 6.2885 30.9289 6.2885H29.6133V9.56333H27.4623V0.22998H30.7461ZM29.6133 4.53189H30.3823C30.6762 4.53189 31.1942 4.51755 31.5438 4.18236C31.7771 3.93184 31.9026 3.59966 31.8933 3.25745C31.8999 3.09016 31.8723 2.9233 31.8122 2.76705C31.7521 2.61079 31.6607 2.46844 31.5438 2.34867C31.2211 2.04037 30.7605 1.99914 30.341 1.99914H29.6133V4.53189Z" fill="#AFAAAA"></path><path d="M39.3661 3.32375H41.3808V9.56331H39.3661V8.80868C39.1701 9.11773 38.896 9.36961 38.5715 9.53892C38.2471 9.70823 37.8837 9.78898 37.5181 9.77303C36.6218 9.77303 35.8672 9.54897 35.1879 8.82123C34.5916 8.19341 34.2653 7.35678 34.2791 6.49103C34.2575 5.55719 34.6046 4.65244 35.2452 3.97262C35.5315 3.69278 35.8709 3.47298 36.2434 3.32615C36.6158 3.17932 37.0139 3.10842 37.4141 3.11762C37.9518 3.11762 38.7997 3.24488 39.3733 4.02819L39.3661 3.32375ZM36.8118 5.29546C36.6622 5.44362 36.5441 5.62052 36.4647 5.81551C36.3852 6.0105 36.346 6.21955 36.3494 6.43008C36.3403 6.84329 36.4912 7.24402 36.7706 7.54858C36.926 7.70538 37.1112 7.82946 37.3153 7.91351C37.5194 7.99755 37.7383 8.03986 37.959 8.03792C38.3526 8.03743 38.7301 7.88154 39.0094 7.60415C39.3199 7.2976 39.4969 6.8809 39.502 6.44458C39.507 6.00826 39.3397 5.58758 39.0363 5.27395C38.7293 4.99703 38.3312 4.84264 37.9178 4.84017C37.504 4.8424 37.1073 5.0057 36.8118 5.29546Z" fill="#AFAAAA"></path><path d="M44.6126 3.32375V6.89075L47.2708 3.32375H49.1457V9.56331H47.131V5.93895L44.4728 9.56331H42.5979V3.32375H44.6126ZM48.4037 0.796383C48.2453 1.28157 47.93 1.70029 47.5074 1.98658C46.9697 2.33611 46.3316 2.37733 45.8691 2.37733C45.4067 2.37733 44.7649 2.33611 44.2326 1.98658C43.8101 1.70019 43.4949 1.28151 43.3364 0.796383L44.7363 0.258644C44.7802 0.521994 44.9205 0.759601 45.1298 0.92525C45.3392 1.0909 45.6027 1.17275 45.8691 1.15487C46.1358 1.17321 46.3997 1.09157 46.6095 0.925883C46.8193 0.760192 46.9598 0.522322 47.0037 0.258644L48.4037 0.796383Z" fill="#AFAAAA"></path><path d="M53.5946 12.675V9.66191H53.5104C52.0979 9.66191 51.3146 9.07399 50.9508 8.72445C50.5026 8.29068 50.0545 7.5486 50.0545 6.41577C50.0545 5.18435 50.6138 4.40104 51.13 3.97981C51.8174 3.48243 52.6458 3.21801 53.4943 3.22518H53.5928V0.22998H55.6076V3.22518H55.7061C56.5546 3.21775 57.3831 3.48221 58.0704 3.97981C58.5884 4.40104 59.1459 5.18435 59.1459 6.41577C59.1459 7.5486 58.6978 8.29068 58.2497 8.72445C57.8912 9.08295 57.1007 9.66191 55.6882 9.66191H55.604V12.675H53.5946ZM53.6932 4.84736C53.4657 4.83165 53.2373 4.86197 53.0217 4.9365C52.8061 5.01103 52.6078 5.12824 52.4385 5.28114C52.162 5.59284 52.0168 5.99943 52.0334 6.41577C52.0174 6.63662 52.0499 6.85828 52.1286 7.06526C52.2073 7.27224 52.3302 7.45954 52.4888 7.61405C52.6474 7.76856 52.8379 7.88655 53.0468 7.95977C53.2558 8.03299 53.4782 8.05967 53.6986 8.03794L53.6932 4.84736ZM55.5108 8.03794C55.7311 8.05967 55.9536 8.03299 56.1625 7.95977C56.3715 7.88655 56.562 7.76856 56.7206 7.61405C56.8792 7.45954 57.0021 7.27224 57.0808 7.06526C57.1594 6.85828 57.1919 6.63662 57.176 6.41577C57.1925 5.99943 57.0474 5.59284 56.7709 5.28114C56.6016 5.12824 56.4033 5.01103 56.1877 4.9365C55.9721 4.86197 55.7437 4.83165 55.5161 4.84736L55.5108 8.03794Z" fill="#AFAAAA"></path><path d="M63.29 12.675V9.66191H63.2076C61.7933 9.66191 61.01 9.07399 60.6461 8.72445C60.198 8.29068 59.7499 7.5486 59.7499 6.41577C59.7499 5.18435 60.311 4.40104 60.8254 3.97981C61.5125 3.48198 62.3412 3.2175 63.1897 3.22518H63.2865V0.22998H65.3119V3.22518H65.4087C66.2577 3.21775 67.0868 3.48218 67.7748 3.97981C68.291 4.40104 68.8503 5.18435 68.8503 6.41577C68.8503 7.5486 68.4021 8.29068 67.954 8.72445C67.5955 9.08295 66.8068 9.66191 65.3926 9.66191H65.3119V12.675H63.29ZM63.3886 4.84736C63.161 4.83134 62.9326 4.86151 62.7169 4.93606C62.5013 5.0106 62.303 5.12798 62.1339 5.28114C61.8568 5.59257 61.7109 5.99919 61.727 6.41577C61.7114 6.63654 61.7441 6.85807 61.8229 7.0649C61.9016 7.27174 62.0246 7.4589 62.1831 7.61334C62.3416 7.76778 62.532 7.88578 62.7408 7.95912C62.9496 8.03245 63.1719 8.05935 63.3922 8.03794L63.3886 4.84736ZM65.208 8.03794C65.4283 8.05967 65.6508 8.03299 65.8597 7.95977C66.0687 7.88655 66.2592 7.76856 66.4178 7.61405C66.5764 7.45954 66.6993 7.27224 66.778 7.06526C66.8566 6.85828 66.8891 6.63662 66.8732 6.41577C66.8897 5.99943 66.7446 5.59284 66.4681 5.28114C66.2987 5.12833 66.1004 5.01117 65.8848 4.93664C65.6693 4.86212 65.4409 4.83176 65.2133 4.84736L65.208 8.03794Z" fill="#AFAAAA"></path><path d="M74.5395 3.32377H76.556V9.56332H74.5395V8.8087C74.3439 9.11773 74.0702 9.36964 73.746 9.53897C73.4218 9.7083 73.0587 9.78904 72.6933 9.77304C71.7971 9.77304 71.0424 9.54898 70.3631 8.82124C69.766 8.19395 69.4395 7.35697 69.4543 6.49104C69.4318 5.55704 69.779 4.65192 70.4204 3.97264C70.7068 3.69279 71.0461 3.473 71.4186 3.32617C71.791 3.17934 72.1891 3.10844 72.5893 3.11763C72.9631 3.10172 73.3352 3.1756 73.6745 3.33309C74.0138 3.49058 74.3104 3.7271 74.5395 4.02282V3.32377ZM71.9799 5.29547C71.8303 5.44364 71.7122 5.62053 71.6327 5.81552C71.5532 6.01051 71.514 6.21956 71.5174 6.4301C71.509 6.84287 71.6591 7.24317 71.9369 7.5486C72.0927 7.70528 72.2782 7.82928 72.4826 7.9133C72.687 7.99733 72.9061 8.03971 73.1271 8.03794C73.5202 8.03776 73.8973 7.88178 74.1757 7.60416C74.4869 7.29809 74.6645 6.88143 74.6699 6.44497C74.6753 6.0085 74.5079 5.5876 74.2043 5.27396C73.8974 4.99704 73.4993 4.84266 73.0858 4.84019C72.672 4.84241 72.2753 5.00571 71.9799 5.29547Z" fill="#AFAAAA"></path><path d="M79.7879 3.32375V6.89075L82.4461 3.32375H84.321V9.56331H82.3063V5.93895L79.6516 9.56331H77.7713V3.32375H79.7879ZM83.5789 0.796383C83.4204 1.28151 83.1051 1.70019 82.6827 1.98658C82.1449 2.33611 81.5086 2.37733 81.0462 2.37733C80.5837 2.37733 79.9402 2.33611 79.4096 1.98658C78.9872 1.70019 78.6719 1.28151 78.5134 0.796383L79.9133 0.258644C79.9628 0.522893 80.1032 0.761519 80.31 0.933227C80.5169 1.10493 80.7773 1.19892 81.0462 1.19892C81.315 1.19892 81.5754 1.10493 81.7823 0.933227C81.9891 0.761519 82.1295 0.522893 82.179 0.258644L83.5789 0.796383Z" fill="#AFAAAA"></path><path d="M85.3284 3.85431C85.6572 3.65147 86.0033 3.47812 86.3626 3.33629C86.8367 3.18064 87.3335 3.10492 87.8324 3.11223C88.1676 3.11223 89.3148 3.14091 89.9457 3.75752C90.0999 3.90482 90.2208 4.08339 90.3002 4.28126C90.3797 4.47912 90.4159 4.69168 90.4064 4.90469C90.4198 5.09834 90.3931 5.29268 90.328 5.47556C90.263 5.65844 90.1609 5.82595 90.0282 5.96762C89.8782 6.1261 89.6944 6.24865 89.4905 6.32611C89.8041 6.4006 90.0931 6.55498 90.3293 6.77423C90.4702 6.90614 90.5807 7.06714 90.6532 7.24605C90.7256 7.42496 90.7582 7.61749 90.7488 7.81027C90.7516 8.05225 90.7054 8.2923 90.613 8.51595C90.5206 8.7396 90.3839 8.94222 90.211 9.1116C89.6733 9.62783 88.9563 9.78198 87.9167 9.78198C87.3351 9.79168 86.7566 9.69697 86.2085 9.50236C85.8032 9.34369 85.4256 9.12164 85.09 8.84452L85.9432 7.51631C86.1754 7.71845 86.4341 7.88791 86.7121 8.01999C87.0196 8.14339 87.347 8.2096 87.6783 8.21537C87.9296 8.22138 88.1788 8.16859 88.406 8.06122C88.4925 8.01622 88.5645 7.94782 88.614 7.86383C88.6634 7.77984 88.6883 7.68364 88.6856 7.58622C88.6873 7.49397 88.6598 7.40355 88.607 7.3279C88.5542 7.25224 88.4788 7.19522 88.3917 7.16499C88.1565 7.08979 87.9109 7.05228 87.6639 7.05385H86.9093V5.68262H87.4829C87.7387 5.68514 87.9933 5.64764 88.2375 5.57149C88.323 5.5386 88.3966 5.48092 88.449 5.40586C88.5014 5.3308 88.5301 5.24178 88.5315 5.15026C88.527 5.0595 88.4952 4.97222 88.4401 4.89991C88.3851 4.8276 88.3095 4.77365 88.2232 4.74516C88.0235 4.66484 87.8092 4.627 87.594 4.63403C87.3104 4.63014 87.0293 4.68698 86.7695 4.80073C86.525 4.89923 86.298 5.03664 86.0973 5.20762L85.3284 3.85431Z" fill="#AFAAAA"></path><path d="M98.0602 6.79399H93.3998C93.4014 7.18069 93.5341 7.55543 93.7762 7.85692C93.9117 7.99132 94.074 8.09561 94.2525 8.16295C94.4311 8.23028 94.6218 8.25916 94.8123 8.24768C95.0938 8.25771 95.3732 8.19603 95.6243 8.06843C95.814 7.93922 95.9642 7.75989 96.058 7.55041L97.9598 7.74579C97.7637 8.3978 97.3359 8.95561 96.7571 9.31419C96.1548 9.67268 95.4844 9.77485 94.7854 9.77485C93.8479 9.77485 93.0234 9.60815 92.2956 8.87862C91.9878 8.55938 91.7465 8.18221 91.5856 7.76898C91.4246 7.35575 91.3473 6.91468 91.3582 6.47135C91.3467 5.55851 91.6876 4.67639 92.31 4.0085C93.0646 3.25208 94.0021 3.11227 94.7029 3.11227C95.4038 3.11227 96.4094 3.23954 97.1783 4.04973C97.9473 4.85992 98.0602 5.81351 98.0602 6.58248V6.79399ZM96.1996 5.58946C96.1308 5.31513 95.9904 5.06399 95.7927 4.86171C95.5148 4.62673 95.1601 4.50248 94.7963 4.51273C94.4325 4.52299 94.0853 4.66703 93.821 4.91728C93.645 5.10501 93.5241 5.33756 93.4715 5.58946H96.1996Z" fill="#AFAAAA"></path><path d="M98.969 3.32377H100.982V5.49086H103.235V3.32377H105.25V9.56333H103.237V7.11483H100.982V9.56333H98.969V3.32377Z" fill="#AFAAAA"></path></svg>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="payment-mobile page-top" hidden>
    <div class="container-for-logo">
      <a href="https://www.unetcom.ru"><img class="logo" src="https://www.unetcom.ru/wp-content/uploads/2022/05/logo1.svg" alt="Unet"></a>      
    </div>
    <div class="container container-for-qr">
      <div class="col-for-banks fadeInBottom">
        <p>Выберите приложение банка, в котором хотите оплатить услуги</p>
        <div class="bank-spinner">
          <div class="container-img-qr">
              <span class="loader-qr" ></span>
          </div>
        </div>
        <div class="list-bank" hidden>
        </div>
      </div>
    </div>
  </section>
  <section class="payment-result page-top" hidden>
    <div class="container-for-logo">
      <a href="https://www.unetcom.ru"><img class="logo" src="https://www.unetcom.ru/wp-content/uploads/2022/05/logo1.svg" alt="Unet"></a>      
    </div>
    <div class="container container-for-qr">
      <div class="banking wow fadeInBottom" style="padding-bottom: 30px; max-width: 600px;">
        <div class="status-payment">
          <img class="payment-icon" src="error.svg" alt="success">
          <div>
            <h2 class="payment-result-title">Ошибка!</h2>
            <p class="payment-result-text">Время QR кода вышло. Платеж можно повторить.</p>
          </div>
        </div>
        <div class="payment-result-link">
          <a class="button js-open-modal button-gray-bd" href="http://example.com">Повторить платеж</a>
          <a class="button js-open-modal button-gray-bd" href="https://unetcom.ru">Главная</a>
        </div>
      </div>
    </div>
  </section>';
  

echo '<script src="js/main.js"></script>';
echo '</body>';
echo '</html>';


?>