<update-notification-details :user="user" inline-template>
    <div class="panel panel-default">
        <div class="panel-heading">Notification Details</div>

        <div class="panel-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                Your Notification Details have been updated!
            </div>

            <form class="form-horizontal" role="form">
                {{ csrf_field() }}

                <!-- App Notification -->
                <div class="form-group" :class="{'has-error': form.errors.has('app_notification')}">
                    <label class="col-md-4 control-label">App Notification</label>

                    <div class="col-md-6">
                        <select class="form-control" name="app_notification" v-model="form.app_notification">
                            <option v-for="app_option in app_options" v-bind:value="app_option.value">
                                @{{ app_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('app_notification')">
                            @{{ form.errors.get('app_notification') }}
                        </span>
                    </div>
                </div>

                <!-- Email Notification -->
                <div class="form-group" :class="{'has-error': form.errors.has('email_notification')}">
                    <label class="col-md-4 control-label">Email Notification</label>

                    <div class="col-md-6">
                        <select class="form-control" name="email_notification" v-model="form.email_notification">
                            <option v-for="email_option in email_options" v-bind:value="email_option.value">
                                @{{ email_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('email_notification')">
                            @{{ form.errors.get('email_notification') }}
                        </span>
                    </div>
                </div>

                <!-- SMS Notification -->
                <div class="form-group" :class="{'has-error': form.errors.has('sms_notification')}">
                    <label class="col-md-4 control-label">SMS Notification</label>

                    <div class="col-md-6">
                        <select class="form-control" name="sms_notification" v-model="form.sms_notification">
                            <option v-for="sms_option in sms_options" v-bind:value="sms_option.value">
                                @{{ sms_option.text }}
                            </option>
                        </select>

                        <span class="help-block" v-show="form.errors.has('sms_notification')">
                            @{{ form.errors.get('sms_notification') }}
                        </span>
                    </div>
                </div>

                <!-- SMS Phone -->
                <div class="form-group" :class="{'has-error': form.errors.has('sms_phone')}" v-show="form.sms_notification == 1">
                    <label class="col-md-4 control-label">SMS Phone</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="sms_phone" v-model="form.sms_phone" autofocus>

                        <span class="help-block" v-show="form.errors.has('sms_phone')">
                            @{{ form.errors.get('sms_phone') }}
                        </span>
                    </div>
                </div>

                <!-- Notification States -->
                <div class="form-group" :class="{'has-error': form.errors.has('notification_states')}" v-show="this.form.app_notification == 1 || this.form.email_notification == 1 || this.form.sms_notification == 1">
                    <label class="col-md-4 control-label">Email Notification States<br/><span class="help-block">(Each state you choose, you will receive an email notification each time a job is posted within that state)</span></label>

                    <div class="col-md-6">
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="AL" v-model="form.notification_states"> AL</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="AK" v-model="form.notification_states"> AK</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="AZ" v-model="form.notification_states"> AZ</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="AR" v-model="form.notification_states"> AR</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="CA" v-model="form.notification_states"> CA</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="CO" v-model="form.notification_states"> CO</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="CT" v-model="form.notification_states"> CT</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="DE" v-model="form.notification_states"> DE</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="DC" v-model="form.notification_states"> DC</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="FL" v-model="form.notification_states"> FL</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="GA" v-model="form.notification_states"> GA</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="HI" v-model="form.notification_states"> HI</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="ID" v-model="form.notification_states"> ID</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="IL" v-model="form.notification_states"> IL</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="IN" v-model="form.notification_states"> IN</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="IA" v-model="form.notification_states"> IA</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="KS" v-model="form.notification_states"> KS</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="KY" v-model="form.notification_states"> KY</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="LA" v-model="form.notification_states"> LA</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="ME" v-model="form.notification_states"> ME</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="MD" v-model="form.notification_states"> MD</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="MA" v-model="form.notification_states"> MA</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="MI" v-model="form.notification_states"> MI</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="MN" v-model="form.notification_states"> MN</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="MS" v-model="form.notification_states"> MS</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="MO" v-model="form.notification_states"> MO</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="MT" v-model="form.notification_states"> MT</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="NE" v-model="form.notification_states"> NE</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="NV" v-model="form.notification_states"> NV</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="NH" v-model="form.notification_states"> NH</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="NJ" v-model="form.notification_states"> NJ</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="NM" v-model="form.notification_states"> NM</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="NY" v-model="form.notification_states"> NY</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="NC" v-model="form.notification_states"> NC</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="ND" v-model="form.notification_states"> ND</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="OH" v-model="form.notification_states"> OH</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="OK" v-model="form.notification_states"> OK</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="OR" v-model="form.notification_states"> OR</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="PA" v-model="form.notification_states"> PA</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="RI" v-model="form.notification_states"> RI</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="SC" v-model="form.notification_states"> SC</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="SD" v-model="form.notification_states"> SD</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="TN" v-model="form.notification_states"> TN</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="TX" v-model="form.notification_states"> TX</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="UT" v-model="form.notification_states"> UT</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="VT" v-model="form.notification_states"> VT</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="VA" v-model="form.notification_states"> VA</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="WA" v-model="form.notification_states"> WA</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="WV" v-model="form.notification_states"> WV</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="WI" v-model="form.notification_states"> WI</label>
                        <label><input type="checkbox" class="form-control" name="notification_states[]" value="WY" v-model="form.notification_states"> WY</label>

                        <span class="help-block" v-show="form.errors.has('notification_states')">
                            @{{ form.errors.get('notification_states') }}
                        </span>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">

                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</update-notification-details>