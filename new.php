<?php
/**
 * Template Name: Оплата QRCODE
 */

get_header();
$t_uri = get_template_directory_uri();
?>

<section class="payment page-top">
  <div class="container">
    <h1 class="title-1 page-title"><?php the_title() ?></h1>
    <div class="payment-bank">
      <div class="cols cols-xl">
        <div class="col-1-2">
          <div class="banking wow fadeInBottom" data-wow-delay=".1s">
            <h2 class="fz-34 inherit banking__title">Оплата услуг через QR-код</h2>
            <div class="hint">Комиссия 0%</div>
            <div class="banking__row">
              <div class="banking__form sbp form form-white">
                <form class="wpcf7-form init" action="back" method="post" novalidate="novalidate" name="payment">
                  <div name="errInput" class="banking__error" hidden>Неизвестная ошибка</div>
                  <input type="text" name="id" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" hidden />
                  <p>
                    <label label-for-account>
                      <span>Номер договора</span>
                      <span class="wpcf7-form-control-wrap">
                        <input class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" type="text" name="account" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Номер договора" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" style="background: none;">
                      </span>
                    </label>
                  </p>
                  <p>
                    <label label-for-amount>
                      <span>Сумма платежа</span><br>
                      <span class="wpcf7-form-control-wrap">
                        <input class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" type="text" name="amount" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Сумма платежа" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                      </span>
                    </label>
                  </p>
                  <p>
                    <input class="wpcf7-form-control has-spinner wpcf7-submit" type="submit" name="button" value="Оплатить">
                    <span class="loader" hidden></span>
                  </p>
                  <div class="form-info">Оплата производится через сервис</div>
                </form>
                <ul class="card-systems list">
                  <li><img class="img" src="<?php echo get_field('payment-logo-1', 'option'); ?>" alt="alt"></li>
                  <li><img class="img" src="<?php echo get_field('payment-logo-2', 'option'); ?>" alt="alt"></li>
                  <li><img class="img" src="<?php echo get_field('payment-logo-3', 'option'); ?>" alt="alt"></li>
                  <li><img class="img" src="<?php echo get_field('payment-logo-4', 'option'); ?>" alt="alt"></li>
                </ul>
              </div>
              <div class="banking__col">
                <div class="banking__img"><img class="img" src="<?php echo get_field('payment-image', 'option'); ?>" alt="alt"></div>
                <div class="banking__link banking__prot">Защищённое соединение</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-1-2 wow fadeInBottom" data-wow-delay=".2s">
          <div class="contract-check form width-md">
            <h2 class="fz-34">Забыли номер договора?</h2>
            <form class="wpcf7-form init" action="back" method="post" novalidate="novalidate" data-status="init" name="get_ndog">
              <p>
                <label><span>Улица</span><br><span class="wpcf7-form-control-wrap">
                  <input class="wpcf7-form-control wpcf7-text" type="text" name="street" placeholder="Улица"></span></label>
              </p>
              <p>
                <label><span>Дом</span><br><span class="wpcf7-form-control-wrap">
                  <input class="wpcf7-form-control wpcf7-text" type="text" name="home" placeholder="Дом"></span></label>
              </p>
              <p>
                <label><span>Корпус</span><br><span class="wpcf7-form-control-wrap">
                  <input class="wpcf7-form-control wpcf7-text" type="text" name="korp" placeholder="Корпус"></span></label>
              </p>
              <p>
                <label><span>Фамилия и имя</span><br><span class="wpcf7-form-control-wrap">
                  <input class="wpcf7-form-control wpcf7-text" type="text" name="fio" placeholder="Фамилия и имя"></span></label>
              </p>
              <p>
                <input class="wpcf7-form-control wpcf7-submit" type="submit" value="Узнать номер договора">
              </p>
              <div class="wpcf7-response-output" aria-hidden="true"></div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.cols-->
      <div class="payment-bank__txt width-md wow fadeInBottom" data-wow-delay=".1s">
        <?php echo get_field('payment-text', 'option'); ?>
      </div>
    </div>
    <!-- /.payment-bank-->

    <!-- QR-код секция -->
    <section class="paymentQr" hidden>
      <div class="container container-for-qr">
        <div class="">
          <div class="col-for-qr form fadeInBottom">
            <img class="img" src="https://www.unetcom.ru/wp-content/uploads/2022/05/logo1.svg" alt="Unet">
            <h2 class="fz-34 sum"></h2>
            <div class="scan-qr">
              <div class="container-img-qr">
                <img class="img-qr" src="" alt="QRcode" hidden>
                <span class="loader-qr"></span>
              </div>
              <div class="instruction-qr">
                <h3>Отсканируйте QR‑код</h3>
                <p>Наведите камеру или отсканируйте код в приложении банка</p>
              </div>
            </div>
            <div class="logo-bank">
              <svg width="106" height="22" viewBox="0 0 106 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.032 9.35389V6.29789L17.136 5.19389V7.84189L18.096 8.80189L21.96 4.93789L22.912 5.88989C22.904 5.16989 22.76 3.08189 20.992 1.34589C19.088 -0.494107 17.024 0.337893 16.32 1.04189L12.464 4.89789L13.448 5.88189L11.456 7.88989L9.464 5.89789L10.448 4.91389L6.592 1.05789C5.888 0.353893 3.824 -0.478106 1.92 1.36189C0.152 3.09789 0.008 5.18589 0 5.90589L0.952 4.95389L4.816 8.81789L5.776 7.85789V5.20989L6.88 6.31389V9.36989L8.432 10.9139L0.784 18.5619L3.808 21.5779L11.456 13.9379L19.104 21.5859L22.128 18.5699L14.48 10.9139L16.032 9.35389Z" fill="#AFAAAA"></path>
                <!-- Остальные пути SVG опущены для краткости -->
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Мобильная секция для выбора банка -->
    <section class="payment-mobile page-top" hidden>
      <div class="container-for-logo">
        <a href="https://www.unetcom.ru"><img class="logo" src="https://www.unetcom.ru/wp-content/uploads/2022/05/logo1.svg" alt="Unet"></a>      
      </div>
      <div class="container container-for-qr">
        <div class="col-for-banks fadeInBottom">
          <p>Выберите приложение банка, в котором хотите оплатить услуги</p>
          <div class="bank-spinner">
            <div class="container-img-qr">
              <span class="loader-qr"></span>
            </div>
          </div>
          <div class="list-bank" hidden></div>
        </div>
      </div>
    </section>

    <!-- Секция результата оплаты -->
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
    </section>

    <!-- Блок "Карты оплаты Юнет" -->
    <div class="payment-unet width-md wow fadeInBottom" data-wow-delay=".1s">
      <h2 class="fz-34 payment-title">Карты оплаты Юнет</h2>
      <div class="small">Комиссия 0%</div>
      <div class="payment-unet__row">
        <div class="cols cols-lg">
          <div class="col-1-2">
            <div class="payment-unet__block fz-21 fw-500">
              <?php echo get_field('unet-1'); ?>
            </div>
          </div>
          <div class="col-1-2">
            <ul class="payment-unet__cards list flex">
              <?php foreach (get_field('unet-cards') as $i => $item): ?>
                <li>
                  <div class="payment-unet__card payment-unet__card-<?php echo $i+1; ?>">
                    <div class="top">
                      <div class="title fz-34"><?php echo $item['title']; ?></div>
                      <div class="unit">рублей</div>
                    </div>
                    <p><?php echo $item['text']; ?></p>
                  </div>
                </li>            		
              <?php endforeach ?>
            </ul>
            <div class="disc"><?php echo get_field('unet-subscription'); ?></div>
          </div>
        </div>
      </div>
      <div class="payment-unet__row">
        <div class="fz-21 fw-500 margin-20">Приобрести их можно:</div>
        <div class="cols cols-lg">
          <div class="col-1-2">
            <div class="map" id="map" data-marker="<?php echo $t_uri; ?>/assets/img/marker.png" data-coords="59.91958106418602, 30.46519499999997; 59.91788956421282, 30.47336949999994"></div>
          </div>
          <div class="col-1-2">
            <div class="payment-unet__points">
              <div class="cols cols-xl">
                <?php foreach (get_field('unet-addresses') as $address): ?>
                  <div class="col-1-2">
                    <div class="unet-point white-block">
                      <div class="unet-point__img"><img class="img img--cover" src="<?php echo $address['image']; ?>" alt="alt"></div>
                      <div class="unet-point__addr"><?php echo $address['text']; ?></div>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Блок "Сбербанк" -->
    <div class="payment-sber width-md wow fadeInBottom" data-wow-delay=".1s">
      <div class="payment-sber__head flex">
        <div class="payment-sber__logo flex-center"><img class="img" src="<?php echo $t_uri; ?>/assets/img/payment/sber.svg" alt="alt"></div>
        <div class="column">
          <h2 class="fz-34 payment-title">Сбербанк</h2>
          <div class="small">Комиссия 0%</div>
        </div>
      </div>
      <ol class="payment-sber__steps list">
        <?php foreach (get_field('sber-variants') as $variant): ?>
          <li>
            <div class="step-padding">
              <div class="step-title fz-21 fw-500"><?php echo $variant['title']; ?></div>
            </div>
            <?php if(!empty($steps = $variant['steps'])): ?>
              <div class="cols cols-lg">
                <?php foreach ($steps as $step): ?>
                  <div class="col-1-3">
                    <p class="step-subtitle"><?php echo $step['text']; ?></p><img class="img" src="<?php echo $step['image']; ?>" alt="alt">
                  </div>									
                <?php endforeach ?>
              </div>
            <?php else: ?>
              <?php echo $variant['text']; ?>
            <?php endif ?>
          </li>
        <?php endforeach ?>
      </ol>
    </div>

    <!-- Блок "Другие способы оплаты" -->
    <div class="payment-other width-md wow fadeInBottom" data-wow-delay=".1s">
      <div class="cols cols-lg">
        <?php foreach (get_field('payment-other') as $key => $payment): ?>
          <div class="col-1-2">
            <a href="<?php echo $payment['link']; ?>" class="item">
              <div class="item__logo white-block flex-center"><img class="img" src="<?php echo $payment['image']; ?>" alt="alt"></div>
              <div class="item__col">
                <h2 class="fz-34 title"><?php echo $payment['title']; ?></h2>
                <p class="hint"><?php echo $payment['hint']; ?></p>
                <div class="small"><?php echo $payment['small']; ?></div>
              </div>
            </a>
          </div>      		
        <?php endforeach ?>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/sections/page-form'); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

<?php get_footer(); ?>
