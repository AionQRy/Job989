<?php
  /* Template Name: Recruit Page*/
  get_header();
  $title = get_field('heading-rc');
  $detail = get_field('detail-rc');
  $ads = get_field('ads-rc');
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
                              <?php
                            
                        //    
    ?>



<div class="register-template recruit-template"  style="
    background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/bg-2.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">
    <div class="bar-success"><p class="status"></p></div>
    <div class="big-box">
    <div class="s-container">
      <div class="main-recruit">
        <div class="intro">
          <?php if($title): ?>
          <div class="title">
            <h2><i class="las la-edit"></i><?php echo $title; ?></h2>
          </div>
          <?php endif; ?>
          <?php if($title): ?>
          <div class="detail">
          <?php echo $detail; ?>
          </div>
          <?php endif; ?>
          <?php if($ads): ?>
          <div class="ads-rc">
            <img src="<?php echo $ads['url']; ?>" alt="<?php echo $ads['alt']; ?>">
          </div>
          <?php endif; ?>
        </div>
        <div class="form">
              <form action="" id="form-recruit" class="form-recruit" method="POST">
                <div class="main-form">
                  <div class="input-box">
                    <label for="title"><?php esc_html_e( 'หัวข้อ:', 'Job989' ); ?></label>
                    <div class="box input-box">
                      <i class="las la-edit"></i>
                      <input type="text" name="title" id="title" placeholder="<?php esc_html_e( 'กรอกชื่อหัวข้อ', 'Job989' ); ?>" required>
                    </div>
                  </div>
                  <div class="input-box">
                    <label for="location"><?php esc_html_e( 'สถานที่ปฏิบัติงาน:', 'Job989' ); ?></label>
                    <div class="box input-box">
                      <i class="las la-map-marker-alt"></i>
                      <input type="text" name="location" id="location" placeholder="<?php esc_html_e( 'กรอกสถานที่ปฏิบัติงาน', 'Job989' ); ?>" required>
                    </div>
                  </div>
                  <div class="input-box">
                  <label for="salary"><?php esc_html_e( 'เงินเดือน:', 'Job989' ); ?></label>
                    <div class="box input-box">
                      <i class="las la-piggy-bank"></i>
                      <input type="text" name="salary" id="salary" placeholder="<?php esc_html_e( 'จำนวนเงินเดือน', 'Job989' ); ?>" required>
                    </div>
                  </div>
                  <div class="input-box">
                    <label for="rate"><?php esc_html_e( 'อัตรา:', 'Job989' ); ?></label>
                    <div class="box input-box">
                      <i class="las la-users"></i>
                      <input type="text" name="rate" id="rate" placeholder="<?php esc_html_e( 'จำนวนอัตรา', 'Job989' ); ?>" required>
                    </div>
                  </div>
                  <div class="input-box textarea-box">
                    <label for="property-job"><?php esc_html_e( 'คุณสมบัติผู้สมัคร:', 'Job989' ); ?></label>
                    <div class="box input-box">
                      <textarea id="property-job" name="property-job" rows="4" placeholder="<?php esc_html_e( 'คุณสมบัติผู้สมัคร', 'Job989' ); ?>" required></textarea>
                    </div>
                  </div>
                  <div class="input-box textarea-box">
                    <label for="job-description"><?php esc_html_e( 'รายละเอียดงาน:', 'Job989' ); ?></label>
                    <div class="box input-box">
                      <textarea id="job-description" name="job-description" rows="4" placeholder="<?php esc_html_e( 'รายละเอียดงาน', 'Job989' ); ?>" required></textarea>
                    </div>
                  </div>
                  <div class="input-box textarea-box">
                  <label for="how-apply"><?php esc_html_e( 'วิธีการสมัคร:', 'Job989' ); ?></label>
                    <div class="box input-box">
                      <textarea id="how-apply" name="how-apply" rows="4" placeholder="<?php esc_html_e( 'วิธีการสมัคร', 'Job989' ); ?>" required></textarea>
                    </div>
                  </div>
                  <div class="input-box textarea-box">
                    <label for="documents"><?php esc_html_e( 'เอกสารประกอบการสมัครงาน:', 'Job989' ); ?></label>
                    <div class="box input-box">
                      <textarea id="documents" name="documents" rows="4" placeholder="<?php esc_html_e( 'เอกสารประกอบการสมัครงาน', 'Job989' ); ?>" required></textarea>
                    </div>
                  </div>
                  <div class="input-group input-box">
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
					<div class="input-group input-box">
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
					<div class="input-group input-box">
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
			
                  <div class="input-box radio-box">
                    <div class="title-label">
                      <label><?php esc_html_e( 'สถานะการรับสมัคร', 'Job989' ); ?></label>
                    </div>
                    <input class="styled-radio" id="confirm-radio-1" type="radio" name="status-job" value="urgently">
                    <label for="confirm-radio-1" class="accept-radio"><?php esc_html_e( 'รับสมัครด่วน', 'Job989' ); ?></label>

                    <input class="styled-radio" id="confirm-radio-2" type="radio" name="status-job" value="open">
                    <label for="confirm-radio-2" class="accept-radio"><?php esc_html_e( 'เปิดรับสมัคร', 'Job989' ); ?></label>

                    <input class="styled-radio" id="confirm-radio-3" type="radio" name="status-job" value="close">
                    <label for="confirm-radio-3" class="accept-radio"><?php esc_html_e( 'ปิดรับสมัคร', 'Job989' ); ?></label>

                  </div>
                  <div class="input-box">
                    <input class="styled-checkbox" id="confirm-check" type="checkbox" value="confirm" required>
                    <label for="confirm-check" class="accept-check">ยอมรับ <a href=""><?php esc_html_e( 'เงื่อนไขข้อตกลงการใช้บริการ', 'Job989' ); ?></a> และ <a href=""><?php esc_html_e( 'นโยบายความเป็นส่วนตัว', 'Job989' ); ?></a> ของ <?php esc_html_e( 'Job989', 'Job989' ); ?></label>
                  </div>
                </div>
                <div class="status-box">
                <p class="status"></p>
              </div>
                <div class="box-btn">
                  <button id="submit-recruit" class="submit submit-register"><i class="las la-plus-square"></i> <?php esc_html_e( 'ลงประกาศงาน', 'Job989' ); ?></button>
                  <input type="hidden" name="job-hidden" value="passed">
                </div>
              </form>
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
