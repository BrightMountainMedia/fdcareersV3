<spark-profile :user="user" inline-template>
    <div>
        <!-- Update Profile Photo -->
        @include('spark::settings.profile.update-profile-photo')

        <!-- Update Contact Information -->
        @include('spark::settings.profile.update-contact-information')

        <!-- Update Notification Information -->
        @include('spark::settings.profile.update-notification-details')
    </div>
</spark-profile>
