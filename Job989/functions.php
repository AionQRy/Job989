<?php
/**
 * Override seed_setup()
 */
/*
function fruit_setup() {
	add_theme_support( 'custom-logo', array(
		'width'       => 200,
		'height'      => 200,
		'flex-width' => true,
		) );
}
add_action( 'after_setup_theme', 'fruit_setup', 11);
*/

/**
 * Enqueue scripts and styles.
 */



function yp_scripts() {
	wp_dequeue_style( 'seed-style');

	wp_enqueue_style( 'yp-theme-css', get_stylesheet_uri() );
	wp_enqueue_script( 'yp-theme-js',
	    get_stylesheet_directory_uri() . '/js/main.js', array('jquery'),
			filemtime( get_theme_file_path('/js//main.js')), true );

}
add_action( 'wp_enqueue_scripts', 'yp_scripts' , 20 );

function add_font_ai(){
	//wp_enqueue_style( 'evermore-catamaran-font-style', get_stylesheet_directory_uri() . '/vendor/fonts/catamaran/stylesheet.css', true );
	wp_enqueue_style( 'catamaran-font-style', get_stylesheet_directory_uri() . '/add-on/font/catamaran/stylesheet.css', true );
	wp_enqueue_style( 'sarabun-font-style', get_stylesheet_directory_uri() . '/add-on/font/sarabun/stylesheet.css', true );
    wp_enqueue_style( 'supermarket-font-style', get_stylesheet_directory_uri() . '/add-on/font/supermarket/stylesheet.css', true );
	wp_enqueue_style( 'font-line-awesome', get_stylesheet_directory_uri() . '/add-on/icon/line-awesome/css/line-awesome.min.css', array(), '1.1', 'all');
	wp_enqueue_style( 'slider-css', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css', array(), '1.1', 'all');
	wp_enqueue_script( 'slider-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js', array(), '1.1', 'all');
	wp_enqueue_script( 'sliderxx-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-grid@0.1.2/dist/js/splide-extension-grid.min.js', array(), '1.1', 'all');
	wp_enqueue_script( 'cookie-js', get_stylesheet_directory_uri() . '/add-on/cookie-js/src/jquery.cookie.js' , array('jquery'), '1.1', 'all');
	wp_enqueue_script( 'rangeslider-js', get_stylesheet_directory_uri() . '/add-on/rangeslider/rangeslider.js', array(), true );
    wp_enqueue_style( 'rangeslider-minjs', get_stylesheet_directory_uri() . '/add-on/rangeslider/rangeslider.min.js', array() );
    // wp_enqueue_style( 'rangeslider-css', get_stylesheet_directory_uri() . '/add-on/rangeslider/rangeslider.css', array() );
	// wp_enqueue_style( 'sliderprice-minjs', get_stylesheet_directory_uri() . '/add-on/sliderprice/price_range_script.js', array('jquery') );
    // wp_enqueue_style( 'jui-css', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css', array() );
	// wp_enqueue_style( 'jmin-minjs', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js' , array('jquery') );
	// wp_enqueue_style( 'jui-minjs', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'add_font_ai' );

function ajax_login_init(){
	global $wp_query;

	//In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	//register our main script but do not enqueue it yet
	wp_register_script( 'login_system', get_stylesheet_directory_uri() . '/js/ajax-login-script.js', array('jquery') );

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
function ajax_register_init(){
	global $wp_query;

	//In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	//register our main script but do not enqueue it yet
	wp_register_script( 'register_system', get_stylesheet_directory_uri() . '/js/ajax-register-script.js', array('jquery') );

	//now the most interesting part
	//we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	//you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'register_system', 'register_system_params',
	array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
	) );

	 wp_enqueue_script( 'register_system' );
}
function ajax_recruit_init(){
	global $wp_query;

	//In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	//register our main script but do not enqueue it yet
	wp_register_script( 'recruit_system', get_stylesheet_directory_uri() . '/js/ajax-recruit-script.js', array('jquery') );

	//now the most interesting part
	//we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	//you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'recruit_system', 'recruit_system_params',
	array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'redirecturl' => home_url().'/organization',
        'loadingmessage' => __('Sending user info, please wait...')
	) );

	 wp_enqueue_script( 'recruit_system' );
}
function ajax_recruit_job(){
    global $wp_query;
  
    //In most cases it is already included on the page and this line can be removed
    wp_enqueue_script('jquery');
  
    //register our main script but do not enqueue it yet
    wp_register_script( 'recruit_job_system', get_stylesheet_directory_uri() . '/js/ajax-recruit-job.js', array('jquery') );
  
    //now the most interesting part
    //we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    //you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script( 'recruit_job_system', 'recruit_job_system_params',
    array( 
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'redirecturl' => home_url().'/recruit',
      'loadingmessage' => __('Sending user info, please wait...')
    ) );
  
     wp_enqueue_script( 'recruit_job_system' );
  }
  add_action('wp_enqueue_scripts', 'ajax_recruit_job');
//Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('wp_enqueue_scripts', 'ajax_login_init');
	add_action('wp_enqueue_scripts', 'ajax_register_init');
	add_action('wp_enqueue_scripts', 'ajax_recruit_init');
}

