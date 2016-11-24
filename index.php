
<?php get_header(); ?>
<?php //if ( function_exists('show_nivo_slider') ) { show_nivo_slider(); } ?>
<?php echo do_shortcode("[all-nivoslider image_link='' theme='nivo-custome' ]"); ?>
<div class="content row">
	<section id="left-content" class="col-md-3">
		
	</section>
	<section id="main-content" class="col-md-9">
		<section class="box row">
			<h2 class="title">Giới thiệu</h2>
			<section class="content"> 
				<?php if ( is_active_sidebar( 'gioithieu-sidebar' ) ) : ?>
					<?php dynamic_sidebar( 'gioithieu-sidebar' ); ?>
				<?php endif; ?> 
			</section>
		</section>
		<?php 

		// $post_7 = get_post(1770);
		// print_r( $post_7->post_title);
		// print_r( $post_7->post_excerpt);
		?>
		<section class="box row">
			<h2 class="title">Tin tức - sự kiện</h2>
			<section class="content"> 
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>
				<?php cuongdx_pagination(); ?>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
			</section>
		</section>
		<section id="sidebar" class="row">
		<?php get_sidebar(); ?>
		</section>
	</section>

</div>
<?php get_footer(); ?>