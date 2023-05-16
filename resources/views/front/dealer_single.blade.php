@extends('front.master')
@section('title','Homepage | '.env('APP_NAME'))
@section('content')

<section class="page-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h1>{{ $dealer->trans_name }}</h1>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="{{ route('website.index') }}">{{ __('web.Home') }}</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            {{ $dealer->trans_name }}
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

                    <h3 class="single-course-title">{{ $dealer->trans_name }}</h3>
                    <p>{{ $dealer->trans_excerpt }}</p>

                    <div class="single-course-meta ">
                        <ul>
                            <li>
                                <span><i class="fa fa-calendar"></i>Last Update :</span>
                                <a href="#" class="d-inline-block">{{ $dealer->updated_at->format('F d, Y') }} </a>
                            </li>

                            <li>
                                <span><i class="fa fa-bookmark"></i>Category :</span>
                                <a href="#" class="d-inline-block">{{ $dealer->category->trans_name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="single-course-details ">
                    <h4 class="course-title">Description</h4>
                    {!! $dealer->trans_content !!}


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
                <!--  COurse Topics End -->

                <div class="course-widget course-info">
                    <h4 class="course-title">About the instructors</h4>
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
                <div class="course-widget course-info">
                    <h4 class="course-title">Students Feedback</h4>

                    <div class="course-review-wrapper">
                        <div class="course-review">
                            <div class="profile-img">
                                <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="review-text">
                                <h5>Mehedi Rasedh <span>26th june 2020</span></h5>

                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half"></i></a>
                                </div>
                                <p>Great course. Well structured, paced and I feel far more confident using this
                                    software now then I did back in school when I was learning. And the guy doing the
                                    voice over really is great at what he does</p>
                            </div>
                        </div>


                        <div class="course-review">
                            <div class="profile-img">
                                <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="review-text">
                                <h5>Rasedh raj <span>1 Year Ago</span></h5>
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half"></i></a>
                                </div>
                                <p>Very deep course for a beginner, enjoyed everything from the very start and every
                                    detail is vastly investigated and discussed. A nice choice for those, who are
                                    enrolling Python. </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="section-padding course">
    <div class="course-top-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <p>Showing 1-6 of 8 results</p>
                </div>

                <div class="col-lg-4">
                    <div class="topbar-search">
                        <form method="get" action="#">
                            <input type="text" placeholder="Search our courses" class="form-control">
                            <label><i class="fa fa-search"></i></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
                @include('front.sections.product')
            </div>
            @endforeach
        </div>


        <div class="row">
            <div class="col-lg-12 blog-pagination text-center">
                {{-- <nav class="blog-pagination text-center">
                    <ul>
                        <li class="page-num active"><a href="#">1</a></li>
                        <li class="page-num"><a href="#">2</a></li>
                        <li class="page-num"><a href="#">3</a></li>
                    </ul>
                </nav> --}}
                {{ $products->links() }}
            </div>
        </div>
    </div>
</section>


<section class="section-padding related-course">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h4>Related Dealers You may Like</h4>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($related_dealers as $dealer)
            <div class="col-lg-4 col-md-6">
                @include('front.sections.dealer')
            </div>
            @endforeach
        </div>
    </div>
</section>

@stop
