Vue.component('contact', {

	/**
     * The component's data.
     */
    data() {
        return {
            contactForm: $.extend(true, new SparkForm({
                name: '',
                email: '',
                message: ''
            }), Spark.forms.contact),
        };
    },

    methods: {
        /**
         * Attempt to register with the application.
         */
        send() {
            this.contactForm.busy = true;
            this.contactForm.errors.forget();

            return this.sendContactRequest();
        },

		/**
         * Send the contact form.
         */
        sendContactRequest() {
            Spark.post('/contact/send', this.contactForm)
                .then(response => {
                    this.contactForm.busy = false;

                    this.showContactRequestSuccessMessage();

                    this.contactForm.name = '';
                    this.contactForm.email = '';
                    this.contactForm.message = '';
                });
        },

        /**
         * Show an alert informing the user their support request was sent.
         */
        showContactRequestSuccessMessage() {
            swal({
                title: 'Got It!',
                text: 'We have received your message and will respond soon!',
                type: 'success',
                showConfirmButton: true,
                timer: 2000
            });
        }
    },
});
