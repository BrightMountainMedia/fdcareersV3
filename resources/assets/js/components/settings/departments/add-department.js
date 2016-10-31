function settingsAddDepartmentForm () {
    return {
        owner_id: '',
        hq_state: '',
        mail_state: '',
        org_type: '',
        dept_type: 'Career',
        primary_agency_for_em: 0,
    };
}

Vue.component('add-department', {
    props: ['user'],

    /**
     * The component's data.
     */
    data() {
        return {
            addingDeptartment: false,
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
            em_options: [
            	{ text: 'Yes', value: '1' },
            	{ text: 'No', value: '0' }
            ],
            type_options: [
                { text: 'Career', value: 'Career' },
                { text: 'Volunteer', value: 'Volunteer' },
                { text: 'Mostly Career', value: 'Mostly Career' },
                { text: 'Mostly Volunteer', value: 'Mostly Volunteer' }
            ],
            org_options: [
                { text: 'City Government', value: 'City Government' },
                { text: 'Contract fire department', value: 'Contract fire department' },
                { text: 'dependent tax district', value: 'dependent tax district' },
                { text: 'Federal government (Department of Defense)', value: 'Federal government (Department of Defense)' },
                { text: 'Federal government (Executive branch)', value: 'Federal government (Executive branch)' },
                { text: 'Independent Special Fire District', value: 'Independent Special Fire District' },
                { text: 'Local (includes career combination and volunteer)', value: 'Local (includes career combination and volunteer)' },
                { text: 'Private or industrial fire brigade', value: 'Private or industrial fire brigade' },
                { text: 'Special District', value: 'Special District' },
                { text: 'Special Fire District', value: 'Special Fire District' },
                { text: 'Special Taxing District', value: 'Special Taxing District' },
                { text: 'State government', value: 'State government' },
                { text: 'State Independent Special District', value: 'State Independent Special District' },
                { text: 'Transportation authority or airport fire department', value: 'Transportation authority or airport fire department' },
                { text: 'We suppliment Brevard County Fire Rescue', value: 'We suppliment Brevard County Fire Rescue' }
            ],
            form: new SparkForm(settingsAddDepartmentForm())
        };
    },

    /**
     * The component has been created by Vue.
     */
    created() {
        var self = this;

        Bus.$on('addDepartment', function () {
            self.form = new SparkForm(settingsAddDepartmentForm());

            self.addingDeptartment = true;
            self.form.owner_id = Spark.userId;

            $('#modal-add-department').modal('show');
        });
    },

    methods: {
        /**
         * Save the department
         */
        saveDepartment() {
            Spark.post('/settings/department/department_add', this.form)
            	.then(response => {
                    this.addingDeptartment = false;
                    $('#modal-add-department').modal('hide');
                });
        },
    }
});