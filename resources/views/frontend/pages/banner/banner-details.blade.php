@extends('frontend.master.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4> {{$bannerData->title}}</h4>
                <img data-seq src="{{url('public/backend/uploads/images/banner/'.$bannerData->image)}}" class="img-responsive" alt=""/>

                <p>
                    {!!$bannerData->description!!}
                </p>
            </div>
        </div>

    </div>




@endsection