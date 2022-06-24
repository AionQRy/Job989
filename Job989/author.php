<?php 
get_header();
$author =  get_queried_object();

$display_name = get_user_option( 'display_name', $author->ID );
$first_name = get_user_option( 'first_name', $author->ID );
$last_name = get_user_option( 'last_name', $author->ID );
$role = get_user_option( 'role', $author->ID );
$email = get_user_option( 'user_email', $author->ID );
$profile_pic = get_field('profile_pic', 'user_'. $author->ID );
$tel = get_field('telephone_number', 'user_'. $author->ID );
$address_acc = get_field('address_acc', 'user_'. $author->ID );
$educational = get_field('educational', 'user_'. $author->ID );
$address_guest = get_field('address_guest', 'user_'. $author->ID );
$user = new WP_User( $author->ID );
$user_roles = $user->roles;
?>
<div class="author-template">
    <div class="s-container">
        <div class="main-author">
            <div class="header-author">
                <div class="sec-img">
                    <div class="img-author">
                            <?php
                                $current_user = wp_get_current_user();              
                                $allowed_roles = array( 'guest', 'organization' );
                                if ( array_intersect( $allowed_roles, $author->roles ) ):
                                    $image_profile = get_field('profile_pic', 'user_' . $author->ID );
                                if ( $image_profile ) : ?>
                                        <img src="<?php echo $image_profile['url']; ?>" alt="<?php echo $image_profile['alt']; ?>">
                                                       
                            <?php else: ?>
                                <div class="img">
                                    <i class="las la-user-tie"></i>
                                    <?php //echo get_wp_user_avatar($author->ID, 96, 'left'); ?>
                                </div> 
                                <?php endif; ?> 
                            <?php endif; ?>
                    </div>
                </div>
                <div class="sec-title">
                    <div class="title-author">
                        <h2><?php esc_html_e( 'ชื่อผู้ใช้:', 'Job989' ); ?> <?php echo $first_name . ' ' . $last_name; ?></h2>
                    </div>
                    <div class="detail-author">
                        <?php if ( $user_roles[0] ) : ?>
                        <div class="object-list">
                            <h3><?php esc_html_e( 'สถานะ:', 'Job989' ); ?> <?php echo $user_roles[0]; ?></h3>
                        </div>
                        <?php endif; ?>
                        <?php if ( $email ) : ?>
                        <div class="object-list">
                            <h3><?php esc_html_e( 'อีเมล:', 'Job989' ); ?> <?php echo $email; ?></h3>
                        </div>
                        <?php endif; ?>
                        <?php if ( $tel ) : ?>
                        <div class="object-list">
                            <h3><?php esc_html_e( 'เบอร์โทรศัพท์:', 'Job989' ); ?> <?php echo $tel; ?></h3>
                        </div>    
                        <?php endif; ?>
                        <?php if ( $educational ) : ?>
                        <div class="object-list">
                            <h3><?php esc_html_e( 'วุฒิการศึกษา:', 'Job989' ); ?> <?php echo $educational; ?></h3>
                        </div>    
                        <?php endif; ?>     
                        <?php       
                                $allowed_roles = array( 'administrator', 'organization' );
                                if ( array_intersect( $allowed_roles, $author->roles ) ):                        
                                $args = array(
                                        'post_type' => 'company-list',
                                        'posts_per_page' => 1,
                                        'order' => 'DESC',
                                        'orderby' => 'none',
                                        'author' => $author->ID
                                    );
                                    $query = new WP_Query( $args );
                                    if( ! $query->have_posts() ) {
                                        return false;
                                    }
                                    ?>
                                <div class="object-list">
                                    <h3><?php esc_html_e( 'องค์กร:', 'Job989' ); ?></h3>
                                <div class="company-list_acc">
                                    <?php
                                    while( $query->have_posts() ) {
                                        $query->the_post();
                                        $about = get_field('product-service');
                                        $cover = get_field('photo-cover');
                                        ?>
                                            <article id="company-acc_<?php echo get_the_ID(); ?>" class="card-company" style="background: url(<?php echo $cover['url']; ?>);    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
    <a href="<?php echo get_permalink(); ?>">
                                                <div class="main-article">
                                                    <div class="object-1">
                                                        <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                                                    </div>
                                                    <div class="object-2">
                                                        <div class="title">
                                                            <h3><?php echo get_the_title(); ?></h3>
                                                        </div>
                                                        <?php // if($about): ?>
                                                        <!-- <div class="detail">
                                                            <p><?php // echo $about; ?></p>
                                                        </div> -->
                                                        <?php // endif; ?>
                                                    </div>
                                                </div>
                                                </a>
                                            </article>
                                        <?php
                                    }
                                    wp_reset_postdata();
                                    ?>
                                </div>
                                <?php
                                else : ?>
                            
                            <?php endif; ?>   
                            <?php if (is_user_logged_in()): 
                                global $post;
                                if($current_user->ID == $author->ID):
                       
                                $allowed_roles = array( 'guest' );
                                if ( array_intersect( $allowed_roles, $current_user->roles ) ):  ?>
                                <div class="object-list">
                                    <a href="<?php echo get_home_url();?>/edit-profile-guest/" class="edit-pro_acc"><i class="las la-edit"></i> <?php esc_html_e( 'แก้ไขข้อมูลส่วนตัว', 'Job989' ); ?></a>
                                </div>  
                                <?php else: ?>
                                    <div class="object-list">
                                    <a href="<?php echo get_home_url();?>/edit-profile/" class="edit-pro_acc"><i class="las la-edit"></i> <?php esc_html_e( 'แก้ไขข้อมูลส่วนตัว', 'Job989' ); ?></a>
                                </div>  
                            <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>             
            </div>   
            <?php if ( $address_guest ) : ?>
                        <div class="address-box">
                            <h3><?php esc_html_e( 'ที่อยู่:', 'Job989' ); ?> <?php echo $address_guest; ?></h3>
                        </div>    
            <?php endif; ?>  
            <?php 
                    if( $address_acc ): ?>
                    <div class="address-box">
                        <h3><?php esc_html_e( 'ที่อยู่:', 'Job989' ); ?></h3>
                        <div class="acf-map" data-zoom="16">
                            <div class="marker" data-lat="<?php echo esc_attr($address_acc['lat']); ?>" data-lng="<?php echo esc_attr($address_acc['lng']); ?>"></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDt-ojn474mQmoUDpm4Z3zGmQk4xi51lho"></script>    
        </div>
    </div>
</div>
<?php get_footer(); ?>