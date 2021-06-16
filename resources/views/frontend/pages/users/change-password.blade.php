@extends('frontend.master.master')
@section('content')
    <section id="mu-course-content">
        <div class="container">
            <div class="row">
                <div class="mu-course-content-area">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <h2>Change Password</h2>
                            @include('backend.layouts.messages')
                            <form action="{{route('user-password-change')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="criteria"
                                       value="{{\Illuminate\Support\Facades\Auth::guard('web')->user()->id}}">
                                <div class="form-group">
                                    <label for="old_password">Old Password</label>
                                    <input type="password" name="old_password" placeholder="Old Password"
                                           id="old_password"
                                           class="form-control">
                                    <a href="" style="color: red;">{{$errors->first('old_password')}}</a>
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" placeholder="New Password" id="password"
                                           class="form-control">
                                    <a href="" style="color: red;">{{$errors->first('password')}}</a>
                                </div>
                                <div class="form-group">
                                    <label for="c_password">Password Confirmation</label>
                                    <input type="password" name="password_confirmation"
                                           placeholder="Password Confirm" id="c_password"
                                           class="form-control">
                                    <a href="" style="color: red;">{{$errors->first('password_confirmation')}}</a>
                                </div>

                                <div class="form-group form-group-sm">
                                    <button class="aa-browse-btn btn-sm">Update Password
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop