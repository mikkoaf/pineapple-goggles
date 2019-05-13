<template>
    <div>
        <h2>Textlog</h2>
        <ul id="textLog" v-for="t in texts" :key="t.value">
            <text-message
                :date="t.date"
                :time="t.time"
                :person="t.person_name"
                :message="t.message"
            ></text-message>
        </ul>
    </div>
</template>

<script>
    import TextMessage from './TextMessage'
    import { mapState } from 'vuex';

    export default {
        data: function () {
            return {
                listAllTexts: [],
            }

        },

        components: {
            TextMessage
        },

        computed: {
            ...mapState("textlocation",
                ["texts"]
            )
        },

        methods: {
            updateAllTexts: async function (getters) {
                return getters.allTexts
            }
        }
    }
</script>

<style scoped>

body {
    background-color: #eeeeee;
}
</style>
