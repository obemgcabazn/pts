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
    <div class="bg-blue">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-8 text-center">
            <?=print_top_menu()?>
          </div>
          <div class="col-12 col-md-4">
            <img src="<?php bloginfo('template_url'); ?>/img/grundfos_nasos_remont_gr1.jpg" alt="">
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="">
        </div>
        <div class="col-md-2">
          <img src="">
        </div>
        <div class="col-md-3">
          <img src="">
        </div>
        <div class="col-md-4">
          <div class="phones">
            <a href="tel:+74956176942">+7 (495) 617-69-42</a>
            <br>
            <a href="tel:+74955440557">+7 (495) 544-05-57</a>
          </div>
          <div class="emails">
            <a href="mailto:info@proftechservice.ru">info@proftechservice.ru</a>
            <br>
            <a href="mailto:service@electropompa.ru">service@electropompa.ru</a>
          </div>
        </div>
      </div>
    </div>
  </header>