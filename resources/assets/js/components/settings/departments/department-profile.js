Vue.component('department-profile', {
    /**
     * The component's data.
     */
    data() {
        return {
            loading: false,
            department: null,
            positions: null,
            scheduled: null,
            inactive: null,
            error: null,
        };
    },

    /**
     * The component has been created by Vue.
     */
    created() {
        var self = this;

        Bus.$on('showDepartmentProfile', function(id) {
            self.getDepartmentProfile(id);
        });
    },

    /**
     * Prepare the component.
     */
    mounted() {
        Mousetrap.bind('esc', e => this.showSearch());
    },

    methods: {
        /**
         * Show the department modal.
         */
        addPosition() {
            Bus.$emit('addPosition', this.department);
        },

        /**
         * Get the department profile.
         */
        getDepartmentProfile(id) {
            this.loading = true;
            this.error = null;
            Mousetrap.bind('esc', e => this.showSearch());

            this.$http.get('/settings/department/' + id + '/department_profile')
                .then(response => {
                    if ( response.data.department && response.data.positions ) {
                        this.department = response.data.department;
                        this.positions = response.data.positions;
                        this.scheduled = response.data.scheduled;
                        this.inactive = response.data.inactive;
                        (this.department.hq_address2) ? this.department.hq_address = this.department.hq_address1 + ', ' + this.department.hq_address2 + ', ' + this.department.hq_city + ', ' + this.department.hq_state + '  ' + this.department.hq_zip : this.department.hq_address = this.department.hq_address1 + ', ' + this.department.hq_city + ', ' + this.department.hq_state + '  ' + this.department.hq_zip;
                        (this.department.mail_address2) ? this.department.mail_address = this.department.mail_address1 + ', ' + this.department.mail_address2 + ', ' + this.department.mail_city + ', ' + this.department.mail_state + '  ' + this.department.mail_zip : this.department.mail_address = this.department.mail_address1 + ', ' + this.department.mail_city + ', ' + this.department.mail_state + '  ' + this.department.mail_zip;
                        this.loading = false;
                    } else if ( response.data.error ) {
                        this.error = response.data.error;
                        this.department = null;
                        this.positions = null;
                        this.scheduled = null;
                        this.inactive = null;
                        this.loading = false;
                    }
                });
        },

        /**
         * Show the search results and hide the department profile.
         */
        showSearch() {
            Bus.$emit('showSearch');

            this.department = null;
        },

        /**
         * Show the position profile and hide the department profile.
         */
        showPosition(position) {
            Bus.$emit('showPosition', position);

            this.department = null;
        }
    }
});
