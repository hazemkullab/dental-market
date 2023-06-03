<div class="course-block">
    <div class="course-img">
        <img src="{{ asset('uploads/'.$product->image) }}" alt="" class="img-fluid">
        {{-- <span class="course-label">Beginner</span> --}}
    </div>

    <div class="course-content">
        <div class="course-price ">${{ $product->price }}</div>

        <h4><a href="{{ route( 'website.products_single' , $product->slug) }}">{{ $product->trans_name }}</a></h4>
        <div class="rating">
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <a href="#"><i class="fa fa-star"></i></a>
            <span>(5.00)</span>
        </div>
        <p>{{ Str::words($product->trans_excerpt,20,'...') }}</p>

        <div class="course-footer d-lg-flex align-items-center justify-content-between">
            <div class="course-meta">
                {{-- <span class="course-student"><i class="bi bi-group"></i>340</span>
                <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span> --}}
            </div>

            <div class="buy-btn"><a href="{{ route('website.products_single' , $product->slug) }}" class="btn btn-main-2 btn-small">Buy now</a></div>
        </div>
    </div>
</div>
