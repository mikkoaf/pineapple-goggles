<template>
    <div>
        <v-chart v-bind:chartData="HistoryChart"></v-chart>
    </div>
</template>

<script>
    import { mapState, mapGetters } from 'vuex';

    export default {
        name: 'hoursChart',
        data: function ( ) {
            return {
                HistoryChart: {
                    chartType: 'vBarChart',
                    selector: 'HistoryChart',
                    title: 'History',
                    width: 1200,
                    height: 200,
                    metric: 'count',
                    legends: {
                        enabled: true,
                        height: 25,
                        width: 50,
                    },
                    label: true,
                    data: [],
                },
            }

        },
        components: {

        },

        computed: {
            ...mapState("textlocation",
                ["texthistory"]
            ),
            ...mapGetters("textlocation",
                ["allHistory"]
            ),

        },

        methods: {

        },
        watch: {
            texthistory: function ( val ) {
                this.HistoryChart.data = val
            }

        },
    }

</script>


<style scoped>

</style>

