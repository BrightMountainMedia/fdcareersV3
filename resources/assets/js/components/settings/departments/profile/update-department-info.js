Vue.component('update-department-info', {
    props: ['department'],

    /**
     * The component's data.
     */
    data() {
        return {
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
                { text: '--- Choose an Option ---', value: '' },
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
            form: $.extend(true, new SparkForm({
                email: '',
                fdid: '',
                name: '',
                hq_address1: '',
                hq_address2: '',
                hq_city: '',
                hq_state: '',
                hq_zip: '',
                mail_address1: '',
                mail_address2: '',
                mail_po_box: '',
                mail_city: '',
                mail_state: '',
                mail_zip: '',
                hq_phone: '',
                hq_fax: '',
                county: '',
                dept_type: 'Career',
                org_type: '',
                website: '',
                primary_agency_for_em: 1,
                stations: '0',
                active_ff_career: '0',
                active_ff_volunteer: '0',
                active_ff_paid_per_call: '0',
                non_ff_civilian: '0',
                non_ff_volunteer: '0'
            }), Spark.forms.updateDepartmentInformation)
        };
    },

    /**
     * Prepare the component.
     */
    mounted() {
        this.form.email = this.department.email;
        this.form.fdid = this.department.fdid;
        this.form.name = this.department.name;
        this.form.hq_address1 = this.department.hq_address1;
        this.form.hq_address2 = this.department.hq_address2;
        this.form.hq_city = this.department.hq_city;
        this.form.hq_state = this.department.hq_state;
        this.form.hq_zip = this.department.hq_zip;
        this.form.mail_address1 = this.department.mail_address1;
        this.form.mail_address2 = this.department.mail_address2;
        this.form.mail_po_box = this.department.mail_po_box;
        this.form.mail_city = this.department.mail_city;
        this.form.mail_state = this.department.mail_state;
        this.form.mail_zip = this.department.mail_zip;
        this.form.hq_phone = this.department.hq_phone;
        this.form.hq_fax = this.department.hq_fax;
        this.form.county = this.department.county;
        this.form.dept_type = this.department.dept_type;
        this.form.org_type = this.department.org_type;
        this.form.website = this.department.website;
        this.form.primary_agency_for_em = this.department.primary_agency_for_em;
        this.form.stations = this.department.stations;
        this.form.active_ff_career = this.department.active_ff_career;
        this.form.active_ff_volunteer = this.department.active_ff_volunteer;
        this.form.active_ff_paid_per_call = this.department.active_ff_paid_per_call;
        this.form.non_ff_civilian = this.department.non_ff_civilian;
        this.form.non_ff_volunteer = this.department.non_ff_volunteer;
    },

    methods: {
        /**
         * Update the department stats.
         */
        update() {
            Spark.put('/settings/department/'+ this.department.id + '/department_update', this.form)
                .then(() => {
                    Bus.$emit('showDepartmentProfile', this.department.id);
                });
        }
    }
});
