@extends('client.layout.layout')
@section('title','Trang Chủ')
@section('content')
    <!-- Start slider section -->
    <section class="hero__slider--section">
        <div class="hero__slider--inner hero__slider--activation swiper">
            <div class="hero__slider--wrapper swiper-wrapper">
                @foreach($sliders as $key => $value)
                <div class="swiper-slide ">
                    <div class="hero__slider--items home1__slider--bg{{$key}}" style="background: url({{ asset($value->link_image) }});">
                        <div class="container-fluid">
                            <div class="hero__slider--items__inner">
                                <div class="row row-cols-1">
                                    <div class="col">
                                        <div class="slider__content">
                                            <p class="slider__content--desc desc1 mb-15"><img class="slider__text--shape__icon" src="{{ asset('client/assets/img/icon/text-shape-icon.png') }}" alt="text-shape-icon"> New Collection</p>
                                            <h2 class="slider__content--maintitle h1">{!! $value->title_slider !!}</h2>
                                            <p class="slider__content--desc desc2 d-sm-2-none mb-40">{!! $value->title_sale !!}</p>
                                            <a class="slider__btn primary__btn" href="{{ route('product.detail',['id' => $value->id]) }}">Show Collection
                                                <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                                    <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper__nav--btn swiper-button-next"></div>
            <div class="swiper__nav--btn swiper-button-prev"></div>
        </div>
    </section>
    <!-- End slider section -->

    <!-- Start banner section -->
    <section class="banner__section section--padding">
        <div class="container-fluid">
            <div class="row mb--n28">
                <div class="col-lg-5 col-md-order mb-28">
                    <div class="banner__items">
                        <a class="banner__items--thumbnail position__relative" href="shop.html"><img class="banner__items--thumbnail__img" src="{{ asset('client/assets/img/banner/banner1.png') }}" alt="banner-img">
                            <div class="banner__items--content">
                                <span class="banner__items--content__subtitle">17% Discount</span>
                                <h2 class="banner__items--content__title h3">Spring Collection <br>
                                    Style To</h2>
                                <span class="banner__items--content__link">View Discounts
                                        <svg class="banner__items--content__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                            <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                        </svg>
                                    </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 mb-28">
                    <div class="row row-cols-lg-2 row-cols-sm-2 row-cols-1">
                        <div class="col mb-28">
                            <div class="banner__items">
                                <a class="banner__items--thumbnail position__relative" href="shop.html"><img class="banner__items--thumbnail__img" src="{{ asset('client/assets/img/banner/banner2.png') }}" alt="banner-img">
                                    <div class="banner__items--content">
                                        <span class="banner__items--content__subtitle text__secondary">Shop Women</span>
                                        <h2 class="banner__items--content__title h3">Up to 70% Off & <br>
                                            Free Shipping</h2>
                                        <span class="banner__items--content__link">View Discounts
                                                <svg class="banner__items--content__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                                    <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col mb-28">
                            <div class="banner__items">
                                <a class="banner__items--thumbnail position__relative" href="shop.html"><img class="banner__items--thumbnail__img" src="{{ asset('client/assets/img/banner/banner3.png') }}" alt="banner-img">
                                    <div class="banner__items--content">
                                        <span class="banner__items--content__subtitle">Shop Women</span>
                                        <h2 class="banner__items--content__title h3">Free Shipping Over <br>
                                            Order $120</h2>
                                        <span class="banner__items--content__link">View Discounts
                                                <svg class="banner__items--content__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                                    <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="banner__items">
                        <a class="banner__items--thumbnail position__relative" href="shop.html"><img class="banner__items--thumbnail__img banner__img--max__height" src="{{ asset('client/assets/img/banner/banner4.png') }}" alt="banner-img">
                            <div class="banner__items--content">
                                <span class="banner__items--content__subtitle">25% Discount</span>
                                <h2 class="banner__items--content__title h3">Leather Saddle <br>
                                    Bag Style</h2>
                                <span class="banner__items--content__link">View Discounts
                                        <svg class="banner__items--content__arrow--icon" xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                            <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z" transform="translate(-4 -4)" fill="currentColor"></path>
                                        </svg>
                                    </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner section -->

    <!-- Start product section -->
    <section class="product__section section--padding pt-0">
        <div class="container-fluid">
            <div class="section__heading text-center mb-35">
                <h2 class="section__heading--maintitle">New Products</h2>
            </div>
            <ul class="product__tab--one product__tab--primary__btn d-flex justify-content-center mb-50">
                <li class="product__tab--primary__btn__list" data-toggle="tab" data-target="#trending">Trending </li>
                <li class="product__tab--primary__btn__list" data-toggle="tab" data-target="#newarrival">New Arrival  </li>
            </ul>
            <div class="tab_content">
                <div id="trending" class="tab_pane active show">
                    <div class="product__section--inner">
                        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                            @foreach($productsTrenning as $value)
                            <div class="col mb-30">
                                <div class="product__items ">
                                    <div class="product__items--thumbnail">
                                        <a class="product__items--link" href="{{ route('product.detail',['id' => $value->id]) }}">
                                            <img class="product__items--img product__primary--img" src="{{ asset($value->images) }}" alt="product-img">
                                            <img class="product__items--img product__secondary--img" src="{{ asset($value->images) }}" alt="product-img">
                                        </a>
                                        <div class="product__badge">
                                            <span class="product__badge--items sale">Sale</span>
                                        </div>
                                    </div>
                                    <div class="product__items--content">
                                        <span class="product__items--content__subtitle">Jacket, Women</span>
                                        <h3 class="product__items--content__title h4"><a href="{{ route('product.detail',['id' => $value->id]) }}">{{ $value->name }}</a></h3>
                                        <div class="product__items--price">
                                            <span class="current__price">{{ number_format($value->price - ($value->price * ($value->discount_price / 100))) }}₫</span>
                                            <span class="price__divided"></span>
                                            <span class="old__price">{{ number_format($value->price) }}₫</span>
                                        </div>
                                        <ul class="rating product__rating d-flex">
                                            <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                            </li>
                                            <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                            </li>
                                            <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                            </li>
                                            <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                            </li>
                                            <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                            </li>

                                        </ul>
                                        <ul class="product__items--action d-flex">
                                            <li class="product__items--action__list" >
                                                <button class="product__items--action__btn add__to--cart" data-quantity="1" data-idProduct="{{  $value->id }}"
                                                data-srcImage="{{  $value->images }}" data-price="{{ $value->price }}" data-priceCurrent="{{ number_format($value->price - ($value->price * ($value->discount_price / 100))) }}₫"
                                                data-priceCurrentOld="{{ number_format($value->price) }}₫" data-cateId="{{  $value->category_id }}" data-name="{{ $value->name }}"
                                                >
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                        <g transform="translate(0 0)">
                                                            <g>
                                                                <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                                <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                                <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span class="add__to--cart__text"> + Add to cart</span>
                                                </button>
                                            </li>
                                            <li class="product__items--action__list">
                                                <a class="product__items--action__btn" href="wishlist.html">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
                                                    <span class="visually-hidden">Wishlist</span>
                                                </a>
                                            </li>
{{--                                            <li class="product__items--action__list">--}}
{{--                                                <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">--}}
{{--                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>--}}
{{--                                                    <span class="visually-hidden">Quick View</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="newarrival" class="tab_pane">
                    <div class="product__section--inner">
                        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                            @foreach($productsArrival as $value)
                                <div class="col mb-30">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="{{ route('product.detail',['id' => $value->id]) }}">
                                                <img class="product__items--img product__primary--img" src="{{ asset($value->images) }}" alt="product-img">
                                                <img class="product__items--img product__secondary--img" src="{{ asset($value->images) }}" alt="product-img">
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h3 class="product__items--content__title h4"><a href="{{ route('product.detail',['id' => $value->id]) }}">{{ $value->name }}</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">{{ number_format($value->price - ($value->price * ($value->discount_price / 100))) }}₫</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">{{ number_format($value->price) }}₫</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>

                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <button class="product__items--action__btn add__to--cart">
                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                                    <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                                    <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text"> + Add to cart</span>
                                                    </button>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <button class="product__items--action__btn">
                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path></svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </button>
                                                </li>
{{--                                                <li class="product__items--action__list">--}}
{{--                                                    <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">--}}
{{--                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>--}}
{{--                                                        <span class="visually-hidden">Quick View</span>--}}
{{--
  </a>--}}
{{--                                                </li>--}}

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End product section -->



    <!-- Start banner section -->
    <section class="banner__section section--padding pt-0">
        <div class="container-fluid">
            <div class="row row-cols-md-2 row-cols-1 mb--n28">
                <div class="col mb-28">
                    <div class="banner__items position__relative">
                        <a class="banner__items--thumbnail " href="shop.html"><img class="banner__items--thumbnail__img banner__img--max__height" src="{{ asset('client/assets/img/banner/banner5.png') }}" alt="banner-img">
                            <div class="banner__items--content">
                                <span class="banner__items--content__subtitle d-none d-lg-block">Pick Your Items</span>
                                <h2 class="banner__items--content__title h3">Up to 25% Off Order Now</h2>
                                <span class="banner__items--content__link"><u>Shop now</u></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col mb-28">
                    <div class="banner__items position__relative">
                        <a class="banner__items--thumbnail " href="shop.html"><img class="banner__items--thumbnail__img banner__img--max__height" src="{{ asset('client/assets/img/banner/banner6.png') }}" alt="banner-img">
                            <div class="banner__items--content">
                                <span class="banner__items--content__subtitle d-none d-lg-block">Special offer</span>
                                <h2 class="banner__items--content__title h3">Up to 35% Off Order Now</h2>
                                <span class="banner__items--content__link"><u>Discover Now</u> </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner section -->

    <!-- Start testimonial section -->
    <section class="testimonial__section section--padding pt-0">
        <div class="container-fluid">
            <div class="section__heading text-center mb-40">
                <h2 class="section__heading--maintitle">Our Clients Say</h2>
            </div>
            <div class="testimonial__section--inner testimonial__swiper--activation swiper">
                <div class="swiper-wrapper">
                    @foreach($commentsClient as $value)
                    <div class="swiper-slide">
                        <div class="testimonial__items text-center">
                            <div class="testimonial__items--thumbnail">
                                <img class="testimonial__items--thumbnail__img border-radius-50" width="80" src="{{ asset($value->products->first()->images) }}" alt="testimonial-img">
                            </div>
                            <div class="testimonial__items--content">
                                <h3 class="testimonial__items--title">{{ $value->products->first()->name }}</h3>
                                <span class="testimonial__items--subtitle">{{ $value->products->first()->categories->first()->name }}</span>
                                <p class="testimonial__items--desc">{{ $value->content }} </p>
                                <ul class="rating testimonial__rating d-flex justify-content-center">
                                    <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                    </li>
                                    <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                    </li>
                                    <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                    </li>
                                    <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                    </li>
                                    <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="testimonial__pagination swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End testimonial section -->




@endsection
@push('scripts')
    <script>

        const btnCarts = document.querySelectorAll('.product__items--action__btn.add__to--cart');

        for (const cartBtn of btnCarts) {
            cartBtn.addEventListener('click',() => {
                const objProduct = {
                    idProduct : cartBtn.getAttribute('data-idProduct'),
                    nameProductDetail : cartBtn.getAttribute('data-name') ,
                    categoriesId : +cartBtn.getAttribute('data-cateId') ,
                    price :+cartBtn.getAttribute('data-price') ,
                    imageDetail : cartBtn.getAttribute('data-srcImage') ,
                    viewPriceDetail : cartBtn.getAttribute('data-priceCurrent'),
                    viewPriceOld : cartBtn.getAttribute('data-priceCurrentOld')  ,
                    numberOf : +cartBtn.getAttribute('data-quantity'),
                }

                var isProductExist = false;

                for (var i = 0; i < cartsProducts[1].length; i++) {
                    if (cartsProducts[1][i].idProduct === objProduct.idProduct) {
                        isProductExist = true;
                        // Kiểm tra giá trị của numberOf
                        if (objProduct.numberOf === 1) {
                            // Nếu numberOf là 1, chỉ tăng giá trị lên 1
                            cartsProducts[1][i].numberOf += 1;
                        } else {
                            // Nếu numberOf lớn hơn 1, cộng giá trị vào numberOf hiện tại
                            cartsProducts[1][i].numberOf += objProduct.numberOf;
                        }
                        break;
                    }
                }

                if (!isProductExist) {
                    cartsProducts[1].push(objProduct);
                }
                localStorage.setItem("carts", JSON.stringify(cartsProducts));
                // const product = `
                //   <div class="minicart__product--items d-flex">
                //             <div class="minicart__thumb">
                //                 <a href="product-details.html"><img src="../${objProduct.imageDetail}" alt="prduct-img"></a>
                //             </div>
                //             <div class="minicart__text">
                //                 <h3 class="minicart__subtitle h4"><a href="product-details.html">${objProduct.nameProductDetail}</a></h3>
                //                 <div class="minicart__price">
                //                     <span class="current__price">${viewPriceDetail}</span>
                //                     <span class="old__price">${viewPriceOld}</span>
                //                 </div>
                //                 <div class="minicart__text--footer d-flex align-items-center">
                //                     <div class="quantity__box">
                //                         <button type="button" class="quantity__value decrease" onclick="decrease()">-</button>
                //                         <label>
                //                             <input type="number" class="quantity__number" value="${objProduct.numberOf}" id="valueTotal" />
                //                             <input type="hidden" id="srcImage" value="">
                //                             <input type="hidden" id="priceCurrent" value="">
                //                             <input type="hidden" id="cateID" value="">
                //                         </label>
                //                         <button type="button" class="quantity__value increase" onclick="increase()">+</button>
                //                     </div>
                //                     <button class="minicart__product--remove">Remove</button>
                //                 </div>
                //             </div>
                //         </div>
                // `
                // cart.innerHTML += product;

                renderProducts(cartsProducts[1]);
                toastSucces('Thêm giỏ hàng thành công!')
            })
        }

    </script>
@endpush
@section('content-more')
    @include('client.components.Quickview.index')
    @include('client.components.Newsletter.index')
@endsection


