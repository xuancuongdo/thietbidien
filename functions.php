<?php
/**
  @ Thiết lập các hằng dữ liệu quan trọng
  @ THEME_URL = get_stylesheet_directory() - đường dẫn tới thư mục theme
  @ CORE = thư mục /core của theme, chứa các file nguồn quan trọng.
  **/
  define( 'THEME_URL', get_stylesheet_directory() );
  define( 'CORE', THEME_URL . '/core' );

  require_once( CORE . '/init.php' );

  /**
 @ Thiết lập $content_width để khai báo kích thước chiều rộng của nội dung
 **/
 if ( ! isset( $content_width ) ) {
       /*
        * Nếu biến $content_width chưa có dữ liệu thì gán giá trị cho nó
        */
       $content_width = 620;
  }

  /**
  @ Thiết lập các chức năng sẽ được theme hỗ trợ
  **/
  if ( ! function_exists( 'cuongdx_theme_setup' ) ) {
        /*
         * Nếu chưa có hàm cuongdx_theme_setup() thì sẽ tạo mới hàm đó
         */
        function cuongdx_theme_setup() {
 
        }
        add_action ( 'init', 'cuongdx_theme_setup' );
 
  }

  /*
* Thiết lập theme có thể dịch được
*/
$language_folder = THEME_URL . '/languages';
load_theme_textdomain( 'cuongdx', $language_folder );


/*
* Tự chèn RSS Feed links trong <head>
*/
add_theme_support( 'automatic-feed-links' );

/*
* Thêm chức năng title-tag để tự thêm <title>
*/
add_theme_support( 'title-tag' );

/*
* Thêm chức năng post format
*/
add_theme_support( 'post-formats',
    array(
       'image',
       'video',
       'gallery',
       'quote',
       'link'
    )
 );

 /*
* Thêm chức năng custom background
*/
$default_background = array(
   'default-color' => '#e8e8e8',
);
add_theme_support( 'custom-background', $default_background );

/*
* Tạo menu cho theme
*/
register_nav_menu ( 'primary-menu', __('Primary Menu', 'cuongdx') );
register_nav_menu ( 'left-menu', __('Left Menu', 'cuongdx') );
/*
* Tạo sidebar cho theme
*/
$sidebar = array(
   'name' => __('Main Sidebar', 'cuongdx'),
   'id' => 'main-sidebar',
   'description' => 'Main sidebar for Cuongdx theme',
   'class' => 'main-sidebar',
   'before_title' => '<h3 class="widgettitle">',
   'after_title' => '</h3>'
);
register_sidebar( $sidebar );

$sidebar_search = array(
   'name' => __('Search sidebar', 'cuongdx'),
   'id' => 'search-sidebar',
   'description' => 'Search sidebar for Cuongdx theme',
   'class' => 'search-sidebar',
   'before_title' => '<h3 class="widgettitle">',
   'after_title' => '</h3>'
);
register_sidebar( $sidebar_search );

$sidebar_language = array(
   'name' => __('Language sidebar', 'cuongdx'),
   'id' => 'language-sidebar',
   'description' => 'Language sidebar for Cuongdx theme',
   'class' => 'language-sidebar',
   'before_title' => '<h3 class="widgettitle">',
   'after_title' => '</h3>'
);
register_sidebar( $sidebar_language );

$sidebar_gioithieu = array(
   'name' => __('GioiThieu sidebar', 'cuongdx'),
   'id' => 'gioithieu-sidebar',
   'description' => 'GioiThieu sidebar for Cuongdx theme',
   'class' => 'gioithieu-sidebar',
   'before_title' => '<h3 class="widgettitle">',
   'after_title' => '</h3>'
);
register_sidebar( $sidebar_gioithieu );

