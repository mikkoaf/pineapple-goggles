<template>
    <div id="app">

        <div class="container-fluid">
            <div class="row">
                <header></header>
            </div>
            <div class="row">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
    import header from './Header.vue'
    export default {
        name: 'app',
        components:{
            header
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
