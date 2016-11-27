<?php
/*
 Template Name: Contact
 */
 ?>

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
		<div class="box">
			<div class="title"><h2 >Liên hệ</h2></div>
			<div class="contact-info">
		        <h4>Địa chỉ liên lạc</h4>
		        <p>Số 161 đường Xuân Diệu, phường Bắc Hà - thành phố Hà Tĩnh - tỉnh Hà Tĩnh</p>
		        <p>Điện thoại:<strong> (84-39) 3855 429 </strong></p>
		        <p>Fax: <strong>(84-39) 3855 429</strong></p>
			</div>
			<div class="contact-form">
	        	<?php echo do_shortcode('[contact-form-7 id="1461" title="Contact form 1"]'); ?>
			</div>
		</div>
	</section>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>
