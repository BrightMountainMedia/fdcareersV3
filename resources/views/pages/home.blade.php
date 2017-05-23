@extends('spark::layouts.app')

@section('meta')
<meta property="og:app_id" content="611587618967503" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.fdcareers.com/" />
<meta property="og:title" content="Why FD Careers?" />
<meta property="og:description" content="Many services require you to visit their website every day to keep current on who is hiring. If you're busy or don't have the time to sort through old listings on their message boards, you might miss the department you want to work for... not with FD Careers. With FD Careers, we will send job alerts directly to your inbox!" />
<meta property="og:image" content="https://www.fdcareers.com/img/facebook.jpg" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>
                    <div class="panel-body">
                        <div class="content-container">
                            <h2>Starting the Hiring Process</h2>
                            <img src="{{ url('/img/fire-closet.jpg') }}" alt="Starting the Hiring Process" align="left" style="margin: 5px 10px 0 0;" />
                            <p>A crucial step in landing a firefighter job is knowing which fire departments are accepting applications. <u><em><strong>We send out over <u><em>300 new fire job notices every month</em></u>!</strong></em></u> And with <u><em><strong>a database of over 800 active fire jobs</strong></em></u>, FD Careers will keep you on top of which departments have posted fire jobs, where to go and what you need to do to start your career as a full-time firefighter.</p>
                        </div>
                        <!-- <a href="/accepting" class="btn btn-primary">Learn More</a> -->
                        <div class="content-container">
                            <h2>How to become firefighter?</h2>
                            <img src="{{ url('/img/firefighter.jpg') }}" alt="Tips for Getting Started" align="left" style="margin: 5px 10px 0 0;" />
                            <ol style="margin-left: 92px; padding-left: 53px;">
                                <li>Step One Volunteer for the Trade. if you ask a local how to become a firefighter, many will tell you they started as a volunteer. ...</li>
                                <li>Step Two Find CPR Training and get Fit. ...</li>
                                <li>Step Three Get a Fire Science Degree. ...</li>
                                <li>Step Four Take Exams and Apply for Work. ...</li>
                                <li>Step Five Advance in Your Profession.</li>
                            </ol>
                            <p>&nbsp;</p>
                        </div>
                        <!-- <a href="/tips" class="btn btn-primary">Learn More</a> -->
                        <div class="content-container">
                            <h2>Fire Departments... Post Your Job for FREE!</h2>
                            <img src="{{ url('/img/skylight.jpg') }}" alt="Fire Departments... Post Your Job for FREE!" align="left" style="margin: 5px 10px 0 0;" />
                            <p>Since 1992, FD Careers has helped bring future firefighters and fire departments together.</p>
                            <p>If your organization has a position to fill, let us know and once we have confirmed everything, you will be able to post your position and it will notify everyone who has registered to receive a notification in your state!</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Why FD Careers?</div>
                    <div class="panel-body">
                        <p>Many services require you to visit their web site every day to keep current on who is hiring. If you're busy or don't have the time to sort through old listings on their message boards, you might miss the department you want to work for... not with FD Careers.</p>

                        <h2>What you get with FD Careers&hellip;</h2>

                        <ul>
                            <li>Access to our database of over 800 active jobs (Entry-Level Firefighter up to Captain positions)</li>
                            <li>Job alerts directly to your inbox or mailbox</li>
                            <li>We constantly update our listings and re-send them so you don't miss any important changes or new information</li>
                            <li>Additional information about each department, including pay ranges, map links and demographics</li>
                            <li>Links that allow you to download the application documents you need (if offered by the department)</li>
                            <li>The opportunity to focus on getting hired... not chasing down who is hiring</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Advertisement</div>
                    <div class="panel-body">
                        <center><a href="http://gopoliceblotter.com/product/firefighter-thin-red-line-vertical-flag-hoodie/" target="_blank"><img src="{{ url('/img/ThinRedLine_Hoodie.jpg') }}" alt="Thin Red Line Hoodie Now Available!" style="width: 100%; max-width: 300px;" /></a></center>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Testimonials</div>
                    <div class="panel-body">
                        <div id="testimonials" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <p>"Hello, My name is David and I am from Indiana. I just wanted to say that your site is fantastic!! I have been on many sites like fdcareers.com, but none come close to your accuracy, variety, and how fast you get the information to the customer! I believe that your site is highly responsible for me having a job in the fire service right now! I recommend your site to all of my friends trying to find a career in the fire service, and all the forums I am on. I just wanted to email you as a satisfied customer! and give you a BIG thank you!!"</p>
                                    -- <cite name="David P">David P</cite>
                                </div>
                                <div class="item">
                                    <p>I have been using your website for four and half years. With your guys help I finally landed my full time dream job. I was never the best test taker, nor the smartest guy out there. However i was determined to succeed. I took alot of tests. It took me 44 full time tests to finally land my dream department. FDcareers.com made this possible. You guys gave me information on every single department that was testing, and that was crucial. This website really has been a blessing to me. Thank you for your guys hard work and dedication to the site. To everyone out there still testing: "Don't give up, and keep testing....you will end up where you are supposed to."</p>
                                    -- <cite name="Anthony L">Anthony L</cite>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
