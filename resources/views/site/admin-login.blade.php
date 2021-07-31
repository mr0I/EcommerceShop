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
            <form class="theme-form">
              <div class="form-group">
                <label>ایمیل</label>
                <input type="text" class="form-control" placeholder="ایمیل" required="">
              </div>
              <div class="form-group">
                <label>رمز عبور</label>
                <input type="password" class="form-control" placeholder="رمز عبور خود را وارد کنید" required="">
              </div>
              <a href="javascript:void(0)" class="btn btn-normal">ورود</a>
              <a class="float-end txt-default mt-2" href="forget-pwd.html"> فراموشی رمز عبور؟</a>
            </form>
            <p class="mt-3">با استفاده از فرم بالا می توانید به حساب کاربری خود در فروشگاه وارد شوید و
              سفارشات خود را مدیریت کنید، اگر از قبل ثبت نام نکرده اید با استفاده از لینک زیر یک حساب
              کاربری جدید بسازید.</p>
            <a href="register.html" class="txt-default pt-3 d-block">ایجاد حساب جدید</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Section ends-->
@endsection
