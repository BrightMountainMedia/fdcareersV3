<update-position-profile-doc5 :position="position" inline-template>
    <div>
        <div class="panel panel-default" v-if="position">
            <div class="panel-heading">Document 5</div>

            <div class="panel-body">
                <!-- Success Message -->
                <div class="alert alert-success" v-if="labelForm.successful">
                    Your Document 5 Label has been updated!
                </div>

                <form class="form-horizontal" role="form" v-if="position.doc5_title">
                    <!-- Document 5 -->
                    <div class="form-group" :class="{'has-error': labelForm.errors.has('doc5_title')}">
                        <label class="col-md-4 control-label">Label:</label>

                        <div class="col-md-5">
                            <input type="text" class="form-control" name="doc5_title" v-model="labelForm.doc5_title">

                            <span class="help-block" v-show="labelForm.errors.has('doc5_title')">
                                @{{ labelForm.errors.get('doc5_title') }}
                            </span>
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary"
                                    @click.prevent="update_doc5_title"
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

                <div class="alert alert-danger" v-if="urlForm.errors.has('doc5_url')">
                    @{{ urlForm.errors.get('doc5_url') }}
                </div>

                <form class="form-horizontal" role="form" v-if="position.doc5_title">
                    <div class="form-group" v-show="position.doc5_url">
                        <label class="col-md-4 control-label">Link:</label>

                        <div class="col-md-6">
                            <a :href="doc5_url" target="_blank">@{{ position.doc5_url }}</a>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <label type="button" class="btn btn-primary btn-upload" :disabled="urlForm.busy">
                                <span v-if="position.doc5_url">Update PDF</span>
                                <span v-else>Upload PDF</span>

                                <input ref="doc5_url" type="file" class="form-control" name="doc5_url" @change="update_doc5_url">
                            </label>
                        </div>
                    </div>
                </form>

                <div class="alert alert-danger" v-if="dualForm.errors.has('doc5_url')">
                    @{{ dualForm.errors.get('doc5_url') }}
                </div>

                <form class="form-horizontal" role="form" v-if="! position.doc5_title">
                    <!-- Document 5 -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Label:</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="doc5_title" v-model="dualForm.doc5_title">
                        </div>
                    </div>

                    <div class="form-group" v-show="position.doc5_url">
                        <label class="col-md-4 control-label">Link:</label>

                        <div class="col-md-6">
                            <a :href="doc5_url" target="_blank">@{{ position.doc5_url }}</a>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <label type="button" class="btn btn-primary btn-upload" :disabled="dualForm.busy">
                                <span v-if="position.doc5_url">Update PDF</span>
                                <span v-else>Upload PDF</span>

                                <input ref="doc5_url" type="file" class="form-control" name="doc5_url" @change="update_both">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</update-position-profile-doc5>
