<update-position-profile-doc3 :position="position" inline-template>
    <div>
        <div class="panel panel-default" v-if="position">
            <div class="panel-heading">Document 3</div>

            <div class="panel-body">
                <!-- Success Message -->
                <div class="alert alert-success" v-if="labelForm.successful">
                    Your Document 3 Label has been updated!
                </div>

                <form class="form-horizontal" role="form" v-if="position.doc3_url">
                    <!-- Document 3 -->
                    <div class="form-group" :class="{'has-error': labelForm.errors.has('doc3_title')}">
                        <label class="col-md-2 control-label" for="doc3_title">Label:</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" id="doc3_title" name="doc3_title" v-model="labelForm.doc3_title">

                            <span class="help-block" v-show="labelForm.errors.has('doc3_title')">
                                @{{ labelForm.errors.get('doc3_title') }}
                            </span>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"
                                    @click.prevent="update_doc3_title"
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

                <div class="alert alert-danger" v-if="urlForm.errors.has('doc3_url')">
                    @{{ urlForm.errors.get('doc3_url') }}
                </div>

                <form class="form-horizontal" role="form" v-if="position.doc3_url">
                    <div class="form-group" v-show="position.doc3_url">
                        <label class="col-md-2 control-label">Link:</label>

                        <div class="col-md-10">
                            <a :href="doc3_url" target="_blank">@{{ position.doc3_url }}</a>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <label type="button" class="btn btn-primary btn-upload" :disabled="urlForm.busy">
                                <span v-if="position.doc3_url">Update PDF</span>
                                <span v-else>Upload PDF</span>

                                <input ref="doc3_url" type="file" class="form-control" name="doc3_url" @change="update_doc3_url">
                            </label>
                        </div>
                    </div>
                </form>

                <div class="alert alert-danger" v-if="dualForm.errors.has('doc3_url')">
                    @{{ dualForm.errors.get('doc3_url') }}
                </div>

                <form class="form-horizontal" role="form" v-if="! position.doc3_url">
                    <!-- Document 3 -->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="doc3_title">Label:</label>

                        <div class="col-md-10">
                            <input type="text" class="form-control" id="doc3_title" name="doc3_title" v-model="dualForm.doc3_title">
                        </div>
                    </div>

                    <div class="form-group" v-show="position.doc3_url">
                        <label class="col-md-2 control-label">Link:</label>

                        <div class="col-md-10">
                            <a :href="doc3_url" target="_blank">@{{ position.doc3_url }}</a>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <label type="button" class="btn btn-primary btn-upload" :disabled="dualForm.busy">
                                <span v-if="position.doc3_url">Update PDF</span>
                                <span v-else>Upload PDF</span>

                                <input ref="doc3_url" type="file" class="form-control" name="doc3_url" @change="update_both">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</update-position-profile-doc3>
