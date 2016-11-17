var base = require('settings/subscription/resume-subscription');

Vue.filter('removeSubscription', function (value) {
	var val = value.split(' ');
	val.pop();
	val = (val.join(' ').slice(-1) === 'h') ? val.join(' ') + 's' : val.join(' ');
	return val;
});

Vue.component('spark-resume-subscription', {
    mixins: [base]
});
