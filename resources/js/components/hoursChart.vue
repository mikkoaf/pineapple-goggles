<template>
    <div>
        <v-chart v-bind:chartData="hoursChart"></v-chart>
    </div>
</template>

<script>
    import { mapState, mapGetters } from 'vuex';

    export default {
        name: 'hoursChart',
        data: function ( hours ) {
            return {
                hoursChart: {
                    chartType: 'vBarChart',
                    selector: 'hoursChart',
                    title: 'Favorite Hours',
                    width: 1200,
                    height: 200,
                    metric: 'count',
                    data: [],
                },
            }

        },
        components: {

        },

        computed: {
            ...mapState("textlocation",
                ["hours"]
            ),
            ...mapGetters("textlocation",
                ["allHours"]
            ),

        },

        methods: {

        },
        watch: {
            hours: function ( val ) {
                this.hoursChart.data = val
            }

        },
    }

</script>


<style scoped>

</style>

