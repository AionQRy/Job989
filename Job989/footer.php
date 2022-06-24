<?php 
	$copyright = get_field('copyright', 'option');
	$contact_f = get_field('contact-f', 'option');
	$phone_f = get_field('phone-f', 'option');
	$about_f = get_field('about-f', 'option');
	/*company*/
	$logo_company = get_field('logo-organization', 'option');
	$name_company = get_field('name-company', 'option');
	$detail_company = get_field('detail-company', 'option');
	$number_company = get_field('number-company', 'option');	
?>
</div>
<!--#content-->
<footer id="footer" class="footer">
	<div class="main-footer footer-1">
		<div class="s-container">
			<div class="box-object">
				<div class="object-1">
					<h4 class="text-head"><?php esc_html_e( 'งานแยกตามประเภทงาน', 'Job989' ); ?></h4>
					<?php 
					$args = array (
						'taxonomy' => 'type_job', //empty string(''), false, 0 don't work, and return empty array
						'orderby' => 'name',
						'order' => 'ASC',
						'hide_empty' => false, //can be 1, '1' too
					);
					$terms = get_terms('type_job', $args);
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						?>
						<div class="box-menu-tax">
							<ul class="tax-list">
						<?php
						foreach($terms as $term){
							?>
							<li><a href="<?php echo get_term_link($term)?>"><?php echo $term->name; ?></a></li>
							<?php
						}
						?>
						</ul>
						</div>
						<?php
					}
					?>	
				</div>
				<div class="object-2">
					<h4 class="text-head"><?php esc_html_e( 'งานแยกตามตำแหน่ง', 'Job989' ); ?></h4>
					<?php 
					$args = array (
						'taxonomy' => 'position_job', //empty string(''), false, 0 don't work, and return empty array
						'orderby' => 'name',
						'order' => 'ASC',
						'hide_empty' => false, //can be 1, '1' too
					);
					$terms = get_terms('position_job', $args);
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						?>
						<div class="box-menu-tax">
							<ul class="tax-list">
						<?php
						foreach($terms as $term){
							?>
							<li><a href="<?php echo get_term_link($term)?>"><?php echo $term->name; ?></a></li>
							<?php
						}
						?>
						</ul>
						</div>
						<?php
					}
					?>						
				</div>
				<div class="object-3">
					<h4 class="text-head"><?php esc_html_e( 'งานแยกตามสถานที่ปฏิบัติงาน', 'Job989' ); ?></h4>									
					<?php 
					$args = array (
						'taxonomy' => 'practice_facility', //empty string(''), false, 0 don't work, and return empty array
						'orderby' => 'name',
						'order' => 'ASC',
						'hide_empty' => false, //can be 1, '1' too
					);
					$terms = get_terms('practice_facility', $args);
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						?>
						<div class="box-menu-tax">
							<ul class="tax-list">
						<?php
						foreach($terms as $term){
							?>
							<li><a href="<?php echo get_term_link($term)?>"><?php echo $term->name; ?></a></li>
							<?php
						}
						?>
						</ul>
						</div>
						<?php
					}
					?>					
				</div>
			</div>
		</div>
	</div>
	<div class="footer-2">
		<div class="s-container">
			<div class="box-object">			
				<div class="object-1">
					<div class="box-home-logo">
						<a href="<?php echo get_home_url(); ?>"><?php esc_html_e( 'Job989', 'Job989' ); ?></a>
					</div>
					<?php if($contact_f): ?>
					<div class="contact-f">
						<?php the_field('contact-f', 'option'); ?>
					</div>
					<?php endif; ?>
					<div class="box-btn-f">
					<?php if($phone_f): ?>
						<div class="btn-phone">
							<a href=""><i class="las la-phone"></i> <?php echo $phone_f; ?></a>
						</div>
						<div class="btn-budget">
							<a href=""><?php esc_html_e( 'อัตราโฆษณา', 'Job989' ); ?></a>
						</div>
					<?php endif; ?>
					</div>
				</div>
				<div class="object-2">
					<div class="sub-box-0">
						<div class="logo-box">
							<div class="site-logo"><?php paradiz_logo(); ?></div>
						</div>
					</div>
					<div class="sub-box-1">
						<div class="sub-object-1">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/appstore.png" alt="">
						</div>
						<div class="sub-object-2">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/googleplay.png" alt="">
						</div>
						<div class="sub-object-3">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/appgallery.png" alt="">
						</div>
					</div>	
					<div class="sub-box-2">
						<p><?php esc_html_e( 'ติดตามเรา', 'Job989' ); ?></p>
					</div>			
					<div class="sub-box-3">
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
				</div>
				<div class="object-3">
					<?php if($logo_company): ?>
					<div class="sub-object-1">
						<img src="<?php echo esc_url($logo_company['url']); ?>" alt="<?php echo esc_attr($logo_company['alt']); ?>">
					</div>
					<?php endif; ?>
					<?php if($name_company): ?>
					<div class="sub-object-2">
						<?php if($name_company): ?>
						<p><?php echo $name_company; ?></p>
						<?php endif; ?>
						<?php if($detail_company): ?>
						<p><?php echo $detail_company; ?></p>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					<?php if($number_company): ?>
					<div class="sub-object-3">
						<p class="text-company"><?php esc_html_e( 'เลขประจำตัวผู้เสียภาษี', 'Job989' ); ?></p>	
						<p class="number-company"><?php echo $number_company; ?></p>			
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php if($about_f): ?>
	<div class="footer-3">
		<div class="s-container">
			<p><?php echo $about_f; ?></p>
		</div>
	</div>
	<?php endif; ?>
	<div class="footer-4">
		<div class="s-container">
		<?php if($copyright): ?>
		<span class="text-sub"><?php echo $copyright; ?></span>
		<?php endif; ?>
		<nav id="site-policy" class="site-policy">
            <?php wp_nav_menu( array( 'theme_location' => 'policy-menu', 'menu_id' => 'policy-menu' ) ); ?>
    	</nav> 
		</div>		
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
