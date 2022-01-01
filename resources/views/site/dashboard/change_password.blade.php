@extends('site.dashboard.layout.master')

@section('title')
  Change User Password
@endsection


@section('content')
  <div class="dashboard-right">
    <div class="dashboard">
      <div class="page-title">
        <h2>{{ __('Password Change') }}</h2>
        <hr>
      </div>
      <div class="box-account box-info">

        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-content">
                <div class="container">
                  <form action="" name="change-user-pass-frm">
                    <div class="my-3 w-100">
                      <label class="px-2 m-0" for="current_pass">{{ __('Current Password') }} </label>
                      <input type="password" class="form-control" name="current_pass" id="current_pass">
                    </div>
                    <div class="my-3 w-100">
                      <label class="px-2 m-0" for="new_pass">{{ __('New Password') }} </label>
                      <input type="password" class="form-control" name="new_pass" id="new_pass">
                      <small id="passwordHelpBlock" class="form-text text-muted">
                        {{ __('Your password must be at least 6 characters') }}
                      </small>
                    </div>
                    <div class="my-3 w-100">
                      <label class="px-2 m-0" for="new_pass_confirmation">{{ __('Confirm New Password') }} </label>
                      <input type="password" class="form-control" name="new_pass_confirmation" id="new_pass_confirmation">
                    </div>
                    <button class="btn btn-normal pull-left" id="change_user_pass_frm_submit">
                      {{ __('Change Password') }}
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