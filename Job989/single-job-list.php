<?php get_header();
    $post_object = get_field('post_link');
    $location = get_field('location');
    $salary = get_field('salary');
    $rate = get_field('rate');
    $status = get_field('status-job');
?>
<div class="job-list-box">
    <div class="main-job-list">
        <div class="s-container">      
        <?php
        if( $post_object ): 
           
        ?>
        <div class="object-company">
        <?php
        // override $post
            global $post;
        $post = $post_object;
        setup_postdata( $post ); 
        $permalink = get_permalink();
        $title = get_the_title();
        ?>
        <div class="logo-company">
            <div class="img">                       
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
            </div>
        </div>
        <div class="mini-detail">
            <div class="title">
                <h3><?php echo esc_html( $title ); ?></h3>
            </div>
            <div class="link">
                <a href="<?php echo esc_url( $permalink ); ?>"><?php esc_html_e( 'ดูรายละเอียดบริษัท', 'Job989' ); ?></a>
            </div>
        </div>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        </div>
        <?php endif; ?>
        <div class="main-box">
            <div class="box-name">
                <h2><?php echo get_the_title(); ?></h2>
            </div>
            <div class="sub-box">
                <div class="list-box">
                    <h4><i class="las la-map-marker"></i> <?php esc_html_e( 'สถานที่ปฏิบัติงาน', 'Job989' ); ?></h4>
                    <p><?php echo $location; ?></p>
                </div>
                <div class="list-box">
                    <h4><i class="las la-money-bill-alt"></i> <?php esc_html_e( 'เงินเดือน', 'Job989' ); ?></h4>
                    <p><?php echo $salary; ?></p>
                </div>
                <div class="list-box">
                    <h4><i class="las la-user-alt"></i> <?php esc_html_e( 'อัตรา', 'Job989' ); ?></h4>
                    <p><?php echo $rate; ?></p>
                </div>
            </div>
            <?php $post_date = get_the_date( 'j-n-Y' );
            $strDate = $post_date;                    
            ?>
            <div class="date-box">
                <h6><?php echo DateThai($strDate); ?></h6>
            </div>
            <div class="status-job">
                <?php if($status == 'urgently'): ?>
                <h6><?php esc_html_e( 'รับสมัครด่วน', 'Job989' ); ?></h6>
                <?php elseif( $status == 'open'): ?>
                <h6><?php esc_html_e( 'เปิดรับสมัคร', 'Job989' ); ?></h6>
                <?php elseif( $status == 'close '): ?>
                <h6><?php esc_html_e( 'ปิดรับสมัคร', 'Job989' ); ?></h6>
                <?php endif; ?>
            </div>
            <div class="register-job">
                <a href="#sign-job"><i class="las la-plus-square"></i> <?php esc_html_e( 'สมัครงาน', 'Job989' ); ?></a>
            </div>
        </div>
        <div class="share-box">
            <?php
            if(function_exists('seed_social')) {seed_social();}
            ?>
        </div>
        
        <div class="box-detail">
            <?php $property = get_field('property-job'); ?>
            <?php if($property):?>
            <div class="property-job">
                <h3><?php esc_html_e( 'คุณสมบัติผู้สมัคร', 'Job989' ); ?></h3>
                <div class="p-content"><?php echo $property; ?></div>
            </div>
            <?php endif;?>
            <?php $job = get_field('job-description'); ?>
            <?php if($job):?>
            <div class="detail-job">
                <h3><?php esc_html_e( 'รายละเอียดงาน', 'Job989' ); ?></h3>
                <div class="detail"><?php echo $job; ?></div>
            </div>
            <?php endif;?>
            <div class="welfare-job">
                <h3><?php esc_html_e( 'สวัสดิการ', 'Job989' ); ?></h3>      
                <div class="link">
                    <a href="<?php echo esc_url( $permalink ); ?>"><?php esc_html_e( 'ดูข้อมูลสวัสดิการทั้งหมด', 'Job989' ); ?></a>
                </div>
            </div>
            <?php $apply = get_field('how-apply'); ?>
            <?php if($apply):?>
            <div class="how-apply-job">
                <h3><?php esc_html_e( 'วิธีการสมัคร', 'Job989' ); ?></h3>
                <div class="j-content"><?php echo $apply; ?></div>
            </div>
            <?php endif;?>

            <?php $documents = get_field('documents'); ?>
            <?php if($documents):?>
            <div class="how-apply-job">
                <h3><?php esc_html_e( 'เอกสารประกอบการสมัครงาน', 'Job989' ); ?></h3>
                <div class="p-content"><?php echo $documents; ?></div>
            </div>
            <?php endif;?>

            <?php
            if( $post_object ): 
            ?>
            <?php
            // override $post
                global $post;
            $post = $post_object;
            setup_postdata( $post ); 
            $permalink = get_permalink();
            $title = get_the_title();
            ?>
            <?php $contact = get_field('contact-company'); ?>
            <?php if($contact):?>
            <div class="contact-job">
                <h3><?php esc_html_e( 'ติดต่อ', 'Job989' ); ?></h3>
                <div class="p-content"><?php echo $contact; ?></div>
            </div>
            <?php endif;?>
            <?php 
            $map_j = get_field('map-company');
            if( $map_j ): ?>
                <div class="acf-map" data-zoom="16">
                    <div class="marker" data-lat="<?php echo esc_attr($map_j['lat']); ?>" data-lng="<?php echo esc_attr($map_j['lng']); ?>"></div>
                </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>

            <?php if($location):?>
            <div class="do-job">
                <h3><?php esc_html_e( 'สถานที่ปฏิบัติงาน', 'Job989' ); ?></h3>
                <div class="p-content"><p><?php echo $location; ?></p></div>
            </div>
            <?php endif;?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDt-ojn474mQmoUDpm4Z3zGmQk4xi51lho"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) { 

    function initMap( $el ) {

        // Find marker elements within map.
        var $markers = $el.find('.marker');

        // Create gerenic map.
        var mapArgs = {
            zoom        : $el.data('zoom') || 16,
            mapTypeId   : google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map( $el[0], mapArgs );

        // Add markers.
        map.markers = [];
        $markers.each(function(){
            initMarker( $(this), map );
        });

        // Center map based on markers.
        centerMap( map );

        // Return map instance.
        return map;
    }

    function initMarker( $marker, map ) {

        // Get position from marker.
        var lat = $marker.data('lat');
        var lng = $marker.data('lng');
        var latLng = {
            lat: parseFloat( lat ),
            lng: parseFloat( lng )
        };

        // Create marker instance.
        var marker = new google.maps.Marker({
            position : latLng,
            map: map
        });

        // Append to reference for later use.
        map.markers.push( marker );

        // If marker contains HTML, add it to an infoWindow.
        if( $marker.html() ){

            // Create info window.
            var infowindow = new google.maps.InfoWindow({
                content: $marker.html()
            });

            // Show info window when marker is clicked.
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open( map, marker );
            });
        }
    }

    function centerMap( map ) {

        // Create map boundaries from all map markers.
        var bounds = new google.maps.LatLngBounds();
        map.markers.forEach(function( marker ){
            bounds.extend({
                lat: marker.position.lat(),
                lng: marker.position.lng()
            });
        });

        // Case: Single marker.
        if( map.markers.length == 1 ){
            map.setCenter( bounds.getCenter() );

        // Case: Multiple markers.
        } else{
            map.fitBounds( bounds );
        }
    }

    // Render maps on page load.
    $(document).ready(function(){
        $('.acf-map').each(function(){
            var map = initMap( $(this) );
        });
    });

});
</script>
<div id="sign-job" class="sign-job">
        <div class="title">
            <h3><?php esc_html_e( 'เลือกวิธีการสมัครงาน', 'Job989' ); ?></h3>
        </div>
        <div class="button-bx">
        <?php
            if (is_user_logged_in()): 
            global $post;
            $author_id =get_current_user_id();
            $current_user = wp_get_current_user();              
            $allowed_roles = array( 'administrator', 'guest' );
            if ( array_intersect( $allowed_roles, $current_user->roles ) ):
        ?>
            <a href="<?php echo get_home_url();?>/join/?job=<?php echo get_the_ID();?>"><?php esc_html_e( 'ส่งไฟล์ประวัติ', 'Job989' ); ?></a><p class="file-add"><?php esc_html_e( 'สมัครด้วยการส่งไฟล์เรซูเม่ ผลงาน หรืออื่นๆ', 'Job989' ); ?></p>
        <?php else: ?>
            <p><?php esc_html_e( 'สถานะของท่านไม่สามารถลงทะเบียนได้', 'Job989' ); ?></p>
       <?php endif;
        else:  ?>
        <a href="<?php echo get_home_url();?>/login/"><?php esc_html_e( 'เข้าสู่ระบบ', 'Job989' ); ?></a><p class="file-add"><?php esc_html_e( 'ต้องเข้าสู่ระบบเพื่อลงทะเบียน', 'Job989' ); ?></p>
        <?php endif; ?>       
        </div>
</div>
        </div>      
    </div>
</div>
<?php get_footer(); ?>
