$(function() {
    "use strict";
    
    // SHOW MORE IN product-list.php
    var button = document.getElementById("show-more-btn")
    if(button !== null) {
        const productView = document.querySelector(".product-view")
        const prodViewHeight = productView.clientHeight;
        if (prodViewHeight < 2500) {
            button.style.display = "none";
        }
        if (prodViewHeight > 2500) {
            productView.style.height = "2500px";
            button.addEventListener('click', function(){
                document.querySelector(".product-view").style.height = "auto";
                button.style.display = "none";
            });
        }
    }
    
    
    // checks if user is on mycart page
    const on_mycart_page = window.location.href.indexOf("mycart") > -1
    if(on_mycart_page)
    {
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
    }
});
