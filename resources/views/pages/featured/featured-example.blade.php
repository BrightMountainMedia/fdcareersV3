<featured-example inline-template>
    <div class="panel panel-default">
        <div class="panel-heading">
            Featured Position
            <div class="pull-right">
                <span class='st_facebook_hcount' displayText='Facebook'></span>
                <span class='st_twitter_hcount' displayText='Tweet'></span>
                <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                <span class='st_email_hcount' displayText='Email'></span>
            </div>
        </div>
        <div class="panel-body">
            <span class="featured-title">@{{ featuredPosition.title }}</span>
            <p>@{{ featuredPosition.application_details }} <a :href="more">learn more</a></p>
        </div>
    </div>
</featured-example>