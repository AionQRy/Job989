<?php
/**
 * Template Name: Forget Password Page
 */
get_header(); ?>

<?php
  if(is_user_logged_in()){
    $url_reg = home_url();
    wp_redirect($url_reg);  
  }
?>
<div class="tempate-box" style="background: url('/wp-content/uploads/2021/05/7-scaled.jpg');">
    <div class="s-container">
        <div class="main-salary">
        <div class="content-form">
          <div class="box-form">
            <div class="box-range">
              <h3><i class="las la-lock"></i> <?php echo esc_html__( 'ลืมรหัสผ่าน ?', 'Job989' ); ?></h3>
              <div class="container forget-form">
							<div class="c-form">
								<?php
									global $wpdb;

									$error = '';
									$success = '';

									// check if we're in reset form
									if( isset( $_POST['action'] ) && 'reset' == $_POST['action'] )
									{
										$email = trim($_POST['user_login']);

										if( empty( $email ) ) {
											$error = 'ป้อนชื่อผู้ใช้หรือที่อยู่อีเมล';
										} else if( ! is_email( $email )) {
											$error = 'ชื่อผู้ใช้หรือที่อยู่อีเมลไม่ถูกต้อง';
										} else if( ! email_exists( $email ) ) {
											$error = 'ไม่มีผู้ใช้ที่ลงทะเบียนกับที่อยู่อีเมลนั้น';
										} else {

											$random_password = wp_generate_password( 12, false );
											$user = get_user_by( 'email', $email );

											$update_user = wp_update_user( array (
													'ID' => $user->ID,
													'user_pass' => $random_password
												)
											);

											// if  update user return true then lets send user an email containing the new password
											if( $update_user ) {
												$to = $email;
												$subject = 'Your new password';
												$sender = get_option('name');

												$message = 'Your new password is: '.$random_password;

												$headers[] = 'MIME-Version: 1.0' . "\r\n";
												$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
												$headers[] = "X-Mailer: PHP \r\n";
												$headers[] = 'From: '.$sender.' < '.$email.'>' . "\r\n";

												$mail = wp_mail( $to, $subject, $message, $headers );
												if( $mail )
													$success = 'ตรวจสอบที่อยู่อีเมลของคุณสำหรับรหัสผ่านใหม่';

											} else {
												$error = 'เกิดข้อผิดพลาดในการอัปเดตบัญชีของคุณ';
											}

										}

										if( ! empty( $error ) ):
											// echo '<div class="message"><p class="error"><strong>ERROR:</strong> '. $error .'</p></div>';
											?>
											<script type="text/javascript">
											 alert("<?php echo $error;?>");
											 window.location ='/forget-password/';
											</script>
											<?php
										endif;
										if( ! empty( $success ) ):
											$url = "/".'login'."/";
											?>
											<script type="text/javascript">
											 alert("ตรวจสอบที่อยู่อีเมลของคุณสำหรับรหัสผ่านใหม่");
											 window.location = <?php echo $url; ?>;
											</script>
											<?php
											endif;
									}
								?>
								<form id="form-forgetpassword" class="form-forgetpassword" method="post">
									<fieldset>
										<h3>โปรดป้อนชื่อผู้ใช้หรือที่อยู่อีเมลของคุณ คุณจะได้รับลิงก์เพื่อสร้างรหัสผ่านใหม่ทางอีเมล</h3>
										<p class="grid-2"><label for="user_login"><i class="fas fa-key"></i> ที่อยู่อีเมล:</label>
											<?php $user_login = isset( $_POST['user_login'] ) ? $_POST['user_login'] : ''; ?>
											<input type="text" name="user_login" id="user_login" value="<?php echo $user_login; ?>" placeholder="กรอกที่อยู่อีเมล"/></p>
										<p class="text-center">
											<input type="hidden" name="action" value="reset" />
											<input type="submit" value="ยืนยัน" class="btn btn-register-2" id="submit" />
										</p>
									</fieldset>
								</form>
								</div>
					</div>
            </div>
          </div>
        </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>