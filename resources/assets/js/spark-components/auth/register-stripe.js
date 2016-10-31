var base = require('auth/register-stripe');

Vue.filter('removeSubscription', function (value) {
	var val = value.split(' ');
	val.pop();
	val = (val.join(' ').slice(-1) === 'h') ? val.join(' ') + 's' : val.join(' ');
	return val;
});

Vue.component('spark-register-stripe', {
    mixins: [base],

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
            ]
    	};
    }
});
