<template>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <router-view></router-view>
            </div>
            <div class="row">
                <google-map />
            </div>
            <div>
                <textlog />
            </div>
        </div>
    </div>
</template>

<script>
    import TextLog from "./TextLog";
    import GoogleMap from "./GoogleMap";
    /* import DataLoader from "./Dataloader"; */
    export default {
        name: 'app',
        components:{
           /* DataLoader, */ GoogleMap, TextLog
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
