@extends('layouts.admin')

@section('content')
    
@if($errors->any())
<div class="alert alert-success">{{ $errors->first() }}</div>
@endif


<div id="upload-wrapper">
    <span class="h4">პროდუქტის ატვირთვა</span>
    <form class="mt-5" action="/admin/product/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-subwrapper">
            <label for="name_en">სახელი ინგლისურად En</label> <i title="უნდა შედგებოდეს მხოლოდ ლათინური ასოებისგან &#013;მაგალითი: &#013;Rolex Datejust 36 Silver Metal" class="ion-help-circled"></i>
            <input name="name_en" class="form-control" type="text" required>
            <br>
            <label for="name">სახელი ქართულად Ge</label> <i title="თანმიმდევრობით უნდა იყოს ლათინური სახელის მსგავის &#013;მაგალითი: &#013;ლათინურად: Rolex Datejust 36 Silver Metal &#013;ქართულად: Rolex Datejust 36 ვერცხლის მეტალი" class="ion-help-circled"></i>
            <input name="name" class="form-control" type="text" required>
            <br>
            <label for="movement">მუშაობის ტიპი</label>
            <select name="movement" class="form-control" required>
                <option value="quartz">კვარცი</option>
                <option value="chronograph">ქრონოგრაფი</option>
                <option value="mechanical">მექანიკური</option>
            </select>
            <br>
            <label for="sex">სქესი</label>
            <select name="sex" class="form-control" required>
                <option value="men">მამაკაცი</option>
                <option value="women">ქალი</option>
                <option value="unisex">უნისექსი</option>
            </select>
            <br>
            <br>
            <label for="is_discounted">ფასდაკება:</label>
            კი <input name="is_discounted" type="checkbox" value="1" onclick="checkbox()" id="discount-checkbox"> 
            <br><br>
            
            <label id="price-label" for="price">ღირებულება</label>
            <input name="price" type="int" class="form-control" required>
            <br>
            <label class="d-none" id="discount-label" for="discount_price">ღირებულება ფასდაკლებით</label>
            <input name="discount_price" type="hidden" class="form-control" id="discount-input">
            <br>

            <input name="is_new" type="checkbox" value="1"> <label for="is_new">ახალი</label>
            <i title="თუ მონიშნულია პროდუქტს ვებსაიტზე 'ახალი' თაგი დაეწერება ფოტოზე | tip: თაგის მოსაშორებლად დათაბეისში 'is_new' უნდა იყოს 0" class="ion-help-circled"></i>
            <br><br>
            <input name="show_on_website" type="checkbox" value="1" checked> 
            <label for="show_on_website">საიტზე გამოჩენა</label>
            <br><br>
            <input name="featured" type="checkbox" value="1"> 
            <label for="featured">მოთხოვნადი</label>
            <br><br>
            <label class="mb-3" for="image">პროდუქტის სურათები</label>
            <br>
            <i class="ion-help-circled" title="მინიმუმი რაოდ. : 1 &#013;მაქსიმუმი რაოდ. : 4"></i>
            მთავარი: <input type="file" name="images[]" multiple required><br><br>
            {{-- სურათი 2: <input type="file" name="image2"><br><br>
            სურათი 3: <input type="file" name="image3"><br><br>
            სურათი 4: <input type="file" name="image4"> --}}
        </div>
        <div class="form-subwrapper">
            <label for="description">პროდუქტის აღწერა</label>
            <textarea class="form-control" name="description" cols="30" rows="10" required></textarea>
            <br>
            <label for="list_description">პროდუქტის მახასიათებლები</label>
            <i title="მახასიათებლები გამოჩნდება პროდუქტის ფეიჯზე  ფასის &#013; დაბლა და დეტალების სექციაში" class="ion-help-circled"></i>
            <textarea class="form-control" name="list_description" cols="30" rows="10" placeholder="!**&#013;უნდა იყოს ცხრილის სახით, &#013;მაგალითი: &#013;მაჯის ზომა: 24სმ &#013;კორპუსის ზომა 20მმ &#013;ფერი: ვერცხლისფერი&#013;**!"></textarea>
            <br><br>
            <button class="btn btn-primary" type="submit">ატვირთვა</button>
        </div>
    </form>
</div>

@endsection

@section('javascript')
    
<script type="text/javascript">
    
    function checkbox() 
    {
        var discount_checkbox = document.getElementById('discount-checkbox')
        var price_label = document.getElementById('price-label')
        var discount_label = document.getElementById('discount-label')
        var discount_input = document.getElementById('discount-input')

        if (discount_checkbox.checked) {
            price_label.innerHTML = 'ღირებულება ფასდაკლების გარეშე'
            discount_label.classList.remove('d-none')
            discount_input.type = 'int'
        } else {
            price_label.innerHTML = 'ღირებულება'
            discount_label.classList.add('d-none')
            discount_input.type = 'hidden'
        }
    }
</script>

@endsection
