<?php
/**
 * Template Name: Оплата PSCB
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
            <h2 class="fz-34 inherit banking__title">Оплата услуг банковской картой</h2>
            <div class="hint">Комиссия 0%</div>
            <div class="banking__row">
              <div class="banking__form form form-white">
              
                <form class="wpcf7-form init" action="https://pay.pscb.ru/" method="post" novalidate="novalidate">
                 <input name="service" value="10617" type="hidden">
                  <p>
                    <label><span>Номер договора</span><br/><span class="wpcf7-form-control-wrap">
                        <input class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" type="text" name="account" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Номер договора"/></span></label>
                  </p>
                  <p>
                    <label><span>Сумма платежа</span><br/><span class="wpcf7-form-control-wrap">
                        <input class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" type="text" name="amount" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Сумма платежа"/></span></label>
                  </p>
                  <p>
                    <input class="wpcf7-form-control has-spinner wpcf7-submit" type="submit" name="button" value="Оплатить"/>
                    <!--span class="wpcf7-spinner"></span-->
                  </p>
                  <div class="wpcf7-response-output" aria-hidden="true"></div>
                  <div class="form-info">Оплата производится через сервис ПСКБ</div>
                </form>
                
								<ul class="card-systems list">
									<li><img class="img" src="<?= get_field('payment-logo-1', 'option') ?>" alt="alt"></li>
									<li><img class="img" src="<?= get_field('payment-logo-2', 'option') ?>" alt="alt"></li>
									<li><img class="img" src="<?= get_field('payment-logo-3', 'option') ?>" alt="alt"></li>
									<li><img class="img" src="<?= get_field('payment-logo-4', 'option') ?>" alt="alt"></li>
								</ul>
              </div>
              <div class="banking__col">
                <div class="banking__img"><img class="img" src="<?= get_field('payment-image', 'option') ?>" alt="alt"></div>
                <div class="banking__link banking__prot">Защищённое соединение</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-1-2 wow fadeInBottom" data-wow-delay=".2s">
          <div class="contract-check form width-md">
            <h2 class="fz-34">Забыли номер договора?</h2>
            <form class="wpcf7-form init" action="#" method="post" novalidate="novalidate" data-status="init">
              <p>
                <label><span>Улица</span><br/><span class="wpcf7-form-control-wrap">
                  <input class="wpcf7-form-control wpcf7-text" type="text" name="street" placeholder="Улица"/></span></label>
              </p>
              <p>
                <label><span>Дом</span><br/><span class="wpcf7-form-control-wrap">
                  <input class="wpcf7-form-control wpcf7-text" type="text" name="home" placeholder="Дом"/></span></label>
              </p>
              <p>
                <label><span>Корпус</span><br/><span class="wpcf7-form-control-wrap">
                  <input class="wpcf7-form-control wpcf7-text" type="text" name="korp" placeholder="Корпус"/></span></label>
              </p>
              <p>
                <label><span>Фамилия и имя</span><br/><span class="wpcf7-form-control-wrap">
                  <input class="wpcf7-form-control wpcf7-text" type="text" name="fio" placeholder="Фамилия и имя"/></span></label>
              </p>
              <p>
                <input class="wpcf7-form-control wpcf7-submit" type="submit" value="Узнать номер договора"/>
              </p>
              <div class="wpcf7-response-output" aria-hidden="true"></div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.cols-->
      <div class="payment-bank__txt width-md wow fadeInBottom" data-wow-delay=".1s">
      	<?= get_field('payment-text', 'option') ?>
      </div>
    </div>
    <!-- /.payment-bank-->


    <div class="payment-unet width-md wow fadeInBottom" data-wow-delay=".1s">
      <h2 class="fz-34 payment-title">Карты оплаты Юнет</h2>
      <div class="small">Комиссия 0%</div>
      <div class="payment-unet__row">
        <div class="cols cols-lg">
          <div class="col-1-2">
            <div class="payment-unet__block fz-21 fw-500">
              <?= get_field('unet-1') ?>
            </div>
          </div>
          <div class="col-1-2">
            <ul class="payment-unet__cards list flex">
            	<?php foreach (get_field('unet-cards') as $i => $item): ?>
								<li>
								  <div class="payment-unet__card payment-unet__card-<?= $i+1 ?>">
								    <div class="top">
								      <div class="title fz-34"><?= $item['title'] ?></div>
								      <div class="unit">рублей</div>
								    </div>
								    <p><?= $item['text'] ?></p>
								  </div>
								</li>            		
            	<?php endforeach ?>
            </ul>
            <div class="disc"><?= get_field('unet-subscription') ?></div>
          </div>
        </div>
      </div>

      <div class="payment-unet__row">
        <div class="fz-21 fw-500 margin-20">Приобрести их можно:</div>
        <div class="cols cols-lg">
          <div class="col-1-2">
            <div class="map" id="map" data-marker="<?= $t_uri ?>/assets/img/marker.png" data-coords="59.91958106418602, 30.46519499999997; 59.91788956421282, 30.47336949999994"></div>
          </div>
          <div class="col-1-2">
            <div class="payment-unet__points">
              <div class="cols cols-xl">
                <?php foreach (get_field('unet-addresses') as $address): ?>
									<div class="col-1-2">
									  <div class="unet-point white-block">
									    <div class="unet-point__img"><img class="img img--cover" src="<?= $address['image'] ?>" alt="alt"></div>
									    <div class="unet-point__addr"><?= $address['text'] ?></div>
									  </div>
									</div>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.payment-unet-->


    <div class="payment-sber width-md wow fadeInBottom" data-wow-delay=".1s">
      <div class="payment-sber__head flex">
        <div class="payment-sber__logo flex-center"><img class="img" src="<?= $t_uri ?>/assets/img/payment/sber.svg" alt="alt"></div>
        <div class="column">
          <h2 class="fz-34 payment-title">Сбербанк</h2>
          <div class="small">Комиссия 0%</div>
        </div>
      </div>
      <ol class="payment-sber__steps list">
      	<?php foreach (get_field('sber-variants') as $variant): ?>
					<li>
						<div class="step-padding">
							<div class="step-title fz-21 fw-500"><?= $variant['title'] ?></div>
						</div>
					  
					  <?php if(!empty($steps = $variant['steps'])): ?>
							<div class="cols cols-lg">
								<?php foreach ($steps as $step): ?>
									<div class="col-1-3">
									  <p class="step-subtitle"><?= $step['text'] ?></p><img class="img" src="<?= $step['image'] ?>" alt="alt">
									</div>									
								<?php endforeach ?>
							</div>
						<?php else: ?>
							<?= $variant['text'] ?>
					  <?php endif ?>
					</li>
      	<?php endforeach ?>
      </ol>
    </div>
    <!-- /.payment-sber-->


    <div class="payment-other width-md wow fadeInBottom" data-wow-delay=".1s">
      <div class="cols cols-lg">
      	<?php foreach (get_field('payment-other') as $key => $payment): ?>
					<div class="col-1-2">
					  <a href="<?= $payment['link'] ?>" class="item">
					    <div class="item__logo white-block flex-center"><img class="img" src="<?= $payment['image'] ?>" alt="alt"></div>
					    <div class="item__col">
					      <h2 class="fz-34 title"><?= $payment['title'] ?></h2>
					      <p class="hint"><?= $payment['hint'] ?></p>
					      <div class="small"><?= $payment['small'] ?></div>
					    </div>
					  </a>
					</div>      		
      	<?php endforeach ?>
      </div>
    </div>


  </div>
</section>


<?php get_template_part('template-parts/sections/page-form'); ?>


<?php
get_footer();
