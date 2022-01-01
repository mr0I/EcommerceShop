<!DOCTYPE html>
<html lang="fa">

<head>
  <title>@yield('title')</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="@yield('metadesc')">
  <meta name="keywords" content="@yield('keywords','فروشگاه محصولات دیجیتال,محصولات دیجیتال,اخبار فناوری')">
  <meta property="og:title" content="@yield('title')">
  <meta property="og:description" content="@yield('metadesc')">
  <meta property="og:image" content="https://isee.sisoog.com/assets/images/logo.png">
  <meta property="og:url" content="https://dgmarketz.com/">
  <meta name="msapplication-tap-highlight" content="no"/>
  <meta name="application-name" content="dgmarketz">
  <meta name="author" content="Outsider" />
  <meta name="robots" content="all, index, follow" />
  <meta name="googlebot" content="index, follow" />
  <meta name="geo.region" content="IR" />
  <meta name="dcterms.identifier" content="" />
  <meta name="dcterms.title" content="" />
  <meta name="dcterms.description" content="" />
  <meta name="dcterms.subject" content="" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="dgmarketz">
  {{--<link rel="apple-touch-icon" href="/assets/images/icons/logo-48x48.png" sizes="48x48">--}}
  {{--<link rel="apple-touch-icon" href="/assets/images/icons/logo-96x96.png" sizes="96x96">--}}
  {{--<link rel="apple-touch-icon" href="/assets/images/icons/logo-144x144.png" sizes="144x144">--}}
  {{--<link rel="apple-touch-icon" href="/assets/images/icons/logo-192x192.png" sizes="192x192">--}}
  {{--<link rel="apple-touch-icon" href="/assets/images/icons/logo-256x256.png" sizes="256x256">--}}
  {{--<link rel="apple-touch-icon" href="/assets/images/icons/logo-384x384.png" sizes="384x384">--}}
  {{--<link rel="apple-touch-icon" href="/assets/images/icons/logo-512x512.png" sizes="512x512">--}}
  <meta name="msapplication-TileColor" content="#fff">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="compare-url" content="{{ url('compare') }}">
  <meta name="wishlist-url" content="{{ url('wishlist') }}">
  <meta name="dash-url" content="{{ url('my_account') }}">
  <!-- Disable scale web page -->
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  {{--<link rel="icon" href="{{url('images/favicon/favicon.png')}}" type="image/x-icon">--}}
  <link rel="shortcut icon" href="{{url('images/favicon/favicon.png')}}" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="{{ url('css/font-awesome.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('css/mix.css') }}">
  <!-- Extra css -->
  <link rel="stylesheet" type="text/css" href="{{ url('libs/css/extra.css') }}">
  @yield('productSchema')
  {!! NoCaptcha::renderJs() !!}
  @toastr_css
</head>

<body id="MainBody" class="
@if(session()->get('theme') =='light') bg-light @else dark @endif
@if(\Illuminate\Support\Facades\App::getLocale() =='fa') rtl @else ltr @endif">

<!-- loader start -->
<div class="loader-wrapper">
  <div><img src="{{ url('images/main-loading.gif') }}" alt="loader"></div>
</div>
<!-- loader end -->

