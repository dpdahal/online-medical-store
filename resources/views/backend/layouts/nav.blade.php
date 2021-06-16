@section('nav')
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="#" class="site_title"><i class="fa fa-user"></i> <span>Admin</span></a>
            </div>

            <div class="clearfix"></div>


            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="{{url('public/backend/uploads/images/admin/'.Auth::guard('admin')->user()->image)}}" alt="..." class="img-circle profile_img">
                </div>

            </div>
            <br/>


            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                        <li><a href="{{route('@admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li><a><i class="fa fa-folder"></i> Admin <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-admin')}}">Add Admin</a></li>
                                <li><a href="{{route('show-admin')}}">Show Admin</a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-folder"></i> Product <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('show-category')}}">Manage Category</a></li>
                                <li><a href="{{route('add-product')}}">Add Product</a></li>
                                <li><a href="{{route('show-product')}}">Show Product</a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-folder"></i> Doctor <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-doctor')}}">Add Doctor</a></li>
                                <li><a href="{{route('show-doctor')}}">Show Doctor</a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-folder"></i> Banner <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-banner')}}">Add Banner</a></li>
                                <li><a href="{{route('show-banner')}}">Show Banner </a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-folder"></i> Contact <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('show-contact')}}">Show Contact</a></li>

                            </ul>
                        </li>


                        <li><a><i class="fa fa-folder"></i> User <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('show-user')}}">Show User</a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-folder"></i> Brand <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-brand')}}">Add Brand</a></li>
                                <li><a href="{{route('show-brand')}}">Show Brand </a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-newspaper-o"></i> News & Notice <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-notice')}}">Add Notice</a></li>
                                <li><a href="{{route('show-notice')}}">Show Notice</a></li>
                                <li><a href="{{route('show-news-category')}}">News Category</a></li>
                                <li><a href="{{route('add-news')}}">Add News</a></li>
                                <li><a href="{{route('admin-news')}}">Show News</a></li>

                            </ul>
                        </li>

                        <li><a><i class="fa fa-folder"></i> Subscribe <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('show-subscribe')}}">Show Subscribe </a></li>

                            </ul>
                        </li>


                    </ul>
                </div>

            </div>





        </div>
    </div>

@stop