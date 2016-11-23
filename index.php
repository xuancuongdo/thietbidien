
<?php get_header(); ?>
<?php //if ( function_exists('show_nivo_slider') ) { show_nivo_slider(); } ?>
<?php echo do_shortcode("[all-nivoslider image_link='' theme='nivo-custome' ]"); ?>
<div class="content">

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