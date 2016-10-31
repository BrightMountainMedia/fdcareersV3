var base = require('settings/profile/update-contact-information');

Vue.component('spark-update-contact-information', {
    mixins: [base],

    /**
     * The component's data.
     */
    data() {
        return {
            form: $.extend(true, new SparkForm({
                first_name: '',
                last_name: '',
                email: ''
            }), Spark.forms.updateContactInformation)
        };
    },

    /**
     * Bootstrap the component.
     */
    mounted() {
        this.form.first_name = this.user.first_name;
        this.form.last_name = this.user.last_name;
        this.form.email = this.user.email;
    }
});
