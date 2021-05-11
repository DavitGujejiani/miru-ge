@if ($slot != '' and $slot != null)
    <div class="swiper-slide">
        <a data-image="{{ asset('images/product-images/' . $slot) }}" data-zoom-image="{{ asset('images/product-images/' . $slot) }}">
            <img class="img-responsive" src="{{ asset('images/product-images/' . $slot) }}" alt="{{ $slot }}" />
        </a>
    </div>
@endif