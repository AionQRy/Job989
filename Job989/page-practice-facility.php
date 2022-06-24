<?php
  /* Template Name: Practice Facility*/
  get_header();
?>
<div class="main-archive_company taxpage">
 <div class="s-container">
     <div class="main-object">       
         <div class="object-detail">
            <div class="line-box">
                <h2 class="company-head"><i class="las la-angle-double-right"></i> <?php esc_html_e( 'สถานที่ปฏิบัติงาน', 'Job989' ); ?></h2>
            </div>            
            <div class="home-location">
                    <?php 
                            $args = array (
                                'taxonomy' => 'practice_facility', //empty string(''), false, 0 don't work, and return empty array
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'number' => false,
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
                                <?php
                            }
                            ?>	
                    </div>
     </div>
 </div>
</div>
<?php get_footer(); ?>