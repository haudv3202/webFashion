
@extends('client.layout.layout')
@section('title','Trang Chủ')
@section('name-page','Thông tin tài khoản')
@section('content')

    @include('client.components.breadcrumb.index');
    <!-- my account section start -->
    <section class="my__account--section section--padding">
        <div class="container">
            <p class="account__welcome--text">Hello, {{ \Illuminate\Support\Facades\Auth::user()->name }} welcome to your dashboard!</p>
            <div class="my__account--section__inner border-radius-10 d-flex">
                <div class="account__left--sidebar">
                    <h2 class="account__content--title h3 mb-20">My Profile</h2>
                    <ul class="account__menu">
                        <li class="account__menu--list"><a href="{{ route('auth.info') }}">Profile</a></li>
                        <li class="account__menu--list"><a href="my-account.html">Dashboard</a></li>
                        <li class="account__menu--list"><a href="my-account-2.html">Addresses</a></li>
                        <li class="account__menu--list"><a href="wishlist.html">Wishlist</a></li>
                        <li class="account__menu--list"><a href="{{ route('auth.logout') }}">Log Out</a></li>
                    </ul>
                </div>
                <div class="account__wrapper">
                    <div class="account__content">
                        <h2 class="account__content--title h3 mb-20">Thông tin người dùng</h2>
                        <div class="account__table--area">
                            <form action="{{ route('auth.update') }}">
                                @php
                                    $user = \Illuminate\Support\Facades\Auth::user();
                                @endphp
                                <div class="row">
                                    <div class="col-6">
                                        <label for="username">Tên tài khoản</label>
                                        <input class="account__login--input" id="username" name="name" placeholder="Name" value="{{ $user->name }}" type="text">
                                    </div>
                                    <div class="col-6">
                                        <label for="email">Email</label>
                                        <input class="account__login--input" id="email" name="email" placeholder="Email Address" value="{{ $user->email }}" type="text">
                                    </div>
                                    <div class="col-6">
                                        <label for="address">Địa Chỉ</label>
                                        <input class="account__login--input" id="address" name="address" placeholder="Address" value="{{ $user->address == null ? 'Chưa cập nhật' :  $user->address }}" type="text">
                                    </div>
                                    <div class="col-6">
                                        <label for="birthday">Ngày sinh</label>
                                        <input class="account__login--input" id="birthday" name="birthday" placeholder="birthday" value="{{ $user->birthday ? 'Chưa cập nhật' :  $user->birthday }}" type="date">
                                    </div>
                                    <div class="col-6">
                                        <label for="phone">Số điện thoại</label>
                                        <input class="account__login--input" id="phone" name="phone" placeholder="Phone" value="{{ $user->phoneNumber ? 'Chưa cập nhật' :  $user->phoneNumber }}" type="number">
                                    </div>
                                    <div class="col-6">
                                        <label for="phone">Giới tính</label>
                                        <select class="account__login--input" aria-label="Default select example">
                                            <option selected>Chọn giới tính</option>
                                            <option value="0">Nam</option>
                                            <option value="1">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="account__login--btn primary__btn" type="submit">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account section end -->

    <!-- Start shipping section -->
    <section class="shipping__section2 shipping__style3 section--padding pt-0">
        <div class="container">
            <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="assets/img/other/shipping1.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Shipping</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="assets/img/other/shipping2.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Payment</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="assets/img/other/shipping3.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Return</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="assets/img/other/shipping4.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Support</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shipping section -->
@endsection
