<update-position-profile-doc4 :position="position" inline-template>
    <div>
        <div class="panel panel-default" v-if="position">
            <div class="panel-heading">Document 4</div>

            <div class="panel-body">
                <!-- Success Message -->
                <div class="alert alert-success" v-if="labelForm.successful">
                    Your Document 4 Label has been updated!
                </div>

                <form class="form-horizontal" role="form" v-if="position.doc4_title">
                    <!-- Document 4 -->
                    <div class="form-group" :class="{'has-error': labelForm.errors.has('doc4_title')}">
                        <label class="col-md-4 control-label">Label:</label>

                        <div class="col-md-5">
                            <input type="text" class="form-control" name="doc4_title" v-model="labelForm.doc4_title">

                            <span class="help-block" v-show="labelForm.errors.has('doc4_title')">
                                @{{ labelForm.errors.get('doc4_title') }}
                            </span>
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary"
                                    @click.prevent="update_doc4_title"
                                    :disabled="labelForm.busy">

                                <span v-if="labelForm.busy">
                                    <i class="fa fa-btn fa-spinner fa-spin"></i>Updating Label
                                </span>

                                <span v-else>
                                    Update Label
                                </span>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="alert alert-danger" v-if="urlForm.errors.has('doc4_url')">
                    @{{ urlForm.errors.get('doc4_url') }}
                </div>

                <form class="form-horizontal" role="form" v-if="position.doc4_title">
                    <div class="form-group" v-show="position.doc4_url">
                        <label class="col-md-4 control-label">Link:</label>

                        <div class="col-md-6">
                            <a :href="doc4_url" target="_blank">@{{ position.doc4_url }}</a>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <label type="button" class="btn btn-primary btn-upload" :disabled="urlForm.busy">
                                <span v-if="position.doc4_url">Update PDF</span>
                                <span v-else>Upload PDF</span>

                                <input ref="doc4_url" type="file" class="form-control" name="doc4_url" @change="update_doc4_url">
                            </label>
                        </div>
                    </div>
                </form>

                <div class="alert alert-danger" v-if="dualForm.errors.has('doc4_url')">
                    @{{ dualForm.errors.get('doc4_url') }}
                </div>

                <form class="form-horizontal" role="form" v-if="! position.doc4_title">
                    <!-- Document 4 -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Label:</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="doc4_title" v-model="dualForm.doc4_title">
                        </div>
                    </div>

                    <div class="form-group" v-show="position.doc4_url">
                        <label class="col-md-4 control-label">Link:</label>

                        <div class="col-md-6">
                            <a :href="doc4_url" target="_blank">@{{ position.doc4_url }}</a>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <label type="button" class="btn btn-primary btn-upload" :disabled="dualForm.busy">
                                <span v-if="position.doc4_url">Update PDF</span>
                                <span v-else>Upload PDF</span>

                                <input ref="doc4_url" type="file" class="form-control" name="doc4_url" @change="update_both">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</update-position-profile-doc4>
