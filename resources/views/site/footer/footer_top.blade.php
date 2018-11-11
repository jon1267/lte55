<!-- Footer top-->
<div class="shadows">
    <footer class="container footer_top">
        <div class="row">
            <!-- Social Footer -->
            <div class="col-md-3">
                <h2>Follow Mega Host</h2>
                <ul class="social_footer">
                    <li><i class="fa fa-facebook"></i><a href="#">Follow on Facebook</a></li>
                    <li><i class="fa fa-twitter"></i><a href="#">Follow on Twitter</a></li>
                    <li><i class="fa fa-youtube"></i><a href="#">Follow on Youtube</a></li>
                </ul>
            </div>
            <!-- End Social Footer -->

            <!-- About Us Footer -->
            <div class="col-md-3">
                <h2>About Us</h2>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. </p>
                <a href="{{ route('index.home') }}"><img src="{{ asset('mhost/img/logo_footer.png') }}" alt="" title="Home"></a>
            </div>
            <!-- End About Us Footer -->

            <!-- Newsletter-->
            <div class="col-md-3">
                <h2>Newsletter</h2>
                <p>Subscribe to our email newsletter.</p>
                <form id="newsletterForm" action="php/mailchip/newsletter-subscribe.php">
                    <div class="input-prepend">
                        <input type="text" name="name" required placeholder="Your Name">
                    </div>
                    <div class="input-prepend">
                        <input type="email"  name="email" required placeholder="Your Email">
                    </div>
                    <input type="submit" value="Send" class="button">
                </form>
                <div id="result-newsletter"></div>
            </div>
            <!-- End Newsletter-->

            <!-- Contact Us Footer-->
            <div class="col-md-3">
                <h2>Contact Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem.</p>

                <ul class="contact_footer">
                    <li>
                        <i class="fa fa-envelope"></i> E-Mail Us: <a href="#">example@example.com</a>
                    </li>
                    <li>
                        <i class="fa fa-headphones"></i> Call Us at: <a href="#">55-5698-4589</a>
                    </li>
                    <li class="location">
                        <i class="fa fa-home"></i>Location: <a href="#"> Av new stret - New York</a>
                    </li>
                </ul>
            </div>
            <!-- End Contact Us Footer-->
        </div>
    </footer>
</div>
<!-- End Footer top-->