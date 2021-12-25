@extends('site.dashboard.layout.master')

@section('title')
  User Dashboard
@endsection


@section('content')
  <div class="dashboard-right">
    <div class="dashboard">
      <div class="page-title">
        <h2>داشبورد من</h2>
      </div>
      <div class="welcome-msg">
        <p>{{ __('Hi, ') . $user->name }}</p>
        <p>شما در این قسمت می توانید حساب کاربری خود در فروشگاه بیگ دیل را مشاهده کنید و تغییرات لازم را
          انجام دهید، پس از ویرایش اطلاعات خود آن را ذخیره کنید</p>
      </div>
      <div class="box-account box-info">

        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-title">
                <h3>{{ __('Personal Info') }}</h3><a href="javascript:void(0)">{{ __('Edit') }}</a>
              </div>
              <div class="box-content">
                <h6>{{ $user->name }}</h6>
                <h6>{{ $user->email }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection