<template>
    <div>
        <h2>Textlog</h2>

        <button @click="getTextLog">Log data</button>
        <div class="textlog">Lorem</div>
        <ul id="textLog">
            <li v-for="t in test" :value="t.value" :key="t.value">
                <div
                    @mouseover="hover = true"
                    @mouseleave="hover = false"
                    :class="{ highlight: hover }">
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
        mounted() {
            if (localStorage.getItem('textlog')){
                try {
                    this.text = JSON.parse(localStorage.getItem('textlog'))
                } catch(e) {
                    localStorage.removeItem('textlog');
                }
            }
        },
        methods: {
            getTextLog: function () {
                this.text = [
                    'hi',
                    'ho'
                ]
                axios
                .get('/api/text-locations?person-id=1')
                .then(function (response) {
                    localStorage.textlog = JSON.stringify(response.data.data);
                }.bind(this))
                .catch(function (error) {

                });
            },
            updateMessage: function () {
                this.message = 'updated'
                console.log(this.$el.textContent) // => 'not updated'
                this.$nextTick(function () {
                    console.log(this.$el.textContent) // => 'updated'
                })
            }
        }
    }
</script>

<style scoped>
:hover {
    color: red
}
</style>
