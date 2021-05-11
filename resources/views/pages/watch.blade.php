@extends('layout')

@inject('credo', 'App\Classes\Credo')
@inject('crystal', 'App\Classes\Crystal')

@section('content')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="/">მთავარი</a></li>
                        <li>{{ $item->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End-->

<!-- Shop details Area start -->
<section class="product-details-area mtb-60px">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="product-details-img product-details-tab">
                    <div class="zoompro-wrap zoompro-2">
                        <div class="zoompro-border zoompro-span">
                            <img class="zoompro" src="{{ asset('/images/product-image/' . $item->image) }}" data-zoom-image="{{ asset('/images/product-image/' . $item->image) }}" alt="" />
                        </div>
                    </div>
                    <div id="gallery" class="product-dec-slider-2 swiper-container">
                        <div class="swiper-wrapper">
                            <x-change-image>
                                {{ $item->image }}
                            </x-change-image>
                            <x-change-image>
                                {{ $item->image_2 }}
                            </x-change-image>
                            <x-change-image>
                                {{ $item->image_3 }}
                            </x-change-image>
                            <x-change-image>
                                {{ $item->image_4 }}
                            </x-change-image>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h2>{{ $item->name }}</h2>
                    <p class="reference">მუშაობის ტიპი:<span> {{ watch_movement($item->movement) }}</span></p>
                    <div class="pro-details-rating-wrap">
                        {{-- <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span> --}}
                    </div>
                    <div class="pricing-meta">
                        <ul>
                            @if ($item->is_discounted)
                            ფასი: 
                            <li style="color: #eb2606;" 
                            class="old-price not-cut"
                            >
                            {{ $item->discount_price }}₾
                            <s 
                            class="text-secondary font-weight-normal"
                            ><small> {{ $item->price }}₾</small></s>
                            {{-- <p class="discount-price mt-1">-{{ (int)$this->percent($item) }}% </p> --}}
                        </li>
                        @else
                        ფასი:
                        <li class="old-price not-cut">{{ $item->price }}₾</li>
                        @endif
                    </ul>
                </div>
                <div class="pro-details-list">
                    <p>
                        {{ $item->description }}
                    </p>
                    <pre>{{ $item->list_description }}</pre>
                </div>
                <form action="/cart/store/{{ $item->id }}" method="post">
                    @csrf

                    <div class="pro-details-quality mt-0px">
                        <div class="">
                            <select title="რაოდენობა" class="form-control" name="qty" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="pro-details-cart btn-hover">
                            <button class="btn btn-primary ml-3" title="კალათაში დამატება" type="submit">  დამატება</button>
                        </div>
                    </div>
                </form>
                <div class="product-page-ganvadeba-wrapper">
                    <h4 class="mt-3 mb-3">განვადებით შეძენა:</h4>
                    
                    <div class="product-page-bank-btn-wrapper">
                        <form target="_blank" action="{{ $crystal->newUrl($item) }}" method="post">
                            <button 
                            class="btn btn-lg" 
                            type="submit" 
                            value="go"
                            >
                            <img
                            class="bank-btn" 
                            src="/images/bank-logos/crystal-btn.png"
                            >
                        </button>
                    </form>
                    <form target="_blank" action="http://ganvadeba.credo.ge/widget/" method="post">
                        <input 
                        type="hidden" 
                        name="credoinstallment"
                        value="{{ $credo->json_encoded($item) }}"
                        >
                        <button 
                        class="btn btn-lg" 
                        type="submit" 
                        value="go"
                        >
                        <img
                        class="bank-btn" 
                        src="/images/bank-logos/credo-btn.png"
                        >
                    </button>
                </form>
            </div>
            
        </div>
    </div>
</div>
</div>
</div>
</section>
<!-- Shop details Area End -->
<!-- product details description area start -->
<div class="description-review-area mb-60px">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-toggle="tab" href="#des-details1">აღწერა</a>
                <a class="active" data-toggle="tab" href="#des-details2">დეტალები</a>
                {{-- <a data-toggle="tab" href="#des-details3">შეფასება</a> --}}
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            @if ($item->list_description)
                            <pre>{{ $item->list_description }}</pre>
                            @endif
                        </ul>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane">
                    <div class="product-description-wrapper">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                        <p>
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo consequat. Duis aute irure dolor in reprehend in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        </p>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="assets/images/review-image/1.png" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>
                                                Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper euismod vehicula. Phasellus quam nisi, congue id nulla.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review child-review">
                                    <div class="review-img">
                                        <img src="assets/images/review-image/2.png" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper euismod vehicula.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Add a Review</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <span>Your rating:</span>
                                            <div class="rating-product">
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                                <i class="ion-android-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Name" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-10">
                                                    <input placeholder="Email" type="email" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="Your Review" placeholder="Message"></textarea>
                                                    <input type="submit" value="Submit" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details description area end -->

<!-- Same Type Feature Area start -->
<div class="feature-area single-product-responsive  mb-30px">
    @if (isset($sametypeSortDesc[0]))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="section-heading">მსგავსი ტიპის საათები:</h2>
                </div>
            </div>
        </div>
        <div class="feature-slider-two slider-nav-style-1">
            <div class="feature-slider-wrapper swiper-wrapper">
                @foreach ($sametypeSortDesc as $items => $item)
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
    @endif
</div>
<!-- Feature Area End -->

@endsection

@section('vue')
    <script src="{{ asset('/js/vue/watch-vue.js') }}"></script>
@endsection