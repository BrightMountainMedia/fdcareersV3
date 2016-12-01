<add-position inline-template>
    <div>
        <div class="modal fade" id="modal-add-position" tabindex="-1" role="dialog">
            <div class="modal-dialog" v-if="addingPosition">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Add Position
                        </h4>
                    </div>

                    <div class="modal-body">
                        <!-- Add Position Form -->
                        <form class="form-horizontal" role="form">
                            {{ csrf_field() }}

                            <input type="hidden" name="department_id" v-model="form.department_id">

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

                            <!-- Position Salary -->
                            <div class="form-group" :class="{'has-error': form.errors.has('salary')}">
                                <label class="col-md-4 control-label">Salary</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="salary" v-model="form.salary">

                                    <span class="help-block" v-show="form.errors.has('salary')">
                                        @{{ form.errors.get('salary') }}
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

                            <!-- Schedule -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Schedule</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="scheduled" v-model="form.scheduled">
                                        <option v-for="scheduled_option in scheduled_options" v-bind:value="scheduled_option.value">
                                            @{{ scheduled_option.text }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Publish -->
                            <div class="form-group" :class="{'has-error': form.errors.has('publish')}" v-if="this.form.scheduled === '1'">
                                <label class="col-md-4 control-label">Publish</label>
                                
                                <div class="col-md-2">
                                    <select class="form-control" name="publishmonth" v-model="form.publishmonth">
                                        <option v-for="publish_option in publish_options" v-bind:value="publish_option.value">
                                            @{{ publish_option.text }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="publishday" v-model="form.publishday" size="2">, 
                                    <input type="text" name="publishyear" v-model="form.publishyear" size="4"> @
                                    <input type="text" name="publishhour" v-model="form.publishhour" size="2"> :
                                    <input type="text" name="publishminute" v-model="form.publishminute" size="2">
                                </div>
                                <span class="help-block" v-show="form.errors.has('publish')">
                                    @{{ form.errors.get('publish') }}
                                </span>
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

                            <!-- Testing Details -->
                            <div class="form-group" :class="{'has-error': form.errors.has('testing_details')}">
                                <label class="col-md-4 control-label">Testing Details</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="testing_details" v-model="form.testing_details" rows="8"></textarea>

                                    <span class="help-block" v-show="form.errors.has('testing_details')">
                                        @{{ form.errors.get('testing_details') }}
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

                            <!-- Duties / Requirements -->
                            <div class="form-group" :class="{'has-error': form.errors.has('requirements')}">
                                <label class="col-md-4 control-label">Duties / Requirements</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="requirements" v-model="form.requirements" rows="8"></textarea>

                                    <span class="help-block" v-show="form.errors.has('requirements')">
                                        @{{ form.errors.get('requirements') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Qualifications -->
                            <div class="form-group" :class="{'has-error': form.errors.has('qualifications')}">
                                <label class="col-md-4 control-label">Qualifications</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="qualifications" v-model="form.qualifications" rows="8"></textarea>

                                    <span class="help-block" v-show="form.errors.has('qualifications')">
                                        @{{ form.errors.get('qualifications') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Residency Requirements -->
                            <div class="form-group" :class="{'has-error': form.errors.has('residency_requirements')}">
                                <label class="col-md-4 control-label">Residency Requirements</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="residency_requirements" v-model="form.residency_requirements" rows="8"></textarea>

                                    <span class="help-block" v-show="form.errors.has('residency_requirements')">
                                        @{{ form.errors.get('residency_requirements') }}
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

                            <!-- YouTube Video ID -->
                            <div class="form-group" :class="{'has-error': form.errors.has('video')}">
                                <label class="col-md-4 control-label">YouTube Video ID</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="video" v-model="form.video">
                                    <p class="help-block">You can paste the share URL here and it will extract the video ID from that.</p>

                                    <span class="help-block" v-show="form.errors.has('video')">
                                        @{{ form.errors.get('video') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Apply Link -->
                            <div class="form-group" :class="{'has-error': form.errors.has('apply_link')}">
                                <label class="col-md-4 control-label">Apply Link</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="apply_link" v-model="form.apply_link">

                                    <span class="help-block" v-show="form.errors.has('apply_link')">
                                        @{{ form.errors.get('apply_link') }}
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
                        </form>
                    </div>

                    <p class="bg-info align-center">After you save the position, you will be able to upload your documents.</p>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                        <button type="button" class="btn btn-primary" @click="savePosition" :disabled="form.busy">
                            <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Adding
                            </span>

                            <span v-else>
                                Save Position
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</add-position>