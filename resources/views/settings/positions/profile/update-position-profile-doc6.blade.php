<update-position-profile-doc6 :position="position" inline-template>
    <div>
        <div class="panel panel-default" v-if="position">
            <div class="panel-heading">Document 6</div>

            <div class="panel-body">
                <!-- Success Message -->
                <div class="alert alert-success" v-if="labelForm.successful">
                    Your Document 6 Label has been updated!
                </div>

                <form class="form-horizontal" role="form" v-if="position.doc6_url">
                    <!-- Document 6 -->
                    <div class="form-group" :class="{'has-error': labelForm.errors.has('doc6_title')}">
                        <label class="col-md-2 control-label">Label:</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="doc6_title" v-model="labelForm.doc6_title">

                            <span class="help-block" v-show="labelForm.errors.has('doc6_title')">
                                @{{ labelForm.errors.get('doc6_title') }}
                            </span>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"
                                    @click.prevent="update_doc6_title"
                                    :disabled="labelForm.busy">

                                <span v-if="labelForm.busy">
                                    <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                                </span>

                                <span v-else>
                                    Update
                                </span>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="alert alert-danger" v-if="urlForm.errors.has('doc6_url')">
                    @{{ urlForm.errors.get('doc6_url') }}
                </div>

                <form class="form-horizontal" role="form" v-if="position.doc6_url">
                    <div class="form-group" v-show="position.doc6_url">
                        <label class="col-md-2 control-label">Link:</label>

                        <div class="col-md-10">
                            <a :href="doc6_url" target="_blank">@{{ position.doc6_url }}</a>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <label type="button" class="btn btn-primary btn-upload" :disabled="urlForm.busy">
                                <span v-if="position.doc6_url">Update PDF</span>
                                <span v-else>Upload PDF</span>

                                <input ref="doc6_url" type="file" class="form-control" name="doc6_url" @change="update_doc6_url">
                            </label>
                        </div>
                    </div>
                </form>

                <div class="alert alert-danger" v-if="dualForm.errors.has('doc6_url')">
                    @{{ dualForm.errors.get('doc6_url') }}
                </div>

                <form class="form-horizontal" role="form" v-if="! position.doc6_url">
                    <!-- Document 6 -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Label:</label>

                        <div class="col-md-10">
                            <input type="text" class="form-control" name="doc6_title" v-model="dualForm.doc6_title">
                        </div>
                    </div>

                    <div class="form-group" v-show="position.doc6_url">
                        <label class="col-md-2 control-label">Link:</label>

                        <div class="col-md-10">
                            <a :href="doc6_url" target="_blank">@{{ position.doc6_url }}</a>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <label type="button" class="btn btn-primary btn-upload" :disabled="dualForm.busy">
                                <span v-if="position.doc6_url">Update PDF</span>
                                <span v-else>Upload PDF</span>

                                <input ref="doc6_url" type="file" class="form-control" name="doc6_url" @change="update_both">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</update-position-profile-doc6>
