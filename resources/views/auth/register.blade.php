@extends('site.layout.master')

@section('title')
    ثبت نام
@endsection

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <ul>
                                <li><a href="index.html">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><span>ثبت نام</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="login-page section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="theme-card">
                        <h3 class="text-center">ایجاد حساب کاربری</h3>
                        <form class="theme-form" method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12 form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                           placeholder="{{ __('Name') }}" value="{{ old('name') }}" autocomplete="name" autofocus required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="family">{{ __('Family') }}</label>
                                    <input type="text" class="form-control @error('family') is-invalid @enderror"
                                           id="family" name="family" placeholder="{{ __('Family') }}"
                                           value="{{ old('family') }}" autocomplete="family">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-12 form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                           placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" autocomplete="email" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                           placeholder="{{ __('Enter Password') }}" autocomplete="new-password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                                           placeholder="{{ __('Confirm Password') }}" autocomplete="new-password" required>
                                </div>

                                <div class="col-md-12 form-group">
                                    <button type="submit" href="#" class="btn btn-normal">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-12 ">
                                    <p>از قبل حساب کاربری دارید؟ <a href="login.html" class="txt-default">وارد شوید</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