$sidebar_category = array(
   'name' => __('Category sidebar', 'cuongdx'),
   'id' => 'category-sidebar',
   'description' => 'Category sidebar for Cuongdx theme',
   'class' => 'category-sidebar',
   'before_title' => '<h3 class="widgettitle">',
   'after_title' => '</h3>'
);
register_sidebar( $sidebar_category );
/**
@ Thiết lập hàm hiển thị logo
@ cuongdx_logo()
**/
if ( ! function_exists( 'cuongdx_logo' ) ) {
  function cuongdx_logo() {?>
    <div class="logo">
 
      <div class="site-name">
        <?php if ( is_home() ) {
          printf(
            '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
            get_bloginfo( 'url' ),
            get_bloginfo( 'description' ),
            get_bloginfo( 'sitename' )
          );
        } else {
          printf(
            '<p><a href="%1$s" title="%2$s">%3$s</a></p>',
            get_bloginfo( 'url' ),
            get_bloginfo( 'description' ),
            get_bloginfo( 'sitename' )
          );
        } // endif ?>
      </div>
      <div class="site-description"><?php bloginfo( 'description' ); ?></div>
 
    </div>
  <?php }
}

/**
@ Thiết lập hàm hiển thị menu
@ cuongdx_menu( $slug )
**/
if ( ! function_exists( 'cuongdx_menu' ) ) {
  function cuongdx_menu( $slug ) {
   $menu = array(
  'theme_location' => $slug,
  'container' => 'nav',
  'container_class' => $slug,
  'items_wrap'      => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>',

  );
    wp_nav_menu( array( 'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>','container' => 'nav','container_class' => $slug,));
  }
}

/**
@ Tạo hàm phân trang cho index, archive.
@ Hàm này sẽ hiển thị liên kết phân trang theo dạng chữ: Newer Posts & Older Posts
@ thachpham_pagination()
**/
if ( ! function_exists( 'cuongdx_pagination' ) ) {
  function cuongdx_pagination() {
    /*
     * Không hiển thị phân trang nếu trang đó có ít hơn 2 trang
     */
    if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
      return '';
    }
  ?>
 
  <nav class="pagination" role="navigation">
    <?php //if ( !is_page() ) : ?>
    <div class="pagelink"><?php wp_pagenavi(); ?></div>
    <?php// endif; ?>
     <?php //if ( get_next_post_link() ) : ?>
      <div class="prev"><?php //next_posts_link( __('Older', 'cuongdx') ); ?></div>
    <?php //endif; ?>
 
    <?php //if ( get_previous_post_link() ) : ?>
      <div class="next"><?php //previous_posts_link( __('Newer', 'cuongdx') ); ?></div>
    <?php //endif; ?> 
 
  </nav><?php
  }
}

