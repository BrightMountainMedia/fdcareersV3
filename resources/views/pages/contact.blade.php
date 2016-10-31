@extends('spark::layouts.app')

@section('content')
<contact inline-template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Contact Us</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <!-- Name -->
                            <div class="form-group" :class="{'has-error': contactForm.errors.has('name')}">
                                <label class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" v-model="contactForm.name" autofocus>

                                    <span class="help-block" v-show="contactForm.errors.has('name')">
                                        @{{ contactForm.errors.get('name') }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- E-Mail Address -->
                            <div class="form-group" :class="{'has-error': contactForm.errors.has('email')}">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" v-model="contactForm.email">

                                    <span class="help-block" v-show="contactForm.errors.has('email')">
                                        @{{ contactForm.errors.get('email') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="form-group" :class="{'has-error': contactForm.errors.has('message')}">
                                <label class="col-md-4 control-label">Message</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="message" v-model="contactForm.message"></textarea>

                                    <span class="help-block" v-show="contactForm.errors.has('message')">
                                        @{{ contactForm.errors.get('message') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Send -->
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" @click.prevent="send" :disabled="contactForm.busy">
                                        <span v-if="contactForm.busy">
                                            <i class="fa fa-btn fa-spinner fa-spin"></i>Sending
                                        </span>

                                        <span v-else>
                                            Send
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</contact>
@endsection