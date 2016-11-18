
<?php get_header(); ?>
<div class="content">

	<div class="archive-title">
		<h2>
			<?php
			if ( is_tag() ) :
				printf( __('Posts Tagged: %1$s','cuongdx'), single_tag_title( '', false ) );
			elseif ( is_category() ) :
				printf( __('Posts Categorized: %1$s','cuongdx'), single_cat_title( '', false ) );
			elseif ( is_day() ) :
				printf( __('Daily Archives: %1$s','cuongdx'), get_the_time('l, F j, Y') );
			elseif ( is_month() ) :
				printf( __('Monthly Archives: %1$s','cuongdx'), get_the_time('F Y') );
			elseif ( is_year() ) :
				printf( __('Yearly Archives: %1$s','cuongdx'), get_the_time('Y') );
			endif;
			?>
		</h2>
	</div>

	 <?php if ( is_tag() || is_category() ) : ?>
                <div class="archive-description">
                    <?php echo term_description(); ?>
                </div>
     <?php endif; ?>

	<section id="main-content">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
        <?php endwhile; ?>
        <?php cuongdx_pagination(); ?>
        <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>
		<section id="sidebar">
			<?php get_sidebar(); ?>
		</section>
	</section>

</div>
<?php get_footer(); ?>