function login_fuc(){
	$store_arr["results"]=array();
	if(isset($_POST['checklog']) && $_POST['checklog'] == 'true') {

		//We shall SQL escape all inputs
		$email = $_POST['email'];
		$password = $_POST['password'];
		$remember = $_POST['remembercheck'];

		if($remember) $remember = "true";
		else $remember = "false";
		$login_data = array();
		$login_data['user_login'] = $email;
		$login_data['user_password'] = $password;
		$login_data['remember'] = $remember;
		$user_verify = wp_signon( $login_data, false );
		//wp_signon is a wordpress function which authenticates a user. It accepts user info parameters as an array.
		if ( is_wp_error($user_verify) ){
			$data = array(
				"loggedin"=> "false",
				"message" => "อีเมลหรือรหัสผ่านของคุณไม่ถูกต้อง" ,
			);

			array_push($store_arr["results"], $data);
			echo json_encode( $store_arr );
		} else {
			wp_set_current_user($user_verify->ID);
			wp_set_auth_cookie($user_verify->ID);
			$data = array(
				"loggedin"=> "true",
				"message" => "คุณได้เข้าสู่ระบบสำเร็จ เรากำลังพาคุณไปที่หน้าหลักเว็บไซต์" ,
			);

			array_push($store_arr["results"], $data);
			echo json_encode( $store_arr );
		}
	}	
	die();
}
// if (!is_user_logged_in()) {
	// add_action('init', 'login_fuc');
	add_action('wp_ajax_login_system', 'login_fuc'); // wp_ajax_{action}
	add_action('wp_ajax_nopriv_login_system', 'login_fuc'); // wp_ajax_nopriv_{action}
//  }

