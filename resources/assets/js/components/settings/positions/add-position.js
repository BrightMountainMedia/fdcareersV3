function settingsAddPositionForm (department) {
    if ( department ) {
    	var currentMonth = new Date().getMonth();
	    var currentDay = new Date().getDay();
	    var currentYear = new Date().getFullYear();
	    var currentHour = new Date().getHours();
	    var currentMinute = new Date().getMinutes();
	    return {
	        department_id: department.id,
	        position_type: 'full-time',
	        state: department.hq_state,
	        scheduled: '0',
	        ending: 'untilFilled',
	        where_to_get_apps_state: '',
	        where_to_return_apps_state: '',
	        orientation_state: '',
	        written_exam_state: '',
	        physical_state: '',
	        featured: '0',
	        publishmonth: currentMonth,
	        publishday: currentDay,
	        publishyear: currentYear,
	        publishhour: currentHour,
		    publishminute: currentMinute,
		};
    }
}

Vue.component('add-position', {
    /**
     * The component's data.
     */
    data() {
        return {
            addingPosition: false,
            type_options: [
                            { text: 'Full Time', value: 'full-time' },
                            { text: 'Paid On Call', value: 'paid-on-call' },
                            { text: 'Part Time', value: 'part-time' },
                            { text: 'Volunteer', value: 'volunteer' },
                            { text: 'Contractor', value: 'contractors' },
                            { text: 'Seasonal', value:' seasonal'}
	        ],
            state_options: [
			    { text: '--- Choose A State ---', value: '' },
			    { text: 'Alabama', value: 'AL' },
			    { text: 'Alaska', value: 'AK' },
			    // { text: 'American Samoa', value: 'AS' },
			    { text: 'Arizona', value: 'AZ' },
			    { text: 'Arkansas', value: 'AR' },
			    { text: 'California', value: 'CA' },
			    { text: 'Colorado', value: 'CO' },
			    { text: 'Connecticut', value: 'CT' },
			    { text: 'Delaware', value: 'DE' },
			    { text: 'District Of Columbia', value: 'DC' },
			    // { text: 'Federated States Of Micronesia', value: 'FM' },
			    { text: 'Florida', value: 'FL' },
			    { text: 'Georgia', value: 'GA' },
			    // { text: 'Guam', value: 'GU' },
			    { text: 'Hawaii', value: 'HI' },
			    { text: 'Idaho', value: 'ID' },
			    { text: 'Illinois', value: 'IL' },
			    { text: 'Indiana', value: 'IN' },
			    { text: 'Iowa', value: 'IA' },
			    { text: 'Kansas', value: 'KS' },
			    { text: 'Kentucky', value: 'KY' },
			    { text: 'Louisiana', value: 'LA' },
			    { text: 'Maine', value: 'ME' },
			    // { text: 'Marshall Islands', value: 'MH' },
			    { text: 'Maryland', value: 'MD' },
			    { text: 'Massachusetts', value: 'MA' },
			    { text: 'Michigan', value: 'MI' },
			    { text: 'Minnesota', value: 'MN' },
			    { text: 'Mississippi', value: 'MS' },
			    { text: 'Missouri', value: 'MO' },
			    { text: 'Montana', value: 'MT' },
			    { text: 'Nebraska', value: 'NE' },
			    { text: 'Nevada', value: 'NV' },
			    { text: 'New Hampshire', value: 'NH' },
			    { text: 'New Jersey', value: 'NJ' },
			    { text: 'New Mexico', value: 'NM' },
			    { text: 'New York', value: 'NY' },
			    { text: 'North Carolina', value: 'NC' },
			    { text: 'North Dakota', value: 'ND' },
			    // { text: 'Northern Mariana Islands', value: 'MP' },
			    { text: 'Ohio', value: 'OH' },
			    { text: 'Oklahoma', value: 'OK' },
			    { text: 'Oregon', value: 'OR' },
			    // { text: 'Palau', value: 'PW' },
			    { text: 'Pennsylvania', value: 'PA' },
			    // { text: 'Puerto Rico', value: 'PR' },
			    { text: 'Rhode Island', value: 'RI' },
			    { text: 'South Carolina', value: 'SC' },
			    { text: 'South Dakota', value: 'SD' },
			    { text: 'Tennessee', value: 'TN' },
			    { text: 'Texas', value: 'TX' },
			    { text: 'Utah', value: 'UT' },
			    { text: 'Vermont', value: 'VT' },
			    // { text: 'Virgin Islands', value: 'VI' },
			    { text: 'Virginia', value: 'VA' },
			    { text: 'Washington', value: 'WA' },
			    { text: 'West Virginia', value: 'WV' },
			    { text: 'Wisconsin', value: 'WI' },
			    { text: 'Wyoming', value: 'WY' }
			],
	        ending_options: [
	        	{ text: 'Until Filled', value: 'untilFilled' },
	        	{ text: 'Continuous Recruitment', value: 'continuous' },
	        	{ text: 'Due Date', value: 'duedate' }
	        ],
	        featured_options: [
	        	{ text: 'Yes', value: '1' },
	        	{ text: 'No', value: '0' }
	        ],
	        scheduled_options: [
	        	{ text: 'Immediately', value: '0' },
	        	{ text: 'Future', value: '1' }
	        ],
	        publish_options: [
	        	{ text: '01-Jan', value: '01' },
	        	{ text: '02-Feb', value: '02' },
	        	{ text: '03-Mar', value: '03' },
	        	{ text: '04-Apr', value: '04' },
	        	{ text: '05-May', value: '05' },
	        	{ text: '06-Jun', value: '06' },
	        	{ text: '07-Jul', value: '07' },
	        	{ text: '08-Aug', value: '08' },
	        	{ text: '09-Sep', value: '09' },
	        	{ text: '10-Oct', value: '10' },
	        	{ text: '11-Nov', value: '11' },
	        	{ text: '12-Dec', value: '12' }
	        ],
            form: new SparkForm(settingsAddPositionForm())
        };
    },

    /**
     * The component has been created by Vue.
     */
    created() {
        var self = this;

        Bus.$on('addPosition', function (department) {
            self.form = new SparkForm(settingsAddPositionForm(department));

            self.addingPosition = true;

            $('#modal-add-position').modal('show');
        });
    },

    methods: {
        /**
         * Save the position
         */
        savePosition() {
            Spark.post('/settings/position/position_add', this.form)
            	.then(response => {
                    this.addingPosition = false;
                    $('#modal-add-position').modal('hide');
                    Bus.$emit('showPosition', response.position);
                });
        },
    }
});