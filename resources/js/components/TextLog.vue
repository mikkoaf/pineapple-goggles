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
                // TODO: refactor this hole thing to use the text-endpoint
                axios.get('/api/text-locations?person-id=1')
                .then(function (response) {
                    localStorage.textlog = JSON.stringify(response.data.data);
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
