Vue.component('featured-example', {
    /**
     * The component's data.
     */
    data() {
        return {
            featuredPosition: null
        };
    },

    /**
     * The component has been created by Vue.
     */
    created() {
        this.getFeaturedPosition();
    },

    methods: {
        /**
         * Get the featured position
         */
        getFeaturedPosition() {
            this.$http.get('/positions/get_featured')
                .then(response => {
                    this.featuredPosition = response.data.position;
                });
        },
    },

    computed: {
        more() {
            return '/position/' + this.featuredPosition.id;
        }
    }
});