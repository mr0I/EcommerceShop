<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Bigdeal admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Bigdeal admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="{{ url('images/favicon/favicon.png') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ url('images/favicon/favicon.png') }}" type="image/x-icon">
  <title>@yield('title')</title>

  <!-- Font Awesome-->
  <link rel="stylesheet" type="text/css" href="{{ url('css/font-awesome.css') }}">

  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{ url('css/flag-icon.css') }}">

  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{ url('css/icofont.css') }}">

  <!-- Prism css-->
  <link rel="stylesheet" type="text/css" href="{{ url('css/prism.css') }}">

  <!-- Chartist css -->
  <link rel="stylesheet" type="text/css" href="{{ url('css/chartist.css') }}">

  <!-- vector map css -->
  <link rel="stylesheet" type="text/css" href="{{ url('css/vector-map.css') }}">

  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.css') }}">

  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{ url('css/admin.css') }}">
</head>

<body class="rtl">

<div id="container">
  <!-- page-wrapper Start-->
  <div class="page-wrapper">

    <!-- Page Header Start-->
    <div class="page-main-header">
      <div class="main-header-left">
        <div class="logo-wrapper"><a href="index.html"><img class="blur-up lazyloaded" src="{{ url('images/layout-2/logo/logo.png') }}" alt=""></a></div>
      </div>
      <div class="main-header-right ">
        <div class="mobile-sidebar">
          <div class="media-body text-end switch-sm">
            <label class="switch">
              <input id="sidebar-toggle" type="checkbox" checked="checked"><span class="switch-state"></span>
            </label>
          </div>
        </div>
        <div class="nav-right col">
          <ul class="nav-menus">
            <li>
              <form class="form-inline search-form">
                <div class="form-group">
                  <input class="form-control-plaintext" type="search" placeholder="جستجو ..."><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                </div>
              </form>
            </li>
            <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
            <li class="onhover-dropdown"><i data-feather="bell"></i><span class="badge badge-pill badge-primary pull-right notification-badge">3</span><span class="dot"></span>
              <ul class="notification-dropdown custom-scrollbar onhover-show-div p-0">
                <li>
                  <div class="media">
                    <div class="notification-icons bg-success me-3"><i data-feather="thumbs-up"></i></div>
                    <div class="media-body">
                      <h6 class="font-success">یک نفر پست شما را پسندید</h6>
                      <p class="mb-0"> 1 ساعت پیش</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="notification-icons bg-info me-3"><i data-feather="message-circle"></i></div>
                    <div class="media-body">
                      <h6 class="font-info">3 دیدگاه جدید</h6>
                      <p class="mb-0"> 2 ساعت پیش</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="notification-icons bg-secondary me-3"><i data-feather="download"></i></div>
                    <div class="media-body">
                      <h6 class="font-secondary">دانلود تکمیل شد</h6>
                      <p class="mb-0"> 3 روز پیش</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="notification-icons bg-success bg-warning me-3">
                      <i data-feather="gift"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="font-secondary">سفارش جدید دریافت شد</h6>
                      <p class="mb-0"> 4 روز پیش</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="notification-icons bg-success me-3">
                      <i data-feather="airplay"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="font-secondary">اپلیکیشن آماده به روز رسانی</h6>
                      <p class="mb-0"> 6 روز پیش</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media">
                    <div class="notification-icons bg-info me-3">
                      <i data-feather="alert-circle"></i>
                    </div>
                    <div class="media-body">
                      <h6 class="font-secondary">هشدار سرور</h6>
                      <p class="mb-0"> 7 روز پیش</p>
                    </div>
                  </div>
                </li>

                <li class="bg-light txt-dark"><a href="javascript:void(0)" data-original-title="" title="">همه </a> اعلان ها</li>
              </ul>
            </li>
            <li class="onhover-dropdown">
              <div class="media align-items-center">
                <img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded"
                     src="http://www.gravatar.com/avatar/<?= md5($user->email); ?>?rating=PG&size=24&size=50&d=identicon" alt="header-user">
                <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
              </div>
              <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                <li><a href="javascript:void(0)">پروفایل<span class="pull-right"><i data-feather="user"></i></span></a></li>
                <li><a href="javascript:void(0)">صندوق دریافت<span class="pull-right"><i data-feather="mail"></i></span></a></li>
                <li><a href="javascript:void(0)">میز کار<span class="pull-right"><i data-feather="file-text"></i></span></a></li>
                <li><a href="javascript:void(0)">تنظیمات<span class="pull-right"><i data-feather="settings"></i></span></a></li>
              </ul>
            </li>
          </ul>
          <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
      </div>
    </div>
    <!-- Page Header Ends -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

      <!-- Page Sidebar Start-->
      <div class="page-sidebar">
        <div class="sidebar custom-scrollbar">
          <div class="sidebar-user text-center">
            <div>
              <img class="img-60 rounded-circle lazyloaded blur-up"
                   src="http://www.gravatar.com/avatar/<?= md5($user->email); ?>?rating=PG&size=24&size=50&d=identicon" alt="#">
            </div>
            <h6 class="mt-3 f-14">{{ $user->name }}</h6>
          </div>
          <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="{{ url('admin/dashboard') }}"><i data-feather="home"></i><span>داشبورد</span></a></li>
            <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="clipboard"></i><span>مقالات</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="sidebar-submenu">
                <li><a href="{{ url('admin/dashboard/articles') }}"><i class="fa fa-circle"></i>لیست مقالات</a></li>
                <li><a href="{{ url('admin/dashboard/add_article') }}"><i class="fa fa-circle"></i>ایجاد مقاله</a></li>
              </ul>
            </li>
            <li><a class="sidebar-header" href="default.htm"><i data-feather="user-plus"></i><span>کاربران</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="sidebar-submenu">
                <li><a href="user-list.html"><i class="fa fa-circle"></i>لیست کاربران</a></li>
                <li><a href="create-user.html"><i class="fa fa-circle"></i>ایجاد کاربر</a></li>
              </ul>
            </li>
            <li><a class="sidebar-header" href="reports.html"><i data-feather="bar-chart"></i><span>گزارشات</span></a></li>

            <li>
              <a class="sidebar-header" href="{{ url('/') }}" >
                <i data-feather="log-in"></i><span>{{ __('Back To Site') }}</span>
              </a>
            </li>
            <li>
              <a class="sidebar-header" href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                <i data-feather="log-out"></i><span>{{ __('Exit') }}</span>
              </a>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </div>
      </div>
      <!-- Page Sidebar Ends-->

      <!-- Right sidebar Start-->
      <div class="right-sidebar custom-scrollbar" id="right_side_bar">
        <div>
          <div class="container p-0">
            <div class="modal-header p-l-20 p-r-20">
              <div class="col-sm-8 p-0">
                <h6 class="modal-title font-weight-bold">لیست دوستان</h6>
              </div>
              <div class="col-sm-4 text-end p-0"><i class="me-2" data-feather="settings"></i></div>
            </div>
          </div>
          <div class="friend-list-search mt-0">
            <input type="text" placeholder="جستجوی دوست"><i class="fa fa-search"></i>
          </div>
          <div class="p-l-30 p-r-30">
            <div class="chat-box">
              <div class="people-list friend-list">
                <ul class="list">
                  <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user.png" alt="">
                    <div class="status-circle online"></div>
                    <div class="about">
                      <div class="name">مریم رسولی</div>
                      <div class="status"> آنلاین</div>
                    </div>
                  </li>
                  <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user1.jpg" alt="">
                    <div class="status-circle away"></div>
                    <div class="about">
                      <div class="name">نسترن افشار</div>
                      <div class="status"> 28 دقیقه پیش</div>
                    </div>
                  </li>
                  <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user2.jpg" alt="">
                    <div class="status-circle online"></div>
                    <div class="about">
                      <div class="name">پدرام شریفی</div>
                      <div class="status"> آنلاین</div>
                    </div>
                  </li>
                  <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user3.jpg" alt="">
                    <div class="status-circle online"></div>
                    <div class="about">
                      <div class="name">فرهاد رضوی</div>
                      <div class="status"> آنلاین</div>
                    </div>
                  </li>
                  <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/man.png" alt="">
                    <div class="status-circle offline"></div>
                    <div class="about">
                      <div class="name">امیر صادقی</div>
                      <div class="status"> 2 دقیقه پیش</div>
                    </div>
                  </li>
                  <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user5.jpg" alt="">
                    <div class="status-circle away"></div>
                    <div class="about">
                      <div class="name">پریسا توکلی</div>
                      <div class="status"> 2 ساعت پیش</div>
                    </div>
                  </li>
                  <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/designer.jpg" alt="">
                    <div class="status-circle online"></div>
                    <div class="about">
                      <div class="name">هادی لواسانی</div>
                      <div class="status"> آنلاین</div>
                    </div>
                  </li>
                  <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user3.jpg" alt="">
                    <div class="status-circle online"></div>
                    <div class="about">
                      <div class="name">فرهاد رضوی</div>
                      <div class="status"> آنلاین</div>
                    </div>
                  </li>
                  <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/man.png" alt="">
                    <div class="status-circle offline"></div>
                    <div class="about">
                      <div class="name">امیر صادقی</div>
                      <div class="status"> 2 دقیقه پیش</div>
                    </div>
                  </li>
                  <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user5.jpg" alt="">
                    <div class="status-circle away"></div>
                    <div class="about">
                      <div class="name">پریسا توکلی</div>
                      <div class="status"> 2 ساعت پیش</div>
                    </div>
                  </li>
                  <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user3.jpg" alt="">
                    <div class="status-circle online"></div>
                    <div class="about">
                      <div class="name">فرهاد رضوی</div>
                      <div class="status"> آنلاین</div>
                    </div>
                  </li>
                  <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/man.png" alt="">
                    <div class="status-circle offline"></div>
                    <div class="about">
                      <div class="name">امیر صادقی</div>
                      <div class="status"> 2 دقیقه پیش</div>
                    </div>
                  </li>
                  <li class="clearfix"><img class="rounded-circle user-image" src="../assets/images/dashboard/user5.jpg" alt="">
                    <div class="status-circle away"></div>
                    <div class="about">
                      <div class="name">پریسا توکلی</div>
                      <div class="status"> 2 ساعت پیش</div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Right sidebar Ends-->

    @yield('content')


    <!-- footer start-->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 footer-copyright">
              <p class="mb-0">Copyright © 2020، تمام حقوق محفوظ است</p>
            </div>
          </div>
        </div>
      </footer>
      <!-- footer end-->
    </div>

  </div>


