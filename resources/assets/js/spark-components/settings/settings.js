var base = require('settings/settings');

Vue.component('spark-settings', {
    mixins: [base],

    /**
     * The component's data.
     */
    data() {
        return {
            departments: [],
        };
    },

    /**
     * Prepare the component.
     */
    mounted() {
        this.getDepartments(Spark.userId);
    },

    methods: {
        /**
         * Get the departments for the User
         */
        getDepartments(userId) {
            this.$http.get('/settings/user/' + userId + '/departments')
                .then(response => {
                    this.departments = response.data.departments;
                });
        }
    }
});
