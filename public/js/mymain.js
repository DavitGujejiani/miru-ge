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
        
    }
});
