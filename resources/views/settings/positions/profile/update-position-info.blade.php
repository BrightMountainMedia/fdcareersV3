<update-position-info :position="position" :department="department" inline-template>
    <div class="panel panel-default" v-if="position">
        <div class="panel-heading">
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
                    <label class="col-md-3 control-label" for="department_id">Department ID</label>

                    <div class="col-md-9">
                        <input type="text" class="form-control" id="department_id" name="department_id" v-model="form.department_id" :disabled="! form.active && ! scheduled()">

                        <span class="help-block" v-show="form.errors.has('department_id')">
                            @{{ form.errors.get('department_id') }}
                        </span>
                    </div>
                </div>

                <!-- Position Title -->
                <div class="form-group" :class="{'has-error': form.errors.has('title')}">
                    <label class="col-md-3 control-label" for="title">Title</label>

                    <div class="col-md-9">
                        <input type="text" class="form-control" id="title" name="title" v-model="form.title" :disabled="! form.active && ! scheduled()">

                        <span class="help-block" v-show="form.errors.has('title')">
                            @{{ form.errors.get('title') }}
                        </span>
                    </div>
                </div>

                <!-- Position Salary -->
                <div class="form-group" :class="{'has-error': form.errors.has('salary')}">
                    <label class="col-md-3 control-label" for="salary">Salary</label>

                    <div class="col-md-9">
                        <input type="text" class="form-control" id="salary" name="salary" v-model="form.salary" :disabled="! form.active && ! scheduled()">

                        <span class="help-block" v-show="form.errors.has('salary')">
                            @{{ form.errors.get('salary') }}
                        </span>
                    </div>
                </div>

                <!-- Position Type -->
                <div class="form-group" :class="{'has-error': form.errors.has('position_type')}">
                    <label class="col-md-3 control-label" for="position_type">Position Type</label>

                    <div class="col-md-9">
                        <select class="form-control" id="position_type" name="position_type" v-model="form.position_type" :disabled="! form.active && ! scheduled()">
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
                    <label class="col-md-3 control-label" for="state">State</label>

                    <div class="col-md-9">
                        <select class="form-control" id="state" name="state" v-model="form.state" :disabled="! form.active && ! scheduled()">
                            <option v-for="state_option in state_options" v-bind:value="state_option.value">
                                @{{ state_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('state')">
                            @{{ form.errors.get('state') }}
                        </span>
                    </div>
                </div>

                <!-- Publish -->
                <div class="form-group" :class="{'has-error': form.errors.has('publish')}" v-if="scheduled()">
                    <label class="col-md-3 control-label">Publish</label>
                    
                    <div class="col-md-2">
                        <select class="form-control" name="publishmonth" v-model="form.publishmonth" :disabled="! form.active && ! scheduled()">
                            <option v-for="publish_option in publish_options" v-bind:value="publish_option.value">
                                @{{ publish_option.text }}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="publishday" v-model="form.publishday" size="3" :disabled="! form.active && ! scheduled()">, 
                        <input type="text" name="publishyear" v-model="form.publishyear" size="4" :disabled="! form.active && ! scheduled()"> @
                        <input type="text" name="publishhour" v-model="form.publishhour" size="2" :disabled="! form.active && ! scheduled()"> :
                        <input type="text" name="publishminute" v-model="form.publishminute" size="2" :disabled="! form.active && ! scheduled()">
                    </div>
                    <span class="help-block" v-show="form.errors.has('publish')">
                        @{{ form.errors.get('publish') }}
                    </span>
                </div>

                <!-- Ending -->
                <div class="form-group" :class="{'has-error': form.errors.has('ending')}">
                    <label class="col-md-3 control-label" for="ending">Ending</label>

                    <div class="col-md-9">
                        <select class="form-control" id="ending" name="ending" v-model="form.ending" :disabled="! form.active && ! scheduled()">
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
                    <label class="col-md-3 control-label" for="duedate">Due Date</label>

                    <div class="col-md-9">
                        <input type="text" class="form-control" id="duedate" name="duedate" v-model="form.duedate" :disabled="! form.active && ! scheduled()" />
                        <p class="help-block">YYYY-MM-DD</p>

                        <span class="help-block" v-show="form.errors.has('duedate')">
                            @{{ form.errors.get('duedate') }}
                        </span>
                    </div>
                </div>

                <!-- Application Details -->
                <div class="form-group" :class="{'has-error': form.errors.has('application_details')}">
                    <label class="col-md-3 control-label" for="application_details">Application Details</label>

                    <div class="col-md-9">
                        <textarea class="form-control" id="application_details" name="application_details" v-model="form.application_details" rows="8" :disabled="! form.active && ! scheduled()"></textarea>

                        <span class="help-block" v-show="form.errors.has('application_details')">
                            @{{ form.errors.get('application_details') }}
                        </span>
                    </div>
                </div>

                <!-- Testing Details -->
                <div class="form-group" :class="{'has-error': form.errors.has('testing_details')}">
                    <label class="col-md-3 control-label" for="testing_details">Testing Details</label>

                    <div class="col-md-9">
                        <textarea class="form-control" id="testing_details" name="testing_details" v-model="form.testing_details" rows="8" :disabled="! form.active && ! scheduled()"></textarea>

                        <span class="help-block" v-show="form.errors.has('testing_details')">
                            @{{ form.errors.get('testing_details') }}
                        </span>
                    </div>
                </div>

                <!-- Orientation Details -->
                <div class="form-group" :class="{'has-error': form.errors.has('orientation_details')}">
                    <label class="col-md-3 control-label" for="orientation_details">Orientation Details</label>

                    <div class="col-md-9">
                        <textarea class="form-control" id="orientation_details" name="orientation_details" v-model="form.orientation_details" rows="8" :disabled="! form.active && ! scheduled()"></textarea>

                        <span class="help-block" v-show="form.errors.has('orientation_details')">
                            @{{ form.errors.get('orientation_details') }}
                        </span>
                    </div>
                </div>

                <!-- Duties / Requirements -->
                <div class="form-group" :class="{'has-error': form.errors.has('requirements')}">
                    <label class="col-md-3 control-label" for="requirements">Duties / Requirements</label>

                    <div class="col-md-9">
                        <textarea class="form-control" id="requirements" name="requirements" v-model="form.requirements" rows="8" :disabled="! form.active && ! scheduled()"></textarea>

                        <span class="help-block" v-show="form.errors.has('requirements')">
                            @{{ form.errors.get('requirements') }}
                        </span>
                    </div>
                </div>

                <!-- Qualifications -->
                <div class="form-group" :class="{'has-error': form.errors.has('qualifications')}">
                    <label class="col-md-3 control-label" for="qualifications">Qualifications</label>

                    <div class="col-md-9">
                        <textarea class="form-control" id="qualifications" name="qualifications" v-model="form.qualifications" rows="8" :disabled="! form.active && ! scheduled()"></textarea>

                        <span class="help-block" v-show="form.errors.has('qualifications')">
                            @{{ form.errors.get('qualifications') }}
                        </span>
                    </div>
                </div>

                <!-- Residency Requirements -->
                <div class="form-group" :class="{'has-error': form.errors.has('residency_requirements')}">
                    <label class="col-md-3 control-label" for="residency_requirements">Residency Requirements</label>

                    <div class="col-md-9">
                        <textarea class="form-control" id="residency_requirements" name="residency_requirements" v-model="form.residency_requirements" rows="8" :disabled="! form.active && ! scheduled()"></textarea>

                        <span class="help-block" v-show="form.errors.has('residency_requirements')">
                            @{{ form.errors.get('residency_requirements') }}
                        </span>
                    </div>
                </div>

                <!-- Applications Available Start -->
                <div class="form-group" :class="{'has-error': form.errors.has('applications_available_start')}">
                    <label class="col-md-3 control-label" for="applications_available_start">Applications Available Start</label>

                    <div class="col-md-9">
                        <input type="text" class="form-control" id="applications_available_start" name="applications_available_start" v-model="form.applications_available_start" :disabled="! form.active && ! scheduled()">
                        <p class="help-block">YYYY-MM-DD</p>

                        <span class="help-block" v-show="form.errors.has('applications_available_start')">
                            @{{ form.errors.get('applications_available_start') }}
                        </span>
                    </div>
                </div>

                <!-- Applications Available End -->
                <div class="form-group" :class="{'has-error': form.errors.has('applications_available_end')}">
                    <label class="col-md-3 control-label" for="applications_available_end">Applications Available End</label>

                    <div class="col-md-9">
                        <input type="text" class="form-control" id="applications_available_end" name="applications_available_end" v-model="form.applications_available_end" :disabled="! form.active && ! scheduled()">
                        <p class="help-block">YYYY-MM-DD</p>

                        <span class="help-block" v-show="form.errors.has('applications_available_end')">
                            @{{ form.errors.get('applications_available_end') }}
                        </span>
                    </div>
                </div>

                <!-- YouTube Video ID -->
                <div class="form-group" :class="{'has-error': form.errors.has('video')}">
                    <label class="col-md-3 control-label" for="video">YouTube Video ID</label>

                    <div class="col-md-9">
                        <input type="text" class="form-control" id="video" name="video" v-model="form.video" :disabled="! form.active && ! scheduled()">
                        <p class="help-block">You can paste the share URL here and it will extract the video ID from that.</p>

                        <span class="help-block" v-show="form.errors.has('video')">
                            @{{ form.errors.get('video') }}
                        </span>
                    </div>
                </div>

                <!-- Apply Link -->
                <div class="form-group" :class="{'has-error': form.errors.has('apply_link')}">
                    <label class="col-md-3 control-label" for="apply_link">Apply Link</label>

                    <div class="col-md-9">
                        <input type="text" class="form-control" id="apply_link" name="apply_link" v-model="form.apply_link" :disabled="! form.active && ! scheduled()">

                        <span class="help-block" v-show="form.errors.has('apply_link')">
                            @{{ form.errors.get('apply_link') }}
                        </span>
                    </div>
                </div>

                <!-- Featured -->
                <div class="form-group" :class="{'has-error': form.errors.has('featured')}">
                    <label class="col-md-3 control-label" for="featured">Featured</label>

                    <div class="col-md-9">
                        <select class="form-control" id="featured" name="featured" v-model="form.featured" :disabled="! form.active && ! scheduled()">
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
                    <label class="col-md-3 control-label" for="active">Active</label>

                    <div class="col-md-9">
                        <select class="form-control" id="active" name="active" v-model="form.active">
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
                    <div class="col-md-offset-3 col-md-9">
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