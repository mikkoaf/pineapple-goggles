<template>
    <div id="map-canvas"></div>
</template>

<script>
    export default {
        name: "Map"
    }

    function show_map() {
        map = new google.maps.Map(document.getElementById("map-canvas"), {
            zoom: 6,
            center: new google.maps.LatLng(62.96737765, 23.52756295),
            mapTypeId: 'terrain'
        });
    }


    google.maps.event.addDomListener(window, 'load', show_map);

</script>

<style scoped>
    #map-canvas{
        width: 500px;
        height: 500px;
    }
</style>
