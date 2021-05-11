@inject('product', 'App\Models\Product')

<article class="list-product">
    <div class="img-block">
        <a href="{{ urlize_product($item) }}" class="thumbnail">
            <img class="first-img" src="{{ asset('/images/product-image/' . $item->image) }}" alt="{{ $item->name }} image" />
        </a>
        {{-- <div class="quick-view">
            <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                <i class="icon-magnifier icons"></i>
            </a>
        </div> --}}
    </div>
    @if ($product::getColumn($item->id, 'is_new') == true)
    <ul class="product-flag">
        <li class="new">ახალი</li>
    </ul>
    @endif
    <div class="product-decs">
        <a class="inner-link" href="{{ urlize_product($item) }}"><span>{{ $item->name }}</span></a>
        <h2><a href="/watches?type={{ $item->movement }}" class="product-link">მუშაობის ტიპი: {{ watch_movement($item->movement) }}</a></h2>
        <h2><a href="/watches?sex={{ $item->sex }}" class="product-link">{{ watch_gender($item->sex) }}</a></h2>
        <div class="pricing-meta">
            <ul>
                @if ($item->is_discounted)
                    @php
                        $percent = 100 - 100 / $item->price * $item->discount_price;
                    @endphp
                    <li class="old-price">{{ $item->price }}₾</li>
                    <li class="current-price">{{ $item->discount_price }}₾</li>
                    <li class="discount-price">-{{ (int)$percent }}%</li>
                @else
                    <li class="old-price not-cut">{{ $item->price }}₾</li>
                @endif
            </ul>
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