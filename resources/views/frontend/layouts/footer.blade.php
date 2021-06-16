@section('footer')
    <!-- footer -->
    <footer id="aa-footer">
        <!-- footer bottom -->
        <div class="aa-footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-footer-top-area">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <h3>Main Menu</h3>
                                        <ul class="aa-footer-nav">
                                            <li><a href="{{route('index')}}">Home</a></li>
                                            <li><a href="{{route('about-us')}}">About Us</a></li>
                                            <li><a href="{{route('all-product')}}">Product</a></li>
                                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Contact Us</h3>
                                            <address>
                                                <p>Online Medical Store</p>
                                                <p>Please contact us through this information</p>
                                                <p><span class="fa fa-home"></span>Kathmandu,kapan Satalla</p>
                                                <p><span class="fa fa-phone"></span>9808270974</p>
                                                <p><span class="fa fa-envelope"></span>E-mail:online.medicalstore@gmail.com</p>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <h3>Get in touch</h3>
                                        <ul class="aa-footer-nav">
                                            <div class="aa-footer-social">
                                                <a href="#"><span class="fa fa-facebook"></span></a>
                                                <a href="#"><span class="fa fa-google-plus"></span></a>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom -->
        <div class="aa-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-footer-bottom-area">
                            <p>Designed by <a href="#" style="color: #00d6b2;">Online Medical Store</a></p>
                            <div class="aa-footer-payment">
                                <span class="fa fa-cc-mastercard"></span>
                                <span class="fa fa-cc-visa"></span>
                                <span class="fa fa-paypal"></span>
                                <span class="fa fa-cc-discover"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- / footer -->

<script src="{{url('public/frontend/js/jquery.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="{{url('public/frontend/js/bootstrap.js')}}"></script>

<script type="text/javascript" src="{{url('public/frontend/js/jquery.smartmenus.js')}}"></script>

<script type="text/javascript" src="{{url('public/frontend/js/jquery.smartmenus.bootstrap.js')}}"></script>

<script src="{{url('public/frontend/js/sequence.js')}}"></script>
<script src="{{url('public/frontend/js/sequence-theme.modern-slide-in.js')}}"></script>

<script type="text/javascript" src="{{url('public/frontend/js/jquery.simpleGallery.js')}}"></script>
<script type="text/javascript" src="{{url('public/frontend/js/jquery.simpleLens.js')}}"></script>

<script type="text/javascript" src="{{url('public/frontend/js/slick.js')}}"></script>

<script type="text/javascript" src="{{url('public/frontend/js/nouislider.js')}}"></script>

<script src="{{url('public/frontend/js/sweet.js')}}"></script>
<script src="{{url('public/frontend/js/custom.js')}}"></script>
<script src="{{url('public/chat/custom.js')}}"></script>
<script src="{{url('public/frontend/js/CustomAjax.js')}}"></script>
<script>
    let Token = '{{csrf_token()}}'
</script>
<script>
    let URL = '{{url('/')}}'
</script>
<script src="{{url('public/frontend/js/chat.js')}}"></script>


</body>
</html>
@endsection