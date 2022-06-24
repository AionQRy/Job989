<?php
  /* Template Name: Join Page*/
  get_header();

if(!is_user_logged_in()){
    $url_reg = home_url() . '/login';
    wp_redirect($url_reg);  
  }                                  
                                  ?>
<div class="tempate-box result-salary" style="background: url('/wp-content/uploads/2021/05/7-scaled.jpg');">
    <div class="s-container">
        <div class="main-salary">
        <div class="content-form">
          <div class="box-form">
          <?php
            global $post;
            $author_id =get_current_user_id();
            $current_user = wp_get_current_user();              
            $allowed_roles = array( 'administrator', 'guest' );
            if ( array_intersect( $allowed_roles, $current_user->roles ) ):
                $address_guest = get_field('address_guest', 'user_' . $current_user->ID );
                $telephone_number = get_field('telephone_number', 'user_' . $current_user->ID ); 
                $id_post = $_GET['job'];
                // echo get_post_permalink($id_post); 

                $post_object = get_field('post_link', $id_post);
               if( $post_object ): 
               // override $post
                   global $post;
               $post = $post_object;
               setup_postdata( $post ); 
               $permalink = get_permalink();
               $title = get_the_title();
               $author_company = get_post_field( 'post_author', get_the_ID() );
               $c_user_email = get_the_author_meta( 'user_email', $author_company );
            //    echo $c_user_email;

             wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
           endif; 
        ?>
        <div id="form-sign" class="form-sign">
            <div class="box-title">
                <div class="title-b">
                    <h3><?php esc_html_e( 'วิธีการลงสมัคร', 'Job989' ); ?></h3>
                </div> 
                <div class="detail">
                    <p><i class="las la-check"></i><?php esc_html_e( 'กรอกช้อมูลลงบนฟอร์ม ให้ครบถ้วนและละเอียด', 'Job989' ); ?></p>
                    <p><i class="las la-check"></i><?php esc_html_e( 'ตรวจดูข้อมูลให้เรียบร้อย', 'Job989' ); ?></p>
                    <p><i class="las la-check"></i><?php esc_html_e( 'กดยืนยันส่งข้อมูลสมัครงาน', 'Job989' ); ?></p>
                    <p><i class="las la-check"></i><?php esc_html_e( 'รอการตอบกลับจากทางบริษัททาง อีเมล', 'Job989' ); ?></p>
                    <h4><?php esc_html_e( 'ขอบคุณสำหรับการใช้บริการ JOB989', 'Job989' ); ?></h4>
                    <p class="cont"><i class="las la-exclamation-triangle"></i> <?php esc_html_e( 'ต้องการติดต่อ JOB989 โปรดคลิกที่นี่', 'Job989' ); ?> <a href="<?php echo get_home_url();?>/contact/"><?php esc_html_e( 'ติดต่อ JOB989', 'Job989' ); ?></a></p>
                </div>
                <div class="img-sign">
                    <img src="/wp-content/uploads/2021/06/Asset-3icon.png" alt="">
                </div>               
            </div>
            <div class="box-form_join">
                <div class="title-head">
                    <h2><i class="las la-edit"></i><?php esc_html_e( 'ส่งข้อมูลสมัครงาน', 'Job989' ); ?></h2>
                </div>
                <?php echo do_shortcode( '[fluentform id="2"]' ); ?>
            </div>         
        </div>
           
        <?php else: ?>
            <p><?php esc_html_e( 'สถานะของท่านไม่สามารถลงทะเบียนได้', 'Job989' ); ?></p>
       <?php endif; ?>
          </div>
        </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<script>
    jQuery(document).ready(function($) { 
        $('#form-sign input#ff_2_subject').val('<?php echo get_the_title($id_post); ?>');
        $("#form-sign input#ff_2_subject").prop('disabled', true);
        $("#form-sign input#ff_2_email").prop('disabled', true);
        $('#form-sign input#ff_2_email').val('<?php echo $current_user->user_email; ?>');
        $('#form-sign input#ff_2_names_first_name_').val('<?php echo $current_user->first_name; ?>');
        $('#form-sign input#ff_2_names_last_name_').val('<?php echo $current_user->last_name; ?>');
        $('#form-sign input#ff_2_subject_1').val('<?php echo $telephone_number; ?>');
        $('#form-sign textarea#ff_2_message').val('<?php echo $address_guest; ?>');
        $('#form-sign input#ff_2_email_author').val('<?php echo $c_user_email; ?>');
        $('#form-sign input[type="hidden"][name="hidden_job"]').val('<?php echo get_post_permalink($id_post); ?>');
        $('#form-sign input[type="hidden"][name="hidden_author"]').val('<?php echo get_author_posts_url( $current_user->ID ); ?>');      
    });
