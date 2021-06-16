<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login Page</title>
    <link href="{{url('public/backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{url('public/backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="margin-top: 100px;">
            <div class="panel" style="background:white;border: 1px solid white !important;">
                <div class="panel-heading"><h3>Login To Dashboard</h3></div>
                <div class="panel-body">
                    @include('backend.layouts.messages')
                    <form action="{{route('admin-login')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group form-group-sm">
                            <label for="email">Email</label>
                            <input type="text" name="email" placeholder="email" id="email"
                                   class="form-control">
                            <a href="" style="color: red;">{{$errors->first('email')}}</a>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="password" id="password"
                                   class="form-control">
                            <a href="" style="color: red;">{{$errors->first('password')}}</a>

                        </div>
                        <div class="form-group form-group-sm">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-lock"></i> Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
