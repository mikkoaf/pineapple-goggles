<template>
    <div id="app">

        <div class="container-fluid">
            <div class="row">
                <header />
            </div>
            <div class="row">
                <router-view></router-view>
            </div>
            <div class="row">
                <google-map />
            </div>
        </div>
    </div>
</template>

<script>
    import header from './Header.vue'
    import GoogleMap from "./GoogleMap";
    export default {
        name: 'app',
        components:{
            header, GoogleMap
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
