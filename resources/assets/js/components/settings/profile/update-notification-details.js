Vue.component('update-notification-details', {
    props: ['user'],

    data() {
        return {
            app_options: [
                { text: 'Yes', value: '1' },
                { text: 'No', value: '0' }
            ],
            email_options: [
                { text: 'Yes', value: '1' },
                { text: 'No', value: '0' }
            ],
            sms_options: [
                { text: 'Yes', value: '1' },
                { text: 'No', value: '0' }
            ],
            form: $.extend(true, new SparkForm({
                app_notification: 0,
                email_notification: 0,
                sms_notification: 0,
                sms_phone: '',
                notification_states: []
            }), Spark.forms.updateNotificationDetails)
        };
    },

    /**
     * Bootstrap the component.
     */
    mounted() {
        this.form.app_notification = this.user.app_notification;
        this.form.email_notification = this.user.email_notification;
        this.form.sms_notification = this.user.sms_notification;
        this.form.sms_phone = this.user.sms_phone;
        this.form.notification_states = JSON.parse(this.user.notification_states);
    },

    methods: {
        /**
         * Update the user's notification details.
         */
        update() {
            Spark.put('/settings/notification/details', this.form)
                .then(() => {
                    Bus.$emit('updateUser');
                });
        }
    }
});