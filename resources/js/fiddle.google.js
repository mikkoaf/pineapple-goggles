/* Google Maps */
(function($) {

       
    function add_marker( $marker, map, index ) {
    
        // var
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
        var image = 'http://79.170.40.181/cranes.co.uk/wp-content/uploads/2014/10/pin.png';
    
        // create marker
        var marker = new google.maps.Marker({
            position    : latlng,
            map         : map,
            icon        : image
        });
    
        // add to array
        map.markers.push( marker );
        
        
        // if marker contains HTML, add it to an infoWindow
        if( $marker.html() )
        {
            $('#listdata').append('<div class= "linkage" id="p'+index+'">'+$marker.html()+'</div>'); // change html here if you want but eave id intact!!
             
            $(document).on('click', '#p'+index, function(){
                infowindow.open(map, marker);
                setTimeout(function () { infowindow.close(); }, 5000);
            });
          
            // create info window
            var infowindow = new google.maps.InfoWindow({
                content     : $marker.html(),
            });
            
          
              
    
            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function() {
    
                infowindow.open( map, marker );
    
            });
    
        }
    
        }
    
    
    function center_map( map ) {
    
        // vars
        var bounds = new google.maps.LatLngBounds();
    
        // loop through all markers and create bounds
        $.each( map.markers, function( i, marker ){
    
            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
    
            bounds.extend( latlng );
    
        });
    
        // only 1 marker?
        if( map.markers.length == 1 )
        {
            // set center of map
            alert(bounds);
            map.setCenter( bounds.getCenter() );
            map.setZoom( 16 );
        }
        else
        {
            // fit to bounds
            map.fitBounds( bounds );
        }
    
        }
    
    // Call it
    
    
      $(document).ready(function(){
    
        $('.acf-map').each(function(){
    
            render_map( $(this) );
    
        });
    
    });
    
    
    
    })(jQuery);