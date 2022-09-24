<footer id="footer">
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-2">
                <img src="{{url('user/logo2.png')}}" alt="" class="img-fluid">
            </div>
            <div class="col-md-9">
                <div class="row footer-links">
                    <div class="col-md-3">
                        <h5>Get Started</h5>
                        <ul>
                            <li>
                                <a href="{{route('w.home')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('w.contact')}}">Contact</a>
                            </li>
                            <li>
                                <a href="{{route('register')}}">Signup</a>
                            </li>
                            <li>
                                <a href="{{route('login')}}">Login</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>About us</h5>
                        <ul>
                            <li>
                                <a href="{{route('w.about')}}">Company Information</a>
                            </li>
                            <li>
                                <a href="{{route('w.blog')}}">GFV Blog</a>
                            </li>
                            <li>
                                <a href="{{route('w.press')}}">Press</a>
                            </li>
                            <li>
                                <a href="{{route('w.career')}}">Volunteer</a>
                            </li>
                            <li>
                                <a href="{{route('w.testimonial')}}">GFV Social Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Support</h5>
                        <ul>
                            <li>
                                <a href="{{route('w.faq')}}">FAQ</a>
                            </li>
                            <li>
                                <a href="{{route('w.terms')}}">Terms</a>
                            </li>
                            <li>
                                <a href="{{route('w.privacy')}}">Privacy</a>
                            </li>
                            <li>
                                <a href="{{route('w.safety')}}">Safety</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4>Contact us</h4>
                        <div class="social-links">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright pt-5">
            Copyright Girlfriend Vibez &copy;{{date('Y')}}
        </div>
    </div>
</footer><!-- End Footer -->
<style>
    .footer-links ul {
        list-style-type: none;
    }
</style>