<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
        wp_head();
        if ( function_exists( 'paradiz_css' ) ) { paradiz_css(); }
        if ( function_exists( 'paradiz_var' ) ) { paradiz_var(); }
    ?>
</head>

<?php $bodyClass = ''; if (is_active_sidebar( 'headbar_d' )) { $bodyClass = 'headbar-d'; } if (is_active_sidebar( 'headbar_m' )) { $bodyClass .= ' headbar-m'; } ?>

<body <?php body_class($bodyClass); ?>>
    <?php
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }
    $headerClass = 's-' . $GLOBALS['s_header_style_m'] . '-m s-' . $GLOBALS['s_header_style_d'] .  '-d -' . $GLOBALS['s_header_layout'];
    if($GLOBALS['s_header_effect'] == 'overlay') {
        $headerClass .= ' -overlay';
    }
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'paradiz' ); ?></a>
    <div id="page" class="site">

        <header id="masthead" class="site-header _heading <?php echo $headerClass; ?>"
            data-scroll="<?php echo $GLOBALS['s_header_scroll']; ?>">

            <div class="s-container">

                <div class="logo-box">
                    <div class="site-logo"><?php paradiz_logo(); ?></div>
                </div>
                <?php if (!is_user_logged_in()): ?>
                    <nav id="site-nav-d" class="site-nav-d _desktop">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );?>
                    </nav>
                    <nav id="site-organization" class="site-nav-d site-organization">
                        <?php wp_nav_menu( array( 'theme_location' => 'organization-mobile', 'menu_id' => 'organization-mobile' ) ); ?>
                    </nav> 
                    <!-- <nav id="site-guest" class="site-nav-d site-guest">
                        <?php //wp_nav_menu( array( 'theme_location' => 'guest-mobile', 'menu_id' => 'guest-mobile' ) ); ?>
                    </nav>  -->
                <?php endif; ?>
                <?php 
                if (is_user_logged_in()):
                    $user = wp_get_current_user();
                    $allowed_roles_g = array( 'guest', 'administrator', 'editor' );
                    if ( array_intersect( $allowed_roles_g, $user->roles ) ) :            
                ?>
                    <nav id="site-guest" class="site-nav-d site-guest">
                        <?php wp_nav_menu( array( 'theme_location' => 'guest-mobile', 'menu_id' => 'guest-mobile' ) ); ?>
                    </nav>  
                <?php
                    endif;
                    endif; 
                ?>
                <?php 
                if (is_user_logged_in()):
                    $user = wp_get_current_user();
                    $allowed_roles = array( 'organization', 'administrator', 'editor' );
                    if ( array_intersect( $allowed_roles, $user->roles ) ) :            
                ?>
                    <nav id="site-organization" class="site-nav-d site-organization d-block">
                        <?php wp_nav_menu( array( 'theme_location' => 'organization-mobile', 'menu_id' => 'organization-mobile' ) ); ?>
                    </nav>  
                <?php
                    endif;
                    endif; 
                ?>
                <?php if (!is_user_logged_in()): ?>
                <div class="organization-object">
                    <div class="middle-pass">
                        <span></span>
                    </div>
                    <div class="link-organization">
                        <span class="click-organization"><?php esc_html_e( 'สำหรับบริษัท', 'Job989' ); ?></span>
                    </div>
                    <div class="link-guest">
                        <span class="click-guest"><?php esc_html_e( 'หางาน', 'Job989' ); ?></span>
                    </div>
                    <div class="middle-pass">
                        <span></span>
                    </div>
                </div>
                <?php endif; ?>
                        <?php if (!is_user_logged_in()): ?>
                        <div class="account-box">
                            <div class="login-box">
                                <a href="<?php echo get_home_url();?>/login/">
                                    <i class="las la-unlock"></i>
                                    <span><?php esc_html_e( 'เข้าสู่ระบบ', 'Job989' ); ?></span>
                                </a>
                            </div>
                            <div class="middle-pass">
                                <span></span>
                            </div>
                            <div class="register-box">
                                <a href="<?php echo get_home_url();?>/register/">
                                    <i class="las la-user"></i>
                                    <span><?php esc_html_e( 'สมัครสมาชิก', 'Job989' ); ?></span>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if (is_user_logged_in()): 
                            global $post;
                            $author_id =get_current_user_id();
                        ?>
                        <div class="account-box">
                            <div class="login-box">
                                <a href="#" class="btn-acc_option">
                                    <i class="las la-user"></i>
                                    <span><?php echo get_the_author_meta( 'first_name', $author_id ); ?><i class="las la-angle-down"></i></span>
                                </a>
                            <?php
                                $current_user = wp_get_current_user();              
                                $allowed_roles = array( 'administrator', 'organization' );
                                if ( array_intersect( $allowed_roles, $current_user->roles ) ):
                            ?>
                                <ul id="sub-acc" class="sub-menu sub-acc">
                                <?php 
                                // get author ID
                                $author_id = get_current_user_id(); 
                                // echo 'id:' . $current_user->ID;
                                // echo '</br>';
                                // echo count for post type (post and book)
                                // echo  'count:' . count_user_posts( $current_user->ID , ['company-list']  );
                                $count = count_user_posts( $current_user->ID , ['company-list']  );
                                // echo '</br>';
                                if($count >= 1):                               
                                $args = array(
                                        'post_type' => 'company-list',
                                        'posts_per_page' => 1,
                                        'order' => 'DESC',
                                        'orderby' => 'none',
                                        'author' => $current_user->ID
                                    );
                                    $query = new WP_Query( $args );
                                    if( ! $query->have_posts() ) {
                                        return false;
                                    }
                                    ?>
                                  
                                    <?php
                                    while( $query->have_posts() ) {
                                        $query->the_post();
                                        ?>
                                        <li><a href="<?php echo get_the_permalink(); ?>"><?php esc_html_e( 'ดูข้อมูลองค์กร', 'Job989' ); ?></a></li>
                                        <li><a href="<?php echo get_home_url();?>/organization-edit/?company_id=<?php echo get_the_ID(); ?>"><?php esc_html_e( 'แก้ไขข้อมูลองค์กร', 'Job989' ); ?></a></li>                            
                                        <?php
                                    }
                                    wp_reset_postdata();
                                    ?>
                                <?php
                                    // echo 'yes';
                                else : ?>
                                    <li><a href="<?php echo get_home_url();?>/organization/"><?php esc_html_e( 'ลงทะเบียน องค์กร ', 'Job989' ); ?></a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo esc_url( get_author_posts_url( $current_user->ID ) ); ?>"><?php esc_html_e( 'ดูข้อมูลโปรไฟล์', 'Job989' ); ?></a></li>
                                <li><a href="<?php echo get_home_url();?>/edit-profile/"><?php esc_html_e( 'แก้ไขข้อมูลส่วนตัว', 'Job989' ); ?></a></li>
                                <li><a href="<?php echo wp_logout_url( get_home_url() ); ?>"><?php esc_html_e( 'ออกจากระบบ', 'Job989' ); ?></a></li>
                                </ul>
                            <?php endif; ?>
                            <?php 
                                $current_user = wp_get_current_user();              
                                $allowed_roles_g = array( 'guest', 'editor' );
                                if ( array_intersect( $allowed_roles_g, $current_user->roles ) ):  ?>
                                <ul id="sub-acc" class="sub-menu sub-acc">
                                <?php 
                                // get author ID
                                $author_id = get_current_user_id(); ?>
                                <li><a href="<?php echo esc_url( get_author_posts_url( $current_user->ID ) ); ?>"><?php esc_html_e( 'ดูข้อมูลโปรไฟล์', 'Job989' ); ?></a></li>
                                <li><a href="<?php echo get_home_url();?>/edit-profile-guest/"><?php esc_html_e( 'แก้ไขข้อมูลส่วนตัว', 'Job989' ); ?></a></li>
                                <li><a href="<?php echo wp_logout_url( get_home_url() ); ?>"><?php esc_html_e( 'ออกจากระบบ', 'Job989' ); ?></a></li>
                                </ul>
                            <?php endif; ?>
                            </div>
                            <div class="middle-pass">
                                <span></span>
                            </div>
                            <?php if ( array_intersect( $allowed_roles, $current_user->roles ) ):  ?>
                            <div class="register-box">
                                <a href="<?php echo get_home_url(); ?>/recruit/">
                                    <i class="las la-sign-out-alt"></i>
                                    <span><?php esc_html_e( 'ลงประกาศรับสมัครงาน', 'Job989' ); ?></span>
                                </a>
                            </div>
                            <?php endif; ?>
                            <?php if ( array_intersect( $allowed_roles_g, $current_user->roles ) ):  ?>
                            <div class="register-box">
                                <a href="<?php echo wp_logout_url( get_home_url() ); ?>">
                                    <i class="las la-sign-out-alt"></i>
                                    <span><?php esc_html_e( 'ออกจากระบบ', 'Job989' ); ?></span>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>              
            </div>
            <div class="mobile-box hidden-lg">            
                <div class="logo-box">
                    <div class="site-logo"><?php paradiz_logo(); ?></div>
                </div>
                <div class="right-box">
                    <div class="account-box">
                        <?php if (!is_user_logged_in()): ?>
                        <div class="login-box">
                            <a href="<?php echo get_home_url();?>/login/">
                                <i class="las la-unlock"></i>
                                <span><?php esc_html_e( 'เข้าสู่ระบบ', 'Job989' ); ?></span>
                            </a>
                        </div>
                        <div class="middle-pass">
                            <span></span>
                        </div>
                        <div class="register-box">
                            <a href="<?php echo get_home_url();?>/register/">
                                <i class="las la-user"></i>
                                <span><?php esc_html_e( 'สมัครสมาชิก', 'Job989' ); ?></span>
                            </a>
                        </div>
                        <?php endif; ?>
                        <?php if (is_user_logged_in()): 
                            global $post;
                            $author_id =get_current_user_id();
                        ?>
                        <div class="login-box">
                            <a href="#" class="btn-acc_option">
                                <i class="las la-user"></i>
                                <span><?php echo get_the_author_meta( 'first_name', $author_id ); ?><i class="las la-angle-down"></i></span>
                            </a>
                            <?php
                                $current_user = wp_get_current_user();              
                                $allowed_roles = array( 'administrator', 'organization' );
                                if ( array_intersect( $allowed_roles, $current_user->roles ) ):
                            ?>
                                <ul id="sub-acc" class="sub-menu sub-acc">
                                <?php 
                                $author_id = get_current_user_id(); 
                                $count = count_user_posts( $current_user->ID , ['company-list']  );
                                if($count >= 1):                               
                                $args_two = array(
                                        'post_type' => 'company-list',
                                        'posts_per_page' => 1,
                                        'order' => 'DESC',
	                                    'orderby' => 'none',
                                        'author' => $current_user->ID
                                    );
                                    $query_two = new WP_Query( $args_two );
                                    if( ! $query_two->have_posts() ) {
                                        return false;
                                    }
                                    ?>
                                  
                                    <?php
                                    while( $query_two->have_posts() ) {
                                        $query_two->the_post();
                                        ?>
                                        <li><a href="<?php echo get_the_permalink(); ?>"><?php esc_html_e( 'ดูข้อมูลองค์กร', 'Job989' ); ?></a></li>
                                        <li><a href="<?php echo get_home_url();?>/organization-edit/?company_id=<?php echo get_the_ID(); ?>"><?php esc_html_e( 'แก้ไขข้อมูลองค์กร', 'Job989' ); ?></a></li>                            
                                        <?php
                                    }
                                    wp_reset_postdata();
                                    ?>
                                <?php
                                    // echo 'yes';
                                else : ?>
                                    <li><a href="<?php echo get_home_url();?>/organization/"><?php esc_html_e( 'ลงทะเบียน องค์กร ', 'Job989' ); ?></a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo esc_url( get_author_posts_url( $current_user->ID ) ); ?>"><?php esc_html_e( 'ดูข้อมูลโปรไฟล์', 'Job989' ); ?></a></li>
                                <li><a href="<?php echo get_home_url();?>/edit-profile/"><?php esc_html_e( 'แก้ไขข้อมูลส่วนตัว', 'Job989' ); ?></a></li>
                                <li><a href="<?php echo wp_logout_url( get_home_url() ); ?>"><?php esc_html_e( 'ออกจากระบบ', 'Job989' ); ?></a></li>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="middle-pass">
                            <span></span>
                        </div>
                        <div class="register-box">
                            <a href="<?php echo wp_logout_url( get_home_url() ); ?>">
                                <i class="las la-sign-out-alt"></i>
                                <!-- <span><?php //esc_html_e( 'ออกจากระบบ', 'Job989' ); ?></span> -->
                            </a>
                        </div>
                        <?php endif; ?>                     
                    </div>
                    <div class="toggle-box">
                        <div class="toggle"><span></span></div>
                    </div>
                </div>
            </div>           
        </header>
            <div class="menu-mobile hidden-lg">
                <div class="toggle-box-2">
                    <div class="logo-box">
                        <div class="site-logo"><?php paradiz_logo(); ?></div>
                    </div>
                    <div class="toggle"><span></span></div>
                </div>
                <?php if (!is_user_logged_in()): ?>
                <div class="account-box">              
                    <div class="img">
                        <i class="las la-user-tie"></i>
                    </div>
                    <div class="title">
                        <div class="login-box">
                            <a href="<?php echo get_home_url();?>/login/">
                                <i class="las la-unlock"></i>
                                <span><?php esc_html_e( 'เข้าสู่ระบบ', 'Job989' ); ?></span>
                            </a>
                        </div>
                        <div class="middle-pass">
                            <span></span>
                        </div>
                        <div class="register-box">
                            <a href="<?php echo get_home_url();?>/register/">
                                <i class="las la-user"></i>
                                <span><?php esc_html_e( 'สมัครสมาชิก', 'Job989' ); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if (is_user_logged_in()): ?>
                <div class="account-box">              
                    <div class="img">
                    <?php
                        $current_user = wp_get_current_user();              
                        $allowed_roles_g = array( 'guest', 'organization' );
                        if ( array_intersect( $allowed_roles_g, $current_user->roles ) ):
                            $image_profile = get_field('profile_pic', 'user_' . $current_user->ID );
                           if ( $image_profile ) : ?>
                                <img src="<?php echo $image_profile['url']; ?>" alt="<?php echo $image_profile['alt']; ?>">
                            <?php endif; ?>                    
                    <?php else: ?>
                        <?php echo get_wp_user_avatar($author_id, 96, 'left'); ?>
                    <?php endif; ?>
                    </div>
                    <div class="title">
                        <div class="register-box">
                            <a href="#" class="btn-acc_option">
                                <i class="las la-envelope"></i>
                                <span><?php echo get_the_author_meta( 'email', $author_id ); ?><i class="las la-angle-down"></i></span>
                            </a>
                            <a href="<?php echo wp_logout_url( get_home_url() ); ?>" class="logout"><i class="las la-sign-out-alt"></i> <?php esc_html_e( 'ออกจากระบบ', 'Job989' ); ?></a>
                            <?php
                                $current_user = wp_get_current_user();              
                                $allowed_roles = array( 'administrator', 'organization' );
                                if ( array_intersect( $allowed_roles, $current_user->roles ) ):
                            ?>
                                <ul id="sub-acc" class="sub-menu sub-acc">
                                <?php 
                                $author_id = get_current_user_id(); 
                                $count = count_user_posts( $current_user->ID , ['company-list']  );
                                if($count >= 1):                               
                                $args_two = array(
                                        'post_type' => 'company-list',
                                        'posts_per_page' => 1,
                                        'order' => 'DESC',
	                                    'orderby' => 'none',
                                        'author' => $current_user->ID
                                    );
                                    $query_two = new WP_Query( $args_two );
                                    if( ! $query_two->have_posts() ) {
                                        return false;
                                    }
                                    ?>
                                  
                                    <?php
                                    while( $query_two->have_posts() ) {
                                        $query_two->the_post();
                                        ?>
                                        <li><a href="<?php echo get_the_permalink(); ?>"><?php esc_html_e( 'ดูข้อมูลองค์กร', 'Job989' ); ?></a></li>
                                        <li><a href="<?php echo get_home_url();?>/organization-edit/?company_id=<?php echo get_the_ID(); ?>"><?php esc_html_e( 'แก้ไขข้อมูลองค์กร', 'Job989' ); ?></a></li>                            
                                        <?php
                                    }
                                    wp_reset_postdata();
                                    ?>
                                <?php
                                    // echo 'yes';
                                else : ?>
                                    <li><a href="<?php echo get_home_url();?>/organization/"><?php esc_html_e( 'ลงทะเบียน องค์กร ', 'Job989' ); ?></a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo esc_url( get_author_posts_url( $current_user->ID ) ); ?>"><?php esc_html_e( 'ดูข้อมูลโปรไฟล์', 'Job989' ); ?></a></li>
                                <li><a href="<?php echo get_home_url();?>/edit-profile/"><?php esc_html_e( 'แก้ไขข้อมูลส่วนตัว', 'Job989' ); ?></a></li>
                                <li><a href="<?php echo wp_logout_url( get_home_url() ); ?>"><?php esc_html_e( 'ออกจากระบบ', 'Job989' ); ?></a></li>
                                </ul>
                            <?php endif; ?>                          
                        </div>
                        
                    </div>
                </div>
                <?php endif; ?>
                <?php if (!is_user_logged_in()): ?>
                <div class="box-guest">
                    <div class="guest-title" data-tab="1">
                        <span><?php esc_html_e( 'สำหรับผู้สมัครงาน', 'Job989' ); ?></span>
                        <i class="las la-angle-down"></i>
                    </div>
                    <div class="guest-menu" data-tab="1">
                        <nav id="site-mobile" class="site-mobile">
                            <?php wp_nav_menu( array( 'theme_location' => 'guest-mobile', 'menu_id' => 'guest-mobile' ) ); ?>
                        </nav>           
                    </div>                                         
                </div> 
                <?php endif; ?>
                <?php if (!is_user_logged_in()): ?>
                <div class="box-guest box-organization">
                    <div class="guest-title" data-tab="2">
                        <span><?php esc_html_e( 'สำหรับบริษัท', 'Job989' ); ?></span>
                        <i class="las la-angle-down"></i>
                    </div>
                    <div class="guest-menu" data-tab="2">
                        <nav id="site-mobile" class="site-mobile">
                            <?php wp_nav_menu( array( 'theme_location' => 'organization-mobile', 'menu_id' => 'organization-mobile' ) ); ?>
                        </nav>           
                    </div>                       
                </div>
                <?php endif; ?>
                <?php 
                if (is_user_logged_in()):
                    $user = wp_get_current_user();
                    $allowed_roles_g = array( 'guest', 'administrator', 'editor' );
                    if ( array_intersect( $allowed_roles_g, $user->roles ) ) :            
                ?>
                    <div class="box-guest">
                        <div class="guest-title" data-tab="1">
                            <span><?php esc_html_e( 'สำหรับผู้สมัครงาน', 'Job989' ); ?></span>
                            <i class="las la-angle-down"></i>
                        </div>
                        <div class="guest-menu" data-tab="1">
                            <nav id="site-mobile" class="site-mobile">
                                <?php wp_nav_menu( array( 'theme_location' => 'guest-mobile', 'menu_id' => 'guest-mobile' ) ); ?>
                            </nav>           
                        </div>                                         
                    </div> 
                <?php
                    endif;
                    endif; 
                ?>
                <?php 
                if (is_user_logged_in()):
                    $allowed_roles = array( 'organization', 'administrator', 'editor' );
                    if ( array_intersect( $allowed_roles, $user->roles ) ) :           
                ?>
                    <div class="box-guest box-organization">
                        <div class="guest-title" data-tab="1">
                            <span><?php esc_html_e( 'สำหรับบริษัท', 'Job989' ); ?></span>
                            <i class="las la-angle-down"></i>
                        </div>
                        <div class="guest-menu" data-tab="1">
                            <nav id="site-mobile" class="site-mobile">
                                <?php wp_nav_menu( array( 'theme_location' => 'organization-mobile', 'menu_id' => 'organization-mobile' ) ); ?>
                            </nav>           
                        </div>                       
                    </div>
                <?php
                    endif;
                endif; 
                ?>
                <div class="contact-box">
                    <?php if( have_rows('socials_media', 'option') ): ?>
                        <div class="box-socials">
                        <?php while( have_rows('socials_media', 'option') ): the_row(); 
                            $image = get_sub_field('image-socials');
                            $url = get_sub_field('url-socials');
                            ?>
                            <div class="socials-list">
                                <a href="<?php echo $url; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo $image; ?>"></a>
                            </div>
                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>              
                </div>                
            </div>

        <div id="content" class="site-content">
