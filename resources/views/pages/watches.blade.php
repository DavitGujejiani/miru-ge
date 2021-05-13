@extends('layouts.website')

@section('content')
{{-- MODALS --}}
<div id="filter-modal-wrapper">
    <div id="filter-modal">
        <div class="icon" onclick="filterHide()"><i class="ion-android-close"></i></div>
        <form action="#" method="get">
            <h5 class="mb-4 text-center">ფილტრი</h5>
            <label for="type">მუშაობის ტიპი:</label>
            <select id="filterType" name="type" class="form-control">
                <option value="">ყველა</option>
                <option value="quartz">კვარცი</option>
                <option value="mechanical">მექანიკური</option>
                <option value="chronograph">ქრონოგრაფი</option>
            </select>
            <label for="sex">სქესი:</label>
            <select id="filterSex" name="sex" class="form-control">
                <option value="">ყველა</option>
                <option value="men">მამაკაცი</option>
                <option value="women">ქალი</option>
                <option value="unisex">უნისექსი</option>
            </select>
            <label for="sort">სორტირება:</label>
            <select id="filterSort" name="sort" class="form-control">
                <option value="desc">ფასის კლებადობით</option>
                <option value="asc">ფასის ზრდადობით</option>
            </select>
            <button class="btn btn-primary mt-3" type="submit">გაფილტვრა</button>
        </form>
        <form action="#" method="get">
            <input type="hidden" name="type" value="">
            <input type="hidden" name="sex" value="">
            <input type="hidden" name="sort" value="desc">
            <button class="btn btn-outline-dark" type="submit">გასუფთავება</button>
        </form>
    </div>
</div>
<div id="filter-modal-overlay" onclick="filterHide()"></div>

<div class="offcanvas-overlay"></div>
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content d-flex justify-content-between">
                    <ul class="nav">
                        <li><a href="/">მთავარი</a></li>
                        <li>
                            საათები
                        </li>
                    </ul>
                    <a class="mr-5 btn btn-primary text-white" onclick="filterShow()">ფილტრი</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End-->
<!-- Shop Category Area End -->
<div class="shop-category-area mt-30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar d-flex">
                    <!-- Left Side start -->
                    <div class="shop-tab nav d-flex">
                        <!-- <a class="active" href="#shop-1" data-toggle="tab">
                            <i class="fa fa-th"></i>
                        </a>
                        <a href="#shop-2" data-toggle="tab">
                            <i class="fa fa-list"></i>
                        </a> -->
                    </div>
                    <!-- Left Side End -->
                    <!-- Right Side Start -->
                    <div class="select-shoing-wrap d-flex">
                        <!-- <div class="shot-product">
                            <p>სორტირება:</p>
                        </div>
                        <div class="shop-select">
                            <form class="" action="" method="get">
                                <select name="სორტირება" onchange="this.form.submit()">
                                    <option disabled selected hidden></option>
                                    <option value="კლებადობით">ფასი: კლებადობით</option>
                                    <option value="ზრდადობით">ფასი: ზრდადობით</option>
                                </select>
                            </form>
                        </div> -->
                    </div>
                    <!-- Right Side End -->
                </div>
                <!-- Shop Top Area End -->
                
                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area mt-35">
                    <!-- Shop Tab Content Start -->
                    <div class="tab-content jump">
                        <!-- Tab One Start -->
                        <div id="shop-1" class="tab-pane active">
                            <div class="row responsive-md-class product-view">
                                {{-- @php
                                    dd($products_array);
                                    @endphp --}}
                                    @if (count($watches) == 0)
                                    <h2 class="m-5">მსგავსი საათი არ მოიძებნა</h2>
                                    @endif
                                    @foreach ($watches as $items => $item)
                                    <div class="col-xl-3 col-md-4 col-sm-6 ">
                                        <article class="list-product">
                                            <div class="img-block">
                                                <a href="{{ urlize_product($item) }}" class="thumbnail">
                                                    <img class="first-img" src="{{ asset('/images/product-image/' . $item->image) }}" alt="" />
                                                </a>
                                                <div class="quick-view">
                                                    <!-- <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a> -->
                                                </div>
                                            </div>
                                            @if ( $item->is_new )
                                            <ul class="product-flag">
                                                <li class="new">ახალი</li>
                                            </ul>
                                            @endif
                                            <div class="product-decs">
                                                <a class="inner-link" href="{{ urlize_product($item) }}"><span>{{ $item->name }}</span></a>
                                                <h2><a href="{{ urlize_product($item) }}" class="product-link">{{ $item->category }}</a></h2>
                                                
                                                <div class="pricing-meta">
                                                    @include('vendor.items.price')
                                                </div>
                                                
                                            </div>
                                            <div class="add-to-link">
                                                <ul>
                                                    <form action="/cart/store/{{ $item->id }}" method="post">
                                                        @csrf
                                                        
                                                        <li class="cart"><button type="submit" title="კალათაში დამატება" class="cart-btn"> დამატება </button></li>
                                                    </form>
                                                </ul>
                                            </div>
                                        </article>
                                    </div>
                                    @endforeach
                                    
                                    <div class="container-fluid show-more-btn d-flex justify-content-center align-items-center">
                                        <h4 id="show-more-btn" class="btn btn-primary">ყველას ნახვა</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab One End -->
                            <!-- Tab Two Start -->
                            <!-- DELETED -->
                            <!-- Tab Two End -->
                        </div>
                        <!-- Shop Tab Content End -->
                        <!--  Pagination Area Start -->
                        <div class="pro-pagination-style text-center mb-60px mt-30px">
                            <ul>
                                
                            </ul>
                        </div>
                        <!--  Pagination Area End -->
                    </div>
                    <!-- Shop Bottom Area End -->
                </div>
            </div>
        </div>
    </div>
    @endsection
    
@section('javascript')
<script>
    // sets filter modal options to selected values after submit
    document.getElementById('filterType').value = "<?php echo $_GET['type'] ?>";
    document.getElementById('filterSex').value = "<?php echo $_GET['sex'] ?>";
    document.getElementById('filterSort').value = "<?php echo $_GET['sort'] ?>";
    
    // 
    var filterModal = document.getElementById('filter-modal')
    var filterOverlay = document.getElementById('filter-modal-overlay')
    function filterHide() {
        filterModal.style.display = 'none'
        filterOverlay.style.display = 'none'
    }
    function filterShow() {
        filterModal.style.display = 'flex'
        filterOverlay.style.display = 'flex'
    }
    
    // SHOW MORE BUTTON
    var button = document.getElementById("show-more-btn")
    if(button !== null) {
        const productView = document.querySelector(".product-view")
        const prodViewHeight = productView.clientHeight;
        if (prodViewHeight < 2500) {
            button.style.display = "none";
        }
        if (prodViewHeight > 2500) {
            productView.style.height = "2500px";
            button.addEventListener('click', function(){
                document.querySelector(".product-view").style.height = "auto";
                button.style.display = "none";
            });
        }
    }
</script>
@endsection