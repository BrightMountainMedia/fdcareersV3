Vue.component('positions', {
    props: ['positions', 'departments'],

    /**
     * The component's data.
     */
    data() {
        return {
            showingState: false,
        };
    },

    /**
     * The component has been created by Vue.
     */
    created() {
        //
    },

    events: {
        /**
         * Show the search results and hide the department profile.
         */
        showPositions() {
            this.showPositions();
        },

        /**
         * Handle the Spark tab changed event.
         */
        sparkHashChanged(hash, parameters) {
            if (hash != 'state') {
                return true;
            }

            if (parameters && parameters.length > 0) {
                this.loadState({ id: parameters[1] });
            } else {
                this.showPositions();
            }

            return true;
        }
    },

    methods: {
        /**
         * Show the positions.
         */
        showPositions() {
            history.pushState(null, null, '/positions');

            this.showingState = false;
        },

        /**
         * Show the department profile for the given department.
         */
        showState(state) {
            history.pushState(null, null, '#/state/' + state);

            this.loadState(state);
        },

        /**
         * Load the department profile for the given department.
         */
        loadState(state) {
            this.$broadcast('showState', state);

            this.showingState = true;
        }
    }
});
