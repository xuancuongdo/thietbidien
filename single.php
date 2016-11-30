<?php $id=0; ?>
<?php get_header(); ?>
<?php echo do_shortcode("[all-nivoslider image_link='' theme='nivo-custome' ]"); ?>
<div class="content">
<section id="left-content" class="body-left">
		<!-- <div class="box3">
			<div class="title">
				Chuyên mục
			</div>
			<div class="content">
				<div class="menusp"> -->
						<?php 
							// $current_menu= wp_get_nav_menu_items(176,array(
							//    'posts_per_page' => -1,
							//    //'meta_key' => '_menu_item_menu_item_parent',
							//    'meta_key' => '_menu_item_object_id',
							//    //'menu-item-parent-id' => 1793 // the currently displayed post
							//    'meta_value' => $post->ID
							// ));

							// $parent_menu_ID=$current_menu[0]->menu_item_parent;
							// print_r($current_menu);
							// $menus = wp_get_nav_menu_items(176,array(
							//    'posts_per_page' => -1,
							//    'meta_key' => '_menu_item_menu_item_parent',
							//    //'meta_key' => '_menu_item_object_id',
							//    //'menu-item-parent-id' => 1793 // the currently displayed post
							//    'meta_value' => $parent_menu_ID
							// ));
							// //print_r($menus);
							// foreach ($menus as $menu) {
							// 	# code...
							// 	print_r($menu->title);
							// 	print_r($menu->ID);
							// 	?>
							 	<!-- <a href="<?php //echo $menu->url;  ?>">link</a> -->
								<!-- <hr> -->
								<?php
							// }
							//print_r($menu);

							// $categories = get_the_category();
							// $category_id = $categories[0]->category_parent; 
							// if($category_id==0)$category_id=$categories[0]->cat_ID; 
							// //print_r($categories);

							// $args = array('child_of' => $category_id);
							// $categories_child = get_categories( $args );
							// //print_r($categories_child);
							// foreach($categories_child as $cat_child) { 
							// 	//print_r($cat_child);
		    	// 				echo '<div class="menusp_lv_0"><a href="' . get_category_link( $cat_child->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $cat_child->name ) . '" ' . '>' . $cat_child->name.'</a> </div> ';
		    	// 				// echo '<p> Description:'. $cat_child->description . '</p>';
		    	// 				// echo '<p> Post Count: '. $cat_child->count . '</p>';  
							// }
						?>
		<!-- 			</div>
			</div>
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
			$categories = get_the_category();
			echo '<div class="title"><h2>'.$categories[0]->name.'</h2></div>';
			$cat_arr=array();

			foreach($categories as $cat_post) { 
								//print_r($cat_child);
		    					// echo '<div class="menusp_lv_0"><a href="' . get_category_link( $cat_child->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $cat_child->name ) . '" ' . '>' . $cat_child->name.'</a> </div> ';
		    					// echo '<p> Description:'. $cat_child->description . '</p>';
		    					// echo '<p> Post Count: '. $cat_child->count . '</p>'; 
		    					// print_r($cat_post) ;
		    					 array_push($cat_arr,$cat_post->cat_ID);
							}
							//print_r($cat_arr);
		?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php $id=$post->ID;?>
                <?php get_template_part( 'content', get_post_format() ); ?>
                <?php //get_template_part( 'author-bio' ); ?>
				<?php //comments_template(); ?>
        <?php endwhile; ?>

        <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>



        <?php endif; ?>

        <hr>

       	<?php 
       		//lấy những bài viết khác cùng chuyên mục
       		$query = new WP_Query( array( 'cat' => $cat_arr ) );
       	?>

       	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

       			<?php if($post->ID != $id):?>
       			
				<div class="Div_cactinkhac">
        			<a class="tieude_tin" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          				<?php the_title(); ?>
        			</a>
      			</h1>
      		<?php endif ?>
        <?php endwhile; ?>

        <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>



        <?php endif; ?>

	</section>
	<div class="clear"> </div>
</div>
<?php get_footer(); ?>