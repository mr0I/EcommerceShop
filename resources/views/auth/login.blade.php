@extends('site.layout.master')


@section('content')

  {{-- Display Errors --}}
  @if (session('status'))
    <div class="my-3 alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  @if (session('warning'))
    <div class="my-3 alert alert-warning">
      {{ session('warning') }}
    </div>
  @endif
  @if ($errors->has('email'))
    <div class="my-3 alert alert-danger">
      {{ $errors->first('email') }}
    </div>
  @endif
  @if ($errors->has('password'))
    <div class="my-3 alert alert-danger">
      {{ $errors->first('password') }}
    </div>
  @endif
  @if ($errors->has('g-recaptcha-response'))
    <div class="my-3 alert alert-danger">
      {{ $errors->first('g-recaptcha-response') }}
    </div>
  @endif
  {{-- Display Errors --}}


  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Login') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                </div>
              </div>

              <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">{{ __('Captcha') }}</label>
                <div class="col-md-6">
                  {!! app('captcha')->display() !!}
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                  </button>

                  @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
