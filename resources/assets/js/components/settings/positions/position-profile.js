Vue.component('position-profile', {
    /**
     * The component's data.
     */
    data() {
        return {
            loading: false,
            position: null,
            department: null,
            error: null,
        };
    },

    /**
     * The component has been created by Vue.
     */
    created() {
        var self = this;

        this.$parent.$on('showPositionProfile', function(id) {
            self.getPositionProfile(id);
        });

        this.$on('navigateToDepartment', function() {
            self.showDepartment();
        });
    },

    methods: {
        /**
         * Get the position profile.
         */
        getPositionProfile(id) {
            this.loading = true;
            this.error = null;

            this.$http.get('/settings/position/' + id + '/position_profile')
                .then(response => {
                    if ( response.data.position && response.data.department ) {
                        this.position = response.data.position;
                        this.department = response.data.department;
                        this.loading = false;
                    } else if ( response.data.error ) {
                        this.error = response.data.error;
                        this.position = null;
                        this.department = null;
                        this.loading = false;
                    }
                });
        },

        /**
         * Show the department profile and hide the position profile.
         */
        showDepartment() {
            this.$parent.$emit('showDepartment', this.department);

            this.position = null;
        }
    }
});
