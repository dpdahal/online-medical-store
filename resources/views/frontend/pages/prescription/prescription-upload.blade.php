@extends('frontend.master.master')
@section('content')
    <section id="aa-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-contact-area">
                        <div class="aa-contact-top">
                            <h2>Prescription Upload</h2>
                        </div>


                        <div class="aa-contact-address">
                            <div class="row">
                                <div class="col-md-8">
                                    @include('backend.layouts.messages')

                                    <div class="aa-contact-address-left">

                                        <form class="comments-form contact-form" id="" method="post"
                                              action="{{route('prescription-post')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" id="name" value="{{old('name')}}" name="name" placeholder="Your Name"
                                                               class="form-control">
                                                        <a href="" style="color: red;">{{$errors->first('name')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="text"  id="number"
                                                               value="{{old('number')}}" name="number"
                                                               placeholder="Number" class="form-control">
                                                        <a href="" style="color: red;">{{$errors->first('number')}}</a>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Prescription Upload</label>
                                                        <input type="file" id="upload" name="upload"
                                                               class="form-control">
                                                        <a href="" style="color: red;">{{$errors->first('upload')}}</a>


                                                    </div>
                                                </div>
                                            </div>


                                            <button class="aa-secondary-btn">Send</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="aa-contact-address-right">
                                        <address>
                                            <h4>Information</h4>
                                            <p>Please contact us through this information</p>
                                            <p><span>2.</span>The prescription should be properly visible.</p>
                                            <p><span class="fa fa-phone"></span>9808270974</p>
                                            <p><span class="fa fa-envelope"></span>mail:online.medicalstore@gmail.com
                                            </p>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection