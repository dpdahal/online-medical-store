@extends('frontend.master.master')

@section('content')

    {{--  muksam  --}}

    <!-- Start slider -->
    <section id="aa-slider">
        <div class="aa-slider-area">
            <div id="sequence" class="seq">
                <div class="seq-screen">
                    <ul class="seq-canvas">
                        <!-- single slide item -->
                        @foreach($bannerData as $banner)
                            <li>
                                <div class="seq-model">
                                    <img data-seq src="{{url('public/backend/uploads/images/banner/'.$banner->image)}}"
                                         alt="Men slide img"/>
                                </div>
                                <div class="seq-title">
                                    <p data-seq>
                                        {{$banner->title}}
                                    </p>
                                    <a data-seq href="{{route('banner-details').'/'.$banner->slug}}"
                                       class="aa-shop-now-btn aa-secondary-btn">Read More</a>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <!-- slider navigation btn -->
                <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                    <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                    <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
                </fieldset>
            </div>
        </div>
    </section>
    <!-- / slider -->

    <!-- Products section -->
    <section id="aa-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">
                            <div class="aa-product-inner">
                                <!-- start prduct navigation -->
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Start men product category -->
                                    <div class="tab-pane fade in active">
                                        <ul class="aa-product-catg">
                                            <!-- start single product item -->
                                            @foreach($productData as $product)
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img"
                                                           href="{{route('product-details').'/'.$product->id}}"><img
                                                                    src="{{url('public/backend/uploads/images/product/'.$product->image)}}"
                                                                    width="250" height="200" alt="polo shirt img"></a>
                                                        <a class="aa-add-card-btn"
                                                           href="{{route('product-details').'/'.$product->id}}"><span
                                                                    class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a
                                                                        href="#">{{$product->name}}</a></h4>
                                                            <span class="aa-product-price">Rs: {{$product->price}}</span>
                                                        </figcaption>
                                                    </figure>

                                                </li>

                                            @endforeach


                                        </ul>

                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Products section -->
    <!-- banner section -->

    <!-- / Testimonial -->

    <!-- Latest Blog -->
    <section id="aa-latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-latest-blog-area">
                        <h2>LATEST BLOG</h2>
                        <div class="row">
                            @foreach($limitNewsData as $news)
                                <div class="col-md-4 col-sm-4">
                                    <article class="aa-latest-blog-single">
                                        <figure class="aa-blog-img">
                                            <a href="{{route('news-details').'/'.$news->slug}}"><img
                                                        src="{{url('public/backend/uploads/images/news/'.$news->image)}}"
                                                        alt="img" height="300"></a>
                                            <figcaption class="mu-blog-caption">
                                                <h3><a href="{{route('news-details').'/'.$news->slug}}">
                                                        {{substr($news->title,0,25)}}
                                                        .</a></h3>
                                            </figcaption>
                                        </figure>
                                        <div class="mu-blog-meta">
                                            <a href="{{route('news-details').'/'.$news->slug}}"> {{$news->created_at->format('l/F/Y')}}</a>
                                        </div>
                                        <div class="mu-blog-description">
                                            <p>
                                                {!! substr($news->description,0,100) !!}
                                            </p>
                                            <a class="aa-read-mor-btn"
                                               href="{{route('news-details').'/'.$news->slug}}">Read More</a>
                                        </div>
                                    </article>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Latest Blog -->



    <!-- Subscribe section -->
    <section id="aa-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-subscribe-area">
                        <h3>Subscribe to our Store </h3>
                        <form action="{{route('subscribe-post')}}" id="email_form_action" method="post"
                              class="aa-subscribe-form">
                            @csrf
                            <input type="email" id="email" name="email" placeholder="Enter your Email">
                            <input type="submit" id="send_email_message" value="Subscribe">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Subscribe section -->





@endsection