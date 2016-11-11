Vue.component('dashboard', {
	props: ['user'],

    /**
     * The component's data.
     */
    data() {
        return {
            //
        };
    },

    /**
     * The component has been created by Vue.
     */
    created() {
        //
    },

    methods: {
        /**
         * Add this position to the dashboard.
         */
        removeSaved(position) {
            this.$http.post('/position/' + position.id + '/remove_from_dashboard')
                .then(response => {
                    window.location.reload();
                });
        },

        /**
         * Mark this position as applied.
         */
        removeApplied(position) {
            this.$http.post('/position/' + position.id + '/remove_applied')
                .then(response => {
                    window.location.reload();
                });
        },

        /**
         * Add this position to the dashboard.
         */
        goToPosition(position) {
            window.location.href = '/position/' + position.id;
        }
    }
});