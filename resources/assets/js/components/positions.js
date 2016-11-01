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
        var self = this;

        this.$parent.$on('showPositions', function() {
            self.showPositions();
        });

        Bus.$on('sparkHashChanged', function (hash, parameters) {
            if (hash != 'positions') {
                return true;
            }

            if (parameters && parameters.length > 0) {
                self.loadState({ id: parameters[0] });
            }  else {
                self.showPositions();
            }

            return true;
        });
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
