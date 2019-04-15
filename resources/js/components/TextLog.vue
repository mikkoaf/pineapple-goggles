<template>
    <div>
        <h2>Textlog</h2>

        <button @click="getTextLocationLog">Log data</button>
        <div class="textlog">Lorem</div>
        <ul id="textLog">
            <li v-for="t in test" :value="t.value" :key="t.value">
                <div
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
            message: 'not updated'
            }
        },
        methods: {
            getTextLocationLog: function () {
                this.text = [
                    'hi',
                    'ho'
                ]
                axios
                .get('/api/text-locations?person-id=1')
                .then(function (response) {
                    this.test = response.data.data;
                    console.log(response.data.data);
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

</style>
