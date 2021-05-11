{{-- 
    checks if product is new and if is - shows tag
--}}
@if ($item->is_new == true)
<ul class="product-flag">
    <li class="new">ახალი</li>
</ul>
@endif