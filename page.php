<?php $id_parrent=0; $id_current=0; ?>
<?php get_header(); ?>
<?php echo do_shortcode("[all-nivoslider image_link='' theme='nivo-custome' ]"); ?>
<div class="content">
<section id="left-content" class="body-left">
	<!-- <div class="box3">
		<div class="title">
			Chuyên mục
		</div>
		<div class="content">-->
			<?php //if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php 
					// $id_parrent=$post->post_parent;
					// $id_current=$post->ID;
				?>
			 <?php
			// endwhile;
			// endif;
			?>	
			<?php 
				// if ($id_parrent==0) {
				// 	# code...

				// }
				// $query = new WP_Query( array( 'post_parent' => $id_parrent,'post_type' => 'page' ) );

				// while ($query->have_posts()) : $query->the_post(); 

						 ?>
						 	<!-- <div class="menusp_lv_0"><a href="" class=""> 
	        					<?php //the_title(); ?>
	    					</a>
						 	</div> -->
	    					<?php
						 // endwhile ; 
						 // wp_reset_query() ;
						?>

		<!-- /div>
	</div> -->
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
	<section id="main-content" class="body-center single-post">
		<?php 
			// $categories = get_the_category();
			// echo '<div class="title"><h2>'.$categories[0]->name.'</h2></div>';
			// $cat_arr=array();

			// foreach($categories as $cat_post) { 
			// 					//print_r($cat_child);
		 //    					// echo '<div class="menusp_lv_0"><a href="' . get_category_link( $cat_child->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $cat_child->name ) . '" ' . '>' . $cat_child->name.'</a> </div> ';
		 //    					// echo '<p> Description:'. $cat_child->description . '</p>';
		 //    					// echo '<p> Post Count: '. $cat_child->count . '</p>'; 
		 //    					// print_r($cat_post) ;
		 //    					 array_push($cat_arr,$cat_post->cat_ID);
			// 				}
							//print_r($cat_arr);
		?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php //print_r($post); ?>
				<div class="title"><h2><?php the_title(); ?></h2></div>
                <?php get_template_part( 'content', get_post_format() ); ?>
                <?php //get_template_part( 'author-bio' ); ?>
				<?php //comments_template(); ?>
        <?php endwhile; ?>

        <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>



        <?php endif; ?>

        

	</section>
	<div class="clear"> </div>
</div>
<?php get_footer(); ?>