Vue.component('departments', {
    props: ['departments'],

    /**
     * The component's data.
     */
    data() {
        return {
            searchForm: new SparkForm({
                query: ''
            }),

            searching: false,
            noSearchResults: false,
            searchResults: [],

            showingDepartmentProfile: false,
            showingPositionProfile: false
        };
    },

    /**
     * The component has been created by Vue.
     */
    created() {
        var self = this;

        this.$on('showSearch', function(){
            self.navigateToSearch();
        });

        this.$on('showDepartment', function(department){
            self.navigateToDepartment(department);
        });

        this.$on('showPosition', function(position){
            self.navigateToPosition(position);
        });

        Bus.$on('sparkHashChanged', function (hash, parameters) {
            if (hash != 'department' && hash != 'position') {
                return true;
            }

            if (parameters && parameters.length > 2 && parameters[1] == 'position') {
                self.loadPositionProfile({ id: parameters[2] });
            } else if (parameters && parameters.length > 0) {
                self.loadDepartmentProfile({ id: parameters[0] });
            }  else {
                self.showSearch();
            }

            return true;
        });
    },

    methods: {
        /**
         * Show the department modal.
         */
        addDepartment() {
            Bus.$emit('addDepartment');
        },

        /**
         * Perform a search for the given query.
         */
        search() {
            this.searching = true;
            this.noSearchResults = false;

            this.$http.post('/settings/departments/department_search', JSON.stringify(this.searchForm))
                .then(response => {
                    this.searchResults = response.data;
                    this.noSearchResults = this.searchResults.length === 0;

                    this.searching = false;
                });
        },

        /**
         * Show the search results and update the browser history.
         */
        navigateToSearch() {
            history.pushState(null, null, '#/department');

            this.showSearch();
        },

        /**
         * Show the search results.
         */
        showSearch() {
            this.showingDepartmentProfile = false;

            Vue.nextTick(function () {
                $('#settings-departments-search').focus();
            });
        },

        /**
         * Show the search results and update the browser history.
         */
        navigateToDepartment(department) {
            this.showingPositionProfile = false;
            this.showDepartmentProfile(department);
        },

        /**
         * Show the department profile for the given department.
         */
        showDepartmentProfile(department) {
            history.pushState(null, null, '#/department/' + department.id);

            this.loadDepartmentProfile(department);
        },

        /**
         * Load the department profile for the given department.
         */
        loadDepartmentProfile(department) {
            this.$emit('showDepartmentProfile', department.id);

            this.showingDepartmentProfile = true;
        },

        /**
         * Show the search results and update the browser history.
         */
        navigateToPosition(position) {
            this.showingDepartmentProfile = false;
            this.showPositionProfile(position);
        },

        /**
         * Show the position profile for the given position.
         */
        showPositionProfile(position) {
            history.pushState(null, null, '#/department/' + position.department_id + '/position/' + position.id);

            this.loadPositionProfile(position);
        },

        /**
         * Load the position profile for the given position.
         */
        loadPositionProfile(position) {
            this.$emit('showPositionProfile', position.id);

            this.showingPositionProfile = true;
        }
    }
});
