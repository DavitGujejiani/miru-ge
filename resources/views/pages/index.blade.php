@extends('layouts.website')

@inject('banner', 'App\Models\Banner')
@inject('product', 'App\Models\Product')

@section('content')

@if (Session::has('order_status'))

{{-- MODAL --}}
{{-- post-purchase 'congrats' modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">გილოცავთ</h5>
            <button type="button" class="close" aria-label="Close" onclick="closeModal()">
                {{-- <span aria-hidden="true">×</span> --}}
            </button>
        </div>
        <div class="modal-body text-success">
            თქვენი შეკვეთა წარმატებით გაიგზავნა!
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeModal()">დახურვა</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
    </div>
</div>
</div>
<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>
@endif

<!-- Slider Start -->
<div class="slider-area slider-height-4">
    <div class="hero-slider swiper-container">
        <div class="swiper-wrapper">
            <!-- Single Slider  -->
            <div class="swiper-slide bg-img d-flex" style="background-image: url({{ asset('/images/banner-image/' . $banner::image_name(1)) }});">
                <div class="container align-self-center">
                    <div class="slider-content-1 slider-animated-1 text-left pl-60px">
                        @if ($banner::slider_title(1, 'small') !== null)
                            <span class="animated color-gray">{{ $banner::slider_title(1, 'small') }}</span>
                        @endif
                        <h1 class="animated color-black">
                            @if ($banner::slider_title(1) !== null)
                                {{ $banner::slider_title(1) }} <br />
                            @endif
                            @if ($banner::slider_title(1, 'bold') !== null)
                                <strong>{{ $banner::slider_title(1, 'bold') }}</strong>
                            @endif
                        </h1>
                        <a href="{{ $banner::getColumn(1, 'goto_url') }}" class="shop-btn animated">{{ $banner::getColumn(1, 'slider_button_title') }}</a>
                    </div>
                </div>
            </div>
            <!-- Single Slider  -->
            <div class="swiper-slide bg-img d-flex" style="background-image: url({{ asset('/images/banner-image/'. $banner::image_name(2)) }}">
                <div class="container align-self-center">
                    <div class="slider-content-1 slider-animated-1 text-left pl-60px">
                        @if ($banner::slider_title(2, 'small') !== null)
                            <span class="animated color-gray">{{ $banner::slider_title(2, 'small') }}</span>
                        @endif
                        <h1 class="animated color-black">
                            @if ($banner::slider_title(2) !== null)
                                {{ $banner::slider_title(2) }} <br />
                            @endif
                            @if ($banner::slider_title(2, 'bold') !== null)
                                <strong>{{ $banner::slider_title(2, 'bold') }}</strong>
                            @endif
                        </h1>
                        <a href="{{ $banner::getColumn(2, 'goto_url') }}" class="shop-btn animated">{{ $banner::getColumn(2, 'slider_button_title') }}</a>
                    </div>
                </div>
            </div>
            <!-- Single Slider  -->
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
    </div>
</div>
<!-- Slider End -->
<!-- Feature Tab Area Start-->
<div class="feature-tab-area mt-60px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-underline">
                    <ul class="nav-tabs nav">
                        <li><a class="active" data-toggle="tab" href="#featured">მოთხოვნადი</a></li>
                        <li><a  data-toggle="tab" href="#men">მამაკაცის საათები</a></li>
                        <li><a  data-toggle="tab" href="#women">ქალის საათები</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="featured" class="tab-pane active">
        <div class="feature-slider slider-nav-style-1">
            <div class="feature-slider-wrapper swiper-wrapper">
                <!-- Single Item -->
                @foreach ($watches['featured'] as $items => $item)
                <div class="feature-slider-item swiper-slide">
                    @include('vendor.items.product-article-content')
                </div>
                @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
            </div>
            <div id="men" class="tab-pane fade">
        <div class="feature-slider slider-nav-style-1">
            <div class="feature-slider-wrapper swiper-wrapper">
                <!-- Single Item -->
                @foreach ($watches['men'] as $items => $item)
                <div class="feature-slider-item swiper-slide">
                    @include('vendor.items.product-article-content')
                </div>
                @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
            </div>
            <div id="women" class="tab-pane fade">
        <div class="feature-slider slider-nav-style-1">
            <div class="feature-slider-wrapper swiper-wrapper">
                <!-- Single Item -->
                @foreach ($watches['women'] as $items => $item)
                <div class="feature-slider-item swiper-slide">
                    @include('vendor.items.product-article-content')
                </div>
                @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature Tab Area End-->
<!-- Banner area start -->
<div class="banner-area mt-30px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-wrapper">
                    <a href="{{ $banner::getColumn(3, 'goto_url') }}"><img src="{{ asset('/images/banner-image/' . $banner::image_name(3)) }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner area End -->

<!-- Category Tab Area Start -->
<section class="category-tab-area mt-30px mb-40px">
    <div class="container">
        <div class="section-title d-flex">
            <h2>მუშაობის ტიპი</h2>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs sub-category d-flex justify-content-end flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#mechanic">მექანიკური</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#chronograph">ქრონოგრაფი</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#quartz">კვარცი</a>
                </li>
            </ul>
        </div>

        <!-- Tab panes -->
        <div class="tab-content ">
            <!-- 1st tab start -->
            <div id="mechanic" class="tab-pane active ">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-lm-55px">
                        <div class="feature-slider-two slider-nav-style-1 single-product-responsive">
                            <div class="feature-slider-wrapper swiper-wrapper">
                                <!-- Single Item -->
                                @foreach ($watches['mechanical'] as $items => $item)
                                <div class="feature-slider-item swiper-slide">
                                    @include('vendor.items.product-article-content')
                                </div>
                                @endforeach
                                
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 1st tab end -->
            <!-- 2nd tab start -->
            <div id="chronograph" class="tab-pane fade">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-lm-55px">
                        <div class="feature-slider-two slider-nav-style-1">
                            <div class="feature-slider-wrapper swiper-wrapper">
                                <!-- Single Item -->
                                @foreach ($watches['chronograph'] as $items => $item)
                                <div class="feature-slider-item swiper-slide">
                                    @include('vendor.items.product-article-content')
                                </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 2nd tab end -->
            <!-- 3rd tab start -->
            <div id="quartz" class="tab-pane fade">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-lm-55px">
                        <div class="feature-slider-two slider-nav-style-1">
                            <div class="feature-slider-wrapper swiper-wrapper">
                                <!-- Single Item -->
                                @foreach ($watches['quartz'] as $items => $item)
                                <div class="feature-slider-item swiper-slide">
                                    @include('vendor.items.product-article-content')
                                </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3rd tab end -->
        </div>
    </div>
</section>
<!-- Category Tab Area end -->
<!-- Banner Area Start -->
<div class="banner-area mb-30px">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="banner-wrapper">
                    <a href="{{ $banner::getColumn(4, 'goto_url') }}"><img src="{{ asset('/images/banner-image/' . $banner::image_name(4)) }}" alt="" /></a>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="banner-wrapper">
                    <a href="{{ $banner::getColumn(5, 'goto_url') }}"><img src="{{ asset('/images/banner-image/' . $banner::image_name(5)) }}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->

@endsection

@section('javascript')
@if (Session::has('order_status'))
{{-- for 'congrats' modal after making a purchase --}}
<script>
function openModal() {
    document.getElementById("backdrop").style.display = "block"
    document.getElementById("exampleModal").style.display = "block"
    document.getElementById("exampleModal").className += "show"
}
function closeModal() {
    document.getElementById("backdrop").style.display = "none"
    document.getElementById("exampleModal").style.display = "none"
    document.getElementById("exampleModal").className += document.getElementById("exampleModal").className.replace("show", "")
}
// Get the modal
var modal = document.getElementById('exampleModal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        closeModal()
    }
}

window.onload = openModal;
</script>

@endif
@endsection