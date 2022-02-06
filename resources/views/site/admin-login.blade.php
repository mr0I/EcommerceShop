@extends('site.layout.master')

@section('title')
  {{ __('Admin Login') }}
@endsection

@section('content')
  <!--section start-->
  <section class="login-page section-big-py-space b-g-light">
    <div class="custom-container">
      <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
          <div class="theme-card">
            <h3 class="text-center">صفحه ورود</h3>
            <form class="theme-form" action="{{ route('login') }}" method="post">
              @csrf
              <div class="form-group">
                <label>{{ __('E-Mail Address') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('E-Mail Address') }}" required
                        name="email" id="email" autocomplete="email" value="{{ old('email') }}">
              </div>
              <div class="form-group">
                <label>{{ __('Password') }}</label>
                <input type="password" class="form-control" placeholder="{{ __('Password') }}" name="password" id="password"
                       autocomplete="current-password" required>
              </div>
              <button type="submit" class="btn btn-normal"> {{ __('Login') }}</button>
              <a class="float-end txt-default mt-2" href="forget-pwd.html"> فراموشی رمز عبور؟</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Section ends-->
@endsection
