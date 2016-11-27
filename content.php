<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <figure class="img">
 			<?php cuongdx_thumbnail( 'thumbnail' ); ?>
        </figure>
        <header class="title-tin">
 			 <?php cuongdx_entry_header(); ?>
 			 <?php cuongdx_entry_meta() ?>
        </header>
        <div class="entry-content">
 			 <?php cuongdx_entry_content(); ?>
        	 <?php //( is_single() ? cuongdx_entry_tag() : '' ); ?>
        </div>
        <div class="clear"></div>
</article>