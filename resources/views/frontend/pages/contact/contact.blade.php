@extends('frontend.master.master')

@section('content')

    <section id="aa-catg-head-banner">

        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Contact</h2>
                </div>
            </div>
        </div>
    </section>

    <section id="aa-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="aa-contact-area">
                        <div class="aa-contact-address">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Contact Details</h4>
                                    <div class="aa-contact-address-right">
                                        <ul class="list-group">
                                            <li class="list-group-item" style="padding: 25px;margin-bottom:10px;"><i class="fa fa-home"></i> Kathmandu,kapan Satalla</li>
                                            <li class="list-group-item" style="padding: 25px;margin-bottom:10px;"><i class="fa fa-phone"></i> 9808270974</li>
                                            <li class="list-group-item" style="padding: 25px;margin-bottom:10px;"><i class="fa fa-envelope"></i> mail:online.medicalstore@gmail.com</li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h4>Write to Us</h4>
                                    <div class="aa-contact-address-left">
                                        <form class="comments-form contact-form" id="contact_form_action"
                                              method="post"
                                              action="{{route('contact-post')}}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" id="name" name="name"
                                                               placeholder="Your Name"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" id="email" name="email"
                                                               placeholder="Email"
                                                               class="form-control">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" id="topic" name="topic"
                                                               placeholder="Topic"
                                                               class="form-control">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" id="brand" name="brand"
                                                               placeholder="brand"
                                                               class="form-control">

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                <textarea class="form-control" style="width: 100%;resize: none;height: 121px;" id="message"
                                                          name="message"
                                                          placeholder="Message"></textarea>

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button id="send_contact_message" class="aa-secondary-btn">Send
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.9142858255777!2d85.38106301453863!3d27.71993263154673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1bbf00000001%3A0x2a1a97b9a3c1d3b6!2sNami+College!5e0!3m2!1sen!2snp!4v1554964811655!5m2!1sen!2snp"
                                            width="100%" height="450" frameborder="0" style="border:0"
                                            allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                        <div class="aa-contact-map">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>






@endsection