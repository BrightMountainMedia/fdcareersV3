<update-position-profile-doc2 :position="position" inline-template>
    <div>
        <div class="panel panel-default" v-if="position">
            <div class="panel-heading">Document 2</div>

            <div class="panel-body">
                <!-- Success Message -->
                <div class="alert alert-success" v-if="labelForm.successful">
                    Your Document 2 Label has been updated!
                </div>

                <form class="form-horizontal" role="form" v-if="position.doc2_url">
                    <!-- Document 2 -->
                    <div class="form-group" :class="{'has-error': labelForm.errors.has('doc2_title')}">
                        <label class="col-md-2 control-label" for="doc2_title">Label:</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" id="doc2_title" name="doc2_title" v-model="labelForm.doc2_title">

                            <span class="help-block" v-show="labelForm.errors.has('doc2_title')">
                                @{{ labelForm.errors.get('doc2_title') }}
                            </span>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"
                                    @click.prevent="update_doc2_title"
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

                <div class="alert alert-danger" v-if="urlForm.errors.has('doc2_url')">
                    @{{ urlForm.errors.get('doc2_url') }}
                </div>

                <form class="form-horizontal" role="form" v-if="position.doc2_url">
                    <div class="form-group" v-show="position.doc2_url">
                        <label class="col-md-2 control-label">Link:</label>

                        <div class="col-md-10">
                            <a :href="doc2_url" target="_blank">@{{ position.doc2_url }}</a>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <label type="button" class="btn btn-primary btn-upload" :disabled="urlForm.busy">
                                <span v-if="position.doc2_url">Update PDF</span>
                                <span v-else>Upload PDF</span>

                                <input ref="doc2_url" type="file" class="form-control" name="doc2_url" @change="update_doc2_url">
                            </label>
                        </div>
                    </div>
                </form>

                <div class="alert alert-danger" v-if="dualForm.errors.has('doc2_url')">
                    @{{ dualForm.errors.get('doc2_url') }}
                </div>

                <form class="form-horizontal" role="form" v-if="! position.doc2_url">
                    <!-- Document 2 -->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="doc2_title">Label:</label>

                        <div class="col-md-10">
                            <input type="text" class="form-control" id="doc2_title" name="doc2_title" v-model="dualForm.doc2_title">
                        </div>
                    </div>

                    <div class="form-group" v-show="position.doc2_url">
                        <label class="col-md-2 control-label">Link:</label>

                        <div class="col-md-10">
                            <a :href="doc2_url" target="_blank">@{{ position.doc2_url }}</a>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">&nbsp;</label>

                        <div class="col-md-6">
                            <label type="button" class="btn btn-primary btn-upload" :disabled="dualForm.busy">
                                <span v-if="position.doc2_url">Update PDF</span>
                                <span v-else>Upload PDF</span>

                                <input ref="doc2_url" type="file" class="form-control" name="doc2_url" @change="update_both">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</update-position-profile-doc2>
