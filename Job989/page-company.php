<?php
  /* Template Name: Company*/
  get_header();
?>
<div class="main-archive_company">
 <div class="s-container">
     <div class="main-object">       
         <div class="object-detail">
            <div class="line-box">
                <h2 class="company-head"><?php esc_html_e( 'บริษัทรับสมัครงาน', 'Job989' ); ?></h2>
                <div class="search-bar">
                    <form action="" id="search-company" class="search-company" method="GET">
                        <label for="search_text"><?php // esc_html_e( 'คำที่ต้องการค้นหา', 'Job989' ); ?></label>
                            <div class="box"> 
                                <input type="text" name="s_company" id="search_text" placeholder="<?php esc_html_e( 'กรอกคำค้นหาระบุชื่อบริษัท', 'Job989' ); ?>">
                            </div>
                        </label>	
                        <button type="submit"><i class="las la-search"></i></button>
                    </form>
                </div>
            </div>            
             <?php
             $text = $_GET['s_company'];
             $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $wp_query = new WP_Query( array(
                'posts_per_page'    => 21,
                'post_type'         => 'company-list',
                'order'             => 'DESC',
                'orderby'           => 'none',
                'meta_query'	=> array(
                    array(
                        'key'	 	=> 'status_verify',
                        'value'	  	=> 'passed',
                        'compare' 	=> 'IN',
                    ),
                ),
                's' => $text,
                'paged' => $paged,
            ) );

            if( ! $wp_query->have_posts() ) {
                // $url_re = home_url() . '/company';
                // wp_redirect($url_re);  
                echo 'ไม่พบการค้นหากรุณาค้นหาใหม่อีกครั้ง';
            }
            ?>
	<div class="list-post_company">
	<?php
    while( $wp_query->have_posts() ) {
		$wp_query->the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="main-article">
                <div class="box-thumbnail">
                    <a href="<?php echo get_the_permalink(); ?>">
                    <?php $chk_postimg = get_the_post_thumbnail(get_the_ID()); ?>
                    <?php if ( $chk_postimg ) : ?>
                        <?php the_post_thumbnail('company-thumb'); ?>
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
            </div>
        </article>
        <?php 
    }
    
    wp_reset_postdata();     
	?>
	</div>
    <?php seed_posts_navigation(); ?>
     </div>
 </div>
</div>
<?php get_footer(); ?>