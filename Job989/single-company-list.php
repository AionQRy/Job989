<?php get_header();
$cover = get_field('photo-cover');
$about = get_field('product-service');
$welfare = get_field('welfare');


$current_user = wp_get_current_user();              
$allowed_roles = array( 'administrator', 'organization' );
                  //The user has the "author" role
$post_author_id = get_post_field( 'post_author', get_the_ID() );  
?>
<div class="company-list-box">
    <div class="main-company">      
        <div class="company-cover <?php if(empty( $cover )){ echo 'bg-none'; }?>">
            <div class="s-container" style="background-repeat: no-repeat; background-image: url('<?php echo $cover['url']; ?>'); 
        background-size: cover; background-position: center;">
        <?php
                        $current_user = wp_get_current_user();              
                        $allowed_roles = array( 'administrator', 'organization' );
                            //The user has the "author" role
                        $post_author_id = get_post_field( 'post_author', get_the_ID() );
                        // echo $post_author_id;
                        if( 0 != $current_user->ID ): 
                            if ( array_intersect( $allowed_roles, $current_user->roles ) ):
                                if($post_author_id == $current_user->ID ):
                        ?>
                                <a href="<?php echo get_home_url();?>/organization-edit/?company_id=<?php echo get_the_ID();?>" class="edit-btn_org">แก้ไขข้อมูล</a>
                        <?php 
                                endif;
                            endif;
                        endif; 
                        ?>
            <?php if(empty( $cover )): ?>
                <h3><?php esc_html_e( 'ไม่มีภาพปก', 'Job989' ); ?></h3>
            <?php endif; ?>
            </div>
        </div>
        <div class="icon-cpn_box">
            <div class="s-container">
                <div class="icon-cpn">
                    <div class="img">
                    <?php $chk_postimg = get_the_post_thumbnail(get_the_ID()); ?>
                    <?php if ( $chk_postimg ) : ?>
                        <?php the_post_thumbnail('company-thumb'); ?>
                    <?php else:
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                    ?>
                    <div class="contact-img no-pic">
                        <img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="">
                        <div class="contact-text">
                            <p>ติดต่อโฆษณา</p>
                            <p>084-556-9714</p>
                        </div>
                    </div>
                    <?php endif; ?>
                    </div>
                    <div class="title">
                        <h3><?php echo get_the_title(); ?></h3>
                    </div>
                </div>
            </div>
        </div> 
        <div class="s-container">
            <div class="detail-box"><?php
            $statest = get_field('status_verify');            
                    if($statest == 'notpassed'):
                        if( 0 != $current_user->ID ): 
                            if ( array_intersect( $allowed_roles, $current_user->roles ) ):
                                if($post_author_id == $current_user->ID ): 
    ?>
    <div class="company-list-box">
        <div class="main-company">           
            <div class="s-container x-1">
                <div class="box-notpassed">
                    <div class="box-not_found">
                        <i class="las la-exclamation-triangle"></i>
                        <h3><?php esc_html_e( 'การลงทะเบียนองค์กร', 'Job989' ); ?></h3>
                        <h4><?php esc_html_e( 'สถานะการลงทะเบียน: ไม่สำเร็จ', 'Job989' ); ?></h4>
                        <a href="<?php echo get_home_url();?>/contact/" class="btn-contact"><?php esc_html_e( 'ติดต่อ JOB989', 'Job989' ); ?></a>
                    </div>
                </div>  
            </div>
        </div>
    </div>
            <?php
                            endif;     
                        endif;
                    endif;   
            elseif($statest == 'checking'):
                if( 0 != $current_user->ID ): 
                    if ( array_intersect( $allowed_roles, $current_user->roles ) ):
                        if($post_author_id == $current_user->ID ): 
            ?>
                <div class="company-list-box">
                    <div class="main-company">           
                        <div class="s-container x-1">
                            <div class="box-notpassed">
                                <div class="box-not_found">
                                <i class="las la-stopwatch"></i>
                                    <h3><?php esc_html_e( 'การลงทะเบียนองค์กร', 'Job989' ); ?></h3>
                                    <h4 class="checking"><?php esc_html_e( 'สถานะการลงทะเบียน: กำลังตรวจสอบ', 'Job989' ); ?></h4>
                                    <a href="<?php echo get_home_url();?>/contact/" class="btn-contact"><?php esc_html_e( 'ติดต่อ JOB989', 'Job989' ); ?></a>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            <?php
                        endif;     
                    endif;
                endif;  
            else:
            endif;
            ?>
                <div class="about-box">
                    <?php echo $about;?>
                </div>
                <div class="welfare-job">
                    <h3><?php esc_html_e( 'สวัสดิการ', 'Job989' ); ?></h3>      
                    <div class="s-detail">
                        <?php echo $welfare; ?>
                    </div>
                </div>
                <div class="list-job_table">
                    <div class="head-table">
                        <?php
                          if( 0 != $current_user->ID ): 
                            if ( array_intersect( $allowed_roles, $current_user->roles ) ):
                                if($post_author_id == $current_user->ID ):
                            
                                    $statusxx = get_field('status_verify');
                                    if($statusxx == 'passed' ):
                        ?>
                                <a href="<?php echo get_home_url();?>/recruit/" class="edit-btn_org"><i class="las la-plus-square"></i> <?php esc_html_e( 'ลงประกาศงาน', 'Job989' ); ?></a>
                        <?php 
                                endif;
                            endif;
                            endif;
                        endif; 
                        ?>
                        <?php 
                        $job_object = get_field('post_job');
                        //See if the field is empty or not
                        if (empty($job_object)) {
                            // empty, set to empty array
                            // could be empty because nothing was added or because the field was never set
                            $job_object = array();
                        }
                        // make sure that it's an array
                        if (!is_array($job_object)) {
                            $job_object = array($job_object);
                        }
                        $count = count($job_object);
                        ?>
                        <h3><?php echo $count; ?> <?php esc_html_e( 'ตำแหน่ง', 'Job989' ); ?></h3>
                    </div>
                    <div class="detail-table">
                    <?php                  
                    if( $job_object ): 
                        $i = 0; ?>
                        <div class="box-list">
                        <?php foreach( $job_object as $job_objects ): 
                            $permalink = get_permalink( $job_objects->ID );
                            $title = get_the_title( $job_objects->ID );
                            $salary = get_field( 'salary', $job_objects->ID );
                            $location = get_field('location', $job_objects->ID);   
                            $status = get_field('status-job', $job_objects->ID);                       
                            $i++;
                            ?>
                            <div class="article-job">
                                
                                    <div class="top-box">
                                        <div class="object-1">
                                            <div class="box-flex">
                                                <div class="status-job">
                                                    <h6 class="number"><?php echo $i; ?></h6>
                                                    <?php if($status == 'urgently'): ?>
                                                        <h6 class="s-job"><?php esc_html_e( 'รับสมัครด่วน', 'Job989' ); ?></h6>
                                                    <?php elseif( $status == 'open'): ?>
                                                        <h6 class="s-job"><?php esc_html_e( 'เปิดรับสมัคร', 'Job989' ); ?></h6>
                                                    <?php elseif( $status == 'close '): ?>
                                                        <h6 class="s-job"><?php esc_html_e( 'ปิดรับสมัคร', 'Job989' ); ?></h6>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="object-1 date">
                                            <?php 
                                            $post_date = get_the_date( 'j-n-Y' );
                                            $strDate = $post_date;   
                                            ?>
                                            <h6><?php echo DateThai($strDate); ?></h6>
                                        </div>
                                    </div>
                                    <div class="main-box">
                                        <h4><a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a></h4>
                                        <div class="box-flex">
                                            <p><i class="las la-map-marker"></i> <?php echo $location; ?></p>
                                            <p><i class="las la-dollar-sign"></i> <?php echo $salary; ?></p> 
                                            <?php
                                                if( 0 != $current_user->ID ): 
                                                    if ( array_intersect( $allowed_roles, $current_user->roles ) ):
                                                        if($post_author_id == $current_user->ID ):
                                                ?>
                                                       <div class="box-btn_edit">
                                                            <a class="btn-edit" href="<?php echo get_home_url();?>/edit-profile-copy/?job_id=<?php echo $job_objects->ID; ?>"><i class="las la-edit"></i><?php esc_html_e( 'แก้ไข', 'Job989' ); ?></a>
                                                            <a class="btn-edit btn-delete" href="<?php echo esc_url( get_delete_post_link( $job_objects->ID ) );?>"><i class="las la-trash"></i><?php esc_html_e( 'ลบ', 'Job989' ); ?></a>
                                                        </div>
                                                <?php 
                                                        endif;
                                                    endif;
                                                endif; 
                                                ?>                                        
                                        </div>  
                                    </div>                                  
                           
                            </div>                                               
                        <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
                <?php $contact = get_field('contact-company'); ?>
            <?php if($contact):?>
            <div class="contact-job">
                <h3><?php esc_html_e( 'ติดต่อ', 'Job989' ); ?></h3>
                <div class="p-content"><?php echo $contact; ?></div>
            </div>
            <?php endif;?>
            <?php 
            $map_j = get_field('map-company');
            if( $map_j ): ?>
                <div class="acf-map" data-zoom="16">
                    <div class="marker" data-lat="<?php echo esc_attr($map_j['lat']); ?>" data-lng="<?php echo esc_attr($map_j['lng']); ?>"></div>
                </div>
            <?php endif; ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDt-ojn474mQmoUDpm4Z3zGmQk4xi51lho"></script>
