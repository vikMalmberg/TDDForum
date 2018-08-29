<script>
    export default{
        props:['attributes'],

        data(){
            return{
                editing : false,
                body:this.attributes.body
            };
        },
        methods: {
            update() {
                axios.patch('http://127.0.0.1:8000/replies/' + this.attributes.id, {
                    body: this.body
                });

                this.editing=false;
                flash('Updated!');
            }
        }
    }

</script>
