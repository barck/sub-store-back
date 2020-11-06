<h2>Популярные учебники</h2>
<div class="popular-books">

<?php query_posts(
  array(
    'post__in' => array(43, 51, 8) //вывод популярных постов по айдишнику
  )
) ?>
<?php while (have_posts()) : the_post(); ?>
  <a href="<?php the_permalink() ?>" class="book">
    <?= get_the_post_thumbnail( $id, $size, $attr ); ?>
    <span class="book-title">
      <?= $post->post_title ?>
    </span>
  </a>
<?php endwhile; ?>

</div>