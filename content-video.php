<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
 			 <?php cuongdx_entry_header(); ?>

        </header>
        <div class="entry-content">
 			 <?php the_content(); ?>
        	 <?php ( is_single() ? cuongdx_entry_tag() : '' ); ?>
        </div>
</article>