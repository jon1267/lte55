<!-- Content Contact Form and Map-->
<section class="info_content gray shadows borders">
    <!-- Container-->
    <div class="container animation-elements">
        <!-- Row fuid-->
        <div class="row">
            <div class="col-md-5 contact">
                <h2>Contact Form</h2>
                <form id="contact-form" action="php/send-mail.php">
                    <input type="text" placeholder="Name" name="Name" required>
                    <input type="email" placeholder="Email"  name="Email" required>
                    <textarea placeholder="Your Message" name="message" required></textarea>
                    <input type="submit" name="Submit" value="Send" class="button">
                </form>
                <div id="result"></div>
            </div>
            <div class="col-md-7 map">
                <iframe  src="https://maps.google.es/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=new+york&amp;aq=&amp;sll=40.396764,-3.713379&amp;sspn=9.61761,19.753418&amp;ie=UTF8&amp;hq=&amp;hnear=Nueva+York,+Estados+Unidos&amp;ll=40.614353,-74.005973&amp;spn=0.598524,1.234589&amp;t=m&amp;z=10&amp;output=embed"></iframe>
                {{--<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d4295562.242946409!2d37.00637987500004!3d58.28470535954709!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1523967553477" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
            </div>
        </div>
        <!-- End Row fuid-->
    </div>
    <!-- End Container-->
</section>
<!-- Content Contact Form and Map-->