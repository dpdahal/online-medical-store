@extends('frontend.master.master')
@section('content')

    <section id="mu-course-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-course-content-area">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- start course content container -->
                                <div class="mu-course-container mu-blog-single">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <article class="mu-blog-single-item">
                                                <div class="mu-blog-meta">
                                                    <a href="#" style="color: gray">
                                                        <i class="fa fa-calendar"></i> {{$getNewsData->created_at->format('l/F/Y')}}
                                                    </a>
                                                </div>
                                                <figure class="mu-blog-single-img">
                                                    <a href="#"><img alt="img"
                                                                     src="{{url('public/backend/uploads/images/news/'.$getNewsData->image)}}"></a>
                                                    <figcaption class="mu-blog-caption">
                                                        <h3><a href="#"></a></h3>
                                                    </figcaption>
                                                </figure>

                                                <div class="mu-blog-description">
                                                    <p>
                                                        {!!$getNewsData->details!!}
                                                    </p>
                                                </div>

                                            </article>
                                        </div>
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