<?php 
            $argsx = array (
                'taxonomy' => 'tag_company', //empty string(''), false, 0 don't work, and return empty array
                'orderby' => 'name',
                'order' => 'ASC',
                'number' => 10,
                'exclude' => '15',
                'hide_empty' => false, //can be 1, '1' too
            );
            $terms = get_the_terms(get_the_ID(), 'tag_company', $argsx);
            // if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                ?>
<!-- <div id="tags-job" class="tags-job">
    <div class="tags-title">
        <h3><?php esc_html_e( 'tags:', 'Job989' ); ?></h3>   
    </div>
    <div class="tags-box">
                    <div id="tags-list" class="tags-list"> -->
                        <?php
                        foreach($terms as $term){	
                            $term_link = get_term_link( $term );			
                            ?>
                            <!-- <div class="list-cat">
                                <div class="title-box">
                                    <a href="<?php echo esc_url( $term_link ); ?>" class="a-cat <?php echo $term->slug; ?>">#<?php echo $term->name; ?></a>
                                </div>				
                            </div>				 -->
                            <?php
                        }
                        ?>
                    <!-- </div>             
    </div>
</div> -->
<?php
            // }
            ?>
            </div>

            <?php 
            // get author ID
            // $author_id = get_current_user_id(); 
            // echo 'id:' . $author_id;
            // echo '</br>';
            // // echo count for post type (post and book)
            // echo  'count:' . count_user_posts( $author_id , ['company-list']  );
            // $count = count_user_posts( $author_id , ['company-list']  );
            // echo '</br>';
            // if($count > 18):
            //     echo 'yes';
            // else :
            //     echo 'no';
            // endif;
            ?>

        </div>  
    </div>
</div>
<?php 
get_footer(); ?>
