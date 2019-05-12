<template>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <router-view></router-view>
            </div>
            <div>
                <d3graph />
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
    import D3Graph from "./D3Graph";
    /* import DataLoader from "./Dataloader"; */
    export default {
        name: 'app',
        components:{
           /* DataLoader, */ GoogleMap, TextLog, D3Graph,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
