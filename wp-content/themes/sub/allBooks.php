<?php
/*
Template Name: Все учебники
*/
?>

<?php get_header(); ?>
<script>
  document.catPage = true;
</script>
<div class="main category-page">
    <div class="container">
      <div class="category-content">
        <div class="breadcrumbs">
          <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
        </div>
        <h1>Все учебники</h1>

        <?php query_posts( array(
          'post_type' => 'post'
          ));
        ?>
        
        <div class="class-list">
        <?php $classListArray = array(); ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php $currentClass = get_field('class', $post_single); ?>
          <?php if(!in_array($currentClass, $classListArray)): ?>
            <?php array_push($classListArray, $currentClass); ?>
            <a href="#<?= $currentClass ?>-class"><?= $currentClass ?> класс</a>
          <?php endif; ?>
        <?php endwhile; ?> 

          <div class="list-style-container">
            <span class="icon-list2 list-style-btn-list"></span>
            <span class="icon-grid_on list-style-btn-grid"></span>
          </div>
        </div>
        <div class="book-list">
          <?php 
            $current_cat = '';
            $cat_bool = true;
           ?>
          
          <?php while (have_posts()) : the_post(); ?>

          <?php $postClass = get_field('class', $post_single); ?>

          <?php if ( ( $current_cat != $postClass ) && ( $cat_bool ) ): ?>
              <h3 id="<?= $postClass?>-class"><?= $postClass?> класс</h3>
              <?php endif; ?>

              <?php $current_cat = $postClass ?>

            <a href="<?php the_permalink() ?>" class="book">
              <?= get_the_post_thumbnail( $id, $size, $attr ); ?>
              <span class="book-title">
                <?= $post->post_title ?>
              </span>
            </a>
          <?php endwhile; ?> 
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