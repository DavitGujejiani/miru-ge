@if ($slot != '' and $slot != null)
    <div class="swiper-slide">
        <a data-image="{{ asset('images/product-image/' . $slot) }}" data-zoom-image="{{ asset('images/product-image/' . $slot) }}">
            <img class="img-responsive" src="{{ asset('images/product-image/' . $slot) }}" alt="{{ $slot }}" />
        </a>
    </div>
@endif