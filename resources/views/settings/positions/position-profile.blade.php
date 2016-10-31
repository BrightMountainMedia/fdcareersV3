<position-profile inline-template>
    <div>
        <div class="row" v-if="loading">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i class="fa fa-btn fa-spinner fa-spin"></i>Loading
                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-if=" ! loading && error">
            <div class="panel panel-default" v-if="error">
                <div class="panel-heading">
                    <i class="fa fa-btn fa-times" style="cursor: pointer;" @click="showSearch()"></i>
                    Error
                </div>

                <div class="panel-body">
                    <strong>@{{ error }}</strong>
                </div>
            </div>
        </div>

        <div v-if=" ! loading && position">
            <div class="row">
                <div class="col-md-12">
                    <!-- Update Position Information -->
                    @include('settings.positions.profile.update-position-info')

                    <!-- Update Position Profile Doc1 -->
                    @include('settings.positions.profile.update-position-profile-doc1')

                    <!-- Update Position Profile Doc2 -->
                    @include('settings.positions.profile.update-position-profile-doc2')

                    <!-- Update Position Profile Doc3 -->
                    @include('settings.positions.profile.update-position-profile-doc3')

                    <!-- Update Position Profile Doc4 -->
                    @include('settings.positions.profile.update-position-profile-doc4')

                    <!-- Update Position Profile Doc5 -->
                    @include('settings.positions.profile.update-position-profile-doc5')

                    <!-- Update Position Profile Doc6 -->
                    @include('settings.positions.profile.update-position-profile-doc6')
                </div>
            </div>
        </div>
    </div>
</position-profile>