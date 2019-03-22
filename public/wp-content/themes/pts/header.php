<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title><?=get_title(); ?></title>
  <meta name="description" content="<?=get_field('description')?>">
  <meta name="keywords" content="<?=get_field('keywords')?>">
  <link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">
  <?php wp_head(); ?>
</head>
<body>
  <header>
    <div class="top-line">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-8 text-center">
            <?=print_top_menu()?>
          </div>
          <div class="col-12 col-md-4">
            <img src="<?php bloginfo('template_url'); ?>/img/tuv-header.jpg" alt="Сертифицированный сервисный центр TUV">
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="<?php bloginfo('template_url'); ?>/img/electropompa-logo.svg" alt="Технический центр насосов" width="350">
        </div>
        <div class="col-md-2">
          <p class="time text-center">
            Пн-Пт 9:00 — 20:00 <br>
            Сб 10:00 — 16:00 <br>
            Вс по запросу
          </p>
        </div>
        <div class="col-md-3 text-center">
          <a href="tel:+79153673398" title="Круглосуточый сервисный центр насосоы"><img src="<?php bloginfo('template_url'); ?>/img/24-7-service-grundfos.gif" alt="Круглосуточно" width="155"></a>
        </div>
        <div class="col-md-3 text-right">
          <div class="phones">
            <a href="tel:+74956176942" title="Позвонить в сервисный центр">+7 (495) 617-69-42</a>
            <a href="tel:+74955440557" title="Позвонить в сервисный центр">+7 (495) 544-05-57</a>
          </div>
          <div class="emails">
            <a href="mailto:info@proftechservice.ru" title="info@proftechservice.ru">info@proftechservice.ru</a>
            <a href="mailto:service@electropompa.ru" title="service@electropompa.ru">service@electropompa.ru</a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <?php get_sidebar(); ?>
      </div>