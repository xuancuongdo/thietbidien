<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-thumbnail">
 			<?php cuongdx_thumbnail( 'thumbnail' ); ?>
        </div>
        <header class="entry-header">
 			 <?php cuongdx_entry_header(); ?>
 			 <?php cuongdx_entry_meta() ?>
        </header>
        <div class="entry-content">
 			 <?php cuongdx_entry_content(); ?>
        	 <?php ( is_single() ? cuongdx_entry_tag() : '' ); ?>
        </div>
</article>