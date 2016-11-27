<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->
 
<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmgp.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 
        <?php wp_head(); ?>
    <script type="text/javascript">
        
    </script>
</head>
 
<body <?php body_class(); ?> > <!--Thêm class tượng trưng cho mỗi trang lên <body> để tùy biến-->
        <a href="#header"></a>
        <div id="container">
        	<header id="header">	
                <div id="banner">
        			<?php //cuongdx_logo(); ?>
        			<?php if ( is_active_sidebar( 'language_sidebar' ) ) : ?>
                                        <p class="language-switch"><?php dynamic_sidebar( 'language-sidebar' ); ?>
                                        </p>
                                <?php endif; ?> 

                                
                </div>
                
        	</header>
            <?php cuongdx_menu('primary-menu'); ?>

