<!doctype html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ __('403, Forbidden') }}</title>
  <link rel="shortcut icon" href="{{url('images/favicon/favicon.ico')}}" type="image/x-icon">

  <link rel="stylesheet" type="text/css" href="{{ url('css/mix.css') }}">

  <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Roboto+Mono');
    .center-xy {
      position: absolute;
      top: 25%;
      left: 0;
      right: 0;
      /* transform: translate(-50%, -50%); */
    }
    html, body {
      font-family: 'iransans','Roboto Mono', monospace;
      font-size: 16px;
    }
    html {
      box-sizing: border-box;
      user-select: none;
    }
    body {
      background-color: #ffffff;
    }
    *, *:before, *:after {
      box-sizing: inherit;
    }
    .container {
      width: 100%;
    }
    .copy-container {
      text-align: center;
    }
    h1,h2,h3,h4,h5,h6{
      color: #212121;
    }
    a{
      color: #ff002e;
      font-weight: bolder;
    }
    p {
      color: #212121;
      font-size: 24px;
      margin: 0;
    }
    #cb-replay {
      fill: #666;
      width: 20px;
      margin: 15px;
      right: 0;
      bottom: 0;
      position: absolute;
      overflow: inherit;
      cursor: pointer;
    }
    #cb-replay:hover {
      fill: #888;
    }

  </style>
</head>
<body>
<div class="container">
  <div class="copy-container center-xy">
    <p><img src="{{ url('images/emojis/403.png') }}" alt="page not found" width="150"></p>
    <p>{{ __('Sorry you cant not view this page!!!') }}</p>
    <br>
    <a href="{{ route('home') }}">{{ __('Back to homepage') }}</a>
  </div>
</div>


<svg version="1.1" id="cb-replay" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 279.9 297.3" style="enable-background:new 0 0 279.9 297.3;" xml:space="preserve">
<g>
  <path d="M269.4,162.6c-2.7,66.5-55.6,120.1-121.8,123.9c-77,4.4-141.3-60-136.8-136.9C14.7,81.7,71,27.8,140,27.8
		c1.8,0,3.5,0,5.3,0.1c0.3,0,0.5,0.2,0.5,0.5v15c0,1.5,1.6,2.4,2.9,1.7l35.9-20.7c1.3-0.7,1.3-2.6,0-3.3L148.6,0.3
		c-1.3-0.7-2.9,0.2-2.9,1.7v15c0,0.3-0.2,0.5-0.5,0.5c-1.7-0.1-3.5-0.1-5.2-0.1C63.3,17.3,1,78.9,0,155.4
		C-1,233.8,63.4,298.3,141.9,297.3c74.6-1,135.1-60.2,138-134.3c0.1-3-2.3-5.4-5.3-5.4l0,0C271.8,157.6,269.5,159.8,269.4,162.6z"/>
</g>
</svg>

</body>
</html>