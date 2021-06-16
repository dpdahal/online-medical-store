@extends('frontend.master.master')
@section('content')


    <section id="mu-course-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-course-content-area">
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <h2>User Profile Details</h2>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{url('public/backend/uploads/images/user/'.Auth::user()->image)}}"
                                             alt="" class="img-responsive thumbnail">
                                    </div>
                                    <div class="col-md-8" style="padding-left: 0;">
                                        <table class="table">
                                            <tr>
                                                <th width="100">Name:</th>
                                                <td>{{ucfirst(Auth::guard('web')->user()->name)}}</td>
                                            </tr>
                                            <tr>
                                                <th>Username:</th>
                                                <td>{{ucfirst(Auth::guard('web')->user()->username)}}</td>
                                            </tr>
                                            <tr>
                                                <th>E-mail:</th>
                                                <td>{{Auth::guard('web')->user()->email}}</td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop