<?php
  /* Template Name: Search*/
  get_header();
  if($_GET['search-check'] == 'passed'){
      if($_GET['search_text']){
        $search_text = $_GET['search_text'];
      }else{
        $search_text = '';
      }
    
    $type_job = $_GET['type_job'];
    $position_job = $_GET['position_job'];
    $practice_facility = $_GET['practice_facility'];
  }
?>
<div class="main-archive_job archive search-job-main">
    <div class="s-container">
        <div class="main-object">       
            <div class="side-bar_job">
                <div class="seach-box_cat">
                <h3 class="head-tax"><i class="las la-arrow-right"></i> <?php esc_html_e( 'คำที่ต้องการค้นหา: ', 'Job989' ); ?> <?php if($search_text){echo $search_text;}else{ echo 'คุณยังไม่ได้กรอกคำค้นหา'; } ?></h3>
                <?php if($type_job): ?>
                    <h3 class="head-tax"><i class="las la-arrow-right"></i>
                    <?php esc_html_e( 'งานแยกตามประเภทงาน: ', 'Job989' ); ?> 
                    <?php 
                                $type_text = get_term_by('slug', $type_job, 'type_job');
                                echo $type_text->name; ?></h3>
               
                <?php endif; ?>
                <?php if($position_job): ?>
                    <h3 class="head-tax"><i class="las la-arrow-right"></i>
                    <?php esc_html_e( 'งานแยกตามตำแหน่ง: ', 'Job989' ); ?> 
                    <?php 
                                $position_job_text = get_term_by('slug', $position_job, 'position_job');
                                echo $position_job_text->name; ?></h3>
         
                <?php endif; ?>
                <?php if($practice_facility): ?>
                    <h3 class="head-tax"><i class="las la-arrow-right"></i>
                    <?php esc_html_e( 'สถานที่ปฏิบัติงาน: ', 'Job989' ); ?> 
                    <?php 
                                $practice_facility_text = get_term_by('slug', $practice_facility, 'practice_facility');
                                echo $practice_facility->name; ?></h3>
               
                <?php endif; ?>

                <a href="<?php echo get_home_url();?>" class="btn-search"><i class="las la-search"></i> <?php esc_html_e( 'กลับไปหน้าค้นหา', 'Job989' ); ?></a>
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
      
                if ($_GET['type_job']) {
                    $type_job_object	=
                                array(
                                        'taxonomy' => 'type_job',
                                        'field' => 'slug',
                                        'terms' => $_GET['type_job'] ,
                                    
                                );
                    } else {
                    $type_job_object	= "";
                    }
                    if ($_GET['position_job']) {
                        $position_job_object	=
                                    array(
                                            'taxonomy' => 'position_job',
                                            'field' => 'slug',
                                            'terms' => $_GET['position_job'] ,
                                      
                                    );
                        } else {
                        $position_job_object	= "";
                        }
                    if ($_GET['practice_facility']) {
                            $practice_facility_object	=
                                        array(
                                                'taxonomy' => 'practice_facility',
                                                'field' => 'slug',
                                                'terms' => $_GET['practice_facility'] ,
                                                
                            );
                    } else {
                        $practice_facility_object	= "";
                    }
        
                $wp_query = new WP_Query( array(
                    'posts_per_page'    => 12,
                    'post_type'         => 'job-list',
                    'order'             => 'DESC',
                    'orderby'           => 'date',
                    'paged' => $paged,
                    's' => $search_text,
                    'tax_query' => array(
                        'relation' => "AND",$type_job_object,$position_job_object,$practice_facility_object	),  
                ) );
                $count = $wp_query->found_posts;
                ?>
            <div class="head-tax_box">
                <div class="title_s">
                    <h2 class="head-tax"><i class="las la-angle-right"></i> <?php esc_html_e( 'คำที่ต้องการค้นหา: ', 'Job989' ); ?> <?php if($search_text){echo $search_text;}else{ echo 'คุณยังไม่ได้กรอกคำค้นหา'; } ?></h2>      
                    <?php if($type_job): ?>
                    <h5 class="head-tax"><i class="las la-arrow-right"></i>
                    <?php esc_html_e( 'งานแยกตามประเภทงาน: ', 'Job989' ); ?> 
                    <?php 
                                $type_text = get_term_by('slug', $type_job, 'type_job');
                                echo $type_text->name; ?></h5>
               
                <?php endif; ?>
                <?php if($position_job): ?>
                    <h5 class="head-tax"><i class="las la-arrow-right"></i>
                    <?php esc_html_e( 'งานแยกตามตำแหน่ง: ', 'Job989' ); ?> 
                    <?php 
                                $position_job_text = get_term_by('slug', $position_job, 'typeposition_job_job');
                                echo $position_job_text->name; ?></h5>
         
                <?php endif; ?>
                <?php if($practice_facility): ?>
                    <h5 class="head-tax"><i class="las la-arrow-right"></i>
                    <?php esc_html_e( 'สถานที่ปฏิบัติงาน: ', 'Job989' ); ?> 
                    <?php 
                                $practice_facility_text = get_term_by('slug', $practice_facility, 'practice_facility');
                                echo $practice_facility->name; ?></h5>
               
                <?php endif; ?>
                </div>
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
                        wp_reset_postdata();
                         ?>
                        </div>
                        <?php seed_posts_navigation(); 
                        ?>
                    </div>
                </div>
                <div class="filter-icon">
                    <a href="<?php echo get_home_url(); ?>"><i class="las la-search"></i> <span class="text-filter"><?php esc_html_e( 'ค้นหา', 'Job989' ); ?></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script >
                            jQuery(document).ready(function($) { 
                                // $(".custom-options span.custom-option").addClass("selection");
                                $.cookie('textsearchx', '<?php echo $type_job; ?>', { expires: 1 });
                                // $("#<?php echo $type_job; ?>").addClass("selection");
                            });
                        </script>
<?php get_footer(); ?>