/*register*/
function register_account(){
	$store_arr["results"]=array();
  	global $wpdb, $PasswordHash, $current_user, $user_ID;

  if(isset($_POST['check-hidden']) && $_POST['check-hidden'] == 'passed' ) {

  	$pwd1 = $wpdb->escape(trim($_POST['password']));
  	$pwd2 = $wpdb->escape(trim($_POST['repeat-password']));
  	$first_name = $wpdb->escape(trim($_POST['name']));
  	$last_name = $wpdb->escape(trim($_POST['last-name']));
  	$email = $wpdb->escape(trim($_POST['email']));

  // 	if( $email == "" || $pwd1 == "" || $pwd2 == "" || $username == "" || $first_name == "" || $last_name == "") {
  	if( $email == "" || $pwd1 == "" || $pwd2 == "" || $first_name == "" || $last_name == "") {
		  $data = array(
			"loggedin"=> "false",
			"message" => "กรุณากรอกข้อมูลให้ครบถ้วน" ,
		);

		array_push($store_arr["results"], $data);
		echo json_encode( $store_arr );

  	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$data = array(
			"loggedin"=> "false",
			"message" => "อีเมลไม่ถูกต้อง" ,
		);

		array_push($store_arr["results"], $data);
		echo json_encode( $store_arr );
  	} else if(email_exists($email) ) {
		  $data = array(
			"loggedin"=> "false",
			"message" => "อีเมลถูกใช้แล้ว" ,
		);

		array_push($store_arr["results"], $data);
		echo json_encode( $store_arr );

  	} else if($pwd1 <> $pwd2 ){
		$data = array(
			"loggedin"=> "false",
			"message" => "รหัสผ่านไม่เหมือนกันกรุณาลองใหม่อีกครั้ง" ,
		);

		array_push($store_arr["results"], $data);
		echo json_encode( $store_arr );
  	} else {
		$object_user = array ( //default wordpress wp_users
			'first_name' => apply_filters('pre_user_first_name', $first_name),
			'last_name' => apply_filters('pre_user_last_name', $last_name),
		    'user_pass' => apply_filters('pre_user_user_pass', $pwd1),
		    'user_login' => apply_filters('pre_user_user_login', $email),
			'user_email' => apply_filters('pre_user_user_email', $email),
			'remember' => true,
			'role' => 'guest' );
  		$user_id = wp_insert_user($object_user);

  		if( is_wp_error($user_id) ) {
			$data = array(
				"loggedin"=> "false",
				"message" => "ไม่สำเร็จกรุณาลองใหม่อีกครั้ง" ,
			);
	
			array_push($store_arr["results"], $data);
			echo json_encode( $store_arr );
  		} else {
		$data = array(
			"loggedin"=> "true",
			"message" => "คุณได้สมัครสมาชิกเรียบร้อยแล้ว" ,
		);

		array_push($store_arr["results"], $data);
		echo json_encode( $store_arr );
    		}
			do_action('user_register', $user_id);
		}

	}
	die();
}
// add_action( 'init', 'register_account' );
add_action('wp_ajax_register_system', 'register_account'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_register_system', 'register_account'); // wp_ajax_nopriv_{action}

/*register*/
function recruit_account(){
	$store_arr["results"]=array();
  	global $wpdb, $PasswordHash, $current_user, $user_ID;

  if(isset($_POST['recruit-hidden']) && $_POST['recruit-hidden'] == 'passed' ) {

  	$pwd1 = $wpdb->escape(trim($_POST['password']));
  	$pwd2 = $wpdb->escape(trim($_POST['repeat-password']));
  	$first_name = $wpdb->escape(trim($_POST['name']));
  	$last_name = $wpdb->escape(trim($_POST['last-name']));
  	$email = $wpdb->escape(trim($_POST['email']));

  // 	if( $email == "" || $pwd1 == "" || $pwd2 == "" || $username == "" || $first_name == "" || $last_name == "") {
  	if( $email == "" || $pwd1 == "" || $pwd2 == "" || $first_name == "" || $last_name == "") {
		  $data = array(
			"loggedin"=> "false",
			"message" => "กรุณากรอกข้อมูลให้ครบถ้วน" ,
		);

		array_push($store_arr["results"], $data);
		echo json_encode( $store_arr );

  	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$data = array(
			"loggedin"=> "false",
			"message" => "อีเมลไม่ถูกต้อง" ,
		);

		array_push($store_arr["results"], $data);
		echo json_encode( $store_arr );
  	} else if(email_exists($email) ) {
		  $data = array(
			"loggedin"=> "false",
			"message" => "อีเมลถูกใช้แล้ว" ,
		);

		array_push($store_arr["results"], $data);
		echo json_encode( $store_arr );

  	} else if($pwd1 <> $pwd2 ){
		$data = array(
			"loggedin"=> "false",
			"message" => "รหัสผ่านไม่เหมือนกันกรุณาลองใหม่อีกครั้ง" ,
		);

		array_push($store_arr["results"], $data);
		echo json_encode( $store_arr );
  	} else {
		$object_user = array ( //default wordpress wp_users
			'first_name' => apply_filters('pre_user_first_name', $first_name),
			'last_name' => apply_filters('pre_user_last_name', $last_name),
		    'user_pass' => apply_filters('pre_user_user_pass', $pwd1),
		    'user_login' => apply_filters('pre_user_user_login', $email),
			'user_email' => apply_filters('pre_user_user_email', $email),
			'remember' => true,
			'role' => 'organization' );
  		$user_id = wp_insert_user($object_user);

  		if( is_wp_error($user_id) ) {
			$data = array(
				"loggedin"=> "false",
				"message" => "ไม่สำเร็จกรุณาลองใหม่อีกครั้ง" ,
			);
	
			array_push($store_arr["results"], $data);
			echo json_encode( $store_arr );
  		} else {
		$data = array(
			"loggedin"=> "true",
			"message" => "คุณได้สมัครสมาชิกเรียบร้อยแล้ว" ,
		);

		array_push($store_arr["results"], $data);
		echo json_encode( $store_arr );
    		}
			do_action('user_register', $user_id);
		}

	}
	die();
}
// add_action( 'init', 'recruit_account' );
add_action('wp_ajax_recruit_system', 'recruit_account'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_recruit_system', 'recruit_account'); // wp_ajax_nopriv_{action}

/*recruit job*/
function recruit_job(){
	$store_arr["results"]=array();
  	global $wpdb, $PasswordHash, $current_user, $user_ID;

  if(isset($_POST['job-hidden']) && $_POST['job-hidden'] == 'passed' ) {

  	$location = $_POST['location'];
  	$salary = $_POST['salary'];
  	$rate = $_POST['rate'];
  	$property_job = $_POST['property-job'];
  	$job_description = $_POST['job-description'];
    $how_apply = $_POST['how-apply'];
    $documents = $_POST['documents'];
    $status_job = $_POST['status-job'];
	$title = $_POST['title'];
	$type_job = $_POST['type_job'];
	$position_job = $_POST['position_job'];
	$practice_facility = $_POST['practice_facility'];
    $current_user = wp_get_current_user();              
    $allowed_roles = array( 'administrator', 'organization' );

    if( 0 != $current_user->ID ): 
        if ( array_intersect( $allowed_roles, $current_user->roles ) ):
            if($current_user->ID ):
              if( $location == "" || $salary == "" || $rate == "" || $property_job == "" || $job_description == "" || $how_apply == "" || $documents == "" || $status_job == "") 
			  {
                $data = array(
                "loggedin"=> "false",
                "message" => "กรุณากรอกข้อมูลให้ครบถ้วน" ,
              );
          
              array_push($store_arr["results"], $data);
              echo json_encode( $store_arr );
          
              } else {
                $post = array(
                  'post_author' => $current_user->ID,
                  'post_content' => false,
                  'post_status' => "publish",
                  'post_title' => $title,
                  'post_parent' => $post_id,
                  'post_type' => "job-list"
              );
              $post_id = wp_insert_post( $post, $wp_error );
              if($post_id){
             
             
                     if ($location) {
                       update_field( 'field_5fd8b03646671', $location, $post_id );
                     }
                     if ($salary) {
                      update_field( 'field_5fd8b06946672', $salary, $post_id );
                    }
                    if ($rate) {
                      update_field( 'field_5fd8b0e246673', $rate, $post_id );
                    }
                    if ($property_job) {
                      update_field( 'field_5fd8b0fa46674', $property_job, $post_id );
                    }
                    if ($job_description) {
                      update_field( 'field_5fd8b15f46675', $job_description, $post_id );
                    }
                    if ($how_apply) {
                      update_field( 'field_5fd8b19c46676', $how_apply, $post_id );
                    }
                    if ($documents) {
                      update_field( 'field_5fd8b20346677', $documents, $post_id );
                    }
                    if ($status_job) {
                      update_field( 'field_5fd8ae68a2885', $status_job, $post_id );
                    }
					if ($type_job) {
						wp_set_object_terms( $post_id, $type_job, 'type_job', true );
					}
					if ($position_job) {
						wp_set_object_terms( $post_id, $position_job, 'position_job', true );
					}
					if ($practice_facility) {
						wp_set_object_terms( $post_id, $practice_facility, 'practice_facility', true );
					}
					$url_link = get_post_permalink( $post_id ,'', 'job-list' );
					$count = count_user_posts( $current_user->ID , ['company-list']  );

                                if($count >= 1):                               
                                $args = array(
                                        'post_type' => 'company-list',
                                        'posts_per_page' => 1,
                                        'order' => 'DESC',
                                        'orderby' => 'none',
                                        'author' => $current_user->ID
                                    );
                                    $query = new WP_Query( $args );                              
                                    while( $query->have_posts() ) {
                                        $query->the_post();
                                        $id_company = get_the_ID();
                                    }
                                    wp_reset_postdata();
									endif; 
					// if($post_author_id == $current_user->ID ):
						update_field( 'field_600e79c5a1ebb', $id_company , $post_id );
					// endif;
					$update_post = array(
						'post_author' => $current_user->ID,
						'post_content' => false,
						'ID'          => $id_company,
						'post_status' => "publish",
						'post_parent' => $update_post_id,
						'post_type' => "company-list"
					);
					$update_post_id = wp_update_post( $update_post, $wp_error );
					if($update_post_id){
											
						$field_job = get_field( 'post_job', $id_company );
						
						if( $field_job ): 
							$arr_job = array();
													
							 foreach( $field_job as $field_jobs ): 
						
								// Setup this post for WP functions (variable must be named $post).
								setup_postdata($field_jobs);
									// echo $field_jobs->ID; 
									$arr_job[] = $field_jobs->ID; 
							 endforeach;
							
							// print_r($arr_job);
							// echo '<Br>';
							// Reset the global post object so that the rest of the page works correctly.
							wp_reset_postdata();
						endif;

							$arr_job[] = $post_id;
							// print_r($arr_job);
							// echo '<Br>';
							// echo $type_job;
							// echo '<Br>';
							// echo $position_job;
							// echo '<Br>';
							// echo $practice_facility;
							// echo '<Br>';
						update_field( 'field_601d576f9618c', $arr_job , $update_post_id  );

					}

                    if( is_wp_error($post_id) ) {
                      $data = array(
                        "loggedin"=> "false",
                        "message" => "ไม่สำเร็จกรุณาลองใหม่อีกครั้ง" ,
                      );
                  
                      array_push($store_arr["results"], $data);
                      echo json_encode( $store_arr );
                      } else {
                    $data = array(
                      "loggedin"=> "true",
                      "message" => "คุณได้ลงประกาศรับสมัครงานเรียบร้อยแล้ว" ,
					  "url" => $url_link,
                    );
                
                    array_push($store_arr["results"], $data);
                    echo json_encode( $store_arr );				
                        }

              }
                        
              }
            endif;
        endif;
    endif; 
  

	}
	die();
}
// add_action( 'init', 'recruit_job' );
// add_action('acf/save_post', 'recruit_job');
add_action('wp_ajax_recruit_job_system', 'recruit_job'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_recruit_job_system', 'recruit_job'); // wp_ajax_nopriv_{action}

function auto_login_new_user( $user_id ) {
	wp_set_auth_cookie( $user_id, false, is_ssl() );
  }
  add_action( 'user_register', 'auto_login_new_user' );
  
function job_update_custom_roles() {
    if ( get_option( 'organization' ) < 1 ) {
        add_role( 'organization', 'Organization', array( 'read' => true, 'level_0' => true ) );
        update_option( 'organization', 1 );
	}
	if ( get_option( 'guest' ) < 1 ) {
        add_role( 'guest', 'Guest', array( 'read' => true, 'level_0' => true ) );
        update_option( 'guest', 1 );
    }
}
add_action( 'init', 'job_update_custom_roles' );

function register_my_menu() {
  register_nav_menu( 'organization-mobile', __( 'Organization Mobile', 'Job989' ) );
  register_nav_menu( 'guest-mobile', __( 'Guest Mobile', 'Job989' ) );
  register_nav_menu( 'policy-menu', __( 'Policy Menu', 'Job989' ) );
  /*add-image-size*/
  add_image_size( 'post-home', 235, 125, array( 'left', 'top' ) ); // Hard crop left top

}
add_action( 'after_setup_theme', 'register_my_menu' );

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Header Settings',
	// 	'menu_title'	=> 'Header',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));

}
function DateThai($strDate)
{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
}

// Method 1: Filter.
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyDt-ojn474mQmoUDpm4Z3zGmQk4xi51lho';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// Method 2: Setting.
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyDt-ojn474mQmoUDpm4Z3zGmQk4xi51lho');
}
add_action('acf/init', 'my_acf_init');
	
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function register_shortcodes() {
	add_shortcode( 'post_tips', 'post_tips' );
	add_shortcode( 'organization_hot', 'organization_hot' ); 
	add_shortcode( 'top_organization', 'top_organization' );
	add_shortcode( 'urgent_jobs', 'urgent_jobs' );
	add_shortcode( 'banner_one', 'banner_one' );
	add_shortcode( 'banner_two', 'banner_two' );
	add_shortcode( 'banner_three', 'banner_three' );
	add_shortcode( 'hot_jobs', 'hot_jobs' );
	add_shortcode( 'search_home', 'search_home' );
}
add_action( 'init', 'register_shortcodes' );
function search_home($atts) {
	ob_start();
	   ?>
	   <div class="search-box">
		   <div class="object-1">
			<form action="/search-job/" id="search-home" method="get" class="search-home searh-box form-box">
				<div class="main-form">
					<div class="input-group">
						<label for="search_text"><?php esc_html_e( 'คำที่ต้องการค้นหา', 'Job989' ); ?></label>
						<div class="box">
							<i class="las la-search"></i>
							<input type="text" name="search_text" id="search_text" placeholder="<?php esc_html_e( 'ระบุตำแหน่งงาน หรือชื่อบริษัท', 'Job989' ); ?>">
						</div>				
					</div>
					<div class="input-group">
						<label for="type_job"><?php esc_html_e( 'งานแยกตามประเภทงาน', 'Job989' ); ?></label>
						<select name="type_job" id="type_job" class="custom-select sources" placeholder="<?php esc_html_e( 'ทั้งหมด', 'Job989' ); ?>">
						<option value=""><?php esc_html_e( 'ทั้งหมด', 'Job989' ); ?></option>
						<?php 
						$args = array (
							'taxonomy' => 'type_job', //empty string(''), false, 0 don't work, and return empty array
							'orderby' => 'name',
							'order' => 'ASC',
							'hide_empty' => false, //can be 1, '1' too
						);
						$terms = get_terms('type_job', $args);
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
							foreach($terms as $term){							
								?>
								<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
		
								<?php
							}
						}
						?>	
						</select>
					</div>
					<div class="input-group">
						<label for="position_job"><?php esc_html_e( 'งานแยกตามตำแหน่ง', 'Job989' ); ?></label>
						<select name="position_job" id="position_job" class="custom-select sources" placeholder="<?php esc_html_e( 'ทั้งหมด', 'Job989' ); ?>">
						<option value=""><?php esc_html_e( 'ทั้งหมด', 'Job989' ); ?></option>
						<?php 
						$args = array (
							'taxonomy' => 'position_job', //empty string(''), false, 0 don't work, and return empty array
							'orderby' => 'name',
							'order' => 'ASC',
							'hide_empty' => false, //can be 1, '1' too
						);
						$terms = get_terms('position_job', $args);
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
							foreach($terms as $term){							
								?>
								<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
		
								<?php
							}
						}
						?>	
						</select>
					</div>
					<div class="input-group">
						<label for="practice_facility"><?php esc_html_e( 'สถานที่ปฏิบัติงาน', 'Job989' ); ?></label>
						<select name="practice_facility" id="practice_facility" class="custom-select sources" placeholder="<?php esc_html_e( 'ทั้งหมด', 'Job989' ); ?>">
						<option value=""><?php esc_html_e( 'ทั้งหมด', 'Job989' ); ?></option>
						<?php 
						$args = array (
							'taxonomy' => 'practice_facility', //empty string(''), false, 0 don't work, and return empty array
							'orderby' => 'name',
							'order' => 'ASC',
							'hide_empty' => false, //can be 1, '1' too
						);
						$terms = get_terms('practice_facility', $args);
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
							foreach($terms as $term){							
								?>
								<option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
		
								<?php
							}
						}
						?>	
						</select>
					</div>
				</div>
				<div class="box-btn">
					<input type="hidden" name="search-check" value="passed">
					<button id="search-submit" class="btn-submit"><i class="las la-search"></i> <?php esc_html_e( 'ค้นหา', 'Job989' ); ?></button>
				</div>
			</form>
		   </div>
		   <div class="object-2">
				<div class="title-box">
				<?php $count_job = wp_count_posts( 'job-list' )->publish; ?>
					<h2><?php esc_html_e( 'งานทั้งหมด', 'Job989' ); ?><span class="count-job"><?php echo $count_job; ?></span><?php esc_html_e( 'อัตรา', 'Job989' ); ?></h2>
					<a href="<?php echo get_home_url();?>/job-list/" class="see-all"><i class="las la-angle-right"></i> <?php esc_html_e( 'งานทั้งหมด', 'Job989' ); ?></a>	
				</div>
				<div class="db-box">
				<div class="home-location">
					<h4 class="title-h"><?php esc_html_e( 'งานแยกตามประเภทงาน', 'Job989' ); ?></h4>
				<?php 
						$args = array (
							'taxonomy' => 'type_job', //empty string(''), false, 0 don't work, and return empty array
							'orderby' => 'name',
							'order' => 'ASC',
							'number' => 7,
							'hide_empty' => false, //can be 1, '1' too
						);
						$terms = get_terms('type_job', $args);
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
							foreach($terms as $term){	
								$term_link = get_term_link( $term );						
								?>
								<a href="<?php echo esc_url( $term_link ); ?>" class="list-locate <?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
								<?php
							}
							?>
							<a href="<?php echo get_home_url();?>/type_job/" class="list-locate see-all"><?php esc_html_e( 'ดูทั้งหมด', 'Job989' ); ?></a>
							<?php
						}
						?>	
				</div>
				<div class="home-location">
				<h4 class="title-h"><?php esc_html_e( 'งานแยกตามตำแหน่ง', 'Job989' ); ?></h4>
				<?php 
						$args = array (
							'taxonomy' => 'position_job', //empty string(''), false, 0 don't work, and return empty array
							'orderby' => 'name',
							'order' => 'ASC',
							'number' => 7,
							'hide_empty' => false, //can be 1, '1' too
						);
						$terms = get_terms('position_job', $args);
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
							foreach($terms as $term){	
								$term_link = get_term_link( $term );						
								?>
								<a href="<?php echo esc_url( $term_link ); ?>" class="list-locate <?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
								<?php
							}
							?>
							<a href="<?php echo get_home_url();?>/position_job/" class="list-locate see-all"><?php esc_html_e( 'ดูทั้งหมด', 'Job989' ); ?></a>
							<?php
						}
						?>	
				</div>
				<div class="home-location">
				<h4 class="title-h"><?php esc_html_e( 'สถานที่ปฏิบัติงาน', 'Job989' ); ?></h4>
				<?php 
						$args = array (
							'taxonomy' => 'practice_facility', //empty string(''), false, 0 don't work, and return empty array
							'orderby' => 'name',
							'order' => 'ASC',
							'number' => 7,
							'hide_empty' => false, //can be 1, '1' too
						);
						$terms = get_terms('practice_facility', $args);
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
							foreach($terms as $term){	
								$term_link = get_term_link( $term );						
								?>
								<a href="<?php echo esc_url( $term_link ); ?>" class="list-locate <?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
								<?php
							}
							?>
							<a href="<?php echo get_home_url();?>/practice_facility/" class="list-locate see-all"><?php esc_html_e( 'ดูทั้งหมด', 'Job989' ); ?></a>
							<?php
						}
						?>	
				</div>
				</div>	
				<div class="slide-hero">
						<?php //echo do_shortcode( '[banner_one]' );?>
				</div>
		   </div>
	   </div>		
	<?php
	$myvariablex = ob_get_clean();
	return $myvariablex;
}
function banner_one($atts) {
	ob_start();
    global $wp_query,
        $post;
	?>
<?php 
if( have_rows('banner_one') ): ?>
	<div class="carousel-banner">
		<div id="carousel-banner-1" class="splide">
			<div class="splide__track">
				<ul class="splide__list">
    <?php while( have_rows('banner_one') ): the_row(); 
		$image = get_sub_field('banner_image');
	?>

							  <li class="splide__slide">
								  <div class="box-slider">
									  <img src="<?php echo $image['url']?>" alt="">
								  </div>
							  </li>
							  <?php endwhile; ?>  
			</ul>
		</div>
	</div>
	</div>
			<script>
		document.addEventListener( 'DOMContentLoaded', function () {
	  new Splide('#carousel-banner-1', {
		type: 'loop',
		perPage: 1,
		autoplay: true,
		arrows: false,
		pagination: true,
		interval: 3000,
	  }).mount();
	});
	</script>
	<?php endif; ?>
	<?php
	$myvariablex = ob_get_clean();
	return $myvariablex;
}
function banner_two($atts) {
	ob_start();
    global $wp_query,
        $post;
	?>
<?php 
if( have_rows('banner_two') ): ?>
	<div class="carousel-banner">
		<div id="carousel-banner-2" class="splide">
			<div class="splide__track">
				<ul class="splide__list">
    <?php while( have_rows('banner_two') ): the_row(); 
		$image = get_sub_field('banner_image');
	?>

							  <li class="splide__slide">
								  <div class="box-slider">
									  <img src="<?php echo $image['url']?>" alt="">
								  </div>
							  </li>
							  <?php endwhile; ?>  
			</ul>
		</div>
	</div>
	</div>
			<script>
		document.addEventListener( 'DOMContentLoaded', function () {
	  new Splide('#carousel-banner-2', {
		type: 'loop',
		perPage: 1,
		autoplay: true,
		arrows: false,
		pagination: true,
		interval: 3000,
	  }).mount();
	});
	</script>
	<?php endif; ?>
	<?php
	$myvariablex = ob_get_clean();
	return $myvariablex;
}
function banner_three($atts) {
	ob_start();
    global $wp_query,
        $post;
	?>
<?php 
if( have_rows('banner_three') ): ?>
	<div class="carousel-banner">
		<div id="carousel-banner-3" class="splide">
			<div class="splide__track">
				<ul class="splide__list">
    <?php while( have_rows('banner_three') ): the_row(); 
		$image = get_sub_field('banner_image');
	?>

							  <li class="splide__slide">
								  <div class="box-slider">
									  <img src="<?php echo $image['url']?>" alt="">
								  </div>
							  </li>
							  <?php endwhile; ?>  
			</ul>
		</div>
	</div>
	</div>
			<script>
		document.addEventListener( 'DOMContentLoaded', function () {
	  new Splide('#carousel-banner-3', {
		type: 'loop',
		perPage: 1,
		autoplay: true,
		arrows: false,
		pagination: true,
		interval: 3000,
	  }).mount();
	});
	</script>
	<?php endif; ?>
	<?php
	$myvariablex = ob_get_clean();
	return $myvariablex;
}
function top_organization($atts) {
	ob_start();
    global $wp_query,
        $post;
	?>
<?php $featured_posts = get_field('top_companies');
if( $featured_posts ): ?>
	<div class="grid-top_organization">
		<div id="grid-top_organization">
		<?php foreach( $featured_posts as $featured_post ): 
			$permalink = get_permalink( $featured_post->ID );
			$title = get_the_title( $featured_post->ID );
			$banner_register = get_field( 'banner-register', $featured_post->ID );
			$text_excerpt = get_field( 'text-excerpt', $featured_post->ID );
			?>
			<article id="top-organization<?php echo $featured_post->ID; ?>" class="article-top_organization">
			<div class="box-image">
				<a href="<?php echo $permalink; ?>">
										<?php if ( $banner_register ) : ?>
											<div class="box-imgs">
												<img src="<?php echo $banner_register['url']; ?>" alt="">
											</div>											
										<?php else:
										$custom_logo_id = get_theme_mod( 'custom_logo' );
										$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
										?>
										<div class="contact-img">
											<img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="">
											<div class="contact-text">
												<p>ติดต่อโฆษณา</p>
												<p>084-556-9714</p>
											</div>
										</div>
				<?php endif; ?>
				</a>
			</div>
			<div class="box-title">
				<a href="<?php echo $permalink; ?>">
					<h3><?php echo $title; ?></h3>
					<p><?php echo $text_excerpt; ?></p>
				</a>
			</div>
			</article>
		<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php
	$myvariablex = ob_get_clean();
	return $myvariablex;
}
function urgent_jobs($atts) {
	ob_start();
    global $wp_query,
        $post;
	?>
<?php $featured_posts = get_field('top_companies');
if( $featured_posts ): ?>
	<div class="grid-urgent_jobs">
		<div id="grid-urgent_jobs">
		<?php foreach( $featured_posts as $featured_post ): 
			$permalink = get_permalink( $featured_post->ID );
			$title = get_the_title( $featured_post->ID );
			$banner_register = get_field( 'banner-register', $featured_post->ID );
			$text_excerpt = get_field( 'text-excerpt', $featured_post->ID );
			?>
			<article id="urgent-jobs<?php echo $featured_post->ID; ?>" class="article-urgent_jobs">
			<div class="box-title">
				<a href="<?php echo $permalink; ?>">
					<h3><?php echo $title; ?></h3>
					<p><?php echo $text_excerpt; ?></p>
				</a>
			</div>
			<div class="box-image">
				<a href="<?php echo $permalink; ?>">
				<?php $chk_postimg = get_the_post_thumbnail($featured_post->ID);  ?>
				<?php if ( $chk_postimg ) : ?>
											<div class="box-imgs">
												<?php echo $chk_postimg; ?>
											</div>											
										<?php else:
										$custom_logo_id = get_theme_mod( 'custom_logo' );
										$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
										?>
										<div class="contact-img">
											<img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="">
											<div class="contact-text">
												<p>ติดต่อโฆษณา</p>
												<p>084-556-9714</p>
											</div>
										</div>
				<?php endif; ?>
				</a>
			</div>			
			</article>
		<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php
	$myvariablex = ob_get_clean();
	return $myvariablex;
}

