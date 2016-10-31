Vue.component('update-position-profile-doc1', {
    props: ['position'],

    /**
     * The component's data.
     */
    data() {
        return {
            labelForm: $.extend(true, new SparkForm({
                doc1_title: ''
            }), Spark.forms.updateDocumentTitle1),

            urlForm: $.extend(true, new SparkForm({
                doc1_url: ''
            }), Spark.forms.updateDocumentURL1),

            dualForm: $.extend(true, new SparkForm({
                doc1_title: '',
                doc1_url: '',
            }), Spark.forms.updateDocument1)
        };
    },

    /**
     * Prepare the component.
     */
    mounted() {
        if (this.position.doc1_title != 'NULL') {
            this.labelForm.doc1_title = this.position.doc1_title;
            this.urlForm.doc1_url = this.position.doc1_url;
        } else {
            this.dualForm.doc1_title = this.position.doc1_title;
            this.dualForm.doc1_url = this.position.doc1_url;
        }
    },

    methods: {
        /**
         * Update the position information.
         */
        update_doc1_title() {
            Spark.put('/settings/position/'+ this.position.id + '/doc1_title_update', this.labelForm)
                .then(() => {
                    //
                });
        },

        /**
         * Update the department's profile photo.
         */
        update_doc1_url(e) {
            e.preventDefault();

            var self = this;

            this.urlForm.startProcessing();

            // We need to gather a fresh FormData instance with the profile photo appended to
            // the data so we can POST it up to the server. This will allow us to do async
            // uploads of the profile photos. We will update the department after this action.
            $.ajax({
                url: `/settings/position/${this.position.id}/doc1_url_update`,
                data: this.gatherURLFormData(),
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                headers: {
                    'X-XSRF-TOKEN': Cookies.get('XSRF-TOKEN')
                },
                success: function () {
                    Bus.$emit('showPositionProfile', self.position.id);

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
                url: `/settings/position/${this.position.id}/doc1_update`,
                data: this.gatherDocumentFormData(),
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                headers: {
                    'X-XSRF-TOKEN': Cookies.get('XSRF-TOKEN')
                },
                success: function () {
                    Bus.$emit('showPositionProfile', self.position.id);

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

            data.append('doc1_url', this.$refs.doc1_url.files[0]);

            return data;
        },

        /**
         * Gather the form data for the document upload.
         */
        gatherDocumentFormData() {
            const data = new FormData();

            data.append('doc1_title', this.dualForm.doc1_title);
            data.append('doc1_url', this.$refs.doc1_url.files[0]);

            return data;
        }
    },

    computed: {
        /**
         * Calculate the style attribute for the photo preview.
         */
        doc1_url() {
            return this.position.doc1_url;
        }
    }
});