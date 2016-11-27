
<?php get_header(); ?>

<div class="content">
	<section id="left-content" class="body-left">
		<?php //dynamic_sidebar('category-sidebar'); ?>
		<div class="box3">
			<div class="title">
				Chuyên mục
			</div>
			<div class="content">
				<div class="menusp">
						<?php 
							$categories = get_the_category();
							$category_id = $categories[0]->category_parent; 
							if($category_id==0)$category_id=$categories[0]->cat_ID; 
							//print_r($categories);

							$args = array('child_of' => $category_id);
							$categories_child = get_categories( $args );
							//print_r($categories_child);
							foreach($categories_child as $cat_child) { 
								//print_r($cat_child);
		    					echo '<div class="menusp_lv_0"><a href="' . get_category_link( $cat_child->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $cat_child->name ) . '" ' . '>' . $cat_child->name.'</a> </div> ';
		    					// echo '<p> Description:'. $cat_child->description . '</p>';
		    					// echo '<p> Post Count: '. $cat_child->count . '</p>';  
							}
						?>
					</div>
			</div>
		</div>
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
		<div class="box">
		<div class="title">
			<h2>
				<?php
				if ( is_tag() ) :
					printf( __('Posts Tagged: %1$s','cuongdx'), single_tag_title( '', false ) );
				elseif ( is_category() ) :
					printf( __('%1$s','cuongdx'), single_cat_title( '', false ) );
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

		<div class="content">
		
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	                <?php get_template_part( 'content', get_post_format() ); ?>
	        <?php endwhile; ?>
	        <?php cuongdx_pagination(); ?>
	        <?php else : ?>
	                <?php get_template_part( 'content', 'none' ); ?>
	        <?php endif; ?>
        </div>
	</section>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>