
<?php get_header(); ?>
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
		<section class="box">
				<div class="title"><h2>Tìm kiếm</h2></div>
				<section class="content">
					<div class="search-info">
		        <!--Sử dụng query để hiển thị số kết quả tìm kiếm được tìm thấy
		                Cũng như hiển thị từ khóa tìm kiếm. Từ khóa tìm kiếm cũng
		                có thể hiển thị được với hàm get_search_query()-->
				        <?php
				                $search_query = new WP_Query( 's='.$s.'&showposts=-1' );
				                $search_keyword = wp_specialchars( $s, 1);
				                $search_count = $search_query->post_count;
				                // var_dump( $search_query );
				                printf( __('Search results for <strong>%1$s</strong>. We found <strong>%2$s</strong> articles for you.', 'thachpham'), $search_keyword, $search_count );
				        ?>
					</div>
		
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		                <?php get_template_part( 'content', get_post_format() ); ?>
		        <?php endwhile; ?>
		        <?php cuongdx_pagination(); ?>
		        <?php else : ?>
		                <?php get_template_part( 'content', 'none' ); ?>
		        <?php endif; ?>
	        </section>
		</section>
	</section>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>