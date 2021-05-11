<!-- OffCanvas Cart Start -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">ჩემი კალათა</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
                @if ( session('cart') !== null )
                @foreach (session('cart') as $item)
                <li>
                    <a href="{{ urlize_product($item) }}" class="image"><img src="{{ asset('/images/product-image/' . $item['image']) }}" alt="{{ $item['name'] }}"></a>
                    <div class="content">
                        <a href="{{ urlize_product($item) }}" class="title">{{ $item['name'] }}</a>
                        <span class="quantity-price">{{ $item['qty'] }} x <span class="amount">{{ $item['price'] }}₾</span></span>
                        <form action="/cart/remove/{{ $item['id'] }}" method="post">
                            @csrf
                            <button type="submit" class="remove">×</button>
                        </form>
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
        <div class="foot">
            <div class="sub-total">
                <strong>სრული ფასი :</strong>
                <span class="amount">{{ $cart->total_price() }}₾</span>
            </div>
            <div class="buttons">
                <a href="/cart" class="btn btn-dark btn-hover-primary mb-30px">ჩემი კალათა</a>
                <form action="/cart/empty">
                    <button type="submit" class="btn btn-outline-dark current-btn">კალათის დაცლა</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- OffCanvas Cart End -->


<div class="offcanvas-overlay"></div>