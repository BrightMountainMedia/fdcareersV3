Vue.component('update-position-profile-doc3', {
    props: ['position'],

    /**
     * The component's data.
     */
    data() {
        return {
            labelForm: $.extend(true, new SparkForm({
                doc3_title: ''
            }), Spark.forms.updateDocumentTitle1),

            urlForm: $.extend(true, new SparkForm({
                doc3_url: ''
            }), Spark.forms.updateDocumentURL1),

            dualForm: $.extend(true, new SparkForm({
                doc3_title: '',
                doc3_url: '',
            }), Spark.forms.updateDocument1)
        };
    },

    /**
     * Prepare the component.
     */
    mounted() {
        if (this.position.doc3_title != 'NULL') {
            this.labelForm.doc3_title = this.position.doc3_title;
            this.urlForm.doc3_url = this.position.doc3_url;
        } else {
            this.dualForm.doc3_title = this.position.doc3_title;
            this.dualForm.doc3_url = this.position.doc3_url;
        }
    },

    methods: {
        /**
         * Update the position information.
         */
        update_doc3_title() {
            Spark.put('/settings/position/'+ this.position.id + '/doc3_title_update', this.labelForm)
                .then(() => {
                    //
                });
        },

        /**
         * Update the department's profile photo.
         */
        update_doc3_url(e) {
            e.preventDefault();

            var self = this;

            this.urlForm.startProcessing();

            // We need to gather a fresh FormData instance with the profile photo appended to
            // the data so we can POST it up to the server. This will allow us to do async
            // uploads of the profile photos. We will update the department after this action.
            $.ajax({
                url: `/settings/position/${this.position.id}/doc3_url_update`,
                data: this.gatherURLFormData(),
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                headers: {
                    'X-XSRF-TOKEN': Cookies.get('XSRF-TOKEN')
                },
                success: function () {
                    Bus.$emit('showPosition', self.position);

                    self.urlForm.finishProcessing();
                },
                error: function (error) {
                    self.urlForm.setErrors(error.responseJSON);
                }
            });
        },

        /**
         * Update the department's profile photo.
         */
        update_both(e) {
            e.preventDefault();

            var self = this;

            this.dualForm.startProcessing();

            // We need to gather a fresh FormData instance with the profile photo appended to
            // the data so we can POST it up to the server. This will allow us to do async
            // uploads of the profile photos. We will update the department after this action.
            $.ajax({
                url: `/settings/position/${this.position.id}/doc3_update`,
                data: this.gatherDocumentFormData(),
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                headers: {
                    'X-XSRF-TOKEN': Cookies.get('XSRF-TOKEN')
                },
                success: function () {
                    self.$dispatch('showPosition', self.position);

                    self.dualForm.finishProcessing();
                },
                error: function (error) {
                    self.dualForm.setErrors(error.responseJSON);
                }
            });
        },

        /**
         * Gather the form data for the document upload.
         */
        gatherURLFormData() {
            const data = new FormData();

            data.append('doc3_url', this.$refs.doc3_url.files[0]);

            return data;
        },

        /**
         * Gather the form data for the document upload.
         */
        gatherDocumentFormData() {
            const data = new FormData();

            data.append('doc3_title', this.dualForm.doc3_title);
            data.append('doc3_url', this.$refs.doc3_url.files[0]);

            return data;
        }
    },

    computed: {
        /**
         * Calculate the style attribute for the photo preview.
         */
        doc3_url() {
            return this.position.doc3_url;
        }
    }
});