</script>
<style>
    .form-sign {
    display: grid;
    grid-template-columns: 2fr 3fr;
}
.box-form_join {
    padding: 3em 4em;
    background: #fff;
    border: 1px solid #f8f8f8;
    border-radius: 20px;
    box-shadow: 0 0px 16px 6px rgb(0 0 0 / 4%);
}
.box-form_join input {
    border-radius: 50px !important;
    padding: 10px 30px !important;
}
.box-form_join form.fluent_form_2 .ff-btn-submit {
    background: #df5936;
    padding: 10px 20px;
    color: #fff;
    border-radius: 50px;
}
.box-form_join .fluentform .ff_upload_btn.ff-btn {
    background: #ffffff;
    padding: 6px 20px;
    color: #df5936;
    border-radius: 50px;
    border: 1px solid #df5936;
}
.box-form_join .fluentform .ff-el-input--label label {
    font-weight: 500;
    font-size: 18px;
    padding-bottom: 6px;
}
.box-form_join h2 {
    background: #df5936;
    padding: 10px 25px;
    display: flex;
    color: #fff;
    border-radius: 50px;
    align-items: center;
    font-weight: 300;
    display: inline-block;
    margin-bottom: 20px;
    font-size: 23px;
}
.box-form_join .title-head {
    text-align: center;
}
.form-sign {
    display: grid;
    grid-template-columns: 2fr 3fr;
    grid-gap: 2em;
}
.form-sign .box-title h3 {
    font-size: 23px;
    background: #df5936;
    padding: 10px 25px;
    color: #fff;
    border-radius: 50px;
    font-weight: 300;
    margin-bottom: 0;
    display: inline-block;
}
.form-sign .detail p {
    font-size: 15px;
    font-weight: 500;
}
.form-sign .detail p i {
    color: #df5936;
    font-size: 21px;
    padding-right: 7px;
}
.form-sign .detail {
    display: grid;
    grid-gap: 8px;
}
.form-sign .detail h4 {
    margin: 0;
    color: #df5936;
    font-weight: 600;
    text-decoration: underline;
    font-size: 20px;
}
.form-sign .box-title > div {
    padding-bottom: 30px;
}
.form-sign img {
    max-width: 300px;
}
.form-sign .detail p.cont {
    font-size: 14px;
}
.cont a {
    color: #df5936;
    font-weight: 600;
    font-size: 18px;
    text-decoration: underline;
}
.form-sign .ff-message-success {
    padding: 15px;
    margin-top: 10px;
    position: relative;
    border: 1px solid #ced4da;
    box-shadow: 0 1px 5px rgb(0 0 0 / 10%);
    background: #4cc34a;
    color: #fff;
    text-align: center;
    font-size: 15px;
}
.ff-el-group.email_author {
    display: none;
}
@media (max-width: 991.98px) {
    .form-sign {
    grid-template-columns: 1fr 2fr;
    grid-gap: 1em;
    }
    .box-form_join {
        padding: 2em 1.5em;
    }
    .box-form_join h2 {
    font-size: 18px;
    }
    .box-form_join .fluentform .ff-el-input--label label {
        font-size: 15px;
    }
    .box-form_join .fluentform .ff_upload_btn.ff-btn {
    font-size: 14px;
    }
    .form-sign .box-title h3 {
        font-size: 18px;
    }
    .form-sign .detail p {
        font-size: 14px;
    }
    .form-sign .detail p i {
        font-size: 16px;
    }
    .form-sign .detail h4 {
        font-size: 18px;
    }
    .form-sign .box-title > div {
        padding-bottom: 20px;
    }
}
@media (max-width: 575.98px) {
    .form-sign {
        grid-template-columns: 1fr;
        grid-gap: 1em;
    }
    .form-sign .detail h4 {
        font-size: 16px;
    }
    .cont a {
        font-size: 16px;
    }
}

</style>