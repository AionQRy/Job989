<?php
  /* Template Name: Register Page*/
  get_header();
?>
<div class="register-template"  style="
    background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/299-min-scaled.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">
    <div class="bar-success"><p class="status"></p></div>
    <div class="s-container">
      <div class="main-register">
        <div class="box-object">
          <div class="object-1 column">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bgregister.png" alt="">
          </div>
          <div class="object-2 column">
            <div class="head-title-box">
              <h2 class="head-title"><?php esc_html_e( 'สมัครสมาชิก JOB989', 'Job989' ); ?></h2>
              <h4 class="head-title"><?php esc_html_e( 'สำหรับผู้สมัครงาน', 'Job989' ); ?></h4>
            </div>
            <div class="form">
              <form action="" id="form-register" class="form-register" method="POST">
                <div class="main-form">
                  <div class="input-box">
                    <i class="las la-user-alt"></i>
                    <input type="text" name="name" id="name" placeholder="ชื่อ" required>
                  </div>
                  <div class="input-box">
                    <i class="las la-user-nurse"></i>
                    <input type="text" name="last-name" id="last-name" placeholder="นามสกุล" required>
                  </div>
                  <div class="input-box">
                  <i class="las la-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="<?php esc_html_e( 'อีเมล', 'Job989' ); ?>" required>
                  </div>
                  <div class="input-box">
                    <i class="las la-lock"></i>
                    <input type="password" name="password" id="password" placeholder="<?php esc_html_e( 'รหัสผ่าน', 'Job989' ); ?>" required>
                  </div>
                  <div class="input-box">
                    <i class="las la-lock"></i>
                    <input type="password" name="repeat-password" id="repeat-password" placeholder="<?php esc_html_e( 'ยืนยันรหัสผ่าน', 'Job989' ); ?>" required>
                  </div>
                  <div class="input-box">
                    <input class="styled-checkbox" id="confirm-check" type="checkbox" value="confirm" required>
                    <label for="confirm-check">ยอมรับ <a href=""><?php esc_html_e( 'เงื่อนไขข้อตกลงการใช้บริการ', 'Job989' ); ?></a> และ <a href=""><?php esc_html_e( 'นโยบายความเป็นส่วนตัว', 'Job989' ); ?></a> ของ <?php esc_html_e( 'Job989', 'Job989' ); ?></label>
                  </div>
                  <div class="input-box">
                    <input class="styled-checkbox" id="confirm-email" type="checkbox" value="passed">
                    <label for="confirm-email"><?php esc_html_e( 'รับข่าวสารทางอีเมลจาก Job989', 'Job989' ); ?></label>
                  </div>
                </div>
                <div class="status-box">
                <p class="status"></p>
              </div>
                <div class="box-btn">
                  <button id="submit-register" class="submit submit-register"><i class="las la-user-plus"></i> <?php esc_html_e( 'สมัครสมาชิก', 'Job989' ); ?></button>
                  <a href="<?php echo get_home_url();?>/register-organization/" id="register-organization" class="register-organization"><i class="las la-building"></i> <?php esc_html_e( 'สมัครสมาชิกสำหรับบริษัท', 'Job989' ); ?></a>
                  <input type="hidden" name="check-hidden" value="passed">
                </div>            
              </form>
              <div class="box-btn-login">
                  <span>เป็นสมาชิกอยู่แล้ว ? <a href="<?php echo get_home_url();?>/login/"><?php esc_html_e( 'เข้าสู่ระบบ', 'Job989' ); ?></a></span>
              </div>
            </div>          
          </div>
        </div>
      </div>
    </div>
    
</div>
<?php get_footer(); ?>
