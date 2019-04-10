<template>

    <div>
        <h2>Textlog</h2>
        <div class="textlog">Lorem</div>
        <button @click="getTextLocationLog">Log data</button>
    </div>
</template>

<script>
    export default {
        name: "Home",
        methods: {
            getTextLocationLog() {
                axios
                .get('/api/text-locations?person-id=1')
                .then(response => (console.log(response)))
                }
        }
    }
</script>

<style scoped>

</style>
