@extends('front.master')
@section('title','Homepage | '.env('APP_NAME'))
@section('content')

<section class="page-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h1>Who we are</h1>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            About Us
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-section section-padding about-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="about-img2">
                    <img src="assets/images/bg/choose.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="section-heading">
                    <span class="subheading">Top Categories</span>
                    <h3>Learn new skills to go ahead for your career</h3>
                </div>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores excepturi explicabo esse nisi
                    molestias molestiae magni porro magnam,
                    iusto sunt aliquid necessitatibus optio quod iste facilis similique eos voluptatum sint?</p>

                <a href="#" class="btn btn-main"><i class="fa fa-check mr-2"></i>Learn More</a>

            </div>
        </div>
    </div>
</section>




<section class="cta-2 clients ">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
                <div class="section-heading center-heading">
                    <span class="subheading">Working Partners</span>
                    <h3>Our valuable Partners</h3>
                </div>
            </div>
        </div>

        <div class="row cta-2-inner">
            <div class="col-lg-2 col-sm-6 ">
                <div class="client-logo">
                    <img src="assets/images/clients/logo1.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="client-logo">
                    <img src="assets/images/clients/logo2.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="client-logo">
                    <img src="assets/images/clients/logo3.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="client-logo">
                    <img src="assets/images/clients/logo4.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="client-logo">
                    <img src="assets/images/clients/logo5.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="client-logo">
                    <img src="assets/images/clients/logo6.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="cta-2">
    <div class="container">
        <div class="row align-items-center subscribe-section ">
            <div class="col-lg-6">
                <div class="section-heading white-text">
                    <span class="subheading">Newsletter</span>
                    <h3>Join our community of students</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="subscribe-form">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Email Address">
                        <a href="#" class="btn btn-main">Subscribe<i class="fa fa-angle-right ml-2"></i> </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> --}}


@stop
