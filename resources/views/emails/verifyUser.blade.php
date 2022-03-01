<!DOCTYPE html>
<html>
<head>
  <title>{{ __('Verify Account') }}</title>
</head>

<body>
  <h2>{{$user['name']}}  {{ __('Welcome to dgmarketz') }}</h2>
  <p>{{ __('Your registered email-id is ') }} {{$user['email']}}</p>
  <p>{{ __('Please click on the below link to verify your email account') }}</p>
  <a href="{{url('user/verify', $user->verifyUser->token)}}">{{ __('Verify Email') }}</a>
</body>
</html>