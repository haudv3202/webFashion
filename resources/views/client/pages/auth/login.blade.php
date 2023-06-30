@extends('client.layout.layout')
@section('title','Tài khoản')
@section('name-page','Account')
@section('content')

@include('client.components.breadcrumb.index');
<!-- Start login section  -->

<div class="login__section section--padding">
    <div class="container">
        <form action="{{ route('auth.login') }}" method="post">
            @csrf
            <div class="login__section--inner">
                <div class="row text-center">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="account__login">
                            <div class="account__login--header mb-25">
                                <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                <p class="account__login--header__desc">Login if you area a returning customer.</p>
                            </div>
                            <div class="account__login--inner">
                                <input class="account__login--input" name="email" placeholder="Email Address" value="{{ old('email') }}" type="text">
                                @error('email')
                                <div class="text-danger mb-4" >
                                    🔴 <span>{{ $message }}</span>
                                </div>
                                @enderror
                                <input class="account__login--input" name="password" placeholder="Password" type="password">
                                @error('password')
                                <div class="text-danger mb-4" >
                                    🔴 <span>{{ $message }}</span>
                                </div>
                                @enderror
                                <button class="account__login--btn primary__btn" type="submit">Login</button>
                                <div class="account__login--divide">
                                    <span class="account__login--divide__text">OR</span>
                                </div>
                                <div class="account__social d-flex justify-content-center mb-15">
                                    <a class="account__social--link facebook" target="_blank" href="https://www.facebook.com">Facebook</a>
                                    <a class="account__social--link google" target="_blank" href="https://www.google.com">Google</a>
                                    <a class="account__social--link twitter" target="_blank" href="https://twitter.com">Twitter</a>
                                </div>
                                <p class="account__login--signup__text">Don,t Have an Account? <button type="button" onclick="location.href='{{ route('auth.register') }}'">Sign up now</button></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End login section  -->

<!-- Start shipping section -->
<section class="shipping__section2 shipping__style3 section--padding pt-0">
    <div class="container">
        <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
            <div class="shipping__items2 d-flex align-items-center">
                <div class="shipping__items2--icon">
                    <img src="{{ asset('client/assets/img/other/shipping1.png') }}" alt="">
                </div>
                <div class="shipping__items2--content">
                    <h2 class="shipping__items2--content__title h3">Shipping</h2>
                    <p class="shipping__items2--content__desc">From handpicked sellers</p>
                </div>
            </div>
            <div class="shipping__items2 d-flex align-items-center">
                <div class="shipping__items2--icon">
                    <img src="{{ asset('client/assets/img/other/shipping2.png') }}" alt="">
                </div>
                <div class="shipping__items2--content">
                    <h2 class="shipping__items2--content__title h3">Payment</h2>
                    <p class="shipping__items2--content__desc">From handpicked sellers</p>
                </div>
            </div>
            <div class="shipping__items2 d-flex align-items-center">
                <div class="shipping__items2--icon">
                    <img src="{{ asset('client/assets/img/other/shipping3.png') }}" alt="">
                </div>
                <div class="shipping__items2--content">
                    <h2 class="shipping__items2--content__title h3">Return</h2>
                    <p class="shipping__items2--content__desc">From handpicked sellers</p>
                </div>
            </div>
            <div class="shipping__items2 d-flex align-items-center">
                <div class="shipping__items2--icon">
                    <img src="{{ asset('client/assets/img/other/shipping4.png') }}" alt="">
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
@push('scripts')
    <script>

    </script>
@endpush
