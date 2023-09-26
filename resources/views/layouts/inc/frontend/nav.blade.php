<nav class="secondary-nav border-bottom">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-4 header-contact">
                <p>Let's talk! <strong>+57 444 11 00 35</strong>
                </p>
            </div>
            <div class="col-md-4 shipping-purchase text-center">
                <p>Free shipping on a purchase value of $200</p>
            </div>
            <div class="col-md-4 col-sm-12 user-items">
                <ul class="d-flex justify-content-end list-unstyled">

                    <li>
                        <!-- Authentication Links -->
                        @guest
                            <a href="#">
                                <div class="d-flex">
                                    <div>
                                        <i class="icon icon-user"></i>
                                        @if (Route::has('login'))
                                            <a href="{{ route('login') }}">
                                                {{ __('Login') }}
                                            </a>
                                        @endif
                                        @if (Route::has('register'))
                                            <a style="margin-left: 2px" href="{{ route('register') }}">
                                                {{ __('Register') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @else
                            <div>
                                <a href="#">
                                    <i class="icon icon-user"></i>
                                    {{ Auth::user()->username }}
                                </a>

                                <div style="margin-top: -2px; text-align:center">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </li>
                    <li>
                        <a href="cart.html">
                            <i class="icon icon-shopping-cart"></i>
                        </a>
                    </li>
                    <li>
                        <a href="wishlist.html">
                            <i class="icon icon-heart"></i>
                        </a>
                    </li>
                    <li class="user-items search-item pe-3">
                        <a href="#" class="search-button">
                            <i class="icon icon-search"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<nav class="primary-nav padding-small">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-2 col-md-2">
                <div class="main-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/main-logo.png') }}" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-10 col-md-10">
                <div class="navbar">

                    <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                        <ul class="menu-list">

                            <li class="menu-item has-sub">
                                <a href="index.html" class="item-anchor active d-flex align-item-center"
                                    data-effect="Home">Home<i class="icon icon-chevron-down"></i></a>
                                <ul class="submenu">
                                    <li><a href="index.html" class="item-anchor active">Home</a></li>
                                </ul>
                            </li>

                            <li><a href="about.html" class="item-anchor" data-effect="About">About</a>
                            </li>

                            <li class="menu-item has-sub">
                                <a href="shop.html" class="item-anchor d-flex align-item-center"
                                    data-effect="Shop">Shop<i class="icon icon-chevron-down"></i></a>
                                <ul class="submenu">
                                    <li><a href="shop.html" class="item-anchor">Shop</a></li>
                                </ul>
                            </li>

                            <li class="menu-item has-sub">
                                <a href="#" class="item-anchor d-flex align-item-center"
                                    data-effect="Pages">Pages<i class="icon icon-chevron-down"></i></a>
                                <ul class="submenu">
                                    <li><a href="styles.html" class="item-anchor">Styles</a></li>
                                    <li><a href="thank-you.html" class="item-anchor">Thankyou</a></li>
                                </ul>
                            </li>

                            <li class="menu-item has-sub">
                                <a href="blog.html" class="item-anchor d-flex align-item-center"
                                    data-effect="Blog">Blog<i class="icon icon-chevron-down"></i></a>
                                <ul class="submenu">
                                    <li><a href="blog.html" class="item-anchor">Blog</a></li>
                                    <li><a href="single-post.html" class="item-anchor">Single post</a>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="contact.html" class="item-anchor" data-effect="Contact">Contact</a></li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
