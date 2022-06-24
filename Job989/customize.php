<?php
// add_filter('show_admin_bar', '__return_false');

function yp_scripts_elementor() {
	wp_enqueue_script( 'yp-theme-js',
	    get_stylesheet_directory_uri() . '/js/main.js', array('jquery'),
			filemtime( get_theme_file_path('/js/main.js')), true );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'elementor/frontend/after_enqueue_scripts', 'yp_scripts_js' , 20 );

function source_style() {
	wp_enqueue_style( 'customize-stylex', get_stylesheet_directory_uri() . '/new-customize/css/customize.css', array(), '1.1', 'all');
	wp_enqueue_script( 'customize-jsx', get_stylesheet_directory_uri() . '/new-customize/js/customize.js', array(), '1.1', 'all');
	wp_enqueue_style( 'font-poppins', get_stylesheet_directory_uri() . '/new-customize/add-on/font/poppins/stylesheet.css', array(), '1.1', 'all');
	wp_enqueue_style( 'font-th', get_stylesheet_directory_uri() . '/new-customize/add-on/font/sarabun/stylesheet.css', array(), '1.1', 'all');
	wp_enqueue_style( 'font-silphakorn', get_stylesheet_directory_uri() . '/new-customize/add-on/font/silpakorn/stylesheet.css', array(), '1.1', 'all');
	wp_enqueue_style( 'css-post-one', get_stylesheet_directory_uri() . '/new-customize/css/post-one.css', array(), '1.1', 'all');
	wp_enqueue_style( 'css-post-two', get_stylesheet_directory_uri() . '/new-customize/css/post-two.css', array(), '1.1', 'all');
	wp_enqueue_script( 'jquery-swiperxx', 'https://unpkg.com/swiper@7/swiper-bundle.min.js', array(), '1.1', 'all');
	wp_enqueue_style( 'css-swiperxx', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), '1.1', 'all');
}
add_action( 'wp_enqueue_scripts', 'source_style' , 20 );

function register_my_menu() {
  register_nav_menu( 'primary-site-site', __( 'Primary Menu', 'theme-slug' ) );
  // register_nav_menu( 'site-sub-menu', __( 'Site Sub Menu', 'theme-slug' ) );
  register_nav_menu( 'topbar-menu-one', __( 'Topbar Menu One', 'theme-slug' ) );
  register_nav_menu( 'topbar-menu-two', __( 'Topbar Menu Two', 'theme-slug' ) );
  register_nav_menu( 'privacy-menu', __( 'Privacy Menu', 'theme-slug' ) );
  register_nav_menu( 'institution-menu', __( 'Institution Menu', 'theme-slug' ) );
  register_nav_menu( 'faculty-menu', __( 'Faculty/Branch Menu', 'theme-slug' ) );
  register_nav_menu( 'quick-menu', __( 'Quick Menu', 'theme-slug' ) );
  register_nav_menu( 'bottom-footer', __( 'Bottom Footer', 'theme-slug' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );


add_filter( 'get_the_archive_title', function ($title) {
	if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>' ;
		} elseif ( is_tax() ) { //for custom post types
			$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
		} elseif (is_post_type_archive()) {
			$title = post_type_archive_title( '', false );
		}
	return $title;
});

/*pagination*/
function seed_posts_navigation() {
	printf('<div class="content-pagination">');
	global $paged, $wp_query; $big = 9999999;
	if ( !$max_page ):
			$max_page = $wp_query->max_num_pages;
	endif;
	?>
	<span class="text-number_page"><?php esc_html_e( 'หน้า', 'fluffy' ); ?> <?php echo max( 1, get_query_var('paged') );?> <?php esc_html_e( 'จาก', 'fluffy' ); ?> <?php echo $wp_query->max_num_pages; ?></span>
	<?php
	echo '<div class="box-pagination">';
	echo paginate_links(
		array(
				'base' 		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' 	=> '?paged=%#%',
				'current'	=> max( 1, get_query_var('paged') ),
				'total' 	=> $wp_query->max_num_pages,
				'prev_text'  => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="15 18 9 12 15 6"></polyline></svg>',
				'next_text'  => '<svg viewBox="0 0 24 24" width="24" height="24" stroke="#0074bc" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>',
		));
	echo '</div>';
	if( $paged != $max_page ):
		if( $max_page > 1 ):
	?>
	<a href="<?php echo esc_url( get_pagenum_link( $wp_query->max_num_pages ) ); ?>" class="last-number_page"><?php esc_html_e( 'หน้าสุดท้าย', 'fluffy' ); ?></a>
	<?php
		endif;
	endif;
	printf('</div>');
}

function header_fuc(){
	get_header('main-1');
	// get_template_part('new-customize/header-box/header-main-1.php');
}
function footer_fuc(){
	get_footer('main-1');
	// get_template_part('new-customize/header-box/header-main-1.php');
}

function excerpt($num) {
    $limit = $num+1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt)."...";
    echo $excerpt;
}
function add_short() {
	add_shortcode( 'slider_post_h', 'slider_post_h' );
	add_shortcode( 'slider_calendar', 'slider_calendar' );
}
add_action( 'init', 'add_short' );