<!--header start-->
<header id="stickyheader">
  <div class="mobile-fix-option"></div>

  <div class="top-header">
    <div class="custom-container">
      <div class="row">
        <div class="col-xl-7 col-md-4 col-sm-6">
          <div class="top-header-right">
            <div class="language-block">
              <div class="language-dropdown">
                  <span class="language-dropdown-click">
                    <span class="txt">@if(App::getLocale() =='fa') فارسی @else انگلیسی @endif</span>
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                <ul class="language-dropdown-open">
                  <li><a class="changeLang" data-lang="en">انگلیسی</a></li>
                  <li><a class="changeLang" data-lang="fa">فارسی</a></li>
                </ul>
              </div>
              <div class="curroncy-dropdown">
                  <span class="curroncy-dropdown-click">
                    <span class="txt">@if(session()->get('theme') =='dark') تم تیره @else تم روشن @endif</span>
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                <ul class="curroncy-dropdown-open">
                  <li><a class="changeTheme" data-theme="light">تم روشن</a></li>
                  <li><a class="changeTheme" data-theme="dark">تم تاریک</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="layout-header2">
    <div class="containerr" style="margin: auto;max-width: 94%;">
      <div class="col-md-12">
        <div class="main-menu-block">
          <div class="header-left">
            <div class="sm-nav-block d-none">
                <span class="sm-nav-btn">
                  <i class="fa fa-bars"></i>
                </span>
              <ul class="nav-slide">
                <li>
                  <div class="nav-sm-back">
                    بازگشت <i class="fa fa-angle-left pe-2"></i>
                  </div>
                </li>
                <li><a href="category-page(left-sidebar).html">لباس گرم</a></li>
                <li><a href="category-page(left-sidebar).html">تلویزیون</a></li>
                <li><a href="category-page(left-sidebar).html">محصولات حیوانات خانگی</a></li>
                <li><a href="category-page(left-sidebar).html">ماشین، متورسیکلت</a></li>
                <li><a href="category-page(left-sidebar).html">محصولات صنعتی</a></li>
                <li><a href="category-page(left-sidebar).html">محصولات زیبایی و سلامت</a></li>
                <li><a href="category-page(left-sidebar).html">آجیل و خشکبار </a></li>
                <li><a href="category-page(left-sidebar).html">ورزشی</a></li>
                <li><a href="category-page(left-sidebar).html">کیف و کفش</a></li>
                <li><a href="category-page(left-sidebar).html">فیلم و موسیقی </a></li>
                <li><a href="category-page(left-sidebar).html">کنسول بازی</a></li>
                <li><a href="category-page(left-sidebar).html">اسباب بازی، محصولات کودک</a></li>
                <li class="mor-slide-open">
                  <ul>
                    <li><a href="category-page(left-sidebar).html">کیف و کفش</a></li>
                    <li><a href="category-page(left-sidebar).html">فیلم و موسیقی </a></li>
                    <li><a href="category-page(left-sidebar).html">کنسول بازی</a></li>
                    <li><a href="category-page(left-sidebar).html">اسباب بازی، محصولات کودک</a></li>
                  </ul>
                </li>
                <li>
                  <a class="mor-slide-click">
                    دسته بندی های بیشتر
                    <i class="fa fa-angle-down pro-down"></i>
                    <i class="fa fa-angle-up pro-up"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="brand-logo">
              <a href="{{ url('/') }}">
                <img src="{{ url($logoPath) }}" class="img-fluid  " alt="logo">
              </a>
            </div>
          </div>
          <div class="input-block">
            <div class="input-box">
              <form class="big-deal-form" onsubmit="searchProduct(event)">
                <div class="input-group">
                  <div class="input-group-text">
                    <span class="search" style="cursor: pointer" id="main_search_btn" onclick="searchProduct(event)"><i class="fa fa-search"></i></span>
                  </div>
                  @php
                    $searchQuery = (isset($_GET['q'])) ? $_GET['q'] : '';
                    $searchCatID = (isset($_GET['cat'])) ? $_GET['cat'] : '0';
                  @endphp
                  <input type="search" class="form-control" id="search_product_input" value="{{ $searchQuery }}"
                         placeholder="{{ __('Product Search') }}" >
                  <div class="input-group-text">
                    <select id="search_product_select">
                      <option value="0" @if($searchCatID==='0') selected @endif>{{ __('All Categories') }}</option>
                      @if(\Illuminate\Support\Facades\App::getLocale()!=='fa')
                        @foreach($categories_en as $key=>$value)
                          <option value="{{ $key }}" @if($searchCatID==$key) selected @endif>{{ $value }}</option>
                        @endforeach
                      @else
                        @foreach($categories_fa as $key=>$value)
                          <option value="{{ $key }}" @if($searchCatID==$key) selected @endif>{{ $value }}</option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="header-right">
            <div class="icon-block">
              <div class="content">
                <i class="fa fa-sun-o"></i>
                <input type="checkbox" id="tooglenight" class="cbx hidden"
                       @if(session()->get('theme')==='light') checked @endif />
                <label for="tooglenight" class="switch"></label>
                <i class="fa fa-moon-o"></i>
              </div>
              {{--<ul>--}}
              {{--<li class="mobile-user " onclick="openAccount()">--}}
              {{--<a href="javascript:void(0)">--}}
              {{--<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
              {{--x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"--}}
              {{--xml:space="preserve">--}}
              {{--<g>--}}
              {{--<g>--}}
              {{--<path--}}
              {{--d="M256,0c-74.439,0-135,60.561-135,135s60.561,135,135,135s135-60.561,135-135S330.439,0,256,0z M256,240--}}
              {{--c-57.897,0-105-47.103-105-105c0-57.897,47.103-105,105-105c57.897,0,105,47.103,105,105C361,192.897,313.897,240,256,240z" />--}}
              {{--</g>--}}
              {{--</g>--}}
              {{--<g>--}}
              {{--<g>--}}
              {{--<path--}}
              {{--d="M297.833,301h-83.667C144.964,301,76.669,332.951,31,401.458V512h450V401.458C435.397,333.05,367.121,301,297.833,301z--}}
              {{--M451.001,482H451H61v-71.363C96.031,360.683,152.952,331,214.167,331h83.667c61.215,0,118.135,29.683,153.167,79.637V482z" />--}}
              {{--</g>--}}
              {{--</g>--}}
              {{--</svg>--}}
              {{--</a>--}}
              {{--</li>--}}
              {{--<li class="mobile-setting" onclick="openSetting()">--}}
              {{--<a href="javascript:void(0)">--}}
              {{--<svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">--}}
              {{--<path--}}
              {{--d="m272.066 512h-32.133c-25.989 0-47.134-21.144-47.134-47.133v-10.871c-11.049-3.53-21.784-7.986-32.097-13.323l-7.704 7.704c-18.659 18.682-48.548 18.134-66.665-.007l-22.711-22.71c-18.149-18.129-18.671-48.008.006-66.665l7.698-7.698c-5.337-10.313-9.792-21.046-13.323-32.097h-10.87c-25.988 0-47.133-21.144-47.133-47.133v-32.134c0-25.989 21.145-47.133 47.134-47.133h10.87c3.531-11.05 7.986-21.784 13.323-32.097l-7.704-7.703c-18.666-18.646-18.151-48.528.006-66.665l22.713-22.712c18.159-18.184 48.041-18.638 66.664.006l7.697 7.697c10.313-5.336 21.048-9.792 32.097-13.323v-10.87c0-25.989 21.144-47.133 47.134-47.133h32.133c25.989 0 47.133 21.144 47.133 47.133v10.871c11.049 3.53 21.784 7.986 32.097 13.323l7.704-7.704c18.659-18.682 48.548-18.134 66.665.007l22.711 22.71c18.149 18.129 18.671 48.008-.006 66.665l-7.698 7.698c5.337 10.313 9.792 21.046 13.323 32.097h10.87c25.989 0 47.134 21.144 47.134 47.133v32.134c0 25.989-21.145 47.133-47.134 47.133h-10.87c-3.531 11.05-7.986 21.784-13.323 32.097l7.704 7.704c18.666 18.646 18.151 48.528-.006 66.665l-22.713 22.712c-18.159 18.184-48.041 18.638-66.664-.006l-7.697-7.697c-10.313 5.336-21.048 9.792-32.097 13.323v10.871c0 25.987-21.144 47.131-47.134 47.131zm-106.349-102.83c14.327 8.473 29.747 14.874 45.831 19.025 6.624 1.709 11.252 7.683 11.252 14.524v22.148c0 9.447 7.687 17.133 17.134 17.133h32.133c9.447 0 17.134-7.686 17.134-17.133v-22.148c0-6.841 4.628-12.815 11.252-14.524 16.084-4.151 31.504-10.552 45.831-19.025 5.895-3.486 13.4-2.538 18.243 2.305l15.688 15.689c6.764 6.772 17.626 6.615 24.224.007l22.727-22.726c6.582-6.574 6.802-17.438.006-24.225l-15.695-15.695c-4.842-4.842-5.79-12.348-2.305-18.242 8.473-14.326 14.873-29.746 19.024-45.831 1.71-6.624 7.684-11.251 14.524-11.251h22.147c9.447 0 17.134-7.686 17.134-17.133v-32.134c0-9.447-7.687-17.133-17.134-17.133h-22.147c-6.841 0-12.814-4.628-14.524-11.251-4.151-16.085-10.552-31.505-19.024-45.831-3.485-5.894-2.537-13.4 2.305-18.242l15.689-15.689c6.782-6.774 6.605-17.634.006-24.225l-22.725-22.725c-6.587-6.596-17.451-6.789-24.225-.006l-15.694 15.695c-4.842 4.843-12.35 5.791-18.243 2.305-14.327-8.473-29.747-14.874-45.831-19.025-6.624-1.709-11.252-7.683-11.252-14.524v-22.15c0-9.447-7.687-17.133-17.134-17.133h-32.133c-9.447 0-17.134 7.686-17.134 17.133v22.148c0 6.841-4.628 12.815-11.252 14.524-16.084 4.151-31.504 10.552-45.831 19.025-5.896 3.485-13.401 2.537-18.243-2.305l-15.688-15.689c-6.764-6.772-17.627-6.615-24.224-.007l-22.727 22.726c-6.582 6.574-6.802 17.437-.006 24.225l15.695 15.695c4.842 4.842 5.79 12.348 2.305 18.242-8.473 14.326-14.873 29.746-19.024 45.831-1.71 6.624-7.684 11.251-14.524 11.251h-22.148c-9.447.001-17.134 7.687-17.134 17.134v32.134c0 9.447 7.687 17.133 17.134 17.133h22.147c6.841 0 12.814 4.628 14.524 11.251 4.151 16.085 10.552 31.505 19.024 45.831 3.485 5.894 2.537 13.4-2.305 18.242l-15.689 15.689c-6.782 6.774-6.605 17.634-.006 24.225l22.725 22.725c6.587 6.596 17.451 6.789 24.225.006l15.694-15.695c3.568-3.567 10.991-6.594 18.244-2.304z" />--}}
              {{--<path--}}
              {{--d="m256 367.4c-61.427 0-111.4-49.974-111.4-111.4s49.973-111.4 111.4-111.4 111.4 49.974 111.4 111.4-49.973 111.4-111.4 111.4zm0-192.8c-44.885 0-81.4 36.516-81.4 81.4s36.516 81.4 81.4 81.4 81.4-36.516 81.4-81.4-36.515-81.4-81.4-81.4z" />--}}
              {{--</svg>--}}
              {{--</a>--}}
              {{--</li>--}}
              {{--<li class="mobile-wishlist item-count">--}}
              {{--<a href="javascript:void(0)">--}}
              {{--<svg viewBox="0 -28 512.001 512" xmlns="http://www.w3.org/2000/svg">--}}
              {{--<path--}}
              {{--d="m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0" />--}}
              {{--</svg>--}}
              {{--<div class="item-count-contain">--}}
              {{--200--}}
              {{--</div>--}}
              {{--</a>--}}
              {{--</li>--}}
              {{--</ul>--}}
            </div>
            <div class="menu-nav">
                <span class="toggle-nav">
                  <i class="fa fa-bars "></i>
                </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="searchbar-input">
      <div class="input-group">
          <span class="input-group-text">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                 y="0px" width="28.931px" height="28.932px" viewBox="0 0 28.931 28.932"
                 style="enable-background:new 0 0 28.931 28.932;" xml:space="preserve">
              <g>
                <path
                        d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z" />
              </g>
            </svg>
          </span>
        <input type="text" class="form-control" placeholder="جستجوdfsdf محصول شما">
        <span class="input-group-text close-searchbar">
            <svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg">
              <path
                      d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0" />
            </svg>
          </span>
      </div>
    </div>
  </div>
  <div class="category-header-2">
    <div class="custom-container">
      <div class="row">
        <div class="col-12">
          <div class="navbar-menu">
            <div class="logo-block">
              <div class="brand-logo logo-sm-center">
                <a href="{{ url('/') }}">
                  <img src="{{ url($logoPath) }}" class="img-fluid  " alt="logo">
                </a>
              </div>
            </div>
            <div class="nav-block">

              <div class="nav-left">
                <nav class="navbar" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent">
                  <button class="navbar-toggler" type="button">
                    <span class="navbar-icon"><i class="fa fa-arrow-down"></i></span>
                  </button>
                  <h5 class="mb-0  text-white title-font">دسته بندی های فروشگاه</h5>
                </nav>
                <div class="collapse  nav-desk" id="navbarToggleExternalContent">
                  <ul class="nav-cat title-font">
                    <li> <a href="category-page(left-sidebar).html"><img
                                src="{{ url('images/layout-1/nav-img/01.png') }}" alt="category-product">لباس گرم</a></li>
                    <li> <a href="category-page(left-sidebar).html"><img src="{{ url('images/layout-1/nav-img/02.png') }}" alt="category-product">تلویزیون</a></li>
                    <ul class="mor-slide-open">
                      <li> <a href="category-page(left-sidebar).html"><img
                                  src="{{ url('images/layout-1/nav-img/08.png') }}" alt="category-product"> ورزشی</a></li>
                      <li> <a href="category-page(left-sidebar).html"><img
                                  src="{{ url('images/layout-1/nav-img/09.png') }}" alt="category-product"> کیف و کفش</a>
                      </li>
                    </ul>
                    </li>
                    <li>
                      <a class="mor-slide-click">دسته بندی بیشتر <i class="fa fa-angle-down pro-down"></i><i
                                class="fa fa-angle-up pro-up"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="menu-block">
              <nav id="main-nav">
                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                  <li>
                    <div class="mobile-back text-right">بازگشت<i class="fa fa-angle-left pe-2" aria-hidden="true"></i>
                    </div>
                  </li>
                  <!--HOME-->
                  <li>
                    <a class="dark-menu-item" href="{{ route('home') }}">{{ __('Home') }}</a>
                  </li>
                  <!--HOME-END-->

                  <!--pages meu start-->
                  <li>
                    <a class="dark-menu-item" href="#">{{ __('Products Category') }}</a>
                    <ul>
                      <li><a href="{{ url('category/mobile') }}">{{ __('Mobile') }}</a></li>
                      <li>
                        <a href="javascript:void(0)">مقایسه</a>
                        <ul>
                          <li><a href="compare.html">مقایسه</a></li>
                          <li><a href="compare-2.html">مقایسه-2</a></li>
                        </ul>
                      </li>
                      <li><a href="collection.html">کالکشن</a></li>
                      <li><a href="look-book.html">لوک بوک</a></li>
                      <li><a href="404.html">خطای 404</a></li>
                      <li><a href="coming-soon.html">به زودی </a></li>
                      <li><a href="faq.html">سوالات متداول</a></li>
                    </ul>
                  </li>

                  <li>
                    <a class="dark-menu-item" href="#">{{ __('Pages') }}</a>
                    <ul>
                      <li>
                        <a href="javascript:void(0)">فاکتور<span class="new-tag">جدید</span></a>
                        <ul>
                          <li><a href="../invoice-template/element-invoice.html">فاکتور یک</a></li>
                          <li><a href="../invoice-template/element-invoice2.html">فاکتور دو</a></li>
                          <li><a href="../invoice-template/element-invoice3.html">فاکتور سه</a></li>
                          <li><a href="../invoice-template/element-invoice4.html">فاکتور چهار</a></li>
                          <li><a href="../invoice-template/element-invoice5.html">فاکتور پنج</a></li>
                        </ul>
                      </li>
                      <li>
                        <a href="javascript:void(0)">حساب کاربری</a>
                        <ul>
                          <li><a href="wishlist.html">لیست علاقه مندی</a></li>
                          <li><a href="cart.html">سبد خرید</a></li>
                          <li><a href="dashboard.html">داشبورد</a></li>
                          <li><a href="login.html">ورود</a></li>
                          <li><a href="register.html">ثبت نام</a></li>
                          <li><a href="contact.html">تماس</a></li>
                          <li><a href="forget-pwd.html">فراموشی رمز عبور</a></li>
                          <li><a href="profile.html">پروفایل </a></li>
                          <li>
                            <a href="javascript:void(0)">پرداخت</a>
                            <ul>
                              <li><a href="checkout.html">پرداخت 1</a></li>
                              <li><a href="checkout2.html">پرداخت 2<span class="new-tag">جدید</span></a></li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li><a href="about-page.html">درباره ما</a></li>
                      <li><a href="search.html">جستجو</a></li>
                      <li><a href="typography.html">تایپوگرافی </a></li>
                      <li><a href="review.html">نظرات </a></li>
                      <li><a href="order-success.html">سفارش موفق</a></li>
                      <li><a href="order-history.html">تاریخچه سفارش</a></li>
                      <li><a href="order-tracking.html">پیگیری سفارش</a></li>
                      <li>
                        <a href="javascript:void(0)">مقایسه</a>
                        <ul>
                          <li><a href="compare.html">مقایسه</a></li>
                          <li><a href="compare-2.html">مقایسه-2</a></li>
                        </ul>
                      </li>
                      <li><a href="collection.html">کالکشن</a></li>
                      <li><a href="look-book.html">لوک بوک</a></li>
                      <li><a href="404.html">خطای 404</a></li>
                      <li><a href="coming-soon.html">به زودی </a></li>
                      <li><a href="faq.html">سوالات متداول</a></li>
                    </ul>
                  </li>
                  <!--product-end end-->

                  <!--blog-meu start-->
                  <li>
                    <a class="dark-menu-item" href="{{ url('/blog') }}">{{ __('Articles') }}</a>
                  </li>
                  <li>
                    <a class="dark-menu-item" href="{{ url('/compare') }}">{{ __('Compare Products') }}</a>
                  </li>
                  <!--blog-meu end-->
                </ul>
              </nav>
            </div>
            <div class="icon-block">
              <ul>
                <li class="mobile-search">
                  <a href="javascript:void(0)">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px" viewBox="0 0 612.01 612.01" style="enable-background:new 0 0 612.01 612.01;"
                         xml:space="preserve">
                        <g>
                          <g>
                            <g>
                              <path d="M606.209,578.714L448.198,423.228C489.576,378.272,515,318.817,515,253.393C514.98,113.439,399.704,0,257.493,0
                            C115.282,0,0.006,113.439,0.006,253.393s115.276,253.393,257.487,253.393c61.445,0,117.801-21.253,162.068-56.586
                            l158.624,156.099c7.729,7.614,20.277,7.614,28.006,0C613.938,598.686,613.938,586.328,606.209,578.714z M257.493,467.8
                            c-120.326,0-217.869-95.993-217.869-214.407S137.167,38.986,257.493,38.986c120.327,0,217.869,95.993,217.869,214.407
                            S377.82,467.8,257.493,467.8z" />
                            </g>
                          </g>
                        </g>
                      </svg>
                  </a>
                </li>
                <li class="mobile-user onhover-dropdown" onclick="openAccount()">
                  <a href="javascript:void(0)">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                         xml:space="preserve">
                        <g>
                          <g>
                            <path
                                    d="M256,0c-74.439,0-135,60.561-135,135s60.561,135,135,135s135-60.561,135-135S330.439,0,256,0z M256,240
                            c-57.897,0-105-47.103-105-105c0-57.897,47.103-105,105-105c57.897,0,105,47.103,105,105C361,192.897,313.897,240,256,240z" />
                          </g>
                        </g>
                      <g>
                        <g>
                          <path
                                  d="M297.833,301h-83.667C144.964,301,76.669,332.951,31,401.458V512h450V401.458C435.397,333.05,367.121,301,297.833,301z
                             M451.001,482H451H61v-71.363C96.031,360.683,152.952,331,214.167,331h83.667c61.215,0,118.135,29.683,153.167,79.637V482z" />
                        </g>
                      </g>
                      </svg>
                  </a>
                </li>
                <li class="mobile-setting" onclick="openSetting()">
                  <a href="javascript:void(0)">
                    <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                      <path
                              d="m272.066 512h-32.133c-25.989 0-47.134-21.144-47.134-47.133v-10.871c-11.049-3.53-21.784-7.986-32.097-13.323l-7.704 7.704c-18.659 18.682-48.548 18.134-66.665-.007l-22.711-22.71c-18.149-18.129-18.671-48.008.006-66.665l7.698-7.698c-5.337-10.313-9.792-21.046-13.323-32.097h-10.87c-25.988 0-47.133-21.144-47.133-47.133v-32.134c0-25.989 21.145-47.133 47.134-47.133h10.87c3.531-11.05 7.986-21.784 13.323-32.097l-7.704-7.703c-18.666-18.646-18.151-48.528.006-66.665l22.713-22.712c18.159-18.184 48.041-18.638 66.664.006l7.697 7.697c10.313-5.336 21.048-9.792 32.097-13.323v-10.87c0-25.989 21.144-47.133 47.134-47.133h32.133c25.989 0 47.133 21.144 47.133 47.133v10.871c11.049 3.53 21.784 7.986 32.097 13.323l7.704-7.704c18.659-18.682 48.548-18.134 66.665.007l22.711 22.71c18.149 18.129 18.671 48.008-.006 66.665l-7.698 7.698c5.337 10.313 9.792 21.046 13.323 32.097h10.87c25.989 0 47.134 21.144 47.134 47.133v32.134c0 25.989-21.145 47.133-47.134 47.133h-10.87c-3.531 11.05-7.986 21.784-13.323 32.097l7.704 7.704c18.666 18.646 18.151 48.528-.006 66.665l-22.713 22.712c-18.159 18.184-48.041 18.638-66.664-.006l-7.697-7.697c-10.313 5.336-21.048 9.792-32.097 13.323v10.871c0 25.987-21.144 47.131-47.134 47.131zm-106.349-102.83c14.327 8.473 29.747 14.874 45.831 19.025 6.624 1.709 11.252 7.683 11.252 14.524v22.148c0 9.447 7.687 17.133 17.134 17.133h32.133c9.447 0 17.134-7.686 17.134-17.133v-22.148c0-6.841 4.628-12.815 11.252-14.524 16.084-4.151 31.504-10.552 45.831-19.025 5.895-3.486 13.4-2.538 18.243 2.305l15.688 15.689c6.764 6.772 17.626 6.615 24.224.007l22.727-22.726c6.582-6.574 6.802-17.438.006-24.225l-15.695-15.695c-4.842-4.842-5.79-12.348-2.305-18.242 8.473-14.326 14.873-29.746 19.024-45.831 1.71-6.624 7.684-11.251 14.524-11.251h22.147c9.447 0 17.134-7.686 17.134-17.133v-32.134c0-9.447-7.687-17.133-17.134-17.133h-22.147c-6.841 0-12.814-4.628-14.524-11.251-4.151-16.085-10.552-31.505-19.024-45.831-3.485-5.894-2.537-13.4 2.305-18.242l15.689-15.689c6.782-6.774 6.605-17.634.006-24.225l-22.725-22.725c-6.587-6.596-17.451-6.789-24.225-.006l-15.694 15.695c-4.842 4.843-12.35 5.791-18.243 2.305-14.327-8.473-29.747-14.874-45.831-19.025-6.624-1.709-11.252-7.683-11.252-14.524v-22.15c0-9.447-7.687-17.133-17.134-17.133h-32.133c-9.447 0-17.134 7.686-17.134 17.133v22.148c0 6.841-4.628 12.815-11.252 14.524-16.084 4.151-31.504 10.552-45.831 19.025-5.896 3.485-13.401 2.537-18.243-2.305l-15.688-15.689c-6.764-6.772-17.627-6.615-24.224-.007l-22.727 22.726c-6.582 6.574-6.802 17.437-.006 24.225l15.695 15.695c4.842 4.842 5.79 12.348 2.305 18.242-8.473 14.326-14.873 29.746-19.024 45.831-1.71 6.624-7.684 11.251-14.524 11.251h-22.148c-9.447.001-17.134 7.687-17.134 17.134v32.134c0 9.447 7.687 17.133 17.134 17.133h22.147c6.841 0 12.814 4.628 14.524 11.251 4.151 16.085 10.552 31.505 19.024 45.831 3.485 5.894 2.537 13.4-2.305 18.242l-15.689 15.689c-6.782 6.774-6.605 17.634-.006 24.225l22.725 22.725c6.587 6.596 17.451 6.789 24.225.006l15.694-15.695c3.568-3.567 10.991-6.594 18.244-2.304z" />
                      <path
                              d="m256 367.4c-61.427 0-111.4-49.974-111.4-111.4s49.973-111.4 111.4-111.4 111.4 49.974 111.4 111.4-49.973 111.4-111.4 111.4zm0-192.8c-44.885 0-81.4 36.516-81.4 81.4s36.516 81.4 81.4 81.4 81.4-36.516 81.4-81.4-36.515-81.4-81.4-81.4z" />
                    </svg>
                  </a>
                </li>
                <li class="mobile-wishlist item-count">
                  <a href="{{ url('/wishlist') }}">
                    <svg viewBox="0 -28 512.001 512" xmlns="http://www.w3.org/2000/svg"><path d="m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0" /></svg>
                    <div class="item-count-contain">{{ $wish_list_len }}</div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="searchbar-input">
      <div class="input-group">
        <input type="text" class="form-control text-white px-5"
               id="mobile_search_product_input" placeholder="جستجو محصول شما" value="{{ $searchQuery }}">
        <span class="input-group-text close-searchbar">
            <svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg">
              <path
                      d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0" />
            </svg>
          </span>
      </div>
    </div>
  </div>
</header>
<!--header end-->


<div id="container">
  <section class="section-big-py-space b-g-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="account-sidebar"><a class="popup-btn">حساب کاربری من</a></div>
          <div class="dashboard-left">
            <div class="collection-mobile-back">
              <span class="filter-back">
                <i class="fa fa-angle-right" aria-hidden="true"></i> بازگشت
              </span>
            </div>
            <div class="block-content ">
              <p>{{ __('Hi, ') . $user->name }}</p>
              <hr>
              <ul>
                <li class="active"><a href="{{ url('/my_account') }}">اطلاعات حساب</a></li>
                <li><a href="{{ url('/my_account/wishlist') }}">لیست علاقه مندی من</a></li>
                <li><a href="{{ url('/my_account/changepassword') }}">تغییر رمز عبور</a></li>
                <li class="last">
                  <a href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                    {{ __('SignOut') }}
                  </a>
                </li>
              </ul>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none;">
                {{ csrf_field() }}
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          @yield('content')
        </div>
      </div>
    </div>
  </section>
</div>



<!-- My account bar start-->
<div id="myAccount" class="add_to_cart right account-bar">
  <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
  <div class="cart-inner">
    <div class="cart_top">
      <h3>حساب کاربری</h3>
      <div class="close-cart">
        <a href="javascript:void(0)" onclick="closeAccount()">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    @if(! \Illuminate\Support\Facades\Auth::check())
      <form class="theme-form" method="post" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
          <label for="email">{{ __('E-Mail Address') }}</label>
          <input type="text" class="form-control" id="email" name="email"
                 placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" autocomplete="email" required>
        </div>
        <div class="form-group">
          <label for="password" >{{ __('Password') }}</label>
          <input type="password" class="form-control" id="password" name="password"
                 placeholder="{{ __('Enter Password') }}" required autocomplete="current-password">
        </div>
        <div class="form-group">
          {!! app('captcha')->display() !!}
        </div>
        <div class="form-group row">
          <div class="col-12 offset-md-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
              </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-solid btn-md btn-block ">{{ __('Login') }}</button>
        </div>
        <div class="accout-fwd">
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="d-block">
              <h5>{{ __('Forgot Your Password?') }}</h5>
            </a>
          @endif
          <a href="{{ url('/register') }}" class="d-block">
            <h6>شما حساب کاربری ندارید؟<span>ثبت نام کنید</span></h6>
          </a>
        </div>
      </form>
    @else
      <p class="text-center my-3">{{ __('Welcome')  }} {{ Auth::user()->name }}</p>
      <p class="my-3 text-center"><a href="{{ url('/my_account') }}">{{ __('User Panel') }}</a></p>
      <p class="my-3 text-center">
        <a href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">{{ __('Exit') }}</a>
      </p>
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none;">
        {{ csrf_field() }}
      </form>
    @endif
  </div>
</div>
<!-- Add to account bar end-->

<!-- add to  setting bar  start-->
<div id="mySetting" class="add_to_cart right">
  <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
  <div class="cart-inner">
    <div class="cart_top">
      <h3>تنظیمات من</h3>
      <div class="close-cart">
        <a href="javascript:void(0)" onclick="closeSetting()">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="setting-block">
      <div class="form-group">
        <select class="changeLangSelect">
          <option value="0" disabled>انتخاب زبان...</option>
          <option value="fa" <?= (App::getLocale() == 'fa')? 'selected' : '' ?> >فارسی</option>
          <option value="en" <?= (App::getLocale() == 'en')? 'selected' : '' ?> >انگلیسی</option>
        </select>
      </div>
      <div class="form-group">
        <select class="changeThemeSelect">
          <option value="0" disabled>انتخاب تم...</option>
          <option value="dark" <?= (session()->get('theme') =='dark')? 'selected' : '' ?> >تاریک</option>
          <option value="light" <?= (session()->get('theme') =='light')? 'selected' : '' ?> >روشن</option>
        </select>
      </div>
    </div>
  </div>
</div>
<!-- add to  setting bar  end-->



<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('js/slick.js') }}"></script>
<script src="{{ url('js/popper.min.js') }}"></script>
<script src="{{ url('js/bootstrap-notify.min.js') }}"></script>
<script src="{{ url('js/menu.js') }}"></script>
<script src="{{ url('js/jquery.elevatezoom.js') }}"></script>
<script src="{{ url('js/feather.min.js') }}"></script>
<script src="{{ url('js/feather-icon.js') }}"></script>
<script src="{{ url('js/bootstrap.js') }}"></script>
<script src="{{ url('js/tippy-popper.min.js') }}"></script>
<script src="{{ url('js/tippy-bundle.iife.min.js') }}"></script>
<script src="{{ url('js/modal.js') }}"></script>
<script src="{{ url('js/script.js') }}"></script>
<script src="{{ url('libs/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ url('libs/js/jquery.mark.min.js') }}"></script>
<script type="application/ld+json" id="master_json_content">
    {
      "siteUrl" : "<?= Config::get('constants.siteUrl') ?>"
  }
</script>
<script src="{{ url('libs/js/script.js') }}"></script>
@toastr_js
@toastr_render
@yield('productsByCategory')
@yield('scripts')
<script> feather.replace()</script>


</body>
</html>