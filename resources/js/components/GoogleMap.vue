<template>
  <div>
    <div>
      <h2>Search and add a pin</h2>
      <label>
        <gmap-autocomplete
          @place_changed="setPlace">
        </gmap-autocomplete>
        <button @click="addMarker">Add</button>
        <button @click="updateMarkers">Update</button>
      </label>
      <br/>

    </div>
    <br>
    <gmap-map
      :center="center"
      :zoom="12"
      style="width:100%;  height: 400px;"
    >
      <gmap-marker
        :key="index"
        v-for="(m, index) in markers"
        :position="m.position"
        @click="center=m.position"
      ></gmap-marker>
    </gmap-map>
  </div>
</template>

<script>
export default {
  name: "GoogleMap",
  data() {
    return {
      // default to Montreal to keep it simple
      // change this to whatever makes sense
      center: { lat: 65.455, lng: 22.264 },
      markers: [],
      places: [],
      currentPlace: null
    };
  },

  mounted() {
    //this.geolocate();
  },

  methods: {
    updateMarkers() {
      if (localStorage.getItem('textlog')){
        try {
          var logData = [];
          logData = JSON.parse(localStorage.textlog);
          console.log(logData);
          logData.forEach(element => {
            console.log('new marker');
            this.addNewMarker(parseFloat(element.location.latitude), parseFloat(element.location.longitude));
          });
        } catch(e) {
          console.log(e);

          //localStorage.removeItem('etextlog');
        }
      }
    },
    // receives a place object via the autocomplete component
    setPlace(place) {
      this.currentPlace = place;
    },
    addMarker() {
      if (this.currentPlace) {
        const marker = {
          lat: this.currentPlace.geometry.location.lat(),
          lng: this.currentPlace.geometry.location.lng()
        };
        this.markers.push({ position: marker });
        this.places.push(this.currentPlace);
        this.center = marker;
        this.currentPlace = null;
      }
    },
    addNewMarker(latitude, longitude) {
        const marker = {
          lat: latitude,
          lng: longitude
        };
        this.markers.push({ position: marker });
    },
    geolocate: function() {
      navigator.geolocation.getCurrentPosition(position => {
        this.center = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
      });
    }
  }
};
</script>