function hot_jobs($atts) {
	ob_start();
    global $wp_query,
        $post;
	?>
<?php $featured_posts = get_field('hot_jobs');
if( $featured_posts ): ?>
	<div class="grid-box_hot_jobs">
		<div id="grid-box_hot_jobs">
		<?php foreach( $featured_posts as $featured_post ): 
			$permalink = get_permalink( $featured_post->ID );
			$title = get_the_title( $featured_post->ID );
			$custom_field = get_field( 'field_name', $featured_post->ID );
			?>
			<article id="hot-jobs_<?php echo $featured_post->ID; ?>" class="article-hot_jobs">
			<div class="box-image">
				<a href="<?php echo $permalink; ?>">
				<?php $chk_postimg = get_the_post_thumbnail($featured_post->ID);  ?>
										<?php if ( $chk_postimg ) : ?>
											<div class="box-img">
												<?php echo $chk_postimg; ?>
											</div>											
										<?php else:
										$custom_logo_id = get_theme_mod( 'custom_logo' );
										$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
										?>
										<div class="contact-img">
											<img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="">
											<div class="contact-text">
												<p>ติดต่อโฆษณา</p>
												<p>084-556-9714</p>
											</div>
										</div>
				<?php endif; ?>
				</a>
			</div>
			<div class="box-title">
				<a href="<?php echo $permalink; ?>">
					<h3><?php echo $title; ?></h3>
				</a>
			</div>
			</article>
		<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php
	$myvariablex = ob_get_clean();
	return $myvariablex;
}

