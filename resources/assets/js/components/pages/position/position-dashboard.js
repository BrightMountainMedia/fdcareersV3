Vue.component('position-dashboard', {
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
        addToDashboard(position) {
            this.$http.put('/position/' + position.id + '/save_to_dashboard')
                .then(response => {
                    console.log(response.data.saved);
                    window.location.reload();
                });
        },

        /**
         * Mark this position as applied.
         */
        markApplied(position) {
            this.$http.put('/position/' + position.id + '/mark_applied')
                .then(response => {
                    console.log(response.data.applied);
                    window.location.reload();
                });
        }
    }
});
