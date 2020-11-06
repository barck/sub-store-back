<?php get_header(); ?>
<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
<?php 
  $current_cat = get_the_category()[0]->term_id;
  $bookClass = get_field('class', $postId);
  $bookSubject = get_field('subject', $postId);
  $bookId = get_field('id', $postId);
?>
<script>
  document.playerPage = true;
</script>
<div class="main category-page">
    <div class="container">
      <div class="category-content">
        <div class="breadcrumbs">
          <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
        </div>
        <h1><?= get_the_title() ?> учебник</h1>
        <div class="book-info">
          <div class="book-info-left">
            <img class="cover" src="/wp-content/books/<?= $bookId ?>/<?= $bookId ?>.jpg" alt="">
            <table>
              <tbody>
              <tr>
                <td>Предмет:</td>
                <td><?= get_cat_name($current_cat) ?></td>
              </tr>
              <tr>
                <td>Класс:</td>
                <td><?= get_field('class', $postId) ?> класс</td>
              </tr>
              <tr>
                <td>Авторы:</td>
                <td><?= get_field('authors', $postId) ?></td>
              </tr>
              <tr>
                <td>Издательство:</td>
                <td><?= get_field('publisher', $postId) ?></td>
              </tr>
              <tr>
                <td>Год:</td>
                <td><?= get_field('year', $postId) ?></td>
              </tr>
              <tr>
                <td>Страниц:</td>
                <td><?= get_field('pages', $postId) ?></td>
              </tr>
              <tr>
                <td>Язык:</td>
                <td><?= get_field('language', $postId) ?></td>
              </tr>
              </tbody>
            </table>
          </div>
          <div class="book-info-right">
            <?php if(get_field('pdf-download', $postId)): ?>
              <a class="read-online-btn"
                data-src="/wp-content/books/<?= get_field('id', $postId) ?>/<?= get_field('pdf-download', $postId) ?>"
                data-name="<?= $post_slug=$post->post_name; ?>"
                >Читать онлайн</a>
              <a href="/wp-content/books/<?= $bookId ?>/<?= get_field('pdf-download', $postId) ?>" target="_blank">Скачать PDF</a>
            <?php endif; ?>
            <?php if(get_field('epub-download', $postId)): ?>
              <a href="/wp-content/books/<?= $bookId ?>/<?= get_field('epub-download', $postId) ?>" target="_blank">Скачать EPUB</a>
            <?php endif; ?>
            <?php efav_link() ?>
            <?php if(get_field('book_original_url', $postId)): ?>
              <a href="<?= get_field('book_original_url', $postId) ?>" class="original-book-url">Ссылка на источник</a>
            <?php endif; ?>
          </div>
        </div>
        <!-- <h2>Перейти к разделу:</h2>
        <div class="book-structure">

        </div> -->
        <?php if(get_field('pdf-download', $postId)): ?>
          <h2>Учебник онлайн:</h2>
          <div class="player" id="player">
            <div class="preloader-wrapper show">
              <span class="preloader-title">Загрузка</span>
              <div class="preloader"></div>
            </div>
            <span class="close"></span>
            <canvas id="the-canvas"></canvas>
            <div class="panel">
              <button id="prev">&lt; Назад</button>
              <div class="page-input-box">
                <input type="number" pattern="\d*" value="1" id="pageNumber" class="toolbarField pageNumber">
                <span>/</span>
                <span id="page_count"></span>
              </div>
              <!-- <span id="page_num"></span> / <span id="page_count"></span> -->
              <button id="next">Вперед &gt;</button>
            </div>
          </div>
        <?php endif; ?>
        <?php get_template_part( 'popularBooks' ); ?>
      </div>

      <div class="sidebar">
        <span class="filter-head">Классы</span>
          <?php $classes = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11); ?>
          <?php foreach( $classes as $item ){ ?>
            <a href="/<?= $item ?>-class"
            
            <?php if($bookClass == $item): ?>
              class="active-link"
            <?php endif; ?>
            >
              <?= $item ?> класс
            </a>
          <?php } ?>
        <span class="filter-head">Предметы</span>
        <?php
          $categories = get_categories(array());
          foreach( $categories as $category ){ ?>
          <a href="<?= get_category_link( $category->term_id ) ?>"
          <?php if($category->term_id === $current_cat):?>
            class="active-link"
          <?php endif;?>
          >
            <?= $category->name ?>
          </a>
        <?php } ?>
      </div>
    </div>
    

  </div>
  
</div>
<?php get_footer(); ?>