</div>

<!-- latest jquery-->
<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ url('js/popper.min.js') }}"></script>
<script src="{{ url('js/bootstrap.js') }}"></script>

<!-- feather icon js-->
<script src="{{ url('js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ url('js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- Sidebar jquery-->
<script src="{{ url('js/sidebar-menu.js') }}"></script>

<!--chartist js-->
{{--<script src="{{ url('js/chart/chartist/chartist.js') }}"></script>--}}


<!-- lazyload js-->
<script src="{{ url('js/lazysizes.min.js') }}"></script>

<!--copycode js-->
<script src="{{ url('js/prism/prism.min.js') }}"></script>
<script src="{{ url('js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ url('js/custom-card/custom-card.js') }}"></script>

<!--counter js-->
<script src="{{ url('js/counter/jquery.waypoints.min.js') }}"></script>
<script src="{{ url('js/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ url('js/counter/counter-custom.js') }}"></script>

<!--Customizer admin-->
<script src="{{ url('js/admin-customizer.js') }}"></script>

<!--map js-->
<script src="{{ url('js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ url('js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>

<!--apex chart js-->
<script src="{{ url('js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ url('js/chart/apex-chart/stock-prices.js') }}"></script>

<!--chartjs js-->
<script src="{{ url('js/chart/flot-chart/excanvas.js') }}"></script>
<script src="{{ url('js/chart/flot-chart/jquery.flot.js') }}"></script>
<script src="{{ url('js/chart/flot-chart/jquery.flot.time.js') }}"></script>
<script src="{{ url('js/chart/flot-chart/jquery.flot.categories.js') }}"></script>
<script src="{{ url('js/chart/flot-chart/jquery.flot.stack.js') }}"></script>
<script src="{{ url('js/chart/flot-chart/jquery.flot.pie.js') }}"></script>
<!--dashboard custom js-->
{{--<script src="{{ url('js/dashboard/default.js') }}"></script>--}}

<!--right sidebar js-->
<script src="{{ url('js/chat-menu.js') }}"></script>

<!--height equal js-->
<script src="{{ url('js/equal-height.js') }}"></script>

<!-- lazyload js-->
<script src="{{ url('js/lazysizes.min.js') }}"></script>

<!--script admin-->
<script src="{{ url('js/admin-script.js') }}"></script>

</body>
</html>
