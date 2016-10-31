Vue.component('update-department-profile-photo', {
    props: ['department'],

    /**
     * The component's data.
     */
    data() {
        return {
            form: new SparkForm({})
        };
    },


    methods: {
        /**
         * Update the department's profile photo.
         */
        update(e) {
            e.preventDefault();

            var self = this;

            this.form.startProcessing();

            // We need to gather a fresh FormData instance with the profile photo appended to
            // the data so we can POST it up to the server. This will allow us to do async
            // uploads of the profile photos. We will update the department after this action.
            $.ajax({
                url: `/settings/department/${this.department.id}/department_photo`,
                data: this.gatherFormData(),
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                headers: {
                    'X-XSRF-TOKEN': Cookies.get('XSRF-TOKEN')
                },
                success: function () {
                    Bus.$emit('showDepartmentProfile', self.department.id);

                    self.form.finishProcessing();
                },
                error: function (error) {
                    self.form.setErrors(error.responseJSON);
                }
            });
        },


        /**
         * Gather the form data for the photo upload.
         */
        gatherFormData() {
            const data = new FormData();

            data.append('photo', this.$refs.photo.files[0]);

            return data;
        },

        /**
         * Show the search results and hide the department profile.
         */
        showSearch() {
            this.$emit('showSearch');

            this.department = null;
        }
    },


    computed: {
        /**
         * Calculate the style attribute for the photo preview.
         */
        previewStyle() {
            return `background-image: url(${this.department.photo_url})`;
        }
    }
});
