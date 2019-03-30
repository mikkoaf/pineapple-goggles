<template>
    <div id="main">
    <Header />

        <div class="content">

            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'app',
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
