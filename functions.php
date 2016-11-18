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
    );
    wp_nav_menu( $menu );
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
    <?php if ( get_next_post_link() ) : ?>
      <div class="prev"><?php next_posts_link( __('Cũ hơn', 'cuongdx') ); ?></div>
    <?php endif; ?>
 
    <?php if ( get_previous_post_link() ) : ?>
      <div class="next"><?php previous_posts_link( __('Mới hơn', 'cuongdx') ); ?></div>
    <?php endif; ?>
 
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
    if ( ! is_single() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
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
    if ( is_single() ) : ?>
 
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
    <?php else : ?>
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h2><?php
 
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
      echo '<div class="entry-meta">';
 
        // Hiển thị tên tác giả, tên category và ngày tháng đăng bài
        printf( __('<span class="author">Posted by %1$s</span>', 'cuongdx'),
          get_the_author() );
 
        printf( __('<span class="date-published"> at %1$s</span>', 'cuongdx'),
          get_the_date() );
 
        printf( __('<span class="category"> in %1$s</span>', 'cuongdx'),
          get_the_category_list( ', ' ) );
 
        // Hiển thị số đếm lượt bình luận
        if ( comments_open() ) :
          echo ' <span class="meta-reply">';
            comments_popup_link(
              __('Leave a comment', 'cuongdx'),
              __('One comment', 'cuongdx'),
              __('% comments', 'cuongdx'),
              __('Read all comments', 'cuongdx')
             );
          echo '</span>';
        endif;
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
 
    if ( ! is_single() ) :
      the_excerpt();
    else :
      the_content();
 
      /*
       * Code hiển thị phân trang trong post type
       */
      $link_pages = array(
        'before' => __('<p>Page:', 'cuongdx'),
        'after' => '</p>',
        'nextpagelink'     => __( 'Next page', 'cuongdx' ),
        'previouspagelink' => __( 'Previous page', 'cuongdx' )
      );
      wp_link_pages( $link_pages );
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
?>