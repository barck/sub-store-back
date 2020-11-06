<?php get_header(); ?>
<div class="main-content">
      <div class="container">
      <h1 class="headline">Результаты поиска по запросу: <b><?= get_search_query() ?></h1>
        <section class="popular-courses">
        <?php if (have_posts() && ( 1 == 1)): while (have_posts()): the_post(); ?>
        <?php
          $cat = get_the_category($post->ID);
        ?>
            <a href="<?php the_permalink() ?>" class="course-item">
              <div class="cover">
                <?= get_the_post_thumbnail( $id, $size, $attr ); ?>
                <span class="author"><?= $cat[0]->name ?></span>
              </div>
              <h4><?= $post->post_title ?></h4>
              <span class="price"><?= get_field('price', 'post_' . $id) ?>₽</span>
              <span class="read-more">Подробней</span>
              <span class="buy-count">покупок: <?php echo getPostViews($id); ?></span>
            </a>
        <?php endwhile; endif; ?>
        </section>
      </div>
    </div>
  </div>
<?php get_footer(); ?>