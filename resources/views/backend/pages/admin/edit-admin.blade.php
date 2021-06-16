@extends('backend.master.master')

@section('content')

    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-edit"></i>  Update Admin</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form action="{{route('admin-edit-action')}}" method="post"
                                              enctype="multipart/form-data">
                                            {{csrf_field()}}

                                            <input type="hidden" name="criteria" value="{{$adminData->id}}">
                                            <div class="form-group form-group-sm">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="{{$adminData->name}}" id="name"
                                                       placeholder="enter your name"
                                                       class="form-control">
                                                <a href="" style="color: red;">{{$errors->first('name')}}</a>
                                            </div>
                                            <div class="form-group form-group-sm">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" value="{{$adminData->email}}" id="email"
                                                       placeholder="enter your email"
                                                       class="form-control">
                                                <a href="" style="color: red;">{{$errors->first('email')}}</a>
                                            </div>
                                            <div class="form-group form-group-sm">
                                                <label for="upload">Profile Picture</label>
                                                <input type="file" name="upload" id="change_image" class="btn btn-default btn-sm">
                                                <a href="" style="color: red;">{{$errors->first('upload')}}</a>
                                            </div>
                                            <div class="form-group form-group-sm">
                                                <button class="btn btn-success btn-sm">
                                                    <i class="fa fa-edit"></i> Update Info
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{url('public/backend/uploads/images/admin/'.$adminData->image)}}"
                                            id="target_image" alt="image not found" class="img-responsive thumbnail">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection