<?php
/*
Template Name: ВСЕ АВТОРЫ
*/
?>
<?php get_header(); ?>
  <div class="main-content">
    <div class="container">
      <h2>Все авторы курсов</h2>
      <div class="courses-by-authors">
      <?php
        $categories = get_categories(array(
          'orderby' => 'name',
          'order' => 'DESC'
        ));
        foreach( $categories as $category ){ ?>
          <a href="<?= get_category_link( $category->term_id ) ?>" class="authors-item">
            <img src="<?= get_field('cat-thumb', 'category_' . $category->term_id) ?>" alt="<?= $category->name ?> курсы">
            <span class="author"><?= $category->name ?></span>
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
