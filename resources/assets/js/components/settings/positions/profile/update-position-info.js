Vue.component('update-position-info', {
    props: ['position', 'department'],

    /**
     * The component's data.
     */
    data() {
        return {
            type_options: [
                { text: 'Full Time', value: 'full-time' },
                { text: 'Paid On Call', value: 'paid-on-call' },
                { text: 'Part Time', value: 'part-time' },
                { text: 'Volunteer', value: 'volunteer' },
                { text: 'Contractor', value: 'contractor' }
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
            active_options: [
                { text: 'Yes', value: '1' },
                { text: 'No', value: '0' }
            ],
            scheduled_options: [
                { text: 'Immediately', value: '1' },
                { text: 'Future', value: '0' }
            ],
            publish_options: [
                { text: '01-Jan', value: '0' },
                { text: '02-Feb', value: '1' },
                { text: '03-Mar', value: '2' },
                { text: '04-Apr', value: '3' },
                { text: '05-May', value: '4' },
                { text: '06-Jun', value: '5' },
                { text: '07-Jul', value: '6' },
                { text: '08-Aug', value: '7' },
                { text: '09-Sep', value: '8' },
                { text: '10-Oct', value: '9' },
                { text: '11-Nov', value: '10' },
                { text: '12-Dec', value: '11' }
            ],
            form: $.extend(true, new SparkForm({
                department_id: '',
                title: '',
                salary: '',
                position_type: 'full-time',
                state: '',
                ending: 'untilFilled',
                duedate: '',
                application_details: '',
                testing_details: '',
                orientation_details: '',
                requirements: '',
                qualifications: '',
                residency_requirements: '',
                applications_available_start: '',
                applications_available_end: '',
                video: '',
                apply_link: '',
                featured: '0',
                active: '1',
            }), Spark.forms.updatePositionInformation)
        };
    },

    /**
     * Prepare the component.
     */
    mounted() {
        Mousetrap.bind('esc', e => this.showDepartment());

        this.form.department_id = this.position.department_id;
        this.form.title = this.position.title;
        this.form.salary = this.position.salary;
        this.form.position_type = this.position.position_type;
        this.form.state = this.position.state;
        this.form.ending = this.position.ending;
        this.form.duedate = this.position.duedate;
        this.form.application_details = this.position.application_details;
        this.form.testing_details = this.position.testing_details;
        this.form.orientation_details = this.position.orientation_details;
        this.form.requirements = this.position.requirements;
        this.form.qualifications = this.position.qualifications;
        this.form.residency_requirements = this.position.residency_requirements;
        this.form.applications_available_start = this.position.applications_available_start;
        this.form.applications_available_end = this.position.applications_available_end;
        this.form.video = this.position.video;
        this.form.apply_link = this.position.apply_link;
        this.form.featured = this.position.featured;
        this.form.active = this.position.active;
    },

    methods: {
        /**
         * Update the position information.
         */
        update() {
            Spark.put('/settings/position/'+ this.position.id + '/position_update', this.form)
                .then(() => {
                    // Bus.$emit('showPositionProfile', this.position.id);
                });
        }
    }
});
