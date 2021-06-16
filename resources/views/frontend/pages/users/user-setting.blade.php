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
                                <h2>User Setting</h2>

                                <div class="col-md-8" style="padding-left: 0;">
                                    @include('frontend.layouts.messages')
                                    <form action="{{route('user-setting')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="criteria" value="{{$userData->id}}">
                                        <div class="form-group form-group-sm">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" value="{{$userData->name}}"
                                                   class="form-control" id="name">
                                            <a href="" style="color: red;">{{$errors->first('name')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" value="{{$userData->username}}"
                                                   class="form-control" id="username">
                                            <a href="" style="color: red;">{{$errors->first('username')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" value="{{$userData->email}}"
                                                   class="form-control" id="email">
                                            <a href="" style="color: red;">{{$errors->first('email')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="upload">Profile Picture</label>
                                            <input type="file" name="upload" class="btn btn-default btn-sm">
                                            <a href="" style="color: red;">{{$errors->first('upload')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                           <button class="aa-browse-btn btn-sm" style="height: 40px;padding: 0;min-width: 100px;">Update Info</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-4">
                                    <img src="{{url('public/backend/uploads/images/user/'.$userData->image)}}" alt=""
                                         class="img-responsive thumbnail" style="margin-top: 23px;">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop