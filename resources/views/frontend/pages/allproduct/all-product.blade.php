@extends('frontend.master.master')
@section('content')
    <section id="aa-catg-head-banner">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>All Product</h2>
                </div>
            </div>
        </div>
    </section>


    {{--all product which include all medicine product--}}
    <section id="aa-product-category">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                    <div class="aa-product-catg-content">

                        <div class="aa-product-catg-body">
                            <ul class="aa-product-catg">
                                @foreach($productData as $product)

                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#">
                                                <img src="{{url('public/backend/uploads/images/product/'.$product->image)}}"
                                                     class="img-responsive" alt="Image not found"></a>
                                            <a class="aa-add-card-btn" href="{{route('product-details').'/'.$product->id}}">
                                            <span class=""></span>Add To Cart</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">{{$product->name}}</a></h4>
                                                <span class="aa-product-price">{{$product->price}}</span>
                                                <p class="aa-product-descrip">{{$product->brand_name}}</p>
                                            </figcaption>
                                        </figure>
                                        <div class="aa-product-hvr-content">
                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                               title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span
                                                        class="fa fa-exchange"></span></a>
                                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View"
                                               data-toggle="modal" data-target="#quick-view-modal"><span
                                                        class="fa fa-search"></span></a>
                                        </div>
                                    </li>

                            @endforeach

                            {{--pagination link of all product--}}

                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                    <aside class="aa-sidebar">
                        {{--all category --}}
                        <div class="aa-sidebar-widget">
                            <h3>Category</h3>
                            @foreach($catData as $category)
                                <ul class="aa-catg-nav">
                                    <li>
                                        <a href="{{route('all-product-category').'/'.$category->cat_name}}">{{$category->cat_name}}</a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </aside>
                </div>

            </div>
        </div>
    </section>








@endsection