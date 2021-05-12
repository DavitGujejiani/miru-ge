@extends('layout')

@inject('cart', 'App\Classes\Cart')

@section('checkout-style')
<style media="screen">
    .header-tools {
        opacity: 0;
        pointer-events: none;
    }
    input, select {
        border-radius: 1em;
    }
</style>
@endsection

@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="/">მთავარი</a></li>
                        <li>ჩექაუთი</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End-->
<!-- checkout area start -->
<div class="checkout-area mt-60px mb-40px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-info-wrap">
                    <h3>პირადი ინფორმაცია</h3>
                    {{-- if (null !== filter_input(INPUT_GET, 'error'))
                    $error = str_replace('-', ' ', filter_input(INPUT_GET, 'error'))
                    <p class="text-danger mb-3">$error*</p>
                    endif --}}
                    <form id="checkout-clientInfo-form" action="order/store" method="post">
                        @csrf
                        
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>სახელი*</label>
                                    <input class="" name="name" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>გვარი*</label>
                                    <input name="lastname" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="billing-select mb-20px">
                                    <label >მისამართი*</label>
                                    @if ($userRegion == 'tbilisi')
                                    <select name="region" class="overflow-auto input-valid" id="select">
                                        <option selected value="თბილისი">თბილისი</option>
                                    </select>
                                    @elseif ($userRegion == 'region')
                                    <select name="region" class="overflow-auto" id="select"">
                                        <option selected disabled hidden>აირჩიეთ ქალაქი</option>
                                        <option value="რუსთავი" class="Region-checkout-class">რუსთავი</option>
                                        <option value="ქუთისი" class="Region-checkout-class">ქუთისი</option>
                                        <option value="ბათუმი" class="Region-checkout-class">ბათუმი</option>
                                        <option value="ზუგდიდი" class="Region-checkout-class">ზუგდიდი</option>
                                        <option value="თელავი" class="Region-checkout-class">თელავი</option>
                                        <option value="ახალციხე" class="Region-checkout-class">ახალციხე</option>
                                        <option value="გორი" class="Region-checkout-class">გორი</option>
                                        <option value="აბაშა" class="Region-checkout-class">აბაშა</option>
                                        <option value="ადიგენი" class="Region-checkout-class">ადიგენი</option>
                                        <option value="ამბროლაური" class="Region-checkout-class">ამბროლაური</option>
                                        <option value="ახალქალაქი" class="Region-checkout-class">ახალქალაქი</option>
                                        <option value="ახმეტა" class="Region-checkout-class">ახმეტა</option>
                                        <option value="ბაღდადი" class="Region-checkout-class">ბაღდადი</option>
                                        <option value="ბოლნისი" class="Region-checkout-class">ბოლნისი</option>
                                        <option value="ბორჯომი" class="Region-checkout-class">ბორჯომი</option>
                                        <option value="გარდაბანი" class="Region-checkout-class">გარდაბანი</option>
                                        <option value="გურჯაანი" class="Region-checkout-class">გურჯაანი</option>
                                        <option value="დედოფლისწყარო" class="Region-checkout-class">დედოფლისწყარო</option>
                                        <option value="დმანისი" class="Region-checkout-class">დმანისი</option>
                                        <option value="დუშეთი" class="Region-checkout-class">დუშეთი</option>
                                        <option value="ვალე" class="Region-checkout-class">ვალე</option>
                                        <option value="ვანი" class="Region-checkout-class">ვანი</option>
                                        <option value="ზესტაფონი" class="Region-checkout-class">ზესტაფონი</option>
                                        <option value="თეთრიწყარო" class="Region-checkout-class">თეთრიწყარო</option>
                                        <option value="თერჯოლა" class="Region-checkout-class">თერჯოლა</option>
                                        <option value="თიანეთი" class="Region-checkout-class">თიანეთი</option>
                                        <option value="კასპი" class="Region-checkout-class">კასპი</option>
                                        <option value="ლაგოდეხი" class="Region-checkout-class">ლაგოდეხი</option>
                                        <option value="ლანჩხუთი" class="Region-checkout-class">ლანჩხუთი</option>
                                        <option value="მარნეული" class="Region-checkout-class">მარნეული</option>
                                        <option value="მარტვილი" class="Region-checkout-class">მარტვილი</option>
                                        <option value="მესტია" class="Region-checkout-class">მესტია</option>
                                        <option value="მცხეთა" class="Region-checkout-class">მცხეთა</option>
                                        <option value="ნინოწმინდა" class="Region-checkout-class">ნინოწმინდა</option>
                                        <option value="ოზურგეთი" class="Region-checkout-class">ოზურგეთი</option>
                                        <option value="ონი" class="Region-checkout-class">ონი</option>
                                        <option value="საგარეჯო" class="Region-checkout-class">საგარეჯო</option>
                                        <option value="სამტრედია" class="Region-checkout-class">სამტრედია</option>
                                        <option value="საჩხერე" class="Region-checkout-class">საჩხერე</option>
                                        <option value="სენაკი" class="Region-checkout-class">სენაკი</option>
                                        <option value="სიღნაღი" class="Region-checkout-class">სიღნაღი</option>
                                        <option value="სტეფანწმინდა" class="Region-checkout-class">სტეფანწმინდა</option>
                                        <option value="სურამი" class="Region-checkout-class">სურამი</option>
                                        <option value="ტრყიბული" class="Region-checkout-class">ტრყიბული</option>
                                        <option value="ფოთი" class="Region-checkout-class">ფოთი</option>
                                        <option value="ქარელი" class="Region-checkout-class">ქარელი</option>
                                        <option value="ქობულეთი" class="Region-checkout-class">ქობულეთი</option>
                                        <option value="ყვარელი" class="Region-checkout-class">ყვარელი</option>
                                        <option value="ჩოხატაური" class="Region-checkout-class">ჩოხატაური</option>
                                        <option value="ჩხოროწყუ" class="Region-checkout-class">ჩხოროწყუ</option>
                                        <option value="ცაგარი" class="Region-checkout-class">ცაგარი</option>
                                        <option value="წალენჯიხა" class="Region-checkout-class">წალენჯიხა</option>
                                        <option value="წალკა" class="Region-checkout-class">წალკა</option>
                                        <option value="წნორი" class="Region-checkout-class">წნორი</option>
                                        <option value="წყალტუბო" class="Region-checkout-class">წყალტუბო</option>
                                        <option value="ჭიათურა" class="Region-checkout-class">ჭიათურა</option>
                                        <option value="ხარაგაული" class="Region-checkout-class">ხარაგაული</option>
                                        <option value="ხაშური" class="Region-checkout-class">ხაშური</option>
                                        <option value="ხობი" class="Region-checkout-class">ხობი</option>
                                        <option value="ხონი" class="Region-checkout-class">ხონი</option>
                                        <option value="ჯვარი" class="Region-checkout-class">ჯვარი</option>
                                    </select>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <label>კონკრეტული მისამართი*</label>
                                    <input name="street" class="billing-address" placeholder="ქუჩის დასახელება" type="text" />
                                    <input name="apartment" placeholder="შენობა, ბინის ნომერი" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>მობილურის ნომერი*</label>
                                    <input name="number" type="int" />
                                </div>
                            </div>
                        </div>
                        <div class="additional-info-wrap">
                            <h4>დამატებითი ინფორმაცია</h4>
                            <div class="additional-info">
                                <label>შევსება არარის აუცილებელი</label>
                                <textarea placeholder="გსურთ დამატების რაიმე ინფორმაციის გაზიარება პროდუქტის მიღების შესახებ? " name="additional-message"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="total-price" value="{{ $totalPrice }}">
                        
                    </div>
                </div>
                <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                    <div class="your-order-area">
                        <h3>შეკვეთის ინფორმაცია</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>პროდუქტი</li>
                                        <li>ფასი</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        @foreach (session('cart') as $product)
                                        <li><span class="order-middle-left">{{ $product['name'].' x '.$product['qty'] }}</span> <span class="order-price">{{ $product['price'] * $product['qty'] }}₾ </span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="your-order-bottom">
                                    <ul>
                                        <li class="your-order-shipping">მიწოდების ფასი</li>
                                        @if ($userRegion == 'region')
                                        <li id="shipping-payment">5₾</li>
                                        @endif
                                        @if ($userRegion == 'tbilisi')
                                        <li id="shipping-payment">უფასო მიწოდება</li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="your-order-total">
                                    <ul>
                                        <li class="order-total">სრული:</li>
                                        <li>{{ $totalPrice }}₾</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="Place-order mt-25">
                            <button name="submit" class="btn button-disabled">შეკვეთის გაფორმება</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout area end -->

