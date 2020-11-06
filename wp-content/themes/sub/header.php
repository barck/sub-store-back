<!doctype html>
<html lang="ru">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5.0">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= bloginfo('template_directory'); ?>/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= bloginfo('template_directory'); ?>/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= bloginfo('template_directory'); ?>/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?= bloginfo('template_directory'); ?>/favicon/site.webmanifest">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <title><?php wp_title('', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link href="<?= bloginfo('template_directory'); ?>/app.css?v=3" rel="stylesheet" type="text/css" />
  <?php wp_head(); ?>
</head>

<div class="wrapper">
  <header>
    <div class="header-top">
      <div class="container">
        <span class="delivery-header">Доставка по всей России и странам СНГ</span>
        <div class="header-contacts">
          <span>+7 (982) 305-02-16</span>
          <span>info@sub.store</span>
        </div>
        <nav>
          <a href="#">Производство</a>
          <a href="#">Доставка</a>
          <a href="#">Оплата</a>
          <a href="#">Контакты</a>
        </nav>
      </div>
    </div>
    <div class="header-bottom">
      <div class="container">
        <a href="/" class="logo">
          <img src="<?= bloginfo('template_directory'); ?>/static/logo2.jpg" alt="">
        </a>
        <form action="" class="search">
          <input type="search" name="s" id="site-search" required placeholder="Chevrolet Lanos 2007">
          <button>Найти</button>
        </form>
      </div>
    </div>