/**
@ Hàm hiển thị ảnh thumbnail của post.
@ Ảnh thumbnail sẽ không được hiển thị trong trang single
@ Nhưng sẽ hiển thị trong single nếu post đó có format là Image
@ thachpham_thumbnail( $size )
**/
if ( ! function_exists( 'cuongdx_thumbnail' ) ) {
  function cuongdx_thumbnail( $size ) {
 
    // Chỉ hiển thumbnail với post không có mật khẩu
    if ( ! is_single() && !is_page() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
      <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure><?php
    endif;
  }
}

/**
@ Hàm hiển thị tiêu đề của post trong .entry-header
@ Tiêu đề của post sẽ là nằm trong thẻ <h1> ở trang single
@ Còn ở trang chủ và trang lưu trữ, nó sẽ là thẻ <h2>
@ thachpham_entry_header()
**/
if ( ! function_exists( 'cuongdx_entry_header' ) ) {
  function cuongdx_entry_header() {
    if ( is_single() || is_page()) : ?>
 
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
    <?php else : ?>

        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
    <?php
 
    endif;
  }
}

/**
@ Hàm hiển thị thông tin của post (Post Meta)
@ thachpham_entry_meta()
**/
if( ! function_exists( 'cuongdx_entry_meta' ) ) {
  function cuongdx_entry_meta() {
    if ( ! is_page() ) :
      echo '<div class="datetime">';
 
        // Hiển thị tên tác giả, tên category và ngày tháng đăng bài
        // printf( __('<span class="author">Posted by %1$s</span>', 'cuongdx'),
        //   get_the_author() );
 
        printf( __('<span class="date-published"> %1$s</span>', 'cuongdx'),
          get_the_date('d/m/Y') );
 
        // printf( __('<span class="category"> in %1$s</span>', 'cuongdx'),
        //   get_the_category_list( ', ' ) );
 
        // Hiển thị số đếm lượt bình luận
        // if ( comments_open() ) :
        //   echo ' <span class="meta-reply">';
        //     comments_popup_link(
        //       __('Leave a comment', 'cuongdx'),
        //       __('One comment', 'cuongdx'),
        //       __('% comments', 'cuongdx'),
        //       __('Read all comments', 'cuongdx')
        //      );
        //   echo '</span>';
        // endif;
      echo '</div>';
    endif;
  }
}

/*
 * Thêm chữ Read More vào excerpt
 */
function cuongdx_readmore() {
  return '...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'cuongdx') . '</a>';
}
add_filter( 'excerpt_more', 'cuongdx_readmore' );
 
/**
@ Hàm hiển thị nội dung của post type
@ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
@ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
@ thachpham_entry_content()
**/
if ( ! function_exists( 'cuongdx_entry_content' ) ) {
  function cuongdx_entry_content() {

    if ( is_single()  ) :
      the_content();
      
    else:
    
     if (is_page()):

      the_content();
    else:
      the_excerpt();
      endif;
      /*
       * Code hiển thị phân trang trong post type
       */
      $link_pages = array(
        'before' => __('<p>Page:', 'cuongdx'),
        'after' => '</p>',
        'nextpagelink'     => __( 'Next page', 'cuongdx' ),
        'previouspagelink' => __( 'Previous page', 'cuongdx' )
      );
      //wp_link_pages( $link_pages );
    endif;

  }
}

/**
@ Hàm hiển thị tag của post
@ thachpham_entry_tag()
**/
if ( ! function_exists( 'cuongdx_entry_tag' ) ) {
  function cuongdx_entry_tag() {
    if ( has_tag() ) :
      echo '<div class="entry-tag">';
      printf( __('Tagged in %1$s', 'cuongdx'), get_the_tag_list( '', ', ' ) );
      echo '</div>';
    endif;
  }
}

/**
@ Chèn CSS và Javascript vào theme
@ sử dụng hook wp_enqueue_scripts() để hiển thị nó ra ngoài front-end
**/
function cuongdx_styles() {
  /*
   * Hàm get_stylesheet_uri() sẽ trả về giá trị dẫn đến file style.css của theme
   * Nếu sử dụng child theme, thì file style.css này vẫn load ra từ theme mẹ
   */
  wp_register_style( 'main-style', get_template_directory_uri() . '/style.css', 'all' );
  wp_register_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap/css/bootstrap.min.css', 'all' );

  wp_enqueue_style( 'bootstrap-style' );
  wp_enqueue_style( 'main-style' );

  /*
* Chèn các file CSS của SuperFish Menu
*/
wp_register_style( 'superfish-css', get_template_directory_uri() . '/css/superfish.css', 'all' );
wp_enqueue_style( 'superfish-css' );
 
/*
* Chèn file JS của jquery
*/
// wp_register_script( 'jQuery', get_template_directory_uri() . '/js/bower_components/jquery/dist/jquery.js', array('jquery') );
// wp_enqueue_script( 'jQuery' );

/*
* Chèn file JS của SuperFish Menu
*/
wp_register_script( 'superfish-js', get_template_directory_uri() . '/js/superfish.js', array('jquery') );
wp_enqueue_script( 'superfish-js' );
 
/*
* Chèn file JS của Vertical marquee
*/
wp_register_script( 'vertical-marquee', get_template_directory_uri() . '/js/jQuery.Marquee/jquery.marquee.min.js', array('jquery') );
wp_enqueue_script( 'vertical-marquee' );

/*
* Chèn file JS custom.js
*/
wp_register_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery') );
wp_enqueue_script( 'custom-js' );
}
add_action( 'wp_enqueue_scripts', 'cuongdx_styles' );

/*
 * Filter the except length to 20 charactwpdocs_excerpt_moreers.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 200;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


/**
@ Hàm hiển thị tag của post
@ thachpham_entry_tag()
**/
if ( ! function_exists( 'cuongdx_news_box_marquee' ) ) {
  function cuongdx_news_box_marquee() {


    $query = new WP_Query( array( 'category_name' => 'san-pham-dich-vu' ) );

    while ($query->have_posts()) : $query->the_post(); 
    echo '<a href="aaa" class="anh_bai_viet">'.
    the_post_thumbnail(226,111,array( "title" => get_the_title(),"alt" => get_the_title() )).'</a>';                
       endwhile ; 

       wp_reset_query() ;
           
     }
   }

?>