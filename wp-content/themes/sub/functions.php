<?php
    wp_register_script( 'main', get_template_directory_uri() . '/app.js', array(), NULL, true);

    wp_enqueue_script( 'main' );
    add_theme_support( 'post-thumbnails' );
    // REMOVE EMOJI ICONS
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    add_filter( 'the_content', function($content) { return wpautop($content); }, 99);
    // Disable wp-embed
    function my_deregister_scripts(){
        wp_deregister_script( 'wp-embed' );
       }
       add_action( 'wp_footer', 'my_deregister_scripts' );
    // Disable wp-embed end
  
  //отключение страниц с вложениями  
  add_action('template_redirect', 'template_redirect_attachment'); 
  function template_redirect_attachment() {   
          global $post;
          // Если это вложение то перейдем на страницу записи:   
          if (is_attachment()) {     
              wp_redirect(get_permalink($post->post_parent));  
          } 
      }

    /*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2018.10.05
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

    /* === ОПЦИИ === */
    $text['home'] = 'Учебники онлайн'; // текст ссылки "Главная"
    $text['category'] = '%s'; // текст для страницы рубрики
    $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
    $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
    $text['author'] = 'Статьи автора %s'; // текст для страницы автора
    $text['404'] = 'Ошибка 404'; // текст для страницы 404
    $text['page'] = 'Страница %s'; // текст 'Страница N'
    $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'
  
    $wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
    $wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
    $sep = '<span class="breadcrumbs__separator"> › </span>'; // разделитель между "крошками"
    $before = '<span class="breadcrumbs__current">'; // тег перед текущей "крошкой"
    $after = '</span>'; // тег после текущей "крошки"
  
    $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
    $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
    $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
    $show_last_sep = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
    /* === КОНЕЦ ОПЦИЙ === */
  
    global $post;
    $home_url = home_url('/');
    $link = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
    $link .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
    $link .= '<meta itemprop="position" content="%3$s" />';
    $link .= '</span>';
    $parent_id = ( $post ) ? $post->post_parent : '';
    $home_link = sprintf( $link, $home_url, $text['home'], 1 );
  
    if ( is_home() || is_front_page() ) {
  
      if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;
  
    } else {
  
      $position = 0;
  
      echo $wrap_before;
  
      if ( $show_home_link ) {
        $position += 1;
        echo $home_link;
      }
  
      if ( is_category() ) {
        $parents = get_ancestors( get_query_var('cat'), 'category' );
        foreach ( array_reverse( $parents ) as $cat ) {
          $position += 1;
          if ( $position > 1 ) echo $sep;
          echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
        }
        if ( get_query_var( 'paged' ) ) {
          $position += 1;
          $cat = get_query_var('cat');
          echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
          echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
        } else {
          if ( $show_current ) {
            if ( $position >= 1 ) echo $sep;
            echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
          } elseif ( $show_last_sep ) echo $sep;
        }
  
      } elseif ( is_search() ) {
        if ( $show_home_link && $show_current || ! $show_current && $show_last_sep ) echo $sep;
        if ( $show_current ) echo $before . sprintf( $text['search'], get_search_query() ) . $after;
  
      } elseif ( is_year() ) {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . get_the_time('Y') . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
  
      } elseif ( is_month() ) {
        if ( $show_home_link ) echo $sep;
        $position += 1;
        echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
        if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
        elseif ( $show_last_sep ) echo $sep;
  
      } elseif ( is_day() ) {
        if ( $show_home_link ) echo $sep;
        $position += 1;
        echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
        $position += 1;
        echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
        if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
        elseif ( $show_last_sep ) echo $sep;
  
      } elseif ( is_single() && ! is_attachment() ) {
        if ( get_post_type() != 'post' ) {
          $position += 1;
          $post_type = get_post_type_object( get_post_type() );
          if ( $position > 1 ) echo $sep;
          echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
          if ( $show_current ) echo $sep . $before . get_the_title() . $after;
          elseif ( $show_last_sep ) echo $sep;
        } else {
          $cat = get_the_category(); $catID = $cat[0]->cat_ID;
          $parents = get_ancestors( $catID, 'category' );
          $parents = array_reverse( $parents );
          $parents[] = $catID;
          foreach ( $parents as $cat ) {
            $position += 1;
            if ( $position > 1 ) echo $sep;
            echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
          }
          if ( get_query_var( 'cpage' ) ) {
            $position += 1;
            echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
            echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
          } else {
            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
            elseif ( $show_last_sep ) echo $sep;
          }
        }
  
      } elseif ( is_post_type_archive() ) {
        $post_type = get_post_type_object( get_post_type() );
        if ( get_query_var( 'paged' ) ) {
          $position += 1;
          if ( $position > 1 ) echo $sep;
          echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
          echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
        } else {
          if ( $show_home_link && $show_current ) echo $sep;
          if ( $show_current ) echo $before . $post_type->label . $after;
          elseif ( $show_home_link && $show_last_sep ) echo $sep;
        }
  
      } elseif ( is_attachment() ) {
        $parent = get_post( $parent_id );
        $cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
        $parents = get_ancestors( $catID, 'category' );
        $parents = array_reverse( $parents );
        $parents[] = $catID;
        foreach ( $parents as $cat ) {
          $position += 1;
          if ( $position > 1 ) echo $sep;
          echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
        }
        $position += 1;
        echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
        if ( $show_current ) echo $sep . $before . get_the_title() . $after;
        elseif ( $show_last_sep ) echo $sep;
  
      } elseif ( is_page() && ! $parent_id ) {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . get_the_title() . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
  
      } elseif ( is_page() && $parent_id ) {
        $parents = get_post_ancestors( get_the_ID() );
        foreach ( array_reverse( $parents ) as $pageID ) {
          $position += 1;
          if ( $position > 1 ) echo $sep;
          echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
        }
        if ( $show_current ) echo $sep . $before . get_the_title() . $after;
        elseif ( $show_last_sep ) echo $sep;
  
      } elseif ( is_tag() ) {
        if ( get_query_var( 'paged' ) ) {
          $position += 1;
          $tagID = get_query_var( 'tag_id' );
          echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
          echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
        } else {
          if ( $show_home_link && $show_current ) echo $sep;
          if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
          elseif ( $show_home_link && $show_last_sep ) echo $sep;
        }
  
      } elseif ( is_author() ) {
        $author = get_userdata( get_query_var( 'author' ) );
        if ( get_query_var( 'paged' ) ) {
          $position += 1;
          echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
          echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
        } else {
          if ( $show_home_link && $show_current ) echo $sep;
          if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
          elseif ( $show_home_link && $show_last_sep ) echo $sep;
        }
  
      } elseif ( is_404() ) {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . $text['404'] . $after;
        elseif ( $show_last_sep ) echo $sep;
  
      } elseif ( has_post_format() && ! is_singular() ) {
        if ( $show_home_link && $show_current ) echo $sep;
        echo get_post_format_string( get_post_format() );
      }
  
      echo $wrap_after;
  
    }
  } // end of dimox_breadcrumbs()
    // удалить type="text/js"
    add_filter('script_loader_tag', 'clean_script_tag');
    function clean_script_tag($src) {
    return str_replace("type='text/javascript'", '', $src);
    // end of type=text/js
}

function searchExcludePages($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
 
	return $query;
}
 
add_filter('pre_get_posts','searchExcludePages');

// подсчет колл-ва просмотров

function getPostViews($postID){
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
      return "0";
  }
  return $count;
}
function setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      $count = 0;
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
  }else{
      $count++;
      update_post_meta($postID, $count_key, $count);
  }
}

// конец подсчета просмотров

// фикс nbsp пробелов
function replace_content($content)
{
$content = str_replace('&nbsp;', ' ', $content);
return $content;
}
add_filter('the_content','replace_content');
add_filter('the_excerpt', 'replace_content');
// конец фикс nbsp пробелов
?>