function organization_hot($atts) {
	ob_start();
    global $wp_query,
        $post;
	?>
<?php $featured_posts = get_field('hot_companies');
if( $featured_posts ): ?>
	<div class="carousel-box_hot_organization">
		<div id="carousel-box_hot_organization" class="splide">
			<div class="splide__track">
				<ul class="splide__list">
				<?php foreach( $featured_posts as $featured_post ): 
					  $permalink = get_permalink( $featured_post->ID );
					  $title = get_the_title( $featured_post->ID );
							   ?>
							  <li class="splide__slide">
								  <div id="organization-<?php echo $featured_post->ID; ?>" class="box-organization">
								 	 <a href="<?php echo $permalink;?>">
										<?php $chk_postimg = get_the_post_thumbnail($featured_post->ID);  ?>
										<?php if ( $chk_postimg ) : ?>
											<div class="box-img">
												<?php echo $chk_postimg; ?>
											</div>											
										<?php else:
										$custom_logo_id = get_theme_mod( 'custom_logo' );
										$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
										?>
										<div class="contact-img">
											<img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="">
											<div class="contact-text">
												<p>ติดต่อโฆษณา</p>
												<p>084-556-9714</p>
											</div>
										</div>
										<?php endif; ?>
									</a>
								  </div>
							  </li>
				<?php endforeach; ?>  
			</ul>
		</div>
	</div>
	</div>
			<script>
		document.addEventListener( 'DOMContentLoaded', function () {
	  new Splide('#carousel-box_hot_organization', {
		type: 'loop',

		grid: {
		rows: 4,
		cols: 7,
		gap : {
			row: '15px',
			col: '15px',
		}
	},
		autoplay: true,
		arrows: true,
		pagination: false,
		interval: 3000,
		breakpoints: {
			1280: {
			grid: {
				rows: 2,
				cols: 7,
				gap : {
					row: '15px',
					col: '15px',
				}
			}		   
			},
			990: {
			grid: {
				rows: 2,
				cols: 6,
				gap : {
					row: '10px',
					col: '10px',
				}
			}  
			},
			640: {
			grid: {
				rows: 2,
				cols: 3,
				gap : {
					row: '15px',
					col: '15px',
				}
			}
			},
		}
	  }).mount(window.splide.Extensions);
	});
	
	
	</script>
	<?php endif; ?>
	<?php
	$myvariablex = ob_get_clean();
	return $myvariablex;
}
function post_tips($atts) {
	ob_start();
    global $wp_query,
        $post;

    $atts = shortcode_atts( array(
		'numberpost' => '',
        'cat' => ''
	), $atts );
	echo '<div class="box-two_column">';
	$loop_first = new WP_Query( array(
		'posts_per_page'    => 1,
		'post_type'         => 'post',
        'order'             => 'DESC',
	    'orderby'           => 'none',
		'tax_query'         => array(
			array(
            'taxonomy'  => 'category',
            'field'     => 'slug',
            'terms'     => array( sanitize_title( $atts['cat'] ) )
		    )
		)
    ) );

    if( ! $loop_first->have_posts() ) {
        return false;
    }
	?>
	<div class="post-tips post-tips_one">
	<?php
    while( $loop_first->have_posts() ) {
		$loop_first->the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="box-thumbnail">
		<a href="<?php echo get_the_permalink(); ?>">
		<?php $chk_postimg = get_the_post_thumbnail(get_the_ID()); ?>
		<?php if ( $chk_postimg ) : ?>
			<?php the_post_thumbnail('medium'); ?>
		<?php else:
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
		?>
		<div class="contact-img">
			<img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="">
			<div class="contact-text">
				<p>ติดต่อโฆษณา</p>
				<p>084-556-9714</p>
			</div>
		</div>
		<?php endif; ?>
		</a>
	</div>
	<div class="box-detail">
	<div class="box-title">
	    <a href="<?php echo get_the_permalink(); ?>">
		    <h3 class="post-title"><?php echo get_the_title(); ?></h3>
		</a>
	</div>
	</div>
</article>
		<?php
    }
	wp_reset_postdata();
	?>
	</div>
	<?php
	//end loop

    $loop = new WP_Query( array(
        'posts_per_page'    => sanitize_title( $atts['numberpost'] ),
		'post_type'         => 'post',
		'offset' 			=> 1,
        'order'             => 'DESC',
	    'orderby'           => 'none',
		'tax_query'         => array(
			array(
            'taxonomy'  => 'category',
            'field'     => 'slug',
            'terms'     => array( sanitize_title( $atts['cat'] ) )
		    )
		)
    ) );

    if( ! $loop->have_posts() ) {
        return false;
    }
	?>
	<div class="post-tips post-tips_two">
		<?php
		while( $loop->have_posts() ) {
			$loop->the_post();
			get_template_part( 'template-parts/content','card-home');
		}
		wp_reset_postdata();
		?>
	</div>
	<?php echo '</div>'; ?>
	<?php
	$myvariablex = ob_get_clean();
	return $myvariablex;
}
/*pagination*/
function seed_posts_navigation() {
	printf('<div class="content-pagination">');
	global $paged, $wp_query; $big = 9999999;
	if ( !$max_page ):
			$max_page = $wp_query->max_num_pages;
	endif;
	?>
	<span class="text-number_page"><?php esc_html_e( 'หน้า', 'Job989' ); ?> <?php echo max( 1, get_query_var('paged') );?> <?php esc_html_e( 'จาก', 'Job989' ); ?> <?php echo $wp_query->max_num_pages; ?></span>
	<?php
	echo '<div class="box-pagination">';
	echo paginate_links(
		array(
				'base' 		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' 	=> '?paged=%#%',
				'current'	=> max( 1, get_query_var('paged') ),
				'total' 	=> $wp_query->max_num_pages,
				'prev_text'  => '<i class="las la-angle-left"></i>',
				'next_text'  => '<i class="las la-angle-right"></i>',
		));
	echo '</div>';
	if( $paged != $max_page ):
		if( $max_page > 1 ):
	?>
	<a href="<?php echo esc_url( get_pagenum_link( $wp_query->max_num_pages ) ); ?>" class="last-number_page"><?php esc_html_e( 'หน้าสุดท้าย', 'Job989' ); ?></a>
	<?php
		endif;
	endif;
	printf('</div>');
}

