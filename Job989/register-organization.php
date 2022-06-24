<?php
  /* Template Name: Register Organization Page*/
  get_header();
?>
<div class="register-template register-organization"  style="
    background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/299-min-scaled.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">
    <div class="bar-success"><p class="status"></p></div>
    <div class="s-container">
      <div class="main-register">
        <div class="box-object">
          <div class="object-1 column">
            <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bgregister.png" alt=""> -->
            <div class="title">
                <h3 class="title-big"><?php esc_html_e( 'เข้าถึง Candidate ได้มากกว่าใคร', 'Job989' ); ?></h3>
            </div>
            <div class="detail">
                <div class="box-1 o-box">
                  <div class="ob-1">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/trophy.svg" alt="">
                  </div>
                  <div class="ob-2">
                    <div class="o-title">
                      <h3><?php esc_html_e( 'Platform', 'Job989' ); ?> <span><?php esc_html_e( 'ยอดนิยม', 'Job989' ); ?></span> <?php esc_html_e( 'สำหรับคนหางาน', 'Job989' ); ?></h3>
                    </div>
                    <div class="list-o">
                      <ul>
                        <li><i class="las la-check-circle"></i> <?php esc_html_e( 'เข้าถึงผู้ใช้งานสูงกว่า 150,000 คน/วัน', 'Job989' ); ?></li>
                        <li><i class="las la-check-circle"></i> <?php esc_html_e( 'จำนวนเฉลี่ยใบสมัครสู่องค์กรทั้งหมดกว่า 1,000,000 ครั้ง/เดือน', 'Job989' ); ?></li>
                        <li><i class="las la-check-circle"></i> <?php esc_html_e( 'จำนวนเฉลี่ยผู้สมัครงานถึงบริษัทกว่า 200,000 คน/เดือน', 'Job989' ); ?></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="box-2 o-box">
                  <div class="ob-1">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/calendar-2.svg" alt="">
                  </div>
                  <div class="ob-2">
                    <div class="o-title">
                      <h3><?php esc_html_e( 'ปรับเปลี่ยนประกาศได้', 'Job989' ); ?> <span><?php esc_html_e( 'ไม่จำกัด ไม่มีค่าใช้จ่ายเพิ่มเติม', 'Job989' ); ?></span></h3>
                    </div>
                    <div class="list-o">
                      <p><?php esc_html_e( 'เปลี่ยนตำแหน่งงาน และแก้ไขรายละเอียดงาน ได้ตลอดอายุสมาชิก', 'Job989' ); ?></p>
                    </div>
                  </div>
                </div>
                <div class="box-3 o-box">
                  <div class="ob-1">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/question.svg" alt="">
                  </div>
                  <div class="ob-2">
                    <div class="o-title">
                      <h3><?php esc_html_e( 'ค้นประวัติ Candidate', 'Job989' ); ?> <span><?php esc_html_e( 'ได้ง่าย ๆ', 'Job989' ); ?></span></h3>
                    </div>
                    <div class="list-o">
                      <p><?php esc_html_e( 'กว่า 1,750,000 คน ครอบคลุมถึง 140 สายอาชีพ ที่พร้อมจะร่วมงานกับคุณ', 'Job989' ); ?></p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="btn-box">
              <a href="#"><?php esc_html_e( 'อ่าน “ข้อดีทั้งหมด” ของการลงประกาศงาน', 'Job989' ); ?></a>
            </div>
          </div>
          <div class="object-2 column">
            <div class="head-title-box">
              <h2 class="head-title"><?php esc_html_e( 'สมัครสมาชิก JOB989', 'Job989' ); ?></h2>
              <h4 class="head-title"><?php esc_html_e( 'สมาชิกสำหรับบริษัท', 'Job989' ); ?></h4>
            </div>
            <div class="form">
              <form action="" id="organization-register" class="organization-register" method="POST">
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
                  <input type="hidden" name="recruit-hidden" value="passed">
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
