<?php
  /* Template Name: Login Page*/
  get_header();
?>
<div class="login-template" style="
    background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/299-min-scaled.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">
    <div class="bar-success"><p class="status"></p></div>
    <div class="s-container">
      <div class="main-login">
        <div class="box-login">
            <div class="logo-box">
                <div class="site-logo"><?php paradiz_logo(); ?></div>
            </div>
            <div class="head-title">
              <h2><?php esc_html_e( 'เข้าสู่ระบบ', 'Job989' ); ?></h2>
              <h4>กรอกอีเมล และ รหัสผ่านเพื่อเข้าสู่ระบบ</h4>
            </div>
            <form action="" id="form-login" class="form-login" method="POST">
              <div class="main-form">
                  <div class="input-box">
                      <i class="las la-envelope"></i>
                      <input type="text" name="email" id="email-login" placeholder="อีเมล" required>
                  </div>
                  <div class="input-box">
                      <i class="las la-lock"></i>
                      <input type="password" name="password" id="password-login" placeholder="รหัสผ่าน" required>
                  </div>
                  <div class="input-box">
                      <input class="styled-checkbox" id="remember-check" type="checkbox" name="remembercheck">
                      <label for="remember-check"><?php esc_html_e( 'จดจำฉัน', 'Job989' ); ?></label>
                  </div>
                  <div class="input-box">
                      <a href="<?php echo get_home_url(); ?>/forget-password/" class="forget-password"><?php esc_html_e( 'ลืมรหัสผ่าน?', 'Job989' ); ?></a>
                  </div>
              </div>
              <div class="status-box">
                <p class="status"></p>
              </div>
              <div class="box-btn">
                <button id="login-submit" class="btn-submit"><i class="las la-sign-in-alt"></i> <?php esc_html_e( 'เข้าสู่ระบบ', 'Job989' ); ?></button>              
                <input type="hidden" name="checklog" value="true">
              </div>
              <div class="box-regis">
              <a href="<?php echo get_home_url();?>/register/"><?php esc_html_e( 'สร้างบัญชี ผู้ใช้ใหม่', 'Job989' ); ?></a>
              </div>
              <?php //wp_nonce_field( 'ajax-login-nonce', 'security' );
              // echo  admin_url('admin-ajax.php');
              // echo '<br>';
              // echo get_stylesheet_directory_uri() . '/js/ajax-login-script.js'; ?>
            </form>
        </div>
      </div>
    </div>

</div>
<?php get_footer(); ?>
