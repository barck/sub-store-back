<?php get_header(); ?>

<div class="main">
    <div class="container">
      <div class="sidebar">
        <a href="#" class="sidebar-head">Каталог сабвуферов</a>
        <?php
          $categories = get_categories(array(
          ));
          foreach( $categories as $category ){ ?>
          <a href="<?= get_category_link( $category->term_id ) ?>">
            <?= $category->name ?>
          </a>
        <?php } ?>
        <img src="<?= bloginfo('template_directory'); ?>/static/vk.png" alt="">
      </div>
      <div class="content">
        <h1>Купить популярные стелс сабвуферы</h1>
        <div class="popular-subs">
          <a href="./post.html" class="item">
            <img src="./static/sub1.jpg" alt="">
            <span class="item-title">Короб стелс HYUNDAI SOLARIS 2</span>
            <span class="item-instock">в наличии</span>
            <span class="item-price">2 490 ₽</span>
            <span class="item-order">Купить</span>
          </a>
          <a class="item">
            <img src="./static/sub1.jpg" alt="">
            <span class="item-title">Короб стелс HYUNDAI SOLARIS 2</span>
            <span class="item-instock">в наличии</span>
            <span class="item-price">2 490 ₽</span>
            <span class="item-order">Купить</span>
          </a>
          <a class="item">
            <img src="./static/sub1.jpg" alt="">
            <span class="item-title">Короб стелс HYUNDAI SOLARIS 2</span>
            <span class="item-instock">в наличии</span>
            <span class="item-price">2 490 ₽</span>
            <span class="item-order">Купить</span>
          </a>
          <a class="item">
            <img src="./static/sub1.jpg" alt="">
            <span class="item-title">Короб стелс HYUNDAI SOLARIS 2</span>
            <span class="item-instock">в наличии</span>
            <span class="item-price">2 490 ₽</span>
            <span class="item-order">Купить</span>
          </a>
          <a class="item">
            <img src="./static/sub1.jpg" alt="">
            <span class="item-title">Короб стелс HYUNDAI SOLARIS 2</span>
            <span class="item-instock">в наличии</span>
            <span class="item-price">2 490 ₽</span>
            <span class="item-order">Купить</span>
          </a>
        </div>
        <div class="seo-text">
          <h1>Интернет-магазин автозвука</h1>
          <p>
            Требуются высококачественные компоненты для создания автомобильной акустической системы? Обращайтесь в LOUD SOUND! Мы специализируемся на продаже профессиональной и любительской акустики, а также дополнительных аксессуаров.
          </p>
          <p>
            Мы не просто реализуем специализированную аппаратуру, но и сами глубоко вовлечены в субкультуру автозвука. Команда LOUD SOUND регулярно участвует и побеждает в профильных соревнованиях, а также ведет собственный канал на YouTube с более чем 500 тыс. подписчиков.
          </p>
          <p>
            Вы всегда можете рассчитывать на подробную и всестороннюю консультацию от профессионалов своего дела. Специалисты интернет-магазина готовы помочь с подбором, установкой и настройкой аудиосистем любой сложности.
          </p>
          <h2>Акустические системы: ассортимент, бренды, условия покупки</h2>
          <p>
            Наш интернет-магазин предлагает огромный выбор аудиосистем и компонентов: магнитол, сабвуферов, динамиков, усилителей и других видов аппаратуры. Также в наличии вибро- и шумоизоляция, аккумуляторы для автозвука, ремкомплекты, кабели.
          </p>
          <p>
            В каталоге имеются как профессиональные компоненты для автозвука, так и базовое любительское оборудование, отличающееся невысокой ценой. Мы предлагаем только оригинальную, сертифицированную продукцию. Ассортимент представлен большим количеством популярных <a href="/brendy/">брендов</a>:
          </p>
          <ul>
            <li>Alphard Group;</li>
            <li>Pride;</li>
            <li>Kicx;</li>
            <li>Ural;</li>
            <li>Momo;</li>
            <li>Pioneer;</li>
            <li>ACV;</li>
            <li>Dynamic State;</li>
            <li>SWAT и многие другие.</li>
          </ul>
          <p>
            Мы также являемся официальным дилером торговых марок Alphard, Pride, Pioneer, Rockford Fosgate, Avatar и B&amp;C Speakers. Обширный ассортимент дает важное конкурентное преимущество: купить все необходимые компоненты для акустической системы можно в одном месте. Доставка аппаратуры может быть выполнена в любую точку России, СНГ и дальнего зарубежья.
          </p>
          <p>
            Получить консультацию по ассортименту и условиям работы нашего магазина автозвука можно по телефону 8 (800) 600-7-132 (бесплатный звонок для жителей РФ).
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>