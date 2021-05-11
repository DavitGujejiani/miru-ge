{{-- 
    add to cart button
--}}
<form action="/cart/add" method="post">
    @csrf
    @method('put')
    
    <input type="hidden" value="{{ $item->id }}">
    <li class="cart"><button type="submit" title="კალათაში დამატება" class="cart-btn"> დამატება </button></li>
</form>