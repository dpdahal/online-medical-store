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
                                <div class="mu-course-container">
                                    <div class="row">

                                        @foreach ($newsData->chunk(3) as $news)
                                            <div class="row">
                                                @foreach ($news as $new)
                                                    <div class="col-md-4 col-sm-4">

                                                        <div class="mu-latest-course-single" style="height: 400px;">
                                                            <figure class="mu-latest-course-img">
                                                                <a href="{{route('news-details').'/'.$new->slug}}">
                                                                    <img src="{{url('public/backend/uploads/images/news/'.$new->image)}}"
                                                                       style="height: 230px;"  alt="img"
                                                                         class="img-responsive"></a>
                                                                <figcaption class="mu-latest-course-imgcaption">
                                                                    <a href="{{route('news-details').'/'.$new->slug}}">{{substr($new->title,0,90)}}</a>

                                                                </figcaption>
                                                            </figure>
                                                            <div class="mu-latest-course-single-content">
                                                                <div class="mu-latest-course-single-contbottom">
                                                                    <a class="mu-course-details" href="{{route('news-details').'/'.$new->slug}}">Details</a>
                                                                    <span class="mu-course-price"
                                                                          href="{{route('news-details').'/'.$new->slug}}">
                                                                       {{$new->created_at->format('l/F/Y')}}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                            <!-- end course content container -->
                            <!-- start course pagination -->
                            <div class="mu-pagination">
                                {{$newsData->links()}}
                            </div>
                            <!-- end course pagination -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@stop