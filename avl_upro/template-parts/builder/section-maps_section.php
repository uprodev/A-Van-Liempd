<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="img-text map-text small-p">
    <div class="container">
      <div class="row justify-content-between align-items-center">

        <?php if(!empty($maps_location)): ?>
          <div class="acf-map">
            <div class="marker" data-lat="<?php echo $maps_location['lat']; ?>" data-lng="<?php echo $maps_location['lng']; ?>"></div>
          </div>
        <?php endif; ?>

        <div class="text">

          <?php if ($title): ?>
            <h3><?= $title ?></h3>
          <?php endif ?>

          <?= $text ?>

          <?php if (is_array($links) && checkArrayForValues($links)): ?>
          <ul>

            <?php foreach ($links as $item): ?>
              <?php if ($item['link']): ?>
                <li>
                  <a href="<?= $item['link']['url'] ?>" class="btn btn--secondary btn--with-arrow"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item['link']['title']) ?></a>
                </li>
              <?php endif ?>
            <?php endforeach ?>

          </ul>
        <?php endif ?>

      </div>
    </div>
  </div>
</section>

  <!-- <style type="text/css">

    .acf-map {
      width: 100%;
      height: 400px;
      border: #ccc solid 1px;
      margin: 20px 0;
    }

    .acf-map img {
       max-width: inherit !important;
    }

  </style> -->

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiyT05YehIdz2LrV-QOeRa5M18WfKtlnY"></script> 
  <script type="text/javascript">

    jQuery(document).ready(function($) {

      function new_map( $el ) {

        var $markers = $el.find('.marker');

        var args = {
          zoom    : 16,
          center    : new google.maps.LatLng(0, 0),
          mapTypeId : google.maps.MapTypeId.ROADMAP,
          disableDefaultUI: true,
        };

        var map = new google.maps.Map( $el[0], args);

        map.markers = [];

        $markers.each(function(){

          add_marker( $(this), map );
          
        });

        center_map( map );

        return map;
        
      }

      function add_marker( $marker, map ) {

        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

        var marker = new google.maps.Marker({
          position  : latlng,
          map     : map
        });

        map.markers.push( marker );

        if( $marker.html() )
        {

          var infowindow = new google.maps.InfoWindow({
            content   : $marker.html()
          });

          google.maps.event.addListener(marker, 'click', function() {

            infowindow.open( map, marker );

          });
        }

      }

      function center_map( map ) {

        var bounds = new google.maps.LatLngBounds();

        $.each( map.markers, function( i, marker ){

          var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

          bounds.extend( latlng );

        });

        if( map.markers.length == 1 )
        {
          map.setCenter( bounds.getCenter() );
          map.setZoom( 16 );
        }
        else
        {

          map.fitBounds( bounds );
        }

      }

      var map = null;

      $(document).ready(function(){

        $('.acf-map').each(function(){

          map = new_map( $(this) );

        });

      });
    });

  </script>

  <style type="text/css">

    .acf-map {
      width: 100%;
      height: 400px;
      border: #ccc solid 1px;
      margin: 20px 0;
    }

    .acf-map img {
     max-width: inherit !important;
   }

 </style>

 <?php endif; ?>