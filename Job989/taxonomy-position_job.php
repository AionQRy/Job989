<?php
  /**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paradiz
 */
  get_header();
?>
<div class="main-archive_job">
    <div class="s-container">
        <div class="main-object">       
            <div class="side-bar_job">
                <div class="seach-box_cat">
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

                <div class="tax-box">        
               <h3 class="head-tax"><?php esc_html_e( 'งานแยกตามประเภทงาน', 'Job989' ); ?></h3>                
                <div class="home-location">
                    <?php 
                            $args = array (
                                'taxonomy' => 'type_job', //empty string(''), false, 0 don't work, and return empty array
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'number' => 10,
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
               </div> 
                <div class="tax-box">        
               <h3 class="head-tax"><?php esc_html_e( 'งานแยกตามตำแหน่ง', 'Job989' ); ?></h3>                
                <div class="home-location">
                    <?php 
                            $args = array (
                                'taxonomy' => 'position_job', //empty string(''), false, 0 don't work, and return empty array
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'number' => 10,
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
               </div>       
            
               <div class="tax-box">        
               <h3 class="head-tax"><?php esc_html_e( 'สถานที่ปฏิบัติงาน', 'Job989' ); ?></h3>                
                <div class="home-location">
                    <?php 
                            $args = array (
                                'taxonomy' => 'practice_facility', //empty string(''), false, 0 don't work, and return empty array
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'number' => 10,
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

            </div>
            <div class="blog-list_job">
                <?php               
                $i = 0; 
                $id_object = get_queried_object_id();
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $wp_query = new WP_Query( array(
                    'posts_per_page'    => 12,
                    'post_type'         => 'job-list',
                    'order'             => 'DESC',
                    'orderby'           => 'none',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'position_job',
                            'field'    => 'term_id',
                            'terms'    => $id_object,
                        ),
                    ),
                    'paged' => $paged,
                ) );
                $count = $wp_query->found_posts;
                ?>
            <div class="head-tax_box">
                <h2 class="head-tax"><i class="las la-angle-right"></i> <?php esc_html_e( 'ตำแหน่งงาน: ', 'Job989' ); ?> <?php echo single_cat_title("", false); ?></h2>
                <h3><?php esc_html_e( 'พบ', 'Job989' ); ?> <span><?php echo $count; ?></span> <?php esc_html_e( 'ตำแหน่งงาน', 'Job989' ); ?></h3>
            </div>                  
                <div class="list-job_table">
                    <div class="detail-table">
                        <div class="box-list">
                        <?php  
            if( ! $wp_query->have_posts() ) {

                ?>
                <div class="box-not_found">
                    <i class="las la-exclamation-triangle"></i>
                    <h4><?php esc_html_e( 'ไม่ตำแหน่งงานในขณะนี้', 'Job989' ); ?></h4>
                </div>
                <?php
                
            }
            while( $wp_query->have_posts() ) {
                $wp_query->the_post();
                    $permalink = get_permalink(get_the_ID() );
                    $title = get_the_title( get_the_ID() );
                    $salary = get_field( 'salary', get_the_ID() );
                    $location = get_field('location', get_the_ID());   
                    $status = get_field('status-job', get_the_ID());                       
                    $i++;
                            ?>
                            <div class="article-job">
                                <a href="<?php echo esc_url( $permalink ); ?>">
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
                                        <h4><?php echo esc_html( $title ); ?></h4>
                                        <div class="box-flex">
                                            <p><i class="las la-map-marker"></i> <?php echo $location; ?></p>
                                            <p><i class="las la-dollar-sign"></i> <?php echo $salary; ?></p>
                                        </div>
                                    </div>                                  
                                </a>
                            </div>                        
                        <?php     
                        } 
                        wp_reset_postdata();  ?>
                        </div>
                        <?php seed_posts_navigation(); ?>
                    </div>
                </div>
                <div class="filter-icon">
                    <a href="<?php echo get_home_url(); ?>"><i class="las la-search"></i> <span class="text-filter"><?php esc_html_e( 'ค้นหา', 'Job989' ); ?></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>