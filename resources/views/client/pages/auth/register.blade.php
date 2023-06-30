@extends('client.layout.layout')
@section('title','Tài khoản')
@section('name-page','Account')
@section('content')

    @include('client.components.breadcrumb.index');
    <!-- Start login section  -->
    <div class="login__section section--padding">
        <div class="container">
            <form  action="{{ route('auth.registerUser') }}"  method="post">
                @csrf
                <div class="login__section--inner">
                    <div class="row row-cols-md-2 row-cols-1">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="account__login register">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                    <p class="account__login--header__desc">Register here if you are a new customer</p>
                                </div>
                                    <div class="account__login--inner">
                                        <input class="account__login--input" name="username" placeholder="Username" value="{{ old('username') }}" type="text">
                                        @error('username')
                                        <div class="text-danger mb-4" >
                                            🔴 <span>{{ $message }}</span>
                                        </div>
                                        @enderror

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
                                        <input class="account__login--input" name="password_confirmation" placeholder="Confirm Password" type="password">
                                        @error('password_confirmation')
                                        <div class="text-danger mb-4" >
                                            🔴 <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                        <button class="account__login--btn primary__btn mb-10" type="submit">Submit & Register</button>
                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check2" type="checkbox">
                                            <label class="checkout__checkbox--label login__remember--label text-center" for="check2">
                                                Bạn đã có tài khoản <a class="text-success" href="{{ route('auth.login') }}">Đăng nhập</a> </label>
                                        </div>
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