function slider_post_h(){
	ob_start();
	?>
	<div class="main-slider_post">
		<div class="object-a">
			<div class="box-category_name">
				<ul class="ul-category">
					<li class="li-category"><a href="">All</a></li>
					<li class="li-category"><a href="">New & Top Stories</a></li>
					<li class="li-category"><a href="">Photos</a></li>
					<li class="li-category"><a href="">Video</a> </li>
					<li class="li-category"><a href="">Infographics</a></li>
				</ul>
			</div>
		</div>
		<div class="object-b">
			<div class="container-post swiper-container md-cat_slider">

				<div class="slider-post_h md-cat swiper-wrapper">
					<?php
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 4,
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field'    => 'slug',
								'terms'    => array( 'news-top-stories', 'photos', 'videos', 'infographics'),
							),
						),
						'order' => 'DESC',
						'orderby' => 'date',
					);
					// The Query
					query_posts( $args );
					?>
					<?php
					// The Loop
					while ( have_posts() ) : the_post();
						echo '<div class="swiper-slide">';
						get_template_part( 'new-customize/template-parts/content', 'card-one');
						echo '</div>';
					endwhile;

					// Reset Query
					wp_reset_query();	?>
				</div>
				<div class="swiper-button-next btn-c"><svg viewBox="0 0 24 24" width="24" height="24" stroke="#000" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></div>
				<div class="swiper-button-prev btn-c"><svg viewBox="0 0 24 24" width="24" height="24" stroke="#000" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg></div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>
		<script>
			jQuery(document).ready(function($) {
			var swiper = new Swiper(".md-cat_slider", {
				slidesPerView: 1,
        		spaceBetween: 0,
				loop: true,
				pagination: {
				el: ".swiper-pagination",
				type: "fraction",
				},
				navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
				},
				breakpoints: {
					640: {
						slidesPerView: 1,
						spaceBetween: 20,
					},
					768: {
						slidesPerView: 1,
						spaceBetween: 15,
					},
					1100: {
						slidesPerView: 1,
						spaceBetween: 0,
					},
				},
			});


		});
		</script>
	<?php
	  $myvariablex = ob_get_clean();
	  return $myvariablex;
}

function slider_calendar(){
	ob_start();
	?>
	<div class="main-slider_post calendar-post">
			<div class="container-post swiper-container xd-cat_slider">

				<div class="slider-post_h md-cat swiper-wrapper h-100">
					<?php
					$args = array(
						'post_type' => 'mec-events',
						'posts_per_page' => 12,
						'order' => 'DESC',
						'orderby' => 'date',
					);
					// The Query
					query_posts( $args );
					?>
					<?php
					// The Loop
					while ( have_posts() ) : the_post();
						echo '<div class="swiper-slide">';
						get_template_part( 'new-customize/template-parts/content', 'card-two');
						echo '</div>';
					endwhile;

					// Reset Query
					wp_reset_query();	?>
				</div>
				<div class="swiper-button-nextx btn-c"><svg viewBox="0 0 24 24" width="24" height="24" stroke="#000" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></div>
				<div class="swiper-button-prevx btn-c"><svg viewBox="0 0 24 24" width="24" height="24" stroke="#000" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg></div>
				<div class="swiper-paginationx"></div>
			</div>
	</div>
		<script>
			jQuery(document).ready(function($) {
			var swiper = new Swiper(".xd-cat_slider", {
				slidesPerView: 1,
        		spaceBetween: 0,
				centeredSlides: true,
				loop: true,
				pagination: {
				el: ".swiper-paginationx",
				type: "fraction",
				},
				navigation: {
				nextEl: ".swiper-button-nextx",
				prevEl: ".swiper-button-prevx",
				},
				breakpoints: {
					640: {
						slidesPerView: 1,
						spaceBetween: 10,
					},
					768: {
						slidesPerView: 2,
						spaceBetween: 10,
						centeredSlides: false,
					},
					1100: {
						slidesPerView: 3,
							slidesPerView: 3,
						spaceBetween: 20,
					},
				},
			});


		});
		</script>
	<?php
	  $myvariablex = ob_get_clean();
	  return $myvariablex;
}

function ajax_login_init(){
	global $wp_query;

	//In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	//register our main script but do not enqueue it yet
	wp_register_script( 'login_system', get_stylesheet_directory_uri() . '/new-customize/js/ajax-login-script.js', array('jquery') );

	//now the most interesting part
	//we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	//you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'login_system', 'login_system_params',
	array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
	) );

	 wp_enqueue_script( 'login_system' );
}
if (!is_user_logged_in()) {
    add_action('wp_enqueue_scripts', 'ajax_login_init');
}