@endsection

@section('javascript')
<script>
const pass_num = /^\d+$/

const checkoutForm = document.getElementById('checkout-clientInfo-form');
let name      = checkoutForm.elements.namedItem('name')
let lastname  = checkoutForm.elements.namedItem('lastname')
let region    = checkoutForm.elements.namedItem('region')
let street    = checkoutForm.elements.namedItem('street')
let apartment = checkoutForm.elements.namedItem('apartment')
let number    = checkoutForm.elements.namedItem('number')
let submitBtn = checkoutForm.elements.namedItem('submit')



name.addEventListener('focusout', validate)
lastname.addEventListener('focusout', validate)
region.addEventListener('change', validate)
street.addEventListener('focusout', validate)
apartment.addEventListener('focusout', validate)
number.addEventListener('input', validateNumber)

function validateNumber(e) {
    let target = e.target
    let classlist = target.classList

    let is_int_only = pass_num.test(target.value)

    if (target.value.length == 9 & is_int_only) {
        classlist.add('input-valid')
    } else {
        classlist.remove('input-valid')
    }
}

function validate(e) {
    let target    = e.target
    let classlist = target.classList;

    if (target.value.length > 0) {
        classlist.add('input-valid')
        console.log(target)
    } else {
        classlist.remove('input-valid')
    }
}

function formCheck() {
    if (name.classList.contains('input-valid') && lastname.classList.contains('input-valid') && region.classList.contains('input-valid') && number.classList.contains('input-valid')) 
    {
        submitBtn.classList.remove('button-disabled')
        submitBtn.classList.add('btn-primary')
    } else {
        submitBtn.classList.add('button-disabled')
        submitBtn.classList.remove('btn-primary')
    }
}

setInterval(formCheck, 300)
</script>
@endsection