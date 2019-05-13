<template>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <router-view></router-view>
            </div>
            <div>
                <hoursChart />
            </div>
            <div>
                <HistoryChart />
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
    import hoursChart from "./hoursChart";
    import HistoryChart from "./HistoryChart";

    export default {
        name: 'app',
        components:{
           GoogleMap, TextLog, hoursChart, HistoryChart
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
