<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package passiongen
 */
$related_stories = get_field('like_post');
$post_date = get_the_date( 'd/m/Y' ); 
$post_view = pvc_get_post_views( $post_id = 0 );
get_header();
?>

<main id="primary" class="site-main main-list main-archive-post">
	<header class="page-header">
		<div class="s-container">
		<?php
		the_title( '<h2 class="heading">', '</h2>' );
		?>		
		</div>	
	</header><!-- .page-header -->   
		<div class="s-container">  
			<div class="img-single">
			<?php $chk_postimg = get_the_post_thumbnail(get_the_ID()); ?>
			<?php if ( $chk_postimg ) : ?>
				<?php the_post_thumbnail('full'); ?>
				<?php else:
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
			?>
			<div class="contact-img">
				<img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="">
				<div class="contact-text">
					<p><?php esc_html_e( 'ติดต่อโฆษณา', 'Job989' ); ?></p>
					<p>084-556-9714</p>
				</div>
			</div>
			<?php endif; ?>
			</div>
			<div class="share-view">
				<div class="main-view">
					<div class="calendar-box">
						<i class="las la-clock"></i>
						<span class="day"><?php echo $post_date;?></span>
					</div>
					<div class="divide"></div>
					<div class="box-share">
						<i class="las la-eye"></i>
						<span class="count"><?php echo $post_view;?></span> 
					</div>
				</div>
				<div class="main-share">
					<?php
						if(function_exists('seed_social')) {seed_social();}
						?>
				</div>	
			</div>
			<div class="the-content">
				<?php the_content(); ?>
			</div>         
		<div class="post-home_three customize-one single-content">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-post_single' );

		endwhile; // End of the loop.
		?>
		<div class="terms-box">
			<div class="box-list_single">
				<p>Category:</p>
				<ul class="cat-list_single">
				<?php 
				$post_categories = get_the_terms( get_the_ID(), 'category' );
				if ( ! empty( $post_categories ) && ! is_wp_error( $post_categories ) ) {
					$categories = wp_list_pluck( $post_categories, 'name' );
					foreach ($post_categories as $post_category) {					
						?>
							<li><a href="<?php echo get_term_link( $post_category->slug, 'category' ); ?>"><?php echo $post_category->name; ?></a></li>
						<?php	
					}
				}		 
				?>
				</ul>			
			</div>		

			<div class="box-list_single">
				<p>Tags:</p>
				<ul class="cat-list_single">
				<?php 
				$post_categories = get_the_terms( get_the_ID(), 'post_tag' );
				if ( ! empty( $post_categories ) && ! is_wp_error( $post_categories ) ) {
					$categories = wp_list_pluck( $post_categories, 'name' );
					foreach ($post_categories as $post_category) {					
						?>
							<li><a href="<?php echo get_term_link( $post_category->slug, 'post_tag' ); ?>"><?php echo $post_category->name; ?></a></li>
						<?php	
					}
				}		 
				?>
				</ul>			
			</div>
		</div>	
		</div>					
	
	</div>
	<?php if( have_posts() ): ?>
<div class="section-list my-relate my-single-post">
    <div class="s-container">
		<div class="main-related">
        <h3 class="heading"><?php esc_html_e( 'Recommended Stories', 'Job989' ); ?></h3>
        <div class="post-home_one customize-one">       
            <?php   $terms = get_the_terms( get_the_ID(), 'category' );
					if ( !empty( $terms ) ){
						$term = array_shift( $terms );
					}
					$args_relate = array(
					'posts_per_page'    => 3,
					'post_type'         => 'post',
					'order'             => 'DESC',
					'orderby'           => 'rand',
					'tax_query'         => array( 
						array(
						'taxonomy'  => 'category',
						'field'     => 'slug',
						'terms'     => array( $term->slug )
						) 
					)
					);
					query_posts( $args_relate );
					// The Loop
					while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content','card-related');
					endwhile;
					// Reset Query
					wp_reset_query(); ?>       
		</div>
		</div>
    </div>
</div>
<?php endif; ?>
<div class="section-comment facebook-comment-box">
    <div class="s-container">
		<div class="main-comment">       
            <?php
				$current_urls = get_permalink(get_the_ID());
			?>
			<?php echo do_shortcode('[wpdevart_facebook_comment curent_url="' . $current_urls . '" order_type="social" title_text="แสดงความคิดเห็น" title_text_color="#000000" title_text_font_size="22" title_text_font_famely="Kanit" title_text_position="left" width="100%" bg_color="#d4d4d4" animation_effect="random" count_of_comments="10" ]'); ?>    
		</div>
    </div>
</div>
</main><!-- #main -->
<?php
get_footer();
