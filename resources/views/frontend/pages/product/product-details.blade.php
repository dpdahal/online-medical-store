@extends('frontend.master.master')
@section('content')
    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">
                        <div class="aa-product-details-content">
                            <div class="row">


                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="aa-product-view-slider">
                                        <div id="demo-1" class="simpleLens-gallery-container">
                                            <div class="simpleLens-container">
                                                <div>
                                                    <img src="{{url('public/backend/uploads/images/product/'.$productDetails->image)}}"
                                                         class="simpleLens-lens-image"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <h3>Name: {{$productDetails->name}}</h3>
                                        <div class="aa-price-block">
                                            <h3>Price: Rs{{$productDetails->price}}</h3>
                                        </div>
                                        <h3>Brand Name: {{$productDetails->brand_name}}</h3>
                                        <div class="aa-prod-quantity">

                                            <p class="aa-prod-category">
                                                Category: <a>{{$productDetails->category->cat_name}}</a>
                                            </p>
                                        </div>
                                        <form method="post" action="{{route('add-cart')}}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$productDetails->id}}">
                                            <div class="form-group">
                                                <select name="quantity" id="quantity" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="aa-browse-btn">Add To Cart</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="aa-product-details-bottom">
                            <ul class="nav nav-tabs" id="myTab2">
                                <li><a href="#description" data-toggle="tab">Description</a></li>
                            </ul>


                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="description">
                                    <h4> {!! $productDetails->description !!}</h4>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>





@endsection