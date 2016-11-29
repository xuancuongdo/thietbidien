
<?php get_header(); ?>
<?php //if ( function_exists('show_nivo_slider') ) { show_nivo_slider(); } ?>
<?php echo do_shortcode("[all-nivoslider image_link='' theme='nivo-custome' ]"); ?>
<div class="content">
	<section id="left-content" class="body-left">
		<div class="box3 box-marquee"> 
			<div class="title">
        		Sản phẩm dịch vụ tiêu biểu
    		</div>
    		<div class="content">
    			<div id="marquee-cotainer" class="marquee">
					<?php

						$query = new WP_Query( array( 'category_name' => 'san-pham-dich-vu' ) );

						 while ($query->have_posts()) : $query->the_post(); 
						 	//get_template_part( 'content', get_post_format() ); 
						 ?>
						 	<a href="<?php the_permalink() ;?>" class="anh_bai_viet"> 
	        					<?php the_post_thumbnail(269,214,array("class"=>"img-spnb", "title" => get_the_title(),"alt" => get_the_title() ));?>
	    					</a>
						 	
	    					<?php
						 endwhile ; 
						 wp_reset_query() ;
					?>
				</div>
			</div>
		</div>
		<div class="box3">
			<div class="title">
				Tìm kiếm
			</div>
			<div class="content">
				<div class="search-box"><?//php dynamic_sidebar( 'search-sidebar' ); ?>
                                <?php //endif; ?> 
                                <?php get_search_form();?>
                                </div>
			</div>
		</div>
		<div class="box3">
			<div class="title">
				Liên kết hữu ích
			</div>
			<div class="content">
				<select size="1" onchange="if(this.value!='-1')window.open(this.value)" class="lienketwebsite" name="lienketwebsite">
            <option value="-1" selected="selected">Liên kết hữu ích</option>
            
                    <option value="http://urenco.com.vn">
                        Công ty TNHH MTV Môi trường Đô thị Hà Nội</option>
                
                    <option value="http://www.envimco.com">
                        Công ty CP Vật tư thiết bị Môi trường - URENCO 13</option>
                
                    <option value="http://www.urencodaidong.com.vn">
                        Công ty CP môi trường đô thị và Công nghiệp Đại Đồng</option>
                
                    <option value="http://www.canhsatmoitruong.gov.vn">
                        Cục cảnh sát môi trường</option>
                
                    <option value="http://www.hcmier.edu.vn">
                        Viện Môi trường và Tài nguyên</option>
                
        </select>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</section>
	<section id="main-content" class="body-center">
	<?php //if ( is_single() ) : ?>
		<section class="box box-gioithieu">
			<div class="title"><h2>Giới thiệu</h2></div>
			<section class="content">
				<?php

					$query = new WP_Query( array( 'name' => 'gioi-thieu','post_type' => 'page' ) );

					 while ($query->have_posts()) : $query->the_post(); 
					 	//get_template_part( 'content', get_post_format() ); 
					 ?>
					 	<a href="<?php the_permalink() ;?>" class="anh_bai_viet"> 
        					<?php the_post_thumbnail(269,214,array( "title" => get_the_title(),"alt" => get_the_title() ));?>
    					</a>
					 	<p class="trich_dan">
        				<?php the_excerpt(200) ;?>
    					</p>
    					<?php
					 endwhile ; 

					 wp_reset_query() ;
				?>
			</section>
		</section>
		<?php  //endif;?>
		<section class="box">
			<div class="title"><h2 >Tin tức - sự kiện</h2></div>
			<section class="content"> 
			<?php
				$vnkings = new WP_Query(array(
				'post_type'=>'post',
				'post_status'=>'publish',
				'category_name' => 'tin-tuc-su-kien',
				'orderby' => 'ID',
				'order' => 'DESC',
				'posts_per_page'=> 4));
			?>

			<?php while ($vnkings->have_posts()) : $vnkings->the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile ; wp_reset_query() ;?>

				<?php 
					// if ( have_posts() ) : while ( have_posts() ) : the_post(); 
					//  	get_template_part( 'content', get_post_format() ); 

				 // 		endwhile; 
				 // 		cuongdx_pagination(); 
				 // 	else : 
					//  	get_template_part( 'content', 'none' ); 
				 // 	endif; 
				 ?>
			</section>
		</section>

	</section>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>