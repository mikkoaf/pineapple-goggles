<template>
    <div>
        <h2>Textlog</h2>

        <button @click="getTextLog">Log data</button>
        <div class="textlog">Lorem</div>
        <ul id="textLog">
            <li v-for="t in test" :value="t.value" :key="t.value">
                <div
                    v-bind:id="t.text.id"
                    @mouseover="hover = true"
                    @mouseleave="hover = false"
                    :class="{
                        'highlight': hover,
                        }
                        ">
                    {{t.text.message_sent}} - {{t.text.person_name}} - {{ t.text.message }}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "TextLog",
        data: function () {
            return {
                hover: false,
                test: []
            }
        },
        methods: {
            getTextLog: function () {
                this.text = [
                    'hi',
                    'ho'
                ];
                axios.get('/api/text-locations')
                .then(function (response) {

                    store.textlocation.commit({
                                    type: 'setTextLocations',
                                    array: JSON.stringify(response.data.data)
                                });
                }.bind(this))
                .catch(function (error) {

                });
                if (localStorage.getItem('textlog')){
                    try {
                        this.test = JSON.parse(localStorage.getItem('textlog'))

                    } catch(e) {
                        localStorage.removeItem('textlog');
                    }
                }
                this.$forceUpdate();
            },
        }
    }
</script>

<style scoped>

body {
    background-color: #eeeeee;
}
</style>