function login_fuc(){
	$store_arr["results"]=array();
	if(isset($_POST['check-login']) && $_POST['check-login'] == 'passed') {

		//We shall SQL escape all inputs
		$username = $_POST['username'];
		$password = $_POST['password'];
		$remember = $_POST['remembercheck'];

		if($remember) $remember = "true";
		else $remember = "false";
		$login_data = array();
		$login_data['user_login'] = $username;
		$login_data['user_password'] = $password;
		$login_data['remember'] = $remember;
		$user_verify = wp_signon( $login_data, false );
		//wp_signon is a wordpress function which authenticates a user. It accepts user info parameters as an array.
		$success_t = esc_html( 'คุณได้เข้าสู่ระบบสำเร็จ เรากำลังพาคุณไปที่หน้าหลักเว็บไซต์', 'fluffy' );
		$error_t = esc_html( 'ชื่อสมาชิกหรือรหัสผ่านของคุณไม่ถูกต้อง', 'fluffy' );
		if ( is_wp_error($user_verify) ){
			$data = array(
				"loggedin"=> "false",
				"message" =>  $error_t,
			);

			array_push($store_arr["results"], $data);
			echo json_encode( $store_arr );
		} else {
			wp_set_current_user($user_verify->ID);
			wp_set_auth_cookie($user_verify->ID);
			$data = array(
				"loggedin"=> "true",
				"message" => $success_t,
			);

			array_push($store_arr["results"], $data);
			echo json_encode( $store_arr );
		}
	}
	die();
}
	// add_action('init', 'login_fuc');
add_action('wp_ajax_login_system', 'login_fuc'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_login_system', 'login_fuc'); // wp_ajax_nopriv_{action}

// hook into the init action and call custom_post_formats_taxonomies when it fires
add_action( 'init', 'custom_post_formats_taxonomies', 0 );
// create a new taxonomy we're calling 'format'
function custom_post_formats_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Formats', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Format', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Formats', 'textdomain' ),
        'all_items'         => __( 'All Formats', 'textdomain' ),
        'parent_item'       => __( 'Parent Format', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Format:', 'textdomain' ),
        'edit_item'         => __( 'Edit Format', 'textdomain' ),
        'update_item'       => __( 'Update Format', 'textdomain' ),
        'add_new_item'      => __( 'Add New Format', 'textdomain' ),
        'new_item_name'     => __( 'New Format Name', 'textdomain' ),
        'menu_name'         => __( 'Format', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'format' ),
        'capabilities' => array(
            'manage_terms' => '',
            'edit_terms' => '',
            'delete_terms' => '',
            'assign_terms' => 'edit_posts'
        ),
        'public' => true,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );
    register_taxonomy( 'format', array( 'mec-events' ), $args ); // our new 'format' taxonomy
}

// programmatically create a few format terms
function example_insert_default_format() { // later we'll define this as our default, so all posts have to have at least one format
    wp_insert_term(
        'Default',
        'format',
        array(
          'description' => '',
          'slug'        => 'default'
        )
    );
}
add_action( 'init', 'example_insert_default_format' );

// repeat the following 11 lines for each format you want
function example_insert_map_format() {
    // wp_insert_term(
    //     'Image', // change this to
    //     'format',
    //     array(
    //       'description' => 'Adds a large map to the top of your post.',
    //       'slug'        => 'image'
	// 	)
    // );
	// wp_insert_term(
    //     'Video', // change this to
    //     'format',
    //     array(
    //       'description' => 'Adds a large map to the top of your post.',
    //       'slug'        => 'video'
	// 	)
    // );
	// wp_delete_term( 102, 'format' );
}
add_action( 'init', 'example_insert_map_format' );

// make sure there's a default Format type and that it's chosen if they didn't choose one
function moseyhome_default_format_term( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'format' => 'default' // change 'default' to whatever term slug you created above that you want to be the default
            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'moseyhome_default_format_term', 100, 2 );

// replace checkboxes for the format taxonomy with radio buttons and a custom meta box
function wpse_139269_term_radio_checklist( $args ) {
    if ( ! empty( $args['taxonomy'] ) && $args['taxonomy'] === 'format' ) {
        if ( empty( $args['walker'] ) || is_a( $args['walker'], 'Walker' ) ) { // Don't override 3rd party walkers.
            if ( ! class_exists( 'WPSE_139269_Walker_Category_Radio_Checklist' ) ) {
                class WPSE_139269_Walker_Category_Radio_Checklist extends Walker_Category_Checklist {
                    function walk( $elements, $max_depth, $args = array() ) {
                        $output = parent::walk( $elements, $max_depth, $args );
                        $output = str_replace(
                            array( 'type="checkbox"', "type='checkbox'" ),
                            array( 'type="radio"', "type='radio'" ),
                            $output
                        );
                        return $output;
                    }
                }
            }
            $args['walker'] = new WPSE_139269_Walker_Category_Radio_Checklist;
        }
    }
    return $args;
}

add_filter( 'wp_terms_checklist_args', 'wpse_139269_term_radio_checklist' );
