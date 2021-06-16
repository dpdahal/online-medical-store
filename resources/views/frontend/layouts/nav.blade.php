@section('nav')
    <!-- menu -->
    <section id="menu">
        <div class="container">
            <div class="menu-area">
                <!-- Navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <!-- Left nav -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('index')}}">Home</a></li>

                            <li><a href="{{route('about-us')}}">About Us</a>
                            </li>
                            <li><a href="#">Category <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($catData as $cat)
                                        <li><a href="{{route('index-category').'/'.$cat->cat_name}}">{{$cat->cat_name}}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                            <li><a href="{{route('all-product')}}">Product</a></li>
                            <li><a href="{{route('news')}}">News</a></li>
                            <li><a href="{{route('live-chat')}}">Live Chat</a></li>
                            <li><a href="{{route('prescription-upload')}}">Prescription</a></li>

                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
    </section>
    <!-- / menu -->


@endsection