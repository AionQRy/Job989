<?php
  /* Template Name: Page Search Salary*/
  get_header();
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
<div class="tempate-box" style="background: url('/wp-content/uploads/2021/05/7-scaled.jpg');">
    <div class="s-container">
        <div class="main-salary">
        <div class="content-form">
          <div class="box-form">
            <div class="box-range">
              <h3><i class="las la-search-dollar"></i> <?php echo esc_html__( 'กำหนดช่วงราคาที่ต้องการจะค้นหา', 'Job989' ); ?></h3>
              <form method="get" id="rangeformprice" action="<?php echo esc_url( get_home_url() . '/'.'page-result/'  ); ?>">
              <div class="price-range-block">
                    <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                    <div class="box-number_price">
                        <div class="one-price">
                            <input type="number" min=0 max="990000" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" name="min_price" />
                        </div>
                        <div class="two-price">
                            <input type="number" min=0 max="1000000" oninput="validity.valid||(value='0');" id="max_price" class="price-range-field" name="max_price" />
                        </div>
                    </div>
                    <div id="searchResults" class="search-results-block"></div>
                    <div class="box-go_search">                                        
                        <input type="hidden" name="priceproject" value="confirm" />
                        <button class="price-range-search" id="price-range-submit"><i class="las la-search"></i><?php echo esc_html__( 'ค้นหาผู้ใช้', 'Job989' ); ?></button>
                    </div>
                </div>
              </form>
            </div>
          </div>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        
          <script>
          jQuery(document).ready(function($) {
            // $('#price-range-submit').hide();

$("#min_price,#max_price").on('change', function () {

  $('#price-range-submit').show();

  var min_price_range = parseInt($("#min_price").val());

  var max_price_range = parseInt($("#max_price").val());

  if (min_price_range > max_price_range) {
    $('#max_price').val(min_price_range);
  }

  $("#slider-range").slider({
    values: [min_price_range, max_price_range]
  });

});


$("#min_price,#max_price").on("paste keyup", function () {            
  $('#price-range-submit').show();

  var min_price_range = parseInt($("#min_price").val());

  var max_price_range = parseInt($("#max_price").val());

  if(min_price_range == max_price_range){

    max_price_range = min_price_range + 100;

    $("#min_price").val(min_price_range);		
    $("#max_price").val(max_price_range);
  }

  $("#slider-range").slider({
    values: [min_price_range, max_price_range]
  });

});


$(function () {
  $("#slider-range").slider({
    range: true,
    orientation: "horizontal",
    min: 0,
    max: 1000000,
    values: [0, 1000000],
    step: 100,

    slide: function (event, ui) {
      if (ui.values[0] == ui.values[1]) {
        return false;
      }

      $("#min_price").val(ui.values[0]);
      $("#max_price").val(ui.values[1]);
    }
  });

  $("#min_price").val($("#slider-range").slider("values", 0));
  $("#max_price").val($("#slider-range").slider("values", 1));

});

$("#slider-range,#price-range-submit").click(function () {

  var min_price = $('#min_price').val();
  var max_price = $('#max_price').val();
  // Create our number formatter.
    var formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'thb',
    });

  $("#searchResults").text("จำนวนเงินเดือน " + formatter.format(min_price) +" "+ "ถึง" + " "+ formatter.format(max_price) + "");
});
          });
          </script>
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
