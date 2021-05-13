@extends('layouts.website')

@inject('cart', '\App\Classes\Cart')
@inject('crystal', 'App\Classes\Crystal')
@inject('credo', 'App\Classes\Credo')

@section('content')

<div class="offcanvas-overlay"></div>
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumb-content">
          <ul class="nav">
            <li><a id="scroll-to" href="/">მთავარი</a></li>
            <li>ჩემი კალათა</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Area End-->
<!-- cart area start -->
<div class="cart-main-area mtb-60px">
  <div class="container">
    @if ( null != session('cart') )
    <h3 class="cart-page-title">კალათაში ჩაგდებული პროდუქტები:</h3>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <form action="#">
          <div class="table-content table-responsive cart-table-content">
            <table>
              <thead>
                <tr>
                  <th>პროდუქტი</th>
                  <th>პროდუქტის სახელი</th>
                  <th>ცალის ფასი</th>
                  <th>რაოდ.</th>
                  <th>სრული ფასი</th>
                  <th>ამოღება</th>
                </tr>
              </thead>
              <tbody>
                @foreach (session('cart') as $item)
                <tr>
                  <td class="product-thumbnail">
                    <a  href="{{ urlize_product($item) }}"><img class="img-responsive" src="{{ product_images($item) }}" alt="" /></a>
                  </td>
                  <td class="product-name"><a href="{{ urlize_product($item) }}">{{ $item['name'] }}</a></td>
                  <td class="product-price-cart"><span class="amount">{{ $item['price'] }}₾</span></td>
                  <td class="product-quantity">
                    <div class="pro-details-quality mt-0px">
                      <select class="form-control" name="quantity" onchange="location = this.value;" style="width: 4rem; margin-left: 6rem;">
                        
                        <option value="{{ $item['qty'] }}" selected disabled hidden>{{ $item['qty'] }}</option>
                        <option value="/cart/changeQty/{{ $item['id'] }}/1">1</option>
                        <option value="/cart/changeQty/{{ $item['id'] }}/2">2</option>
                        <option value="/cart/changeQty/{{ $item['id'] }}/3">3</option>
                        <option value="/cart/changeQty/{{ $item['id'] }}/4">4</option>
                        <option value="/cart/changeQty/{{ $item['id'] }}/5">5</option>
                        
                      </select>
                    </div>
                  </td>
                  <td class="product-subtotal">{{ $item['price'] * $item['qty'] }}₾</td>
                  <td class="product-remove">
                    <form action="/cart/remove/{{ $item['id'] }}">
                      <button>
                        <i class="icon-close"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="cart-shiping-update-wrapper">
                <div class="cart-shiping-update">
                </div>
                <div class="cart-clear">
                  <form action="/cart/empty" method="post">
                    @csrf
                    
                    <button
                    type="submit"
                    >
                    კალათის გასუფთავება
                  </button>
                </form>
                <a id="scroll-to-this" href="#scroll-to-this">შეკვეთის გაფორმება</a>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-lm-30px">
          <div class="cart-tax">
            <div class="title-wrap">
              <h4 class="cart-bottom-title section-bg-gray">განვადებით შეძენა</h4>
            </div>
            <div class="tax-wrapper">
              <p>აირჩიეთ თქვენთვის სასურველი ბანკი.</p>
              <div class="tax-select-wrapper">
                <div class="tax-select col">
                  <div class="cart-page-btn-wrapper">
                    <form target="_blank" action="{{ $crystal->cart_newURL(session('cart')) }}" method="post">
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
                      value="{{ $credo->json_encoded() }}"
                      >
                      <button 
                      class="btn btn-lg" 
                      type="submit" 
                      value="go"
                      >
                      <img
                      class="bank-btn" 
                      src="images/bank-logos/credo-btn.png"
                      >
                      </button>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 mt-md-30px">
      <div class="grand-totall">
        <div class="title-wrap">
          <h4 class="cart-bottom-title section-bg-gary-cart">სრული</h4>
        </div>
        <h5><strong>პროდუქტების საერთო ფასი</strong>
          <span>
            {{ $cart->total_price() }}₾
            
            {{-- if (isset($_POST['percent']))
            {
              echo "<h6 class='text-secondary' style='margin-left: 1.8rem;'><small><em><del>".$oldTotalPrice."₾</del></em></small></h6>";
            }  --}}
            
          </span></h5>
          <div class="total-shipping">
            <h5>პროდუქტის მიღება:</h5>
            <ul>
              <form id="checkout-form" class="form" action="checkout-page" method="post">
                <li>
                  <input type="radio" name="region-radio" id="mycart-radio-tbilisi" value="tbilisi" /> თბილისში 
                  <span>0.00₾</span>
                </li>
                <li>
                  <input type="radio" name="region-radio" id="mycart-radio-region" value="region" /> რეგიონში 
                  <span>5.00₾</span>
                </li>
                {{-- <input type="hidden" name="total-price" value="$totalPrice" --}}
                
                {{-- if (isset($_POST['percent'])) {
                  <input type="hidden" name="percent" value=" $_POST["percent"] "
                } --}}
              </form>
            </ul>
          </div>
          <script type="text/javascript">
            var totalPrice = parseInt( '<?= $cart->total_price() ?>' )
          </script>
          <h4 class="grand-totall-title">სრული ფასი: <span class="price" value="33"  id="price"> {{ $cart->total_price() }}₾</span></h4>
          <form action="checkout" method="post">
            @csrf
            
            <input id="mycart-region-selector" type="hidden" name="region" value="">
            <button id="mycart-checkout-button" class="btn button-disabled" type="submit" >შეკვეთის გაფორმება</button>
          </form>
        </div>
      </div>
      
    </div>
    {{-- <div class="col-lg-4 col-md-6 mb-lm-30px">
      <div class="discount-code-wrapper">
        @if (null !== session('coupon'))
        <div class="title-wrap">
          <h4 class="cart-bottom-title section-bg-gray text-success">კუპონი გააქტიურებულია</h4>
        </div>
        <div class="discount-code">
          <p class=""> თქვენ გაგიაქტიურდათ {{ $cart->discountPercent() }}%-იანი ფასდაკლების კუპონი. </p>
          <form action="cart/coupon/remove" method="post">
            @csrf
            <button type="submit" class="btn text-danger btn-sm">კუპონის გაუქმება ×</button>
          </form>
        </div>
        @else
        <div class="title-wrap">
          <h4 class="cart-bottom-title section-bg-gray">ფასდაკლების კუპონის გამოყენება</h4>
        </div>
        <div class="discount-code">
          <p>მიუთითეთ ფასდაკლების კუპონის კოდი</p>
          <form method="post" action="cart/coupon/use">
            @csrf
            <input type="text" required name="code" class="is-valid" />
            
            @if ($errors->any())
            <p class="text-danger">{{ $errors->first() }}</p>
            @endif
            
            <button class="cart-btn-2" type="submit">კუპონის გამოყენება</button>
          </form>
        </div>
        @endif
      </div>
    </div> --}}
  </div>
</div>
@endif
@if (empty(session('cart')))
<h3 class="cart-page-title text-primary mb-5">თქვენი კალათა ცარიელია</h3>
@endif
</div>
</div>
@endsection

@section('javascript')
<script>
  const totalPrice_show = document.querySelector('.price');
  
  const mycart_checkout_button = document.getElementById('mycart-checkout-button')
  // Grand total price change on radio select - mycart
  document.getElementById("mycart-radio-region").addEventListener('click', function (){
    totalPrice_show.innerHTML = totalPrice + 5 + "₾"
    document.getElementById('mycart-region-selector').value = "region"
    console.log(document.getElementById('mycart-region-selector'))
    mycart_checkout_button.classList.remove('button-disabled')
    mycart_checkout_button.classList.add('btn-primary')
  })
  document.getElementById("mycart-radio-tbilisi").addEventListener('click', function (){
    totalPrice_show.innerHTML = totalPrice + "₾"
    document.getElementById('mycart-region-selector').value = "tbilisi"
    console.log(document.getElementById('mycart-region-selector'))
    mycart_checkout_button.classList.remove('button-disabled')
    mycart_checkout_button.classList.add('btn-primary')
  })
</script>
@endsection