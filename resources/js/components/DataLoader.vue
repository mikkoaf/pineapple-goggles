<template>
    
</template>


<script>
    export default {
        name: "DataLoader",
        methods: {
            getTextLocationLog: function () {
                this.text = [
                    'hi',
                    'ho'
                ]
                axios
                .get('/api/text-locations?person-id=1')
                .then(function (response) {
                    localStorage.textLocationLog = response.data.data;
                    console.log(response.data.data);
                }.bind(this))
                .catch(function (error) {

                });
            },
        }
    }
</script>




