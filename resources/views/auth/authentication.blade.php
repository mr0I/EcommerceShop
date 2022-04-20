@extends('site.layout.master')

@section('title')
  دیجی مارکت | ورود - ثبت نام
@endsection

@section('content')

  {{-- Display Errors --}}
  @if (session('status'))
    <div class="my-3 alert alert-success w-75 m-auto text-center">
      {{ session('status') }}
    </div>
  @endif
  @if (session('warning'))
    <div class="my-3 alert alert-warning">
      {{ session('warning') }}
    </div>
  @endif
  @if (session('oauthError'))
    <div class="my-3 alert alert-warning">
      {{ session('oauthError') }}
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

  <section class="login-page section-big-py-space b-g-light">
    <div class="container-fluid mt-4">
      <div class="row justify-content-around">
        <div class="col-lg-5 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-header">{{ __('Login') }}</div>
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row g-3">
                  <div class="col-md-12 form-group">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <div class="col-12">
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                    </div>
                  </div>
                </div>

                <div class="row g-3">
                  <div class="col-md-12 form-group">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="col-12">
                      <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                    </div>
                  </div>
                </div>

                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                  <div class="col-12">
                    {!! app('captcha')->display() !!}
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-12">
                    <button type="submit" class="btn btn-normal pull-left">
                      {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                      </a>
                    @endif

                    {{-- Google Oauth --}}
                    <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-success btn-block">
                      <strong>Login With Google</strong>
                    </a>
                    {{-- Github Oauth --}}
                    <a href="{{ url('auth/github') }}" style="margin-top: 20px;" class="btn btn-lg btn-dark btn-block">
                      <strong>Login With Github</strong>
                    </a>

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-5 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-header">{{ __('Register') }}</div>
            <div class="card-body">
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
                    <small class="text-muted">{{ __('Password must contain at least 6 letters and contain letters and numbers.') }}</small>
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

                  <div class="col-12 form-group">
                    <button type="submit" href="#" class="btn btn-normal pull-left">
                      {{ __('Register') }}
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
