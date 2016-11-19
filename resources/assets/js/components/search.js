Vue.component('search-page', {

    /**
     * The component's data.
     */
    data() {
        return {
            position: null
        };
    },

    /**
     * The component has been created by Vue.
     */
    created() {
        var self = this;

        this.$http.get('/positions/get_featured')
            .then(response => {
                self.position = response.data.position;
            });
    },

    /**
     * Prepare the component.
     */
    mounted() {
        //
    },

    computed: {
        href() {
            if ( this.position ) {
                return "http://fdcareers.dev/position/" + this.position.id + "/featured";
            }
        },

        title() {
            if ( this.position ) {
                return this.position.title;
            }
        },

        details() {
            if ( this.position ) {
                return this.position.application_details.replace(/(<([^>]+)>)/ig,"").substring(0, 100) + '...';
            }
        }
    }
});