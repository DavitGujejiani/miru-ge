{{-- 
    Checks if product has discount and renders price accordingly
--}}
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