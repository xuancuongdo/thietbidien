<div class="box3">
    <div class="title">
        Sản phẩm dịch vụ tiêu biểu
    </div>
    <div class="content">
        <div id="marquee-content">
            <div id="marqueecontainer2" onmouseover="copyspeedaa=pausespeedaa" onmouseout="copyspeedaa=marqueespeedaa">
                <?php

                    $query = new WP_Query( array( 'category_name' => 'san-pham-dich-vu' ) );

                     while ($query->have_posts()) : $query->the_post(); 
                        //get_template_part( 'content', get_post_format() ); 
                     ?>
                        <a href="<?php the_permalink() ;?>" class="anh_bai_viet"> 
                            <?php the_post_thumbnail(269,214,array( "title" => get_the_title(),"alt" => get_the_title() ));?>
                        </a>
                        
                        <?php
                     endwhile ; 

                     wp_reset_query() ;
                ?>        
                
            </div>
        </div>
    </div>
</div>