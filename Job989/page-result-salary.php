<?php
  /* Template Name: Page Search Salary*/
  get_header();
  if(!is_user_logged_in()){
    $url_reg = home_url() . '/login';
    wp_redirect($url_reg);  
  }
  $current_user = wp_get_current_user();              
$allowed_roles = array( 'administrator', 'organization' );
                  //The user has the "author" role 
                    $status_verify_user = get_field('status_verify_user', 'user_' . $current_user->ID);                              
                        if( 0 != $current_user->ID ): 
                            if ( array_intersect( $allowed_roles, $current_user->roles ) ):
                              if( $status_verify_user != 'passed'):
                              $args = array(
                                'post_type' => 'company-list',
                                'posts_per_page' => 1,
                                'order' => 'DESC',
                                'orderby' => 'none',
                                'author' => $current_user->ID
                            );
                            $query = new WP_Query( $args );
                            if( ! $query->have_posts() ) {
                              $url_re = home_url() . '/organization';
                              wp_redirect($url_re);     
                            }
                            ?>
                          
                            <?php
                            while( $query->have_posts() ) {
                                $query->the_post();
                                wp_redirect(get_the_permalink());
                       
                            }
                            wp_reset_postdata();
                            else:                                                                 
                                  ?>
<div class="tempate-box result-salary" style="background: url('/wp-content/uploads/2021/05/7-scaled.jpg');">
    <div class="s-container">
        <div class="main-salary">
        <div class="content-form">
          <div class="box-form">
            <div class="box-range">
              <h3><i class="las la-search-dollar"></i> <?php echo esc_html__( 'ผลการค้นหา', 'Job989' ); ?></h3>
              <?php 
              // The search term
                $min_price = $_GET['min_price'];
                $max_price = $_GET['max_price'];
                $last_price = array($min_price, $max_price );    
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $no = 12;
                if($paged==1){
                $offset=0;  
                }else {
                $offset= ($paged-1)*$no;
                }
        
                
                // WP_User_Query arguments
                $args = array (
                    'role' => 'guest',
                    'order' => 'DESC',
                    'orderby' => 'rand',
                    'number' => $no, 
                    'offset' => $offset,
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key'     => 'salary_user',
                            'value' => $last_price,
                            'compare' => 'BETWEEN',
                            'type' => 'NUMERIC'
                        )
                        )
                );
                
                // Create the WP_User_Query object
                $wp_user_query = new WP_User_Query($args);
                
                // Get the results
                $authors = $wp_user_query->get_results();
                
                // Check for results
                if (!empty($authors)) {
                    ?>
                    <div class="box-result_user">
                    <?php
                    // loop through each author
                    foreach ($authors as $author)
                    {
                        // get all the user's data
                        $author_info = get_userdata($author->ID);
                        $salary = get_field('salary_user', 'user_' . $author->ID);
                        ?>
                        <article class="article-user">  
                            <div class="img">
                                <i class="las la-user-tie"></i>
                            </div>   
                            <div class="title">
                                <h4><?php  echo $author_info->first_name . ' ' . $author_info->last_name; ?></h4>
                            </div>
                            <div class="salary">
                                <h5><?php echo esc_html__( 'จำนวนเงินเดือน', 'Job989' ); ?> <?php echo number_format($salary); ?> บาท</h5>
                            </div>  
                            <div class="box-go">
                                <a href="<?php echo get_author_posts_url( $author->ID ); ?>" class="btn-go"><?php echo esc_html__( 'เข้าดูข้อมูล', 'Job989' ); ?></a>
                            </div>                                    
                    </article>
                        <?php
                    }
                    ?>
                    </div>
                    <?php

                    $total_user = $wp_user_query->total_users;  
                    $total_pages=ceil($total_user/$no);

                    printf('<div class="content-pagination">');
                    global $paged, $wp_query; $big = 9999999;
                    if ( !$max_page ):
                            $max_page = $total_pages;
                    endif;
                    ?>
                    <span class="text-number_page"><?php esc_html_e( 'หน้า', 'Job989' ); ?> <?php echo max( 1, get_query_var('paged') );?> <?php esc_html_e( 'จาก', 'Job989' ); ?> <?php echo $total_pages; ?></span>
                    <?php
                    echo '<div class="box-pagination">';
                    echo paginate_links(
                        array(
                                'base' 		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format' 	=> '?paged=%#%',
                                'current'	=> max( 1, get_query_var('paged') ),
                                'total' 	=> $total_pages,
                                'prev_text'  => '<i class="las la-angle-left"></i>',
                                'next_text'  => '<i class="las la-angle-right"></i>',
                        ));
                    echo '</div>';
                    if( $paged != $max_page ):
                        if( $max_page > 1 ):
                    ?>
                    <a href="<?php echo esc_url( get_pagenum_link( $total_pages ) ); ?>" class="last-number_page"><?php esc_html_e( 'หน้าสุดท้าย', 'Job989' ); ?></a>
                    <?php
                        endif;
                    endif;
                    printf('</div>');

                    
                } else {
                    ?>
                    <div class="box-not_found-user">
                        <h4><?php esc_html_e( 'ไม่พบข้อมูลที่ค้นหา กรุณาค้นหาใหม่อีกครั้ง', 'Job989' ); ?></h4>
                        <a href="<?php echo get_home_url(); ?>/find-price/" class="price-range-search" id="price-range-submit"><i class="las la-search"></i><?php echo esc_html__( 'ค้นหาใหม่อีกครั้ง', 'Job989' ); ?></a>
                    </div>
                    <?php
                }
                ?>
            </div>
          </div>
        </div>
        </div>
    </div>
</div>



<?php               
                        endif;
                      endif;                  
                    endif;  
?>
<?php get_footer(); ?>
