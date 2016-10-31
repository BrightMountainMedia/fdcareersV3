<departments :departments="departments" inline-template>
    <div>
        @if (Spark::developer(Auth::user()->email))
        <div>
            <div class="panel panel-default panel-flush" v-show=" ! showingDepartmentProfile && ! showingPositionProfile">
                <!-- Create Button -->
                <button type="submit" class="btn btn-primary btn-block" @click="addDepartment()">
                    <i class="fa fa-plus"></i> Add Department
                </button>
            </div>

            <div v-show=" ! showingDepartmentProfile && ! showingPositionProfile">
                <!-- Search Field Panel -->
                <div class="panel panel-default panel-flush" style="border: 0;">
                    <div class="panel-body">
                        <form class="form-horizontal p-b-none" role="form" @submit.prevent>
                            {{ csrf_field() }}

                            <!-- Search Field -->
                            <div class="form-group m-b-none">
                                <div class="col-md-12">
                                    <input type="text" id="kiosk-departments-search" class="form-control"
                                        name="dept_search"
                                        placeholder="Search By Department Name, HQ City, HQ State Or Department E-Mail Address..."
                                        v-model="searchForm.query"
                                        @keyup.enter="search">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Searching -->
                <div class="panel panel-default" v-if="searching">
                    <div class="panel-heading">Search Results</div>

                    <div class="panel-body">
                        <i class="fa fa-btn fa-spinner fa-spin"></i>Searching
                    </div>
                </div>

                <!-- No Search Results -->
                <div class="panel panel-warning" v-if=" ! searching && noSearchResults">
                    <div class="panel-heading">Search Results</div>

                    <div class="panel-body">
                        No departments matched the given criteria.
                    </div>
                </div>

                <!-- Department Search Results -->
                <div class="panel panel-default" v-if=" ! searching && searchResults.length > 0">
                    <div class="panel-heading">Search Results</div>

                    <div class="panel-body">
                        <table class="table table-borderless m-b-none">
                            <thead>
                                <th>Department Name</th>
                                <th>HQ City</th>
                                <th>HQ State</th>
                                <th></th>
                            </thead>

                            <tbody>
                                <tr v-for="searchDepartment in searchResults">
                                    <!-- Department Name -->
                                    <td>
                                        <div class="btn-table-align">
                                            @{{ searchDepartment.name }}
                                        </div>
                                    </td>

                                    <!-- Department City -->
                                    <td>
                                        <div class="btn-table-align">
                                            @{{ searchDepartment.hq_city }}
                                        </div>
                                    </td>

                                    <!-- Department State -->
                                    <td>
                                        <div class="btn-table-align">
                                            @{{ searchDepartment.hq_state }}
                                        </div>
                                    </td>

                                    <td>
                                        <!-- View Department Profile -->
                                        <button class="btn btn-default" @click="showDepartmentProfile(searchDepartment)">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- List all Departments current user owns -->
        <div v-show=" ! showingDepartmentProfile && ! showingPositionProfile && ! searching && ! searchResults.length && ! noSearchResults">
            <div class="panel panel-default">
                <div class="panel-heading">Your Departments</div>

                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item" v-for="department in departments" @click="showDepartmentProfile(department)">
                            @{{ department.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Department Profile Detail -->
        <div v-show="showingDepartmentProfile">
            @include('settings.departments.department-profile')
        </div>

        <!-- Position Profile Detail -->
        <div v-show="showingPositionProfile">
            @include('settings.positions.position-profile')
        </div>

        @if (Spark::developer(Auth::user()->email))
        <!-- Add Department Modal -->
        <div>
            @include('settings.departments.modals.add-department')
        </div>
        @endif
    </div>
</departments>