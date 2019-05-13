
<template>
    <div class="textmessage">
        <div class="border">
            <div class="inline-block">
                {{ date }}
            </div>
            <div class="inline-block">
                {{ time }}
            </div>
            <div class="inline-block">
                {{ person }}
            </div>
            <div class="inline-block">
                {{ message }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'TextMessage',
        props: {
            date: {
                type: String,
                required: true
            },
            time: {
                type: String,
                required: true
            },
            person: {
                type: String,
                required: true
            },
            message: {
                type: String,
                required: true
            },
        }
    }
</script>

<style scoped>

</style>
