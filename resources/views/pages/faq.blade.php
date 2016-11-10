@extends('spark::layouts.app')

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        function scrollTo(num){
            console.log("scroll: "+num);
            var totalOffset = $("#"+num).offset().top-75;
            $('html, body').animate({
                scrollTop: totalOffset
            }, 500);
        }
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div id="top"></div>
                    <div class="panel-heading">Frequently Asked Questions</div>
                    <div class="panel-body">
                        <ol class="links">
                            <li class="link" onclick="scrollTo(1)">How is the fire department hiring process different from getting a regular job?</li>
                            <li class="link" onclick="scrollTo(2)">The department I want to work for just tested, when will they be testing again?</li>
                            <li class="link" onclick="scrollTo(3)">I'm a few months from being ready to accept a job, when should I start testing?</li>
                            <li class="link" onclick="scrollTo(4)">What qualifications/experience will help me get ahead in the testing process?</li>
                            <li class="link" onclick="scrollTo(5)">What are preference points?</li>
                            <li class="link" onclick="scrollTo(6)">Do I need to go to college to be a firefighter?</li>
                            <li class="link" onclick="scrollTo(7)">What is the difference between EMT-B and EMT-P?</li>
                            <li class="link" onclick="scrollTo(8)">Are all firefighters also paramedics?</li>
                            <li class="link" onclick="scrollTo(9)">How long does it take to get hired?</li>
                            <li class="link" onclick="scrollTo(10)">Is there an age limit to become a firefighter?</li>
                            <li class="link" onclick="scrollTo(11)">Are the psychological tests difficult?</li>
                            <li class="link" onclick="scrollTo(12)">I have a criminal history; will the fire department hire me?</li>
                            <li class="link" onclick="scrollTo(13)">I'm worried about the polygraph test, what kind of questions do they ask?</li>
                        </ol>
                        <br/>
                        <div id="1" class="faq-content">
                            <h4>How is the fire department hiring process different from getting a regular job?</h4>
                            <p>While the hiring process in most jobs consists of submitting an application or resume, going for an interview or two, and waiting for an offer of employment, the fire service is a little more involved.</p>
                            <p>Fire service jobs, and most civil service jobs, are a competitive process that culminates in a score and ranking. The sequence may go something like this...1) submit your application; 2) attend an orientation; 3) take a written exam; 4) perform a physical ability test; 5) attend an oral interview; 6) background check is performed; 7) psychological test is administered; 8) take a polygraph test; 9) submit to a medical evaluation; and 10) get your job offer.</p>
                            <p>Getting hired might include all or none of these elements, but this should give you an idea of what you might expect.</p>
                            <div class="link" onclick="scrollTo('top')">Back to Top</div>
                        </div>
                        <div id="2" class="faq-content">
                            <h4>The department I want to work for just tested, when will they be testing again?</h4>
                            <p>Fire department testing or hiring can vary dramatically between states or local governments. Fire departments may test every two years, annually or every six months. Some are continuously recruiting for their next exam while others are continuously hiring. Departments occasionally exhaust their entire list and re-test prior to their normal schedule. It is also possible that a department may begin their hiring process early to adjust the timing of their test.</p>
                            <div class="link" onclick="scrollTo('top')">Back to Top</div>
                        </div>
                        <div id="3" class="faq-content">
                            <h4>I'm a few months from being ready to accept a job, when should I start testing?</h4>
                            <p>If you are considering a career in the fire service, but you are still in college or committed to some other endeavor, it is still best to begin testing right away. For many people it may take four, six or even ten tests before they get into the flow of how these types of tests are written. Even if you are one of the lucky people to get hired from your first test, it may take up to a year or more before you have a badge pinned on your chest. Also keep in mind that many good departments may be testing&hellip; and you don't want to miss the opportunity to take thier test.</p>
                            <div class="link" onclick="scrollTo('top')">Back to Top</div>
                        </div>
                        <div id="4" class="faq-content">
                            <h4>What qualifications/experience will help me get ahead in the testing process?</h4>
                            <p>Most departments have basic requirements, such as being a U.S. Citizen (in many cases), having a valid driver's license, having your high school diploma or GED, and being between the ages of 18 and 35 (this may vary depending on the state or municipality).</p>
                            <p>However, due to the increasing number of departments that provide Advanced Life Support (ALS) service, one of the best steps you can take toward becoming a firefighter would be to earn your EMT-P (paramedic) certification. Many small to mid-size departments find it hard to train their own paramedics; therefore, they require the certification in order to apply.</p>
                            <p>If the time commitment of paramedic training is not an option for you, EMT-B (basic) or EMT-I (intermediate) is another avenue to take that will make you eligible for more positions. Most community colleges teach EMT classes and many of them are in the evening. Usually EMT-B is required prior to being accepted into a paramedic program. Earning your license through a national registry program will help you if you choose to move to another state.</p>
                            <p>Earning your firefighter certifications is an important step to getting hired at many departments. Each state has a different standards level, however some states will accept certifications from other states. Contact your State Fire Marshall's Office or local fire department for specifics.</p>
                            <p>Many fire departments are now requiring you to be CPAT certified. What is CPAT? The Candidate Physical Ability Test is a practical exam used to test a candidate's physical ability to perform a job task related to firefighting. CPAT is a physically demanding test that requires you to use your physical and mental abilities and, in some cases, balance. The CPAT usually involves eight events that must be completed in a designated period of time. This evaluation process is used by a growing number of agencies throughout the United States and Canada.</p>
                            <p>Volunteering, working part-time, Paid-on-Call or as a Reserve at a local department can be a good source for earning fire department certifications, as well as gaining valuable experience. Pursuing your Associates or Bachelors degree is also a good idea as some departments require a degree or will add preference points to your testing score.</p>
                            <div class="link" onclick="scrollTo('top')">Back to Top</div>
                        </div>
                        <div id="5" class="faq-content">
                            <h4>What are preference points?</h4>
                            <p>Preference points are points awarded for specific training or experience. These points may be the edge you need to be at the top of the eligibility list.</p>
                            <p>Most departments award some type of points for honorable military service, so veterans should have a certified copy of your DD 214 available. If you have any college credit, be sure to have a copy of your transcripts handy.</p>
                            <p>Some departments also give credit for every year on a full-time, part-time, volunteer or paid-on-call department. Others will give points for being fluent in a second language or being a resident of their town.</p>
                            <p>If you don't have any of these, don't be discouraged. Many firefighters didn't have any of these and are now leaders in our area of expertise.</p>
                            <div class="link" onclick="scrollTo('top')">Back to Top</div>
                        </div>
                        <div id="6" class="faq-content">
                            <h4>Do I need to go to college to be a firefighter?</h4>
                            <p>There are a number of Fire Science classes and coursework you can take at area community colleges. These classes will help give you some perspective of what we do in the fire service; however, most are not a pre-requisite to get hired.</p>
                            <p>That said, we still recommend taking fire science coursework. It will also help you get a perspective of the fire service and can help during your oral interviews when they ask you what you have done to prepare yourself for the job. If you are waiting to meet the age requirements for your region, this is a good way to use your time wisely.</p>
                            <div class="link" onclick="scrollTo('top')">Back to Top</div>
                        </div>
                        <div id="7" class="faq-content">
                            <h4>What is the difference between EMT-B and EMT-P?</h4>
                            <p>Most departments cross-train their firefighters as EMT-Bs or paramedics, which is a benefit to the community as well as an exciting part of the job.</p>
                            <p>EMT-B certification is a basic certification that gives you a foundation of anatomy and physiology, as well as patient assessment, trauma care and life-saving techniques. When you move on to EMT-P (paramedic), you dig a little deeper into the anatomy and physiology, learn how to identify problems and which drugs to give for certain conditions. You will also be versed in EKG's, defibrillation and advanced airway techniques. EMT-I (intermediate) and EMT-D (defibrillator) are also utilized in many states.</p>
                            <p>*** Earning your paramedic license may be the single most beneficial step you can take to getting hired on a fire department because many smaller departments cannot afford to pay your salary while you attend the course. Check your local community college or hospital for their course schedules.</p>
                            <div class="link" onclick="scrollTo('top')">Back to Top</div>
                        </div>
                        <div id="8" class="faq-content">
                            <h4>Are all firefighters also paramedics?</h4>
                            <p>Not all departments require you to become a paramedic. Some departments also hire ambulance services to work in their town alongside the fire department. In fact, a number of firefighters start their careers working for an ambulance service as a way to gain training and experience while testing for the fire department.</p>
                            <div class="link" onclick="scrollTo('top')">Back to Top</div>
                        </div>
                        <div id="9" class="faq-content">
                            <h4>How long does it take to get hired?</h4>
                            <p>The lucky ones score well on their first test, however you might expect to take several tests before getting the call. Some people only want to work in a specific region or for a certain department, but it would be wise to take as many tests as possible for the experience, even if it is out of your area. Some people get hired on with a department but continue to test until they land the job they really want.</p>
                            <div class="link" onclick="scrollTo('top')">Back to Top</div>
                        </div>
                        <div id="10" class="faq-content">
                            <h4>Is there an age limit to become a firefighter?</h4>
                            <p>Most departments require you to be at least 18 years old to begin the process, however this can vary from state to state or city to city. Usually the upper limit is 35 years of age due to pension reasons, but some departments do not require an upper limit. Sometimes states statutes dictate the minimum or maximum age; check with your state for the limits.</p>
                            <div class="link" onclick="scrollTo('top')">Back to Top</div>
                        </div>
                        <div id="11" class="faq-content">
                            <h4>Are the psychological tests difficult?</h4>
                            <p>There is nothing "difficult" about the psychological tests that are administered in the testing process, but rather they are tedious and repetitive...and for a purpose. The tests are long and tend to ask very similar questions. They are trying to build a profile about you to see if you fit with the type of person the department wants. Try not to read into it too deeply.</p>
                            <div class="link" onclick="scrollTo('top')">Back to Top</div>
                        </div>
                        <div id="12" class="faq-content">
                            <h4>I have a criminal history; will the fire department hire me?</h4>
                            <p>If you have been convicted of a felony, then you may have a difficult time being hired. That is not to say that it is not possible. It will depend greatly on the type of behavior you were convicted of and if the department is willing to accept it.</p>
                            <p>If you have a history of criminal behavior or poor choices, you will need to be prepared to answer for them in your interview.</p>
                            <div class="link" onclick="scrollTo('top')">Back to Top</div>
                        </div>
                        <div id="13" class="faq-content">
                            <h4>I'm worried about the polygraph test, what kind of questions do they ask?</h4>
                            <p>Any uncomfortable question you can come up with about your past will most likely be asked. Past drug use? Which drugs? When was the last time you tried it? Have you ever stolen something larger than a pen? When?</p>
                            <p>People have a lot of differing opinions on this one. Our advice&hellip; don't lie.</p>
                            <div class="link" onclick="scrollTo('top')">Back to Top</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection