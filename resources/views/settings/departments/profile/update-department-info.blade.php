<update-department-info :department="department" inline-template>
    <div class="panel panel-default" v-if="department">
        <div class="panel-heading">Department Information</div>

        <div class="panel-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                Your department information has been updated!
            </div>

            <form class="form-horizontal" role="form">
                <!-- Department Email -->
                <div class="form-group" :class="{'has-error': form.errors.has('email')}">
                    <label class="col-sm-4 control-label">Department Email</label>

                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="email" v-model="form.email" placeholder="dept-email@example.com">

                        <span class="help-block" v-show="form.errors.has('email')">
                            @{{ form.errors.get('email') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- FDID -->
                <div class="form-group" :class="{'has-error': form.errors.has('fdid')}">
                    <label class="col-sm-4 control-label">FDID</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="fdid" v-model="form.fdid">

                        <span class="help-block" v-show="form.errors.has('fdid')">
                            @{{ form.errors.get('fdid') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Department Name -->
                <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                    <label class="col-sm-4 control-label">Department Name</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" v-model="form.name" placeholder="Example Fire Rescue">

                        <span class="help-block" v-show="form.errors.has('name')">
                            @{{ form.errors.get('name') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- HQ Address1 -->
                <div class="form-group" :class="{'has-error': form.errors.has('hq_address1')}">
                    <label class="col-sm-4 control-label">HQ Address1</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="hq_address1" v-model="form.hq_address1" placeholder="1234 Example St">

                        <span class="help-block" v-show="form.errors.has('hq_address1')">
                            @{{ form.errors.get('hq_address1') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- HQ Address2 -->
                <div class="form-group" :class="{'has-error': form.errors.has('hq_address2')}">
                    <label class="col-sm-4 control-label">HQ Address2</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="hq_address2" v-model="form.hq_address2" placeholder="Suite D">

                        <span class="help-block" v-show="form.errors.has('hq_address2')">
                            @{{ form.errors.get('hq_address2') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- HQ City -->
                <div class="form-group" :class="{'has-error': form.errors.has('hq_city')}">
                    <label class="col-sm-4 control-label">HQ City</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="hq_city" v-model="form.hq_city" placeholder="Miami">

                        <span class="help-block" v-show="form.errors.has('hq_city')">
                            @{{ form.errors.get('hq_city') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- HQ State -->
                <div class="form-group" :class="{'has-error': form.errors.has('hq_state')}">
                    <label class="col-sm-4 control-label">HQ State</label>

                    <div class="col-sm-8">
                        <select class="form-control" name="hq_state" v-model="form.hq_state">
                            <option v-for="state_option in state_options" v-bind:value="state_option.value">
                                @{{ state_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('hq_state')">
                            @{{ form.errors.get('hq_state') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- HQ Zip -->
                <div class="form-group" :class="{'has-error': form.errors.has('hq_zip')}">
                    <label class="col-sm-4 control-label">HQ Zip</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="hq_zip" v-model="form.hq_zip" placeholder="33127">

                        <span class="help-block" v-show="form.errors.has('hq_zip')">
                            @{{ form.errors.get('hq_zip') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Mailing Address1 -->
                <div class="form-group" :class="{'has-error': form.errors.has('mail_address1')}">
                    <label class="col-sm-4 control-label">Mailing Address1</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="mail_address1" v-model="form.mail_address1" placeholder="1234 Example St">

                        <span class="help-block" v-show="form.errors.has('mail_address1')">
                            @{{ form.errors.get('mail_address1') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Mailing Address2 -->
                <div class="form-group" :class="{'has-error': form.errors.has('mail_address2')}">
                    <label class="col-sm-4 control-label">Mailing Address2</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="mail_address2" v-model="form.mail_address2" placeholder="Suite D">

                        <span class="help-block" v-show="form.errors.has('mail_address2')">
                            @{{ form.errors.get('mail_address2') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Mailing PO Box -->
                <div class="form-group" :class="{'has-error': form.errors.has('mail_po_box')}">
                    <label class="col-sm-4 control-label">Mailing PO Box</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="mail_po_box" v-model="form.mail_po_box" placeholder="Suite D">

                        <span class="help-block" v-show="form.errors.has('mail_po_box')">
                            @{{ form.errors.get('mail_po_box') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Mailing City -->
                <div class="form-group" :class="{'has-error': form.errors.has('mail_city')}">
                    <label class="col-sm-4 control-label">Mailing City</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="mail_city" v-model="form.mail_city" placeholder="Miami">

                        <span class="help-block" v-show="form.errors.has('mail_city')">
                            @{{ form.errors.get('mail_city') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Mailing State -->
                <div class="form-group" :class="{'has-error': form.errors.has('mail_state')}">
                    <label class="col-sm-4 control-label">Mailing State</label>

                    <div class="col-sm-8">
                        <select class="form-control" name="mail_state" v-model="form.mail_state">
                            <option v-for="state_option in state_options" v-bind:value="state_option.value">
                                @{{ state_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('mail_state')">
                            @{{ form.errors.get('mail_state') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Mailing Zip -->
                <div class="form-group" :class="{'has-error': form.errors.has('mail_zip')}">
                    <label class="col-sm-4 control-label">Mailing Zip</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="mail_zip" v-model="form.mail_zip" placeholder="33127">

                        <span class="help-block" v-show="form.errors.has('mail_zip')">
                            @{{ form.errors.get('mail_zip') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- HQ Phone -->
                <div class="form-group" :class="{'has-error': form.errors.has('hq_phone')}">
                    <label class="col-sm-4 control-label">HQ Phone</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="hq_phone" v-model="form.hq_phone" placeholder="(555) 555-5555">

                        <span class="help-block" v-show="form.errors.has('hq_phone')">
                            @{{ form.errors.get('hq_phone') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- HQ Fax -->
                <div class="form-group" :class="{'has-error': form.errors.has('hq_fax')}">
                    <label class="col-sm-4 control-label">HQ Fax</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="hq_fax" v-model="form.hq_fax" placeholder="(555) 555-5555">

                        <span class="help-block" v-show="form.errors.has('hq_fax')">
                            @{{ form.errors.get('hq_fax') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- County -->
                <div class="form-group" :class="{'has-error': form.errors.has('county')}">
                    <label class="col-sm-4 control-label">County</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="county" v-model="form.county" placeholder="Miami Dade">

                        <span class="help-block" v-show="form.errors.has('county')">
                            @{{ form.errors.get('county') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Department Type -->
                <div class="form-group" :class="{'has-error': form.errors.has('dept_type')}">
                    <label class="col-sm-4 control-label">Department Type</label>

                    <div class="col-sm-8">
                        <select class="form-control" name="dept_type" v-model="form.dept_type">
                            <option v-for="type_option in type_options" v-bind:value="type_option.value">
                                @{{ type_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('dept_type')">
                            @{{ form.errors.get('dept_type') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Organization Type -->
                <div class="form-group" :class="{'has-error': form.errors.has('org_type')}">
                    <label class="col-sm-4 control-label">Organization Type</label>

                    <div class="col-sm-8">
                        <select class="form-control" name="org_type" v-model="form.org_type">
                            <option v-for="org_option in org_options" v-bind:value="org_option.value">
                                @{{ org_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('org_type')">
                            @{{ form.errors.get('org_type') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Department Website -->
                <div class="form-group" :class="{'has-error': form.errors.has('website')}">
                    <label class="col-sm-4 control-label">Department Website</label>

                    <div class="col-sm-8">
                        <input type="url" class="form-control" name="website" v-model="form.website" placeholder="www.example.com">

                        <span class="help-block" v-show="form.errors.has('website')">
                            @{{ form.errors.get('website') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Primary Agency for Emergency -->
                <div class="form-group" :class="{'has-error': form.errors.has('primary_agency_for_em')}">
                    <label class="col-sm-4 control-label">Primary Agency for Emergency</label>

                    <div class="col-sm-8">
                        <select class="form-control" name="primary_agency_for_em" v-model="form.primary_agency_for_em">
                            <option v-for="em_option in em_options" v-bind:value="em_option.value">
                                @{{ em_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('primary_agency_for_em')">
                            @{{ form.errors.get('primary_agency_for_em') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                                <!-- Stations -->
                <div class="form-group" :class="{'has-error': form.errors.has('stations')}">
                    <label class="col-sm-4 control-label">Stations</label>

                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="stations" v-model="form.stations" placeholder="3">

                        <span class="help-block" v-show="form.errors.has('stations')">
                            @{{ form.errors.get('stations') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Active Firefighter - Career -->
                <div class="form-group" :class="{'has-error': form.errors.has('active_ff_career')}">
                    <label class="col-sm-4 control-label">Active Firefighter - Career</label>

                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="active_ff_career" v-model="form.active_ff_career" placeholder="6">

                        <span class="help-block" v-show="form.errors.has('active_ff_career')">
                            @{{ form.errors.get('active_ff_career') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Active Firefighter - Volunteer -->
                <div class="form-group" :class="{'has-error': form.errors.has('active_ff_volunteer')}">
                    <label class="col-sm-4 control-label">Active Firefighter - Volunteer</label>

                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="active_ff_volunteer" v-model="form.active_ff_volunteer" placeholder="3">

                        <span class="help-block" v-show="form.errors.has('active_ff_volunteer')">
                            @{{ form.errors.get('active_ff_volunteer') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Active Firefighter - Paid per Call -->
                <div class="form-group" :class="{'has-error': form.errors.has('active_ff_paid_per_call')}">
                    <label class="col-sm-4 control-label">Active Firefighter - Paid per Call</label>

                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="active_ff_paid_per_call" v-model="form.active_ff_paid_per_call" placeholder="4">

                        <span class="help-block" v-show="form.errors.has('active_ff_paid_per_call')">
                            @{{ form.errors.get('active_ff_paid_per_call') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Non Firefighting - Civilian -->
                <div class="form-group" :class="{'has-error': form.errors.has('non_ff_civilian')}">
                    <label class="col-sm-4 control-label">Non Firefighting - Civilian</label>

                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="non_ff_civilian" v-model="form.non_ff_civilian" placeholder="2">

                        <span class="help-block" v-show="form.errors.has('non_ff_civilian')">
                            @{{ form.errors.get('non_ff_civilian') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Non Firefighting - Volunteer -->
                <div class="form-group" :class="{'has-error': form.errors.has('non_ff_volunteer')}">
                    <label class="col-sm-4 control-label">Non Firefighting - Volunteer</label>

                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="non_ff_volunteer" v-model="form.non_ff_volunteer" placeholder="4">

                        <span class="help-block" v-show="form.errors.has('non_ff_volunteer')">
                            @{{ form.errors.get('non_ff_volunteer') }}
                        </span>
                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">

                            Update Department
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</update-department-info>