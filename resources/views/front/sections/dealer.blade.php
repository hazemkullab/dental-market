@php
    $url=route('website.dealers_single',$dealer->slug) ;
    if(isset($route_name)){
        $url=route('website.'.$route_name,$dealer->slug);
    }
@endphp

<div class="course-block">
    <div class="course-img">
        <img src="{{ asset('uploads/'. $dealer->image) }}" alt="" class="img-fluid">
        {{-- <span class="course-label">Beginner</span> --}}
    </div>

    <div class="course-content">
        {{-- <div class="course-price ">$50</div> --}}

        <h4><a href="{{ route('website.dealers_single',$dealer->slug) }}">{{ $dealer->trans_name }}</a></h4>
        <div class="rating">
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            {{-- <span>(5.00)</span> --}}
        </div>
        {{-- <p></p> --}}
        <p>{{ Str::words($dealer->trans_excerpt , 20, '...') }}</p>


        <div class="course-footer d-lg-flex align-items-center justify-content-between">
            <div class="course-meta">
                {{-- <span class="course-student"><i class="bi bi-group"></i>340</span> --}}
                <span class="course-duration"><i class="bi bi-badge3"></i>  {{ $dealer->products->count() }} products </span>
            </div>

            <div class="buy-btn"><a href="{{ route('website.dealers_single',$dealer->slug) }}" class="btn btn-main-2 btn-small">Details</a></div>
        </div>
    </div>
</div>


