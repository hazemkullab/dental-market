@extends('front.master')
@section('title','Homepage | '.env('APP_NAME'))
@section('content')

<section class="page-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h1>{{ $product->trans_name }}</h1>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="{{ route('website.index') }}">{{ __('web.Home') }}</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            {{ $product->trans_name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-wrapper edutim-course-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="course-single-header">
                    <div class="rating">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <span>(5.00)</span>
                    </div>

                    <h3 class="single-course-title">I{{ $product->trans_name }}</h3>
                    <p>{{ $product->trans_excerpt }}</p>

                    <div class="single-course-meta ">
                        <ul>
                            <li>
                                <span><i class="fa fa-calendar"></i>Last Update :</span>
                                <a href="#" class="d-inline-block">{{ $product->updated_at->format('F d,Y') }} </a>
                            </li>

                            <li>
                                <span><i class="fa fa-bookmark"></i>Dealer :</span>
                                <a href="#" class="d-inline-block">{{ $product->dealer->trans_name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="single-course-details ">
                    <h4 class="course-title">Description</h4>
                    {!! $product->trans_content !!}


                    <div class="course-widget course-info">
                        <h4 class="course-title">What You will Learn?</h4>
                        <ul>
                            <li>
                                <i class="fa fa-check"></i>
                                Clean up face imperfections, improve and repair photos
                            </li>
                            <li>
                                <i class="fa fa-check"></i>
                                Remove people or objects from photos
                            </li>
                            <li>
                                <i class="fa fa-check"></i>
                                Master selections, layers, and working with the layers panel
                            </li>
                            <li>
                                <i class="fa fa-check"></i>
                                Use creative effects to design stunning text styles
                            </li>
                            <li>
                                <i class="fa fa-check"></i>
                                working with the layers panel
                            </li>
                            <li>
                                <i class="fa fa-check"></i>
                                Cut away a person from their background
                            </li>
                        </ul>
                    </div>
                </div>
                <!--  Course Topics -->

                <div class="course-widget course-info">
                    <h4 class="course-title">About the Doctor</h4>
                    <div class="instructor-profile">
                        <div class="profile-img">
                            <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="profile-info">
                            <h5>Meraz Ahmed</h5>
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half"></i></a>
                                <span>3.79 ratings (29 )</span>
                            </div>
                            <p>I'm a developer with a passion for teaching. I'm the lead instructor at the London App
                                Brewery, London's leading Programming Bootcamp. I've helped hundreds of thousands of
                                students learn to code and change their lives by becoming a developer </p>
                            <div class="instructor-courses">
                                <span><i class="bi bi-folder"></i>4 Courses</span>
                                <span><i class="bi bi-group"></i>400 Students</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="course-sidebar">
                    <div class="course-single-thumb">
                        <img src="assets/images/course/course2.jpg" alt="" class="img-fluid w-100">
                        <div class="course-price-wrapper">
                            <div class="course-price ml-3">
                                <h4>Price: <span>{{ $product->price }}</span></h4>
                            </div>
                            @if (Auth::check())
                                <div class="buy-btn"><a href="{{ route('website.buy_product',$product->slug) }}" class="btn btn-main btn-block">Buy This Product</a></div>
                            @else
                            <div class="buy-btn"><a href="{{ route('website.login') }}" class="btn btn-main btn-block">Buy This Product</a></div>
                            @endif
                        </div>
                    </div>


                    <div class="course-widget single-info">
                        <i class="bi bi-group"></i>
                        Enrolled <span>101 dentist</span>
                    </div>


                    <div class="course-widget course-share d-flex justify-content-between align-items-center">
                        <span>Share</span>
                        <ul class="social-share list-inline">
                            <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}"><i class="fab fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="https://twitter.com/intent/tweet?url=test.com&text={{ request()->url() }}&text = {{ $product->trans_name }}"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ request()->url() }}&text = {{ $product->trans_name }}"><i class="fab fa-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="https://pinterest.com/pin/create/button/?url={{ request()->url() }}&text = {{ $product->trans_name }} "><i class="fab fa-pinterest"></i></a></li>
                        </ul>
                    </div>

                    <div class="course-widget course-metarials">
                        <h4 class="course-title">Requirements</h4>
                        <ul>
                            <li>
                                <i class="fa fa-check"></i>
                                No previous knowledge of Photoshop required.
                            </li>
                            <li>
                                <i class="fa fa-check"></i>
                                If you have Photoshop installed, that's great.
                            </li>
                            <li>
                                <i class="fa fa-check"></i>
                                If not, I'll teach you how to get it on your computer.
                            </li>

                        </ul>
                    </div>

                    <div class="course-widget">
                        <h4 class="course-title">Tags</h4>
                        <div class="single-course-tags">
                            <a href="#">Web Deisgn</a>
                            <a href="#">Development</a>
                            <a href="#">Html</a>
                            <a href="#">css</a>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding related-course">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h4>Related products You may Like</h4>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($related_products as $product)
              <div class="col-lg-4 col-md-6">
                @include('front.sections.product')
              </div>
            @endforeach
        </div>
    </div>
</section>

@stop
