Vue.component('update-position-profile-doc5', {
    props: ['position'],

    /**
     * The component's data.
     */
    data() {
        return {
            labelForm: $.extend(true, new SparkForm({
                doc5_title: ''
            }), Spark.forms.updateDocumentTitle1),

            urlForm: $.extend(true, new SparkForm({
                doc5_url: ''
            }), Spark.forms.updateDocumentURL1),

            dualForm: $.extend(true, new SparkForm({
                doc5_title: '',
                doc5_url: '',
            }), Spark.forms.updateDocument1)
        };
    },

    /**
     * Prepare the component.
     */
    mounted() {
        if (this.position.doc5_title != 'NULL') {
            this.labelForm.doc5_title = this.position.doc5_title;
            this.urlForm.doc5_url = this.position.doc5_url;
        } else {
            this.dualForm.doc5_title = this.position.doc5_title;
            this.dualForm.doc5_url = this.position.doc5_url;
        }
    },

    methods: {
        /**
         * Update the position information.
         */
        update_doc5_title() {
            Spark.put('/settings/position/'+ this.position.id + '/doc5_title_update', this.labelForm)
                .then(() => {
                    //
                });
        },

        /**
         * Update the department's profile photo.
         */
        update_doc5_url(e) {
            e.preventDefault();

            var self = this;

            this.urlForm.startProcessing();

            // We need to gather a fresh FormData instance with the profile photo appended to
            // the data so we can POST it up to the server. This will allow us to do async
            // uploads of the profile photos. We will update the department after this action.
            $.ajax({
                url: `/settings/position/${this.position.id}/doc5_url_update`,
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
                url: `/settings/position/${this.position.id}/doc5_update`,
                data: this.gatherDocumentFormData(),
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                headers: {
                    'X-XSRF-TOKEN': Cookies.get('XSRF-TOKEN')
                },
                success: function () {
                    Bus.$emit('showPosition', self.position);

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

            data.append('doc5_url', this.$refs.doc5_url.files[0]);

            return data;
        },

        /**
         * Gather the form data for the document upload.
         */
        gatherDocumentFormData() {
            const data = new FormData();

            data.append('doc5_title', this.dualForm.doc5_title);
            data.append('doc5_url', this.$refs.doc5_url.files[0]);

            return data;
        }
    },

    computed: {
        /**
         * Calculate the style attribute for the photo preview.
         */
        doc5_url() {
            return this.position.doc5_url;
        }
    }
});