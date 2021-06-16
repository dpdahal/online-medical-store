@extends ('frontend.master.master')
@section('content')

    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-myaccount-area">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="aa-myaccount-login">
                                    <h4>Login</h4>
                                    @include('frontend.layouts.messages')
                                    <form action="{{route('login')}}" method="post" class="aa-login-form">
                                        @csrf
                                        <div class="form-group form-group-sm">
                                            <label for="user_email">Email</label>
                                            <input type="text" name="user_email" id="user_email" placeholder="E-mail">
                                            <a href="" style="color: red;">{{$errors->first('user_email')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" name="user_password" placeholder="Password">
                                            <a href="" style="color: red;">{{$errors->first('user_password')}}</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="login_form" class="aa-browse-btn">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="aa-myaccount-register">
                                    <h4>Register</h4>
                                    {{$errors}}
                                    <form action="{{route('register')}}" method="post" class="aa-login-form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" placeholder="name">
                                            <a href="" style="color: red;">{{$errors->first('name')}}</a>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" id="email" placeholder="Username or email">
                                            <a href="" style="color: red;">{{$errors->first('email')}}</a>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" name="password" placeholder="Password">
                                            <a href="" style="color: red;">{{$errors->first('password')}}</a>
                                        </div>

                                        <div class="form-group">
                                            <button name="register_form" type="submit" class="aa-browse-btn">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="aa-footer">




@endsection