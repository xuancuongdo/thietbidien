<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
        	<?php cuongdx_thumbnail( 'large' ); ?>
 			<?php cuongdx_entry_header(); ?>
 			<?php
			/*
			* Đếm số lượng attachment có trong post
			*/
			   $attachments = get_children( array( 'post_parent'=>$post->ID ) );
			   $attachment_number = count($attachments);
			   printf( __('This image post contains %1$s photos', 'cuongdx'), $attachment_number );
			?>
        </header>
        <div class="entry-content">
 			 <?php cuongdx_entry_content(); ?>
        	 <?php ( is_single() ? cuongdx_entry_tag() : '' ); ?>
        </div>
</article>