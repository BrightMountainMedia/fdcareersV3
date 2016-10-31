<update-position-info :position="position" :department="department" inline-template>
    <div class="panel panel-default" v-if="position">
        <div class="panel-heading">
            <i class="fa fa-btn fa-times" style="cursor: pointer;" @click="showDepartment()"></i>
            Position @{{ position.id }} Information
        </div>

        <div class="panel-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                Your position information has been updated!
            </div>

            <form class="form-horizontal" role="form">
                <!-- Department ID -->
                <div class="form-group" :class="{'has-error': form.errors.has('department_id')}">
                    <label class="col-md-4 control-label">Department ID</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="department_id" v-model="form.department_id">

                        <span class="help-block" v-show="form.errors.has('department_id')">
                            @{{ form.errors.get('department_id') }}
                        </span>
                    </div>
                </div>

                <!-- Position Title -->
                <div class="form-group" :class="{'has-error': form.errors.has('title')}">
                    <label class="col-md-4 control-label">Title</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="title" v-model="form.title">

                        <span class="help-block" v-show="form.errors.has('title')">
                            @{{ form.errors.get('title') }}
                        </span>
                    </div>
                </div>

                <!-- Position Type -->
                <div class="form-group" :class="{'has-error': form.errors.has('position_type')}">
                    <label class="col-md-4 control-label">Position Type</label>

                    <div class="col-md-6">
                        <select class="form-control" name="position_type" v-model="form.position_type">
                            <option v-for="type_option in type_options" v-bind:value="type_option.value">
                                @{{ type_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('position_type')">
                            @{{ form.errors.get('position_type') }}
                        </span>
                    </div>
                </div>

                <!-- State -->
                <div class="form-group" :class="{'has-error': form.errors.has('state')}">
                    <label class="col-md-4 control-label">State</label>

                    <div class="col-md-6">
                        <select class="form-control" name="state" v-model="form.state">
                            <option v-for="state_option in state_options" v-bind:value="state_option.value">
                                @{{ state_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('state')">
                            @{{ form.errors.get('state') }}
                        </span>
                    </div>
                </div>

                <!-- Ending -->
                <div class="form-group" :class="{'has-error': form.errors.has('ending')}">
                    <label class="col-md-4 control-label">Application Ends</label>

                    <div class="col-md-6">
                        <select class="form-control" name="ending" v-model="form.ending">
                            <option v-for="ending_option in ending_options" v-bind:value="ending_option.value">
                                @{{ ending_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('ending')">
                            @{{ form.errors.get('ending') }}
                        </span>
                    </div>
                </div>

                <!-- Due Date -->
                <div class="form-group" :class="{'has-error': form.errors.has('duedate')}" v-if="this.form.ending === 'duedate'">
                    <label class="col-md-4 control-label">Due Date</label>

                    <div class="col-md-6">
                        <input type="date" class="form-control" name="duedate" v-model="form.duedate">

                        <span class="help-block" v-show="form.errors.has('duedate')">
                            @{{ form.errors.get('duedate') }}
                        </span>
                    </div>
                </div>

                <!-- Application Details -->
                <div class="form-group" :class="{'has-error': form.errors.has('application_details')}">
                    <label class="col-md-4 control-label">Application Details</label>

                    <div class="col-md-6">
                        <textarea class="form-control" name="application_details" v-model="form.application_details" rows="8"></textarea>

                        <span class="help-block" v-show="form.errors.has('application_details')">
                            @{{ form.errors.get('application_details') }}
                        </span>
                    </div>
                </div>

                <!-- Qualifications to Apply -->
                <div class="form-group" :class="{'has-error': form.errors.has('qualifications_to_apply')}">
                    <label class="col-md-4 control-label">Qualifications to Apply</label>

                    <div class="col-md-6">
                        <textarea class="form-control" name="qualifications_to_apply" v-model="form.qualifications_to_apply" rows="8"></textarea>

                        <span class="help-block" v-show="form.errors.has('qualifications_to_apply')">
                            @{{ form.errors.get('qualifications_to_apply') }}
                        </span>
                    </div>
                </div>

                <!-- Applications Available Start -->
                <div class="form-group" :class="{'has-error': form.errors.has('applications_available_start')}">
                    <label class="col-md-4 control-label">Applications Available Start</label>

                    <div class="col-md-6">
                        <input type="date" class="form-control" name="applications_available_start" v-model="form.applications_available_start">

                        <span class="help-block" v-show="form.errors.has('applications_available_start')">
                            @{{ form.errors.get('applications_available_start') }}
                        </span>
                    </div>
                </div>

                <!-- Applications Available End -->
                <div class="form-group" :class="{'has-error': form.errors.has('applications_available_end')}">
                    <label class="col-md-4 control-label">Applications Available End</label>

                    <div class="col-md-6">
                        <input type="date" class="form-control" name="applications_available_end" v-model="form.applications_available_end">

                        <span class="help-block" v-show="form.errors.has('applications_available_end')">
                            @{{ form.errors.get('applications_available_end') }}
                        </span>
                    </div>
                </div>

                <!-- Residency Requirements -->
                <div class="form-group" :class="{'has-error': form.errors.has('residency_requirements')}">
                    <label class="col-md-4 control-label">Residency Requirements</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="residency_requirements" v-model="form.residency_requirements">

                        <span class="help-block" v-show="form.errors.has('residency_requirements')">
                            @{{ form.errors.get('residency_requirements') }}
                        </span>
                    </div>
                </div>

                <!-- Where to get Apps Label -->
                <div class="form-group" :class="{'has-error': form.errors.has('where_to_get_apps_label')}">
                    <label class="col-md-4 control-label">Where to get Apps Label</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="where_to_get_apps_label" v-model="form.where_to_get_apps_label">

                        <span class="help-block" v-show="form.errors.has('where_to_get_apps_label')">
                            @{{ form.errors.get('where_to_get_apps_label') }}
                        </span>
                    </div>
                </div>

                <!-- Where to get Apps Address1 -->
                <div class="form-group" :class="{'has-error': form.errors.has('where_to_get_apps_address1')}">
                    <label class="col-md-4 control-label">Where to get Apps Address1</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="where_to_get_apps_address1" v-model="form.where_to_get_apps_address1">

                        <span class="help-block" v-show="form.errors.has('where_to_get_apps_address1')">
                            @{{ form.errors.get('where_to_get_apps_address1') }}
                        </span>
                    </div>
                </div>

                <!-- Where to get Apps Address2 -->
                <div class="form-group" :class="{'has-error': form.errors.has('where_to_get_apps_address2')}">
                    <label class="col-md-4 control-label">Where to get Apps Address2</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="where_to_get_apps_address2" v-model="form.where_to_get_apps_address2">

                        <span class="help-block" v-show="form.errors.has('where_to_get_apps_address2')">
                            @{{ form.errors.get('where_to_get_apps_address2') }}
                        </span>
                    </div>
                </div>

                <!-- Where to get Apps City -->
                <div class="form-group" :class="{'has-error': form.errors.has('where_to_get_apps_city')}">
                    <label class="col-md-4 control-label">Where to get Apps City</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="where_to_get_apps_city" v-model="form.where_to_get_apps_city">

                        <span class="help-block" v-show="form.errors.has('where_to_get_apps_city')">
                            @{{ form.errors.get('where_to_get_apps_city') }}
                        </span>
                    </div>
                </div>

                <!-- Where to get Apps State -->
                <div class="form-group" :class="{'has-error': form.errors.has('where_to_get_apps_state')}">
                    <label class="col-md-4 control-label">Where to get Apps State</label>

                    <div class="col-md-6">
                        <select class="form-control" name="where_to_get_apps_state" v-model="form.where_to_get_apps_state">
                            <option v-for="state_option in state_options" v-bind:value="state_option.value">
                                @{{ state_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('where_to_get_apps_state')">
                            @{{ form.errors.get('where_to_get_apps_state') }}
                        </span>
                    </div>
                </div>

                <!-- Where to get Apps Zip -->
                <div class="form-group" :class="{'has-error': form.errors.has('where_to_get_apps_zip')}">
                    <label class="col-md-4 control-label">Where to get Apps Zip</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="where_to_get_apps_zip" v-model="form.where_to_get_apps_zip">

                        <span class="help-block" v-show="form.errors.has('where_to_get_apps_zip')">
                            @{{ form.errors.get('where_to_get_apps_zip') }}
                        </span>
                    </div>
                </div>

                <!-- Where to return Apps Label -->
                <div class="form-group" :class="{'has-error': form.errors.has('where_to_return_apps_label')}">
                    <label class="col-md-4 control-label">Where to return Apps Label</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="where_to_return_apps_label" v-model="form.where_to_return_apps_label">

                        <span class="help-block" v-show="form.errors.has('where_to_return_apps_label')">
                            @{{ form.errors.get('where_to_return_apps_label') }}
                        </span>
                    </div>
                </div>

                <!-- Where to return Apps Address1 -->
                <div class="form-group" :class="{'has-error': form.errors.has('where_to_return_apps_address1')}">
                    <label class="col-md-4 control-label">Where to return Apps Address1</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="where_to_return_apps_address1" v-model="form.where_to_return_apps_address1">

                        <span class="help-block" v-show="form.errors.has('where_to_return_apps_address1')">
                            @{{ form.errors.get('where_to_return_apps_address1') }}
                        </span>
                    </div>
                </div>

                <!-- Where to return Apps Address2 -->
                <div class="form-group" :class="{'has-error': form.errors.has('where_to_return_apps_address2')}">
                    <label class="col-md-4 control-label">Where to return Apps Address2</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="where_to_return_apps_address2" v-model="form.where_to_return_apps_address2">

                        <span class="help-block" v-show="form.errors.has('where_to_return_apps_address2')">
                            @{{ form.errors.get('where_to_return_apps_address2') }}
                        </span>
                    </div>
                </div>

                <!-- Where to return Apps City -->
                <div class="form-group" :class="{'has-error': form.errors.has('where_to_return_apps_city')}">
                    <label class="col-md-4 control-label">Where to return Apps City</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="where_to_return_apps_city" v-model="form.where_to_return_apps_city">

                        <span class="help-block" v-show="form.errors.has('where_to_return_apps_city')">
                            @{{ form.errors.get('where_to_return_apps_city') }}
                        </span>
                    </div>
                </div>

                <!-- Where to return Apps State -->
                <div class="form-group" :class="{'has-error': form.errors.has('where_to_return_apps_state')}">
                    <label class="col-md-4 control-label">Where to return Apps State</label>

                    <div class="col-md-6">
                        <select class="form-control" name="where_to_return_apps_state" v-model="form.where_to_return_apps_state">
                            <option v-for="state_option in state_options" v-bind:value="state_option.value">
                                @{{ state_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('where_to_return_apps_state')">
                            @{{ form.errors.get('where_to_return_apps_state') }}
                        </span>
                    </div>
                </div>

                <!-- Where to return Apps Zip -->
                <div class="form-group" :class="{'has-error': form.errors.has('where_to_return_apps_zip')}">
                    <label class="col-md-4 control-label">Where to return Apps Zip</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="where_to_return_apps_zip" v-model="form.where_to_return_apps_zip">

                        <span class="help-block" v-show="form.errors.has('where_to_return_apps_zip')">
                            @{{ form.errors.get('where_to_return_apps_zip') }}
                        </span>
                    </div>
                </div>

                <!-- Orientation Details -->
                <div class="form-group" :class="{'has-error': form.errors.has('orientation_details')}">
                    <label class="col-md-4 control-label">Orientation Details</label>

                    <div class="col-md-6">
                        <textarea class="form-control" name="orientation_details" v-model="form.orientation_details" rows="8"></textarea>

                        <span class="help-block" v-show="form.errors.has('orientation_details')">
                            @{{ form.errors.get('orientation_details') }}
                        </span>
                    </div>
                </div>

                <!-- Orientation Label -->
                <div class="form-group" :class="{'has-error': form.errors.has('orientation_label')}">
                    <label class="col-md-4 control-label">Orientation Label</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="orientation_label" v-model="form.orientation_label">

                        <span class="help-block" v-show="form.errors.has('orientation_label')">
                            @{{ form.errors.get('orientation_label') }}
                        </span>
                    </div>
                </div>

                <!-- Orientation Address1 -->
                <div class="form-group" :class="{'has-error': form.errors.has('orientation_address1')}">
                    <label class="col-md-4 control-label">Orientation Address1</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="orientation_address1" v-model="form.orientation_address1">

                        <span class="help-block" v-show="form.errors.has('orientation_address1')">
                            @{{ form.errors.get('orientation_address1') }}
                        </span>
                    </div>
                </div>

                <!-- Orientation Address2 -->
                <div class="form-group" :class="{'has-error': form.errors.has('orientation_address2')}">
                    <label class="col-md-4 control-label">Orientation Address2</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="orientation_address2" v-model="form.orientation_address2">

                        <span class="help-block" v-show="form.errors.has('orientation_address2')">
                            @{{ form.errors.get('orientation_address2') }}
                        </span>
                    </div>
                </div>

                <!-- Orientation City -->
                <div class="form-group" :class="{'has-error': form.errors.has('orientation_city')}">
                    <label class="col-md-4 control-label">Orientation City</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="orientation_city" v-model="form.orientation_city">

                        <span class="help-block" v-show="form.errors.has('orientation_city')">
                            @{{ form.errors.get('orientation_city') }}
                        </span>
                    </div>
                </div>

                <!-- Orientation State -->
                <div class="form-group" :class="{'has-error': form.errors.has('orientation_state')}">
                    <label class="col-md-4 control-label">Orientation State</label>

                    <div class="col-md-6">
                        <select class="form-control" name="orientation_state" v-model="form.orientation_state">
                            <option v-for="state_option in state_options" v-bind:value="state_option.value">
                                @{{ state_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('orientation_state')">
                            @{{ form.errors.get('orientation_state') }}
                        </span>
                    </div>
                </div>

                <!-- Orientation Zip -->
                <div class="form-group" :class="{'has-error': form.errors.has('orientation_zip')}">
                    <label class="col-md-4 control-label">Orientation Zip</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="orientation_zip" v-model="form.orientation_zip">

                        <span class="help-block" v-show="form.errors.has('orientation_zip')">
                            @{{ form.errors.get('orientation_zip') }}
                        </span>
                    </div>
                </div>

                <!-- Written Exam Details -->
                <div class="form-group" :class="{'has-error': form.errors.has('written_exam_details')}">
                    <label class="col-md-4 control-label">Written Exam Details</label>

                    <div class="col-md-6">
                        <textarea class="form-control" name="written_exam_details" v-model="form.written_exam_details" rows="8"></textarea>

                        <span class="help-block" v-show="form.errors.has('written_exam_details')">
                            @{{ form.errors.get('written_exam_details') }}
                        </span>
                    </div>
                </div>

                <!-- Written Exam Label -->
                <div class="form-group" :class="{'has-error': form.errors.has('written_exam_label')}">
                    <label class="col-md-4 control-label">Written Exam Label</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="written_exam_label" v-model="form.written_exam_label">

                        <span class="help-block" v-show="form.errors.has('written_exam_label')">
                            @{{ form.errors.get('written_exam_label') }}
                        </span>
                    </div>
                </div>

                <!-- Written Exam Address1 -->
                <div class="form-group" :class="{'has-error': form.errors.has('written_exam_address1')}">
                    <label class="col-md-4 control-label">Written Exam Address1</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="written_exam_address1" v-model="form.written_exam_address1">

                        <span class="help-block" v-show="form.errors.has('written_exam_address1')">
                            @{{ form.errors.get('written_exam_address1') }}
                        </span>
                    </div>
                </div>

                <!-- Written Exam Address2 -->
                <div class="form-group" :class="{'has-error': form.errors.has('written_exam_address2')}">
                    <label class="col-md-4 control-label">Written Exam Address2</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="written_exam_address2" v-model="form.written_exam_address2">

                        <span class="help-block" v-show="form.errors.has('written_exam_address2')">
                            @{{ form.errors.get('written_exam_address2') }}
                        </span>
                    </div>
                </div>

                <!-- Written Exam City -->
                <div class="form-group" :class="{'has-error': form.errors.has('written_exam_city')}">
                    <label class="col-md-4 control-label">Written Exam City</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="written_exam_city" v-model="form.written_exam_city">

                        <span class="help-block" v-show="form.errors.has('written_exam_city')">
                            @{{ form.errors.get('written_exam_city') }}
                        </span>
                    </div>
                </div>

                <!-- Written Exam State -->
                <div class="form-group" :class="{'has-error': form.errors.has('written_exam_state')}">
                    <label class="col-md-4 control-label">Written Exam State</label>

                    <div class="col-md-6">
                        <select class="form-control" name="written_exam_state" v-model="form.written_exam_state">
                            <option v-for="state_option in state_options" v-bind:value="state_option.value">
                                @{{ state_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('written_exam_state')">
                            @{{ form.errors.get('written_exam_state') }}
                        </span>
                    </div>
                </div>

                <!-- Written Exam Zip -->
                <div class="form-group" :class="{'has-error': form.errors.has('written_exam_zip')}">
                    <label class="col-md-4 control-label">Written Exam Zip</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="written_exam_zip" v-model="form.written_exam_zip">

                        <span class="help-block" v-show="form.errors.has('written_exam_zip')">
                            @{{ form.errors.get('written_exam_zip') }}
                        </span>
                    </div>
                </div>

                <!-- Physical Details -->
                <div class="form-group" :class="{'has-error': form.errors.has('physical_details')}">
                    <label class="col-md-4 control-label">Physical Details</label>

                    <div class="col-md-6">
                        <textarea class="form-control" name="physical_details" v-model="form.physical_details" rows="8"></textarea>

                        <span class="help-block" v-show="form.errors.has('physical_details')">
                            @{{ form.errors.get('physical_details') }}
                        </span>
                    </div>
                </div>

                <!-- Physical Label -->
                <div class="form-group" :class="{'has-error': form.errors.has('physical_label')}">
                    <label class="col-md-4 control-label">Physical Label</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="physical_label" v-model="form.physical_label">

                        <span class="help-block" v-show="form.errors.has('physical_label')">
                            @{{ form.errors.get('physical_label') }}
                        </span>
                    </div>
                </div>

                <!-- Physical Address1 -->
                <div class="form-group" :class="{'has-error': form.errors.has('physical_address1')}">
                    <label class="col-md-4 control-label">Physical Address1</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="physical_address1" v-model="form.physical_address1">

                        <span class="help-block" v-show="form.errors.has('physical_address1')">
                            @{{ form.errors.get('physical_address1') }}
                        </span>
                    </div>
                </div>

                <!-- Physical Address2 -->
                <div class="form-group" :class="{'has-error': form.errors.has('physical_address2')}">
                    <label class="col-md-4 control-label">Physical Address2</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="physical_address2" v-model="form.physical_address2">

                        <span class="help-block" v-show="form.errors.has('physical_address2')">
                            @{{ form.errors.get('physical_address2') }}
                        </span>
                    </div>
                </div>

                <!-- Physical City -->
                <div class="form-group" :class="{'has-error': form.errors.has('physical_city')}">
                    <label class="col-md-4 control-label">Physical City</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="physical_city" v-model="form.physical_city">

                        <span class="help-block" v-show="form.errors.has('physical_city')">
                            @{{ form.errors.get('physical_city') }}
                        </span>
                    </div>
                </div>

                <!-- Physical State -->
                <div class="form-group" :class="{'has-error': form.errors.has('physical_state')}">
                    <label class="col-md-4 control-label">Physical State</label>

                    <div class="col-md-6">
                        <select class="form-control" name="physical_state" v-model="form.physical_state">
                            <option v-for="state_option in state_options" v-bind:value="state_option.value">
                                @{{ state_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('physical_state')">
                            @{{ form.errors.get('physical_state') }}
                        </span>
                    </div>
                </div>

                <!-- Physical Zip -->
                <div class="form-group" :class="{'has-error': form.errors.has('physical_zip')}">
                    <label class="col-md-4 control-label">Physical Zip</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="physical_zip" v-model="form.physical_zip">

                        <span class="help-block" v-show="form.errors.has('physical_zip')">
                            @{{ form.errors.get('physical_zip') }}
                        </span>
                    </div>
                </div>

                <!-- Featured -->
                <div class="form-group" :class="{'has-error': form.errors.has('featured')}">
                    <label class="col-md-4 control-label">Featured</label>

                    <div class="col-md-6">
                        <select class="form-control" name="featured" v-model="form.featured">
                            <option v-for="featured_option in featured_options" v-bind:value="featured_option.value">
                                @{{ featured_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('featured')">
                            @{{ form.errors.get('featured') }}
                        </span>
                    </div>
                </div>

                <!-- Active -->
                <div class="form-group" :class="{'has-error': form.errors.has('active')}">
                    <label class="col-md-4 control-label">Active</label>

                    <div class="col-md-6">
                        <select class="form-control" name="active" v-model="form.active">
                            <option v-for="active_option in active_options" v-bind:value="active_option.value">
                                @{{ active_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('active')">
                            @{{ form.errors.get('active') }}
                        </span>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">

                            Update Position
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</update-position-info>