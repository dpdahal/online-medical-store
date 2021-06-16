@section('header-top')
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->


    <!-- Start header section -->
    <header id="aa-header">
        <!-- start header top  -->
        <div class="aa-header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="aa-header-top-area">
                            <div class="col-md-2">
                                <div class="aa-header-top-left">
                                    <!-- start cellphone -->
                                    <div class="cellphone hidden-xs">
                                        <p><span class="fa fa-phone"></span>+9779808270974</p>
                                    </div>
                                    <!-- / cellphone -->
                                </div>
                            </div>
                            <!-- start header top left -->
                            <div class="col-md-5">
                                <div id="breaking-news-container">
                                    <div id="breaking-news-colour" class="slideup animated">
                                    </div>
                                    <span class="breaking-news-title delay-animated slidein">
                                      <span class="blink">Notice</span>
                                    </span>

                                    <div class="breaking-news-headline delay-animated2 fadein marquee">
                                        @foreach($noticeData as $notice)
                                            <a href="{{route('notice').'/'.$notice->slug}}">{{$notice->title}}</a>
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                            <!-- / header top left -->
                            <div class="aa-header-top-right">
                                <ul class="nav navbar-nav my-nav-bar">
                                    <li><a href="{{route('login')}}">Login | Register</a></li>
                                    @if(Auth::guard('web')->user())

                                        <li><a>My Account <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('profile')}}">Profile</a></li>
                                                <li><a href="{{route('user-setting')}}">Setting</a></li>
                                                <li><a href="{{route('user-password-change')}}">Change password</a></li>
                                                <li><a href="{{route('logout')}}">Logout</a></li>

                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header top  -->

        <!-- start header bottom  -->
        <div class="aa-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-bottom-area">
                            <!-- logo  -->


                            <div class="aa-logo">
                                <img src="{{url('public/backend/uploads/images/logo/logo2.png')}}" alt="">

                            </div>
                            <!-- / logo  -->
                            <!-- cart box -->
                            <!-- / cart box -->
                            <!-- search box -->
                            <div class="aa-search-box">
                                <form action="{{route('search-medicine')}}" method="get">
                                    <input type="text" name="criteria" id="search-medicine"
                                           placeholder="Search for medicine ">
                                    <button type="submit"><span class="fa fa-search"></span></button>
                                </form>
                                <div id="getResult"></div>
                            </div>
                            <!-- / search box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header bottom  -->
    </header>
    <!-- / header section -->
@endsection