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
                    <div class="editable-field w-100">
                      <div style="display: flex;align-items: center">
                        <label class="px-2 m-0" for="old_pass">{{ __('Old Password') }} </label>
                        <input type="text" class="form-control" name="old_pass" id="old_pass"
                               autocomplete="old_pass" readonly>
                      </div>
                    </div>

                    <button class="btn btn-normal pull-left disabled" id="edit_user_frm_submit">
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