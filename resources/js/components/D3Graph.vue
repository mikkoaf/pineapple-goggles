<template>
    <div>
        <v-chart v-bind:chartData="hoursChart"></v-chart>
        {{allHours}}
    </div>
</template>

<script>
    import TextMessage from './TextMessage'
    import { mapState, mapGetters } from 'vuex';
    import Chart from '../v-chart-plugin.js'

    export default {
        name: 'D3Graph',
        data: function (  ) { //}, texthistory) {
            return {
                hoursChart: {
                    chartType: 'barChart',
                    selector: 'chart',
                    title: 'Favorite Hours',
                    width: 300,
                    height: 200,
                    data: [2, 3, 4],
                },
                /*
                texthistoryChart: {
                    chartType: 'barChart',
                    selector: 'chart',
                    title: 'Text History',
                    width: 300,
                    height: 200,
                    data: texthistory
                }
                */
            }

        },
        components: {

        },

        computed: {
            ...mapState("textlocation",
                ["hours", "texthistory"]
            ),
            ...mapGetters("textlocation",
                ["allHours"]
            )
        },

        methods: {

        }
    }

/* OLD CODE
    REFACTOR REACT TO VUE

<div id="date">1970-01-01</div>
<button type="button" class="interact" id="previous">Previous gameday</button>
<button type="button" class="interact" id="next">Next gameday</button>
<div class="row">
    <div id="teams" class="col-6"></div>
    <div id="matches" class="col-6"></div>
</div>
<svg id="attendance" class='chart'></svg>

<script>

    // todo: breaks at last dates

    var visualizationGameday = 0;
    var visualizationArenas = null;
    var visualizationTeamStandings = {};


    $( "#previous").click(function() {
        var requestDay = visualizationGameday;
        make_loads(requestDay,-1);
    });

    $( "#next").click(function() {
        var requestDay = visualizationGameday;
        make_loads(requestDay, 1);
    });

    async function make_loads(requestDay, direction) {
        var dailyPoints = await load_day_scores(requestDay, direction);
        update_standings(dailyPoints, direction);
        var visitorData = await load_visitor_data(requestDay, direction);
        list_teams(dailyPoints[Object.keys(dailyPoints)[Object.keys(dailyPoints).length - 1]]['thedate']);
        list_matches(visitorData);
        draw_graphs(visitorData);
        visitorData.forEach( function(team) {
            //clickByClass("."+team['hometeamslug']);
            hoverByClass("."+team['hometeamslug']);
        });
    }

    /*
    * Score loading functions
    * Disabling buttons to enforce safety
    *

    async function load_day_scores(day, direction){
        $(".interact").attr("disabled", true);
        if (direction > 0) {
            var results = await $.get(
                'http://127.0.0.1:5001/api/v1/mestis/teams/results/next',
                { type: 'GET',
                    timestamp: day}
            );
        } else {
            var results = await $.get(
                'http://127.0.0.1:5001/api/v1/mestis/teams/results/previous',
                { type: 'GET',
                    timestamp: day}
            );
        }
        if (results[results.length - 1]['thedate'] != null ) {
            visualizationGameday = results[results.length - 1]['thedate'];
        }
        $('#date').text(visualizationGameday);
        $(".interact").attr("disabled", false);
        return results;
    }

    async function load_visitor_data(day, direction) {
        if ( direction > 0){
            var data = await $.get(
                'http://127.0.0.1:5001/api/v1/mestis/matches/next',
                { type: 'GET',
                    timestamp: day}
            );
        } else {
            var data = await $.get(
                'http://127.0.0.1:5001/api/v1/mestis/matches/previous',
                { type: 'GET',
                    timestamp: day}
            );
        }
        var datalist = [];
        if (visualizationArenas == null) {
            visualizationArenas = await list_arenas();
        }
        arenas = visualizationArenas;

        for (let match of data[0]) {
            let arena = arenas.find(a => a.hometeam === match['matches'][0]['teams'][0]['name']);
            datalist.push(
                {
                    hometeam: match['matches'][0]['teams'][0]['name'],
                    awayteam: match['matches'][0]['teams'][1]['name'],
                    arena: arena['arena'],
                    attendance: match['matches'][0]['stats']['attendance'],
                    hometeamslug: match['matches'][0]['teams'][0]['name'].replace(/\s+/g, ''),
                    score: match['matches'][0]['teams'][0]['score']['now'] + "-" + match['matches'][0]['teams'][1]['score']['now']
                }
            );
        }
        return datalist;
    }


    async function list_arenas() {
        var data = await $.get(
            'http://127.0.0.1:5001/api/v1/mestis/teams',
            { type: 'GET' }
        );
        var arenalist = [];
        for (let team of data) {
            if ('homeArena' in team['team']['meta']['directives']){
                var name = team['team']['meta']['directives']['homeArena'];
            } else if ('homeAreena' in team['team']['meta']['directives']) {
                var name = team['team']['meta']['directives']['homeAreena'];
            } else {
                var name = "Unknown Arena";
            }
            arenalist.push(
                { arena: name,
                    hometeam: team['team']['name']
                });
            arenalist = arenalist.sort();
        }
        return arenalist;
    }

    async function get_teams() {
        var results = await $.get(
            'http://127.0.0.1:5001/api/v1/mestis/teams',
            { type: 'GET' });
        return results;
    }

    function get_stadiums() {
        $.get(
            'http://127.0.0.1:5001/api/v1/mestis/teams',
            { type: 'GET' },
            function(data, status ) {
                for (let team of data){
                    var node = document.createElement("div");
                    if ('homeArena' in team['team']['meta']['directives']){
                        var name = document.createTextNode(team['team']['meta']['directives']['homeArena']);
                    } else if ('homeAreena' in team['team']['meta']['directives']) {
                        var name = document.createTextNode(team['team']['meta']['directives']['homeAreena']);
                    } else {
                        var name = "Unknown Arena";
                    }
                    var points = document.createTextNode(team['team']['meta']['directives']['city']);
                    node.appendChild(name);
                    node.appendChild(points);
                    document.getElementById("stadiums").appendChild(node);
                }
            });
    }

    // Use anonymous function to pass parameters for the listener
    document.addEventListener("DOMContentLoaded", function(){make_loads(0,1)});

    //set up chart
    var margin = {top: 20, right: 20, bottom: 95, left: 50};
    var width = 800;
    var height = 500;

    var chart = d3.select(".chart")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    var xChart = d3.scaleBand()
        .range([0, width]);

    var yChart = d3.scaleLinear()
        .range([height, 0]);

    var xAxis = d3.axisBottom(xChart);
    var yAxis = d3.axisLeft(yChart);

    //set up axes
    //left axis
    chart.append("g")
        .attr("class", "y axis")
        .call(yAxis)

    //bottom axis
    chart.append("g")
        .attr("class", "xAxis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis)
        .selectAll("text")
        .style("text-anchor", "end")
        .attr("dx", "-.8em")
        .attr("dy", ".15em")
        .attr("transform", function(d){
            return "rotate(-65)";
        });

    //add labels
    chart
        .append("text")
        .attr("transform", "translate(-35," +  (height+margin.bottom)/2 + ") rotate(-90)")
        .text("Visitors");

    chart
        .append("text")
        .attr("transform", "translate(" + (width/2) + "," + (height + margin.bottom - 5) + ")")
        .text("Arena");

    // go through the data and print it on the screen

    const clearDOMElement = function(elementID) {
        var myNode = document.getElementById(elementID);
        while (myNode.firstChild) {
            myNode.removeChild(myNode.firstChild);
        }
    }

    // https://stackoverflow.com/questions/10020881/order-divs-based-on-an-attribute-value-in-jquery

    const list_teams = async function(date) {
        clearDOMElement("teams");
        console.log(visualizationTeamStandings[date]);
        for (let teamkey of Object.keys(visualizationTeamStandings[date])) {
            if (!('team' in visualizationTeamStandings[date][teamkey])){
                continue;
            }
            team = visualizationTeamStandings[date][teamkey];
            var node = document.createElement("div");
            var name = document.createTextNode(team['team'] + ": ");
            var pointsspan = document.createElement('span');
            node.setAttribute('data-points', team['points']);
            var points = document.createTextNode(team['points']);
            node.className = team['team'].replace(/\s+/g, '') + " singleteam";
            pointsspan.appendChild(points);
            node.appendChild(name);
            node.appendChild(pointsspan);
            document.getElementById("teams").appendChild(node);
            // order by scores
        }
        //$('#teams>div').tsort({attr:'data-points'});

        var $wrapper = $('#teams');
        $wrapper.find('div').sort(function (a, b) {
            return +b.getAttribute('data-points') - +a.getAttribute('data-points');
        })
            .appendTo($wrapper);

    }

    const list_matches = async function(matchData) {
        clearDOMElement("matches")
        for (let match of matchData){
            var node = document.createElement("div");
            var name = document.createTextNode(match['hometeam'] + ' vs ' + match['awayteam'] + " : " + match['score']);
            node.className = match['hometeamslug'] + " matchup";
            node.appendChild(name);
            document.getElementById("matches").appendChild(node);
        }
    }

    // http://bl.ocks.org/d3noob/8952219

    const draw_graphs = async function(visitorData){
        //clearDOMElement("attendance");
        //set domain for the x axis
        xChart.domain(visitorData.map(function(d){ return d.arena; }) );
        //set domain for y axis
        yChart.domain( [0, d3.max(visitorData, function(d){ return +d.attendance; })] );

        //get the width of each bar
        var barWidth = width / visitorData.length;

        //select all bars on the graph, take them out, and exit the previous data set.
        //then you can add/enter the new data set
        var bars = chart.selectAll(".bar")
            .remove()
            .exit()
            .data(visitorData);
        //now actually give each rectangle the corresponding data
        bars.enter()
            .append("rect")
            .style("fill", "white")
            .attr("class", function(d){ return d.hometeamslug + " bar"; })
            .attr("x", function(d, i){ return i * barWidth + 1 })
            .attr("y", function(d){ return yChart( d.attendance); })
            .attr("height", function(d){ return height - yChart(d.attendance); })
            .attr("width", barWidth - 1);
        //left axis
        chart.select('.y')
            .call(yAxis)
        //bottom axis
        chart.select('.xAxis')
            .attr("transform", "translate(0," + height + ")")
            .call(xAxis)
            .selectAll("text")
            .style("text-anchor", "end")
            .attr("dx", "-.8em")
            .attr("dy", ".15em")
            .attr("transform", function(d){
                return "rotate(-65)";
            });

    }

    function clickByClass(className) {
        $(className).click(function () {
            $(className).toggleClass("green");
        });
    }

    function hoverByClass(className) {
        $(className).mouseover(function() {
            $(className).each( function(){
                if ($(this).is('rect') ){
                    $(this).css("fill", 'yellow');
                } else {
                    $(this).css("color", 'white');
                    $(this).css("color", 'yellow');
                }
            });

        })
            .mouseleave(function() {
                $(className).each( function(){
                    if ($(this).is('rect') ){
                        $(this).css("fill", 'white');
                    } else {
                        $(this).css("color", 'white');
                    }
                });
            });
    }

    function update_standings(dailyPoints, direction) {
        if (dailyPoints == null ){
            return;
        }
        var thedate = dailyPoints[Object.keys(dailyPoints)[Object.keys(dailyPoints).length - 1]]['thedate'];


        if(direction > 0){
            // if the date does not yet exist
            if (!(thedate in visualizationTeamStandings) && Object.keys(visualizationTeamStandings).length > 0){
                // take the last date available
                lastDates = visualizationTeamStandings[Object.keys(visualizationTeamStandings).reduce((a, b) => a > b ? a : b)]
                // combine the scores for each available team

                var result = {}
                for (let key in Object.keys(lastDates)) {
                    if (!('thedate' in lastDates[key])) {
                        result[key] = {}
                        result[key]['points'] = lastDates[key]['points'] + dailyPoints[key]['points'];
                        result[key]['team'] = lastDates[key]['team']
                    }

                }
                visualizationTeamStandings[thedate] = result;
            } else {
                visualizationTeamStandings[thedate] = dailyPoints;

            }
        }

    }
    */
</script>


<style scoped>

</style>

