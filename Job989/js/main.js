jQuery(document).ready(function($) { 
  $('.btn-acc_option').on('click', function() {
    $(this).toggleClass('on');
    $('.sub-acc').toggleClass('on');
  });

    let isActive = false;

    $(".toggle").click(function() {
      if (isActive) {
        $('.menu-mobile').removeClass("active");
        $('.menu-mobile').addClass("de-active");
        isActive = false;
      } else {
        $('.menu-mobile').removeClass("de-active");
        $('.menu-mobile').addClass("active");
        isActive = true;
      }
    });

    
    $('.toggle').on('click', function() {
      // $(this).toggleClass('on');
      $('.toggle').toggleClass('on');
    //   $('.mobile-box').toggleClass('on');
    });
    
    /*tab mobile*/
    $('.guest-title[data-tab="1"]').addClass('active');
    $('.guest-menu[data-tab="1"]').addClass('active');
    $('.guest-title').on('click', function() {
    var tabName = $(this).data('tab'),
       tab = $('.guest-menu[data-tab="'+tabName+'"]');
    
    $('.guest-title.active').removeClass('active');
    $(this).addClass('active');
    
    
    $('.guest-menu.active').removeClass('active');
    tab.addClass('active');
 });

 $('span.click-organization').on('click', function() {
    // $(this).toggleClass('on');
    $('.link-organization').addClass('active');
    $('.link-guest').addClass('active');
    $('nav#site-organization').addClass('active');
    $('nav#site-nav-d').addClass('active');   
  });
  $('span.click-guest').on('click', function() {
    // $(this).toggleClass('on');
    $('.link-organization').removeClass('active');
    $('.link-guest').removeClass('active');
    $('nav#site-organization').removeClass('active');
    $('nav#site-nav-d').removeClass('active');      
  });

  $(".custom-select").each(function() {
    var classes = $(this).attr("class"),
        id      = $(this).attr("id"),
        name    = $(this).attr("name");
    var template =  '<div class="' + classes + '">';
        template += '<span id="'+ id +'" class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
        template += '<div class="custom-options">';
        template += '<div class="box-options">';
        $(this).find("option").each(function() {
          template += '<span id="'+ $(this).attr("value") + '" class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
        });
    template += '</div></div></div>';
    
    $(this).wrap('<div class="custom-select-wrapper"></div>');
    $(this).hide();
    $(this).after(template);
  });
  $(".custom-option:first-of-type").hover(function() {
    $(this).parents(".custom-options").addClass("option-hover");
  }, function() {
    $(this).parents(".custom-options").removeClass("option-hover");
  });
  $(".custom-select-trigger").on("click", function() {
    $('html').one('click',function() {
      $(".custom-select").removeClass("opened");
    });
    $(this).parents(".custom-select").toggleClass("opened");
    event.stopPropagation();
  });
  $(".custom-option").on("click", function() {
    $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
    $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
    $(this).addClass("selection");
    $(this).parents(".custom-select").removeClass("opened");
    $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
  });

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

var textsearchx = $.cookie("textsearchx");
title_name = '#' + textsearchx;
$(title_name).addClass("selection");

});

