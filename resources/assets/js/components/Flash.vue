<template>
    <div class="alert alert-primary alert-flash" role="alert" v-show="show">
        {{ body }}
    </div>
</template>

<script>
    export default {
        props:['message'],

        data() {
            return {
                body: '',
                show: false
            }
        },

        created() {
            if(this.message){
                this.flash(this.message);


            }
            // on a flash event , we take the parameter
            // and call the flash method with it.
            window.events.$on('flash', message => this.flash(message));
        },

        methods: {
            flash(message) {
                this.body = message;
                this.show=true;

                this.hide();
            },

            hide() {
                setTimeout(() => {
                    this.show=false;
                 },3000);
            }
        }
    }
</script>



<style>
    .alert-flash {
        position:fixed;
        right: 25px;
        bottom: 25px;
    }

</style>
