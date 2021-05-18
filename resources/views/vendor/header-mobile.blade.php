<!-- Mobile Header Section Start -->
<div class="mobile-header d-xl-none sticky-nav bg-white ptb-10px">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Header Logo Start -->
            <div class="col">
                <div class="header-logo">
                    <a class="h1 text-dark font-weight-bold" href="/">MIRU.GE</a>
                </div>
            </div>
            <!-- Header Logo End -->
            
            <!-- Header Tools Start -->
            <div class="col-auto">
                <div class="header-tools justify-content-end">
                    <div class="cart-info d-flex align-self-center">
                        <a href="#offcanvas-cart" class="bag offcanvas-toggle" data-number="3"><i class="icon-bag"></i><span>$20.00</span></a>
                    </div>
                    <div class="mobile-menu-toggle">
                        <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                            <svg viewBox="0 0 800 600">
                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Header Tools End -->
            
        </div>
    </div>
</div>

<!-- Search Category Start -->
<div class="mobile-search-area d-xl-none mb-15px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-element media-body">
                    <form class="d-flex" action="/search" method="get">
                        <input type="text" placeholder="ჩაწერეთ საძიებო სიტყვა ... " />
                        <button type="submit" title="ძებნა"><i class="icon-magnifier"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- OffCanvas Search Start -->
<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <div class="inner customScroll">
        <div class="head">
            <span class="title">&nbsp;</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="offcanvas-menu-search-form">
            <form action="#">
                <input type="text" placeholder="ძებნა...">
                <button><i class="icon-magnifier"></i></button>
            </form>
        </div>
        <div class="offcanvas-menu">
            <ul>
                {{-- <li><a href="#"><span class="menu-text">მუშაობის ტიპი</span></a>
                    <ul class="sub-menu">
                        <li><a href="/watches/mechanical"><span class="menu-text">მექანიკური</span></a></li>
                        <li><a href="/watches/chronograph"><span class="menu-text">ქრონოგრაფი</span></a></li>
                        <li> <a href="/watches/quartz"><span class="menu-text">კვარცი</span></a></li>
                    </ul>
                </li> --}}
                <li><a href="#"><span class="menu-text">კატეგორიები</span></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#"><span class="menu-text">მუშაობის ტიპი</span></a>
                            <ul class="sub-menu">
                                <li><a href="/watches?type=mechanical">მექანიკური</a></li>
                                <li><a href="/watches?type=chronograph">ქრონოგრაფი</a></li>
                                <li><a href="/watches?type=quartz">კვარცი</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text">სქესის მიხედვით</span></a>
                            <ul class="sub-menu">
                                <li><a href="/watches?sex=men">მამაკაცების საათები</a></li>
                                <li><a href="/watches?sex=women">ქალის საათები</a></li>
                                <li><a href="/watches?sex=unisex">უნისექსი</a></li>
                            </ul>
                        </li>
                        {{-- <li>
                            <a href="#"><span class="menu-text">Shop Single</span></a>
                            <ul class="sub-menu">
                                <li><a href="single-product.html">Shop Single</a></li>
                                <li><a href="single-product-variable.html">Shop Variable</a></li>
                                <li><a href="single-product-affiliate.html">Shop Affiliate</a></li>
                                <li><a href="single-product-group.html">Shop Group</a></li>
                                <li><a href="single-product-tabstyle-2.html">Shop Tab 2</a></li>
                                <li><a href="single-product-tabstyle-3.html">Shop Tab 3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text">Shop Single</span></a>
                            <ul class="sub-menu">
                                <li><a href="single-product-slider.html">Shop Slider</a></li>
                                <li><a href="single-product-gallery-left.html">Shop Gallery Left</a></li>
                                <li><a href="single-product-gallery-right.html">Shop Gallery Right</a></li>
                                <li><a href="single-product-sticky-left.html">Shop Sticky Left</a></li>
                                <li><a href="single-product-sticky-right.html">Shop Sticky Right</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </li>
                {{-- <li><a href="#"><span class="menu-text">Pages</span></a>
                    <ul class="sub-menu">
                        <li><a href="about.html">About Page</a></li>
                        <li><a href="cart.html">Cart Page</a></li>
                        <li><a href="checkout.html">Checkout Page</a></li>
                        <li><a href="compare.html">Compare Page</a></li>
                        <li><a href="login.html">Login & Register Page</a></li>
                        <li><a href="my-account.html">Account Page</a></li>
                        <li><a href="wishlist.html">Wishlist Page</a></li>
                        <li><a href="thank-you-page.html">Thank You Page</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="menu-text">Blog</span></a>
                    <ul class="sub-menu">
                        <li><a href="#"><span class="menu-text">Blog Grid</span></a>
                            <ul class="sub-menu">
                                <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span class="menu-text">Blog List</span></a>
                            <ul class="sub-menu">
                                <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                                <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span class="menu-text">Blog Single</span></a>
                            <ul class="sub-menu">
                                <li><a href="blog-single-left-sidebar.html">Blog Single Left Sidebar</a></li>
                                <li><a href="blog-single-right-sidebar.html">Blog Single Right Sidbar</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact Us</a></li> --}}
            </ul>
        </div>
        <div class="offcanvas-buttons mt-30px">
            <div class="header-tools d-flex">
                <div class="cart-info d-flex align-self-center">
                    <a href="cart.html" data-number="3"><i class="icon-bag"></i></a>
                </div>
            </div>
        </div>
        <div class="offcanvas-social mt-30px">
            <ul>
                <li>
                    <a target="_blank" href="https://www.facebook.com/Mirujewellery/"><i class="icon-social-facebook"></i></a>
                </li>
                {{-- <li>
                    <a href="#"><i class="icon-social-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-instagram"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-google"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-instagram"></i></a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- OffCanvas Search End -->

<div class="offcanvas-overlay"></div>
