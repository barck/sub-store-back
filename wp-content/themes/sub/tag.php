<?php get_header(); ?>
<div class="content">
  <div class="search-page news-page">
    <div class="container">
      <div class="breadcrumbs">
        <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
      </div>
      <h1 class="headline">Новости по тегу: <b><?= single_tag_title() ?></b></h1>
      <div class="post-list">
        <?php $count_both = 0 ?>
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <?php $count_both++; ?>
        <div class="post-item post">
        <a class="cover" href="<?php the_permalink() ?>">
          <?php $cat = get_the_category(); ?>
          <div class="corner-ribbon 
          <?= get_field('color', $cat[0]->taxonomy . '_' . $cat[0]->term_id) ?>
          "><?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></div>
          <?php the_post_thumbnail() ?>
          <div class="post-text"><?php the_excerpt() ?></div>
          <div class="read-more btn-std">Читать (~ <?= bv2_get_post_reading_time() ?> мин.)</div>
        </a>
        <span class="post-headline"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span>
        <div class="post-item-bottom">
          <div class="post-item-meta">
            <span class="post-date"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' назад'; ?>&nbsp;</span>
            <span><span class="icon-eye"></span> <?php echo getPostViews(get_the_ID()); ?>&nbsp;</span>
            <span><span class="icon-bubble"></span> <?php comments_number('0', '1', '%'); ?></span>
          </div>
        </div>
      </div>
      <?php if ( $count_both % 3 == 0 ): ?>
        <hr>
      <?php endif; ?>
      <?php endwhile; endif; ?>
      <?php the_posts_pagination(); ?>
      </div>
    </div>
  </div>
</div>
</div>
<?php get_footer(); ?>