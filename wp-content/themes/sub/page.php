<?php get_header(); ?>
<div class="main category-page">
    <div class="container">
      <div class="category-content">
        <div class="breadcrumbs">
          <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
        </div>
        <h1><?php the_title(); ?></h1>

        <div class="book-list">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
        </div>
      </div>

      <div class="sidebar">
        <span class="filter-head">Классы</span>
          <a href="/1-class">1 класс</a>
          <a href="/2-class">2 класс</a>
          <a href="/3-class">3 класс</a>
          <a href="/4-class">4 класс</a>
          <a href="/5-class">5 класс</a>
          <a href="/6-class">6 класс</a>
          <a href="/7-class">7 класс</a>
          <a href="/8-class">8 класс</a>
          <a href="/9-class">9 класс</a>
          <a href="/10-class">10 класс</a>
          <a href="/11-class">11 класс</a>
        <span class="filter-head">Предметы</span>
        <?php
          $categories = get_categories(array(
          ));
          foreach( $categories as $category ){ ?>
          <a href="<?= get_category_link( $category->term_id ) ?>">
            <?= $category->name ?>
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
  
</div>
<?php get_footer(); ?>