function tn_custom_excerpt_length( $length ) {
	return 5;
	}
	add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );

function wpdocs_theme_setup() {
		add_image_size( 'company-thumb', 250, 250, false ); // (cropped)
	}
	add_action( 'after_setup_theme', 'wpdocs_theme_setup' );


// function save_post_callback($post_id){
//     global $post; 
//     if ($post->post_type = 'company-list'){
// 		if($post->post_status == 'draft'){
// 			echo 'dog';
// 			return $post_id;
//     }
// 	}
//     //if you get here then it's your post type so do your thing....
// }
// add_action('save_post','save_post_callback');
// add_action('init', 'save_post_callback');

function my_acf_save_post( $post_id ) {	
	if ($post->post_type = 'company-list'){
		$status = get_field( 'field_60a3c2d97ea26', $post_id );
		$post_author_id = get_post_field( 'post_author', $post_id );
		$tellid = 'id = ' . $post_author_id;
			if ($status == 'passed') {						
				// this is not a new post
				update_field( 'field_60a53ff4ee5bd', 'passed', 'user_' . $post_author_id );
				update_field( 'field_60a5405f62755', $post_id, 'user_' . $post_author_id ); 
				$url_com = get_post_permalink($post_id);
				$c_user_email = get_the_author_meta( 'user_email', $post_author_id );
				$name = get_the_author_meta( 'first_name', $post_author_id );
				
				$to = get_option( 'admin_email' );
				$subject = 'แจ้งเตือนการลงทะเบียนองค์กรใหม่';
				$sender = 'แจ้งเตือนการลงทะเบียนองค์กรใหม่ ' . "คุณ $name";
			  
				$message = 'สถานะการยืนยันตัวตนองค์กรของคุณได้รับการยืนยันแล้ว คลิกที่นี่ URL ด้านล่างเพื่อดูข้อมูลองค์กรของคุณ'.'<br>'.$url_com;

				$headers[] = 'MIME-Version: 1.0' . "\r\n";
				$headers[] ="Content-Type: text/html; charset=UTF-8 \r\n";
				$headers[] = 'From: '.$sender.' < '.$to.'>' . "\r\n";
			  
				$xmail = wp_mail( $c_user_email, $subject, $message, $headers );
				if( $xmail ){
				 $success = 'การเปลี่ยนสถานะสำเร็จ';
				 echo $success;
			  
				} else {
				$error = 'เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง';
				echo $error;
				}
				// die;
				return;
			}elseif($status == 'notpassed'){	
				update_field( 'field_60a53ff4ee5bd', 'notpassed', 'user_' . $post_author_id );
			}else{
				update_field( 'field_60b609fdf310b', $post_author_id, $post_id );
			}
  
	 }
	// set flag
	
  
	// do other stuff to new post
  }
  add_action('acf/save_post', 'my_acf_save_post', 20);


  
  function cross_check_user_items() {
	  if(is_user_logged_in()){
		if ( !is_page('487') ) {
			$current_user = wp_get_current_user();
			$allowed_roles = array( 'organization' );
			if ( array_intersect( $allowed_roles, $current_user->roles ) ){
				$count = count_user_posts( $current_user->ID , ['company-list']  );
				if($count < 1):          
					echo 'xxx';                     
				$url_reg = home_url() . '/organization';
				wp_redirect($url_reg);  
			exit;
				endif;
		
		  }
		}
	}
  }
  add_action('template_redirect', 'cross_check_user_items');
?>

