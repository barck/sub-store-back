<?php
/*
Template Name: Учебники по классу
*/
?>
<?php 
  $bookClass = get_field('class', $page);
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
        <h1>Учебники для <?= $bookClass ?> класса</h1>

        <?php query_posts( array(
          'post_type' => 'post',
          'meta_key' => 'class',
          'meta_value' => $bookClass
          ));
        ?>

        <div class="class-list">
        <?php $subjectListArray = array(); ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php 
            $currentSubject = get_field('subject', $post_single);
          ?>
          <?php if(!in_array($currentSubject, $subjectListArray)): ?>
            <?php array_push($subjectListArray, $currentSubject); ?>
            <a href="#<?= $currentSubject; ?>"><?= $currentSubject; ?></a>
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

          <?php $postSubject = get_field('subject', $post_single); ?>

          <?php if ( ( $current_cat != $postSubject ) && ( $cat_bool ) ): ?>
              <h3 id="<?= $postSubject?>"><?= $postSubject?></h3>
              <?php endif; ?>

              <?php $current_cat = $postSubject ?>

            <a href="<?php the_permalink() ?>" class="book">
              <img class="cover" src="/wp-content/books/<?= get_field('id', $postId) ?>/<?= get_field('id', $postId) ?>.jpg" alt="">
              <span class="book-title">
                <?= $post->post_title ?>
              </span>
            </a>
          <?php endwhile; ?> 
        </div>
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