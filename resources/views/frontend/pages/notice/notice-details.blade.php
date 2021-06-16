@extends('frontend.master.master')
@section('content')
    <!-- End breadcrumb -->
    <section id="mu-course-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-course-content-area">
                        <div class="row">
                            <div class="col-md-9">
                                <figure>
                                    <figcaption class="mu-blog-caption">
                                        <h3><a href="#">{!! $getNoticeData->title !!}</a></h3>
                                        <a href="#" style="color: gray">
                                            <i class="fa fa-calendar"></i>
                                            {{$getNoticeData->created_at->format('l/F/Y')}}
                                        </a>

                                    </figcaption>
                                </figure>
                                <p>
                                    {!! $getNoticeData->description !!}
                                </p>
                                @if(!empty($getNoticeData->file))
                                    <a href="{{url('public/backend/uploads/images/notice/'.$getNoticeData->image)}}"  download class="mu-read-more-btn"
                                       style="background:#01bafd;border: 2px #01bafd;">
                                        <i class="fa fa-download"></i> Download</a>
                                @endif
                            </div>
                            <!-- end course content container -->

                            <div class="col-md-3">
                                <!-- start sidebar -->
                                <aside class="mu-sidebar">
                                    <!-- start single sidebar -->
                                    <div class="mu-single-sidebar">
                                        <h3>Related Notice </h3>
                                        <ul class="mu-sidebar-catg">
                                            @foreach($noticeResult as $result)
                                                <li><a href="{{route('notice').'/'.$result->slug}}">{{$result->title}}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <!-- end single sidebar -->


                                </aside>
                                <!-- / end sidebar -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop