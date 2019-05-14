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
    import {mapState} from 'vuex';

    export default {
        name: "GoogleMap",
        data() {
            return {
                // default to Montreal to keep it simple
                // change this to whatever makes sense
                center: {lat: 65.455, lng: 22.264},
                markers: [],
                places: [],
                currentPlace: null
            };
        },

        mounted() {
            //this.geolocate();
        },
        computed: {
            ...mapState("textlocation",
                ["locations"]
            ),
        },
        watch: {
            locations: function (val) {
                this.updateMarkers(val)
            }

        },
        methods: {
            updateMarkers(val) {
                val.forEach(element => {
                    this.addNewMarker(element);
                });
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
                    this.markers.push({position: marker});
                    this.places.push(this.currentPlace);
                    this.center = marker;
                    this.currentPlace = null;
                }
            },
            addNewMarker(locationElement) {
                const location = {
                    lat: parseFloat(locationElement.latitude),
                    lng: parseFloat(locationElement.longitude),
                };
                const label = {
                    text: String(locationElement.person_id + locationElement.timestamp),
                    color: 'white',
                    fontWeight: 'bold',
                };
                const marker = {
                    position: location,
                    label: label
                    // icon: locationElement.image
                };
                this.markers.push(marker);
                // TODO: Following logic is not related to adding.
                $(document).on('hover', '#' + locationElement.id, function () {
                    console.log('oo');
                    infowindow.open(this, marker);
                    setTimeout(function () {
                        infowindow.close();
                    }, 5000);
                });
                let infowindow = new google.maps.InfoWindow({
                    content: String(locationElement.id),
                });
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });
                // TODO
            },
        }
    }
</script>
