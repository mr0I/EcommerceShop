@extends('site.dashboard.layout.master')

@section('title')
  دیجی مارکت | ناحیه کاربری
@endsection


@section('content')
  <div class="dashboard-right">
    <div class="dashboard">
      <div class="page-title">
        <h2>داشبورد من</h2>
      </div>
      <div class="welcome-msg">
        <p>شما در این قسمت می توانید حساب کاربری خود را مشاهده کنید و تغییرات لازم را
          انجام دهید، پس از ویرایش اطلاعات خود آن را ذخیره کنید</p>
      </div>
      <div class="box-account box-info">

        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-title">
                <h3>{{ __('Personal Info') }}</h3>
              </div>
              <div class="box-content">
                <div class="container">
                  <form action="" name="edit-user-frm">
                    <div class="editable-field w-100">
                      <div style="display: flex;align-items: center">
                        <label class="px-2 m-0" for="name">{{ __('Name') }} </label>
                        <input type="text" class="form-control editable-input" name="name" id="name"
                               value="{{ $user->name }}" autocomplete="name" readonly>
                        <i class="fa fa-pencil-square-o edit-button"></i>
                      </div>
                    </div>
                    <div class="editable-field w-100">
                      <div style="display: flex;align-items: center">
                        <label class="px-2 m-0" for="name">{{ __('Family') }} </label>
                        <input type="text" class="form-control editable-input" name="family"
                               value="{{ $user->family }}" autocomplete="family" readonly>
                        <i class="fa fa-pencil-square-o edit-button"></i>
                      </div>
                    </div>
                    <div class="editable-field w-100">
                      <div style="display: flex;align-items: center">
                        <label class="px-2 m-0" for="name">{{ __('Email') }} </label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                               autocomplete="email" readonly style="cursor: not-allowed;">
                      </div>
                    </div>

                    <button class="btn btn-normal pull-left disabled" id="edit_user_frm_submit">
                      {{ __('Edit') }}
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection