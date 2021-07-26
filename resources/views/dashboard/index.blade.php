@extends('dashboard.layout.master')

@section('title')
  Admin Dash
@endsection


@section('content')
  <!-- page-wrapper Start-->
  <div class="page-wrapper">

    <!-- Page Header Start-->
    <div class="page-main-header">
      <div class="main-header-left">
        <div class="logo-wrapper"><a href="index.html"><img class="blur-up lazyloaded" src="../assets/images/layout-2/logo/logo.png" alt=""></a></div>
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
            <li class="onhover-dropdown"><a class="txt-dark" href="javascript:void(0)">
                <h6>فارسی</h6></a>
              <ul class="language-dropdown onhover-show-div p-20">
                <li><a href="javascript:void(0)" data-lng="pt"><i class="flag-icon flag-icon-ir"></i> فارسی</a></li>
                <li><a href="javascript:void(0)" data-lng="es"><i class="flag-icon flag-icon-gb"></i> انگلیسی</a></li>
                <li><a href="javascript:void(0)" data-lng="en"><i class="flag-icon flag-icon-tr"></i> ترکی استانبولی</a></li>
                <li><a href="javascript:void(0)" data-lng="fr"><i class="flag-icon flag-icon-sa"></i> عربی</a></li>
              </ul>
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
            <li><a href="javascript:void(0)"><i class="right_side_toggle" data-feather="message-square"></i><span class="dot"></span></a></li>
            <li class="onhover-dropdown">
              <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/man.png" alt="header-user">
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
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src="../assets/images/dashboard/man.png" alt="#">
            </div>
            <h6 class="mt-3 f-14">رضا افشار</h6>
            <p>طراح وب</p>
          </div>
          <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="index.html"><i data-feather="home"></i><span>داشبورد</span></a></li>
            <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="box"></i> <span>محصولات</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="sidebar-submenu">
                <li>
                  <a href="javascript:void(0)"><i class="fa fa-circle"></i>
                    <span>فیزیکی</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="sidebar-submenu">
                    <li><a href="category.html"><i class="fa fa-circle"></i>دسته بندی</a></li>
                    <li><a href="category-sub.html"><i class="fa fa-circle"></i>زیر دسته</a></li>
                    <li><a href="product-list.html"><i class="fa fa-circle"></i>لیست محصولات</a></li>
                    <li><a href="product-detail.html"><i class="fa fa-circle"></i>جزئیات محصول</a></li>
                    <li><a href="add-product.html"><i class="fa fa-circle"></i>افزودن محصول</a></li>
                  </ul>
                </li>
                <li>
                  <a href="javascript:void(0)"><i class="fa fa-circle"></i>
                    <span>دیجیتال</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="sidebar-submenu">
                    <li><a href="category-digital.html"><i class="fa fa-circle"></i>دسته بندی</a></li>
                    <li><a href="category-digitalsub.html"><i class="fa fa-circle"></i>زیر دسته</a></li>
                    <li><a href="product-listdigital.html"><i class="fa fa-circle"></i>لیست محصولات</a></li>
                    <li><a href="add-digital-product.html"><i class="fa fa-circle"></i>افزودن محصول</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a class="sidebar-header" href="default.htm"><i data-feather="dollar-sign"></i><span>فروش</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="sidebar-submenu">
                <li><a href="order.html"><i class="fa fa-circle"></i>سفارشات</a></li>
                <li><a href="transactions.html"><i class="fa fa-circle"></i>معاملات</a></li>
              </ul>
            </li>
            <li><a class="sidebar-header" href="default.htm"><i data-feather="tag"></i><span>کد تخفیف</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="sidebar-submenu">
                <li><a href="coupon-list.html"><i class="fa fa-circle"></i>لیست کد های تخفیف</a></li>
                <li><a href="coupon-create.html"><i class="fa fa-circle"></i>ایجاد کد تخفیف </a></li>
              </ul>
            </li>
            <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="clipboard"></i><span>صفحات</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="sidebar-submenu">
                <li><a href="pages-list.html"><i class="fa fa-circle"></i>لیست صفحات</a></li>
                <li><a href="page-create.html"><i class="fa fa-circle"></i>ایجاد صفحه</a></li>
              </ul>
            </li>
            <li><a class="sidebar-header" href="media.html"><i data-feather="camera"></i><span>رسانه</span></a></li>
            <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="align-left"></i><span>منو</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="sidebar-submenu">
                <li><a href="menu-list.html"><i class="fa fa-circle"></i>لیست منو ها</a></li>
                <li><a href="create-menu.html"><i class="fa fa-circle"></i>ایجاد منو</a></li>
              </ul>
            </li>
            <li><a class="sidebar-header" href="default.htm"><i data-feather="user-plus"></i><span>کاربران</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="sidebar-submenu">
                <li><a href="user-list.html"><i class="fa fa-circle"></i>لیست کاربران</a></li>
                <li><a href="create-user.html"><i class="fa fa-circle"></i>ایجاد کاربر</a></li>
              </ul>
            </li>
            <li><a class="sidebar-header" href="default.htm"><i data-feather="users"></i><span>فروشندگان</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="sidebar-submenu">
                <li><a href="list-vendor.html"><i class="fa fa-circle"></i>لیست فروشندگان</a></li>
                <li><a href="create-vendors.html"><i class="fa fa-circle"></i>ایجاد فروشنده</a></li>
              </ul>
            </li>
            <li><a class="sidebar-header" href="default.htm"><i data-feather="chrome"></i><span>محلی</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="sidebar-submenu">
                <li><a href="translations.html"><i class="fa fa-circle"></i>ترجمه</a></li>
                <li><a href="currency-rates.html"><i class="fa fa-circle"></i>واحد پول</a></li>
                <li><a href="taxes.html"><i class="fa fa-circle"></i>مالیات</a></li>
              </ul>
            </li>
            <li><a class="sidebar-header" href="reports.html"><i data-feather="bar-chart"></i><span>گزارشات</span></a></li>
            <li><a class="sidebar-header" href="default.htm"><i data-feather="settings" ></i><span>تنظیمات</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="sidebar-submenu">
                <li><a href="profile.html"><i class="fa fa-circle"></i>پروفایل</a></li>
              </ul>
            </li>
            <li><a class="sidebar-header" href="invoice.html"><i data-feather="archive"></i><span>فاکتور</span></a>
            </li>
            <li><a class="sidebar-header" href="login.html"><i data-feather="log-in"></i><span>ورود</span></a>
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

      <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
          <div class="page-header">
            <div class="row">
              <div class="col-lg-6">
                <div class="page-header-left">
                  <h3>داشبورد
                    <small>پنل مدیریتی بیگ دیل</small>
                  </h3>
                </div>
              </div>
              <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item active">داشبورد</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-3 col-md-6 xl-50">
              <div class="card o-hidden  widget-cards">
                <div class="bg-secondary card-body">
                  <div class="media static-top-widget">
                    <div class="media-body"><span class="m-0">محصولات</span>
                      <h3 class="mb-0"><span class="counter">9856</span><small> این ماه</small>
                      </h3>
                    </div>
                    <div class="icons-widgets">
                      <i data-feather="box"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50">
              <div class="card o-hidden widget-cards">
                <div class="bg-primary card-body">
                  <div class="media static-top-widget">
                    <div class="media-body"><span class="m-0">پیام ها</span>
                      <h3 class="mb-0"><span class="counter">893</span><small> این ماه</small>
                      </h3>
                    </div>
                    <div class="icons-widgets">
                      <i data-feather="message-square"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50">
              <div class="card o-hidden widget-cards">
                <div class="bg-warning card-body">
                  <div class="media static-top-widget">
                    <div class="media-body"><span class="m-0">درآمد</span>
                      <h3 class="mb-0"><span class="counter">2,634,659</span><small> تومان / این
                          ماه</small>
                      </h3>
                    </div>
                    <div class="icons-widgets">
                      <i data-feather="navigation"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50">
              <div class="card o-hidden widget-cards">
                <div class="bg-success card-body">
                  <div class="media static-top-widget">
                    <div class="media-body"><span class="m-0">فروشنده جدید</span>
                      <h3 class="mb-0"><span class="counter">631</span><small> این ماه</small>
                      </h3>
                    </div>
                    <div class="icons-widgets">
                      <i data-feather="users"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 xl-100">
              <div class="card height-equal">
                <div class="card-header">
                  <h5>فعالیت سفارش</h5>
                  <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                      <li><i class="icofont icofont-simple-right"></i></li>
                      <li><i class="view-html fa fa-code"></i></li>
                      <li><i class="icofont icofont-maximize full-card"></i></li>
                      <li><i class="icofont icofont-minus minimize-card"></i></li>
                      <li><i class="icofont icofont-refresh reload-card"></i></li>
                      <li><i class="icofont icofont-error close-card"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="order-timeline">
                    <div class="media">
                      <div class="timeline-line"></div>
                      <div class="timeline-icon-primary">
                        <i data-feather="map-pin"></i>
                      </div>
                      <div class="media-body">
                        <span class="font-primary">تحویل داده شده</span>
                        <p>56 دقیقه پیش</p>
                      </div>
                      <span class="pull-right text-muted">امروز</span>
                    </div>
                    <div class="media">
                      <div class="timeline-icon-secondary">
                        <i data-feather="shopping-cart"></i>
                      </div>
                      <div class="media-body">
                        <span class="font-secondary">در حال ارسال</span>
                        <p>18 ساعت پیش</p>
                      </div>
                      <span class="pull-right text-muted">دیروز</span>
                    </div>
                    <div class="media">
                      <div class="timeline-icon-warning">
                        <i data-feather="box"></i>
                      </div>
                      <div class="media-body">
                        <span class="font-warning">آماده ارسال</span>
                        <p>3 روز پیش</p>
                      </div>
                      <span class="pull-right text-muted">12 مهر</span>
                    </div>
                    <div class="media">
                      <div class="timeline-icon-success">
                        <i data-feather="user"></i>
                      </div>
                      <div class="media-body">
                        <span class="font-success">ثبت سفارش</span>
                        <p>8 روز پیش</p>
                      </div>
                      <span class="pull-right text-muted">05 مهر</span>
                    </div>
                  </div>
                  <div class="code-box-copy">
                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head4" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                    <pre class=" language-html"><code class=" language-html" id="example-head4">
&lt;div class="order-timeline"&gt;
   &lt;div class="media"&gt;
      &lt;div class="timeline-line"&gt;&lt;/div&gt;
      &lt;div class="timeline-icon-primary"&gt;
        &lt;i data-feather="map-pin"&gt;&lt;/i&gt;
      &lt;/div&gt;
      &lt;div class="media-body"&gt;
         &lt;span class="font-primary"&gt;Delivered&lt;/span&gt;
         &lt;p&gt;56 دقیقه پیش&lt;/p&gt;
      &lt;/div&gt;
      &lt;span class="pull-right text-muted"&gt;Today&lt;/span&gt;
   &lt;/div&gt;
   &lt;div class="media"&gt;
      &lt;div class="timeline-icon-secondary"&gt;
         &lt;i data-feather="shopping-cart"&gt;&lt;/i&gt;
      &lt;/div&gt;
      &lt;div class="media-body"&gt;
         &lt;span class="font-secondary"&gt;In Transit&lt;/span&gt;
         &lt;p&gt;18 ساعت پیش&lt;/p&gt;
      &lt;/div&gt;
      &lt;span class="pull-right text-muted"&gt;Yesterday&lt;/span&gt;
   &lt;/div&gt;
   &lt;div class="media"&gt;
      &lt;div class="timeline-icon-warning"&gt;
         &lt;i data-feather="box"&gt;&lt;/i&gt;
      &lt;/div&gt;
      &lt;div class="media-body"&gt;
         &lt;span class="font-warning"&gt;Dispatched&lt;/span&gt;
         &lt;p&gt;3 روز پیش&lt;/p&gt;
      &lt;/div&gt;
      &lt;span class="pull-right text-muted"&gt;12 Sep&lt;/span&gt;
   &lt;/div&gt;
   &lt;div class="media"&gt;
      &lt;div class="timeline-icon-success"&gt;
         &lt;i data-feather="user"&gt;&lt;/i&gt;
      &lt;/div&gt;
      &lt;div class="media-body"&gt;
         &lt;span class="font-success"&gt;Order Received&lt;/span&gt;
         &lt;p&gt;8 روز پیش&lt;/p&gt;
      &lt;/div&gt;
      &lt;span class="pull-right text-muted"&gt;05 Sep&lt;/span&gt;
   &lt;/div&gt;
&lt;/div&gt;
                                    </code></pre>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-8 xl-100">
              <div class="card btn-months">
                <div class="card-header">
                  <h5>درآمد این ماه</h5>
                  <div class="dashboard-btn-groups">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button class="btn btn-outline-light btn-js" type="button">روز</button>
                      <button class="btn btn-outline-light btn-js" type="button">هفته</button>
                      <button class="btn btn-outline-light btn-js active" type="button">ماه</button>
                    </div>
                  </div>
                  <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                      <li><i class="icofont icofont-simple-right"></i></li>
                      <li><i class="view-html fa fa-code"></i></li>
                      <li><i class="icofont icofont-maximize full-card"></i></li>
                      <li><i class="icofont icofont-minus minimize-card"></i></li>
                      <li><i class="icofont icofont-refresh reload-card"></i></li>
                      <li><i class="icofont icofont-error close-card"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="revenue-chart"></div>
                  <div class="code-box-copy">
                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head8" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                    <pre class=" language-html"><code class=" language-html" id="example-head8">
&lt;div class="revenue-chart"&gt;&lt;/div&gt;
                                    </code></pre>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 xl-100">
              <div class="card">
                <div class="card-header">
                  <h5>ارزش محصول</h5>
                  <div class="chart-value-box pull-right">
                    <div class="value-square-box-success"></div><span class="f-12 f-w-600">فیزیکی</span>
                    <div class="value-square-box-secondary me-3"></div><span class="f-12 f-w-600">دیجیتال</span>
                  </div>
                  <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                      <li><i class="icofont icofont-simple-right"></i></li>
                      <li><i class="view-html fa fa-code"></i></li>
                      <li><i class="icofont icofont-maximize full-card"></i></li>
                      <li><i class="icofont icofont-minus minimize-card"></i></li>
                      <li><i class="icofont icofont-refresh reload-card"></i></li>
                      <li><i class="icofont icofont-error close-card"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="market-chart"></div>
                  <div class="code-box-copy">
                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                    <pre><code class="language-html" id="example-head">&lt;!-- Cod Box Copy begin --&gt;
&lt;div class="market-chart"&gt;&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 xl-100">
              <div class="card">
                <div class="card-header">
                  <h5>آخرین سفارشات</h5>
                  <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                      <li><i class="icofont icofont-simple-right"></i></li>
                      <li><i class="view-html fa fa-code"></i></li>
                      <li><i class="icofont icofont-maximize full-card"></i></li>
                      <li><i class="icofont icofont-minus minimize-card"></i></li>
                      <li><i class="icofont icofont-refresh reload-card"></i></li>
                      <li><i class="icofont icofont-error close-card"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="user-status table-responsive latest-order-table">
                    <table class="table table-bordernone">
                      <thead>
                      <tr>
                        <th scope="col">کد سفارش</th>
                        <th scope="col">مبلغ سفارش</th>
                        <th scope="col">شیوه پرداخت</th>
                        <th scope="col">وضعیت</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>1</td>
                        <td class="digits">120,000 تومان</td>
                        <td class="font-danger">کارت به کارت</td>
                        <td class="digits">در حال ارسال</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td class="digits">90,000 تومان</td>
                        <td class="font-secondary">واریز بانک</td>
                        <td class="digits">تحویل داده شده</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td class="digits">240,000 تومان</td>
                        <td class="font-warning">نقدی</td>
                        <td class="digits">تحویل داده شده</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td class="digits">120,000 تومان</td>
                        <td class="font-danger">کارت به کارت</td>
                        <td class="digits">در حال ارسال</td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td class="digits">50,000 تومان</td>
                        <td class="font-primary">کارت به کارت</td>
                        <td class="digits">تحویل داده شده</td>
                      </tr>
                      </tbody>
                    </table>
                    <a href="order.html" class="btn btn-primary">مشاهده همه سفارشات</a>
                  </div>
                  <div class="code-box-copy">
                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                    <pre class=" language-html"><code class=" language-html" id="example-head1">
&lt;div class="user-status table-responsive latest-order-table"&gt;
    &lt;table class="table table-bordernone"&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th scope="col"&gt;کد سفارش&lt;/th&gt;
                &lt;th scope="col"&gt;مبلغ سفارش&lt;/th&gt;
                &lt;th scope="col"&gt;شیوه پرداخت&lt;/th&gt;
                &lt;th scope="col"&gt;Status&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            &lt;tr&gt;
                &lt;td&gt;1&lt;/td&gt;
                &lt;td class="digits"&gt;120,000 تومان&lt;/td&gt;
                &lt;td class="font-secondary"&gt;Bank Transfers&lt;/td&gt;
                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;2&lt;/td&gt;
                &lt;td class="digits"&gt;90,000 تومان&lt;/td&gt;
                &lt;td class="font-secondary"&gt;Ewallets&lt;/td&gt;
                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;3&lt;/td&gt;
                &lt;td class="digits"&gt;240,000 تومان&lt;/td&gt;
                &lt;td class="font-secondary"&gt;Cash&lt;/td&gt;
                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;4&lt;/td&gt;
                &lt;td class="digits"&gt;120,000 تومان&lt;/td&gt;
                &lt;td class="font-primary"&gt;کارت به کارت&lt;/td&gt;
                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;5&lt;/td&gt;
                &lt;td class="digits"&gt;50,000 تومان&lt;/td&gt;
                &lt;td class="font-primary"&gt;Bank Transfers&lt;/td&gt;
                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;
                                    </code></pre>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="card btn-months">
                <div class="card-header">
                  <h5>خرید / فروش</h5>
                  <div class="dashboard-btn-groups">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button class="btn btn-outline-light btn-js1" type="button">روز</button>
                      <button class="btn btn-outline-light btn-js1" type="button">هفته</button>
                      <button class="btn btn-outline-light btn-js1 active" type="button">ماه</button>
                    </div>
                  </div>
                  <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                      <li><i class="icofont icofont-simple-right"></i></li>
                      <li><i class="view-html fa fa-code"></i></li>
                      <li><i class="icofont icofont-maximize full-card"></i></li>
                      <li><i class="icofont icofont-minus minimize-card"></i></li>
                      <li><i class="icofont icofont-refresh reload-card"></i></li>
                      <li><i class="icofont icofont-error close-card"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body sell-graph">
                  <div class="flot-chart-placeholder" id="multiple-real-timeupdate"></div>
                  <div class="code-box-copy">
                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head3" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                    <pre class=" language-html"><code class=" language-html" id="example-head3">&lt;div class="card-body sell-graph"&gt;
   &lt;canvas id="myGraph"&gt;&lt;/canvas&gt;
&lt;/div&gt;</code></pre>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 xl-50">
              <div class="card customers-card">
                <div class="card-header">
                  <h5>مشتریان جدید</h5>
                  <div class="chart-value-box pull-right">
                    <div class="value-square-box-secondary"></div><span class="f-12 f-w-600">مشتریان</span>
                  </div>
                  <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                      <li><i class="icofont icofont-simple-right"></i></li>
                      <li><i class="view-html fa fa-code"></i></li>
                      <li><i class="icofont icofont-maximize full-card"></i></li>
                      <li><i class="icofont icofont-minus minimize-card"></i></li>
                      <li><i class="icofont icofont-refresh reload-card"></i></li>
                      <li><i class="icofont icofont-error close-card"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="apex-chart-container">
                    <div id="customers"></div>
                  </div>
                  <div class="code-box-copy">
                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head7" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                    <pre class=" language-html"><code class=" language-html" id="example-head7">
&lt;div id="customers"&gt;&lt;/div&gt;
                                    </code></pre>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-8 xl-50">
              <div class="card height-equal">
                <div class="card-header">
                  <h5>وضعیت کارمند</h5>
                  <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                      <li><i class="icofont icofont-simple-right"></i></li>
                      <li><i class="view-html fa fa-code"></i></li>
                      <li><i class="icofont icofont-maximize full-card"></i></li>
                      <li><i class="icofont icofont-minus minimize-card"></i></li>
                      <li><i class="icofont icofont-refresh reload-card"></i></li>
                      <li><i class="icofont icofont-error close-card"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="user-status table-responsive products-table">
                    <table class="table table-bordernone mb-0">
                      <thead>
                      <tr>
                        <th scope="col">نام</th>
                        <th scope="col">تخصص</th>
                        <th scope="col">سطح مهارت</th>
                        <th scope="col">تجربه</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td class="bd-t-none u-s-tb">
                          <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/user2.jpg" alt="" data-original-title="" title="">
                            <div class="d-inline-block">
                              <h6>رضا افشار</h6>
                            </div>
                          </div>
                        </td>
                        <td>طراح وب</td>
                        <td>
                          <div class="progress-showcase">
                            <div class="progress" style="height: 8px;">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="digits">2 سال</td>
                      </tr>
                      <tr>
                        <td class="bd-t-none u-s-tb">
                          <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/man.png" alt="" data-original-title="" title="">
                            <div class="d-inline-block">
                              <h6>پدرام شریفی</h6>
                            </div>
                          </div>
                        </td>
                        <td>طراح وب</td>
                        <td>
                          <div class="progress-showcase">
                            <div class="progress" style="height: 8px;">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="digits">5 ماه</td>
                      </tr>
                      <tr>
                        <td class="bd-t-none u-s-tb">
                          <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/user.png" alt="" data-original-title="" title="">
                            <div class="d-inline-block">
                              <h6>مریم رسولی </h6>
                            </div>
                          </div>
                        </td>
                        <td>طراح وب</td>
                        <td>
                          <div class="progress-showcase">
                            <div class="progress" style="height: 8px;">
                              <div class="progress-bar bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="digits">3 ماه</td>
                      </tr>
                      <tr>
                        <td class="bd-t-none u-s-tb">
                          <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/designer.jpg" alt="" data-original-title="" title="">
                            <div class="d-inline-block">
                              <h6>پریسا توکلی </h6>
                            </div>
                          </div>
                        </td>
                        <td>طراح وب</td>
                        <td>
                          <div class="progress-showcase">
                            <div class="progress" style="height: 8px;">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="digits">5 سال</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="code-box-copy">
                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head5" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                    <pre class=" language-html"><code class=" language-html" id="example-head5">
&lt;div class="user-status table-responsive products-table"&gt;
    &lt;table class="table table-bordernone mb-0"&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th scope="col"&gt;Name&lt;/th&gt;
                &lt;th scope="col"&gt;Designation&lt;/th&gt;
                &lt;th scope="col"&gt;Skill Level&lt;/th&gt;
                &lt;th scope="col"&gt;Experience&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
                &lt;tr&gt;
                    &lt;td class="bd-t-none u-s-tb"&gt;
                        &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/user2.jpg" alt="" data-original-title="" title=""&gt;
                        &lt;div class="d-inline-block"&gt;
                        &lt;h6&gt;رضا افشار &lt;span class="text-muted digits"&gt;(14+ Online)&lt;/span&gt;&lt;/h6&gt;
                        &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/td&gt;
                    &lt;td&gt;Designer&lt;/td&gt;
                    &lt;td&gt;
                        &lt;div class="progress-showcase"&gt;
                        &lt;div class="progress" style="height: 8px;"&gt;
                        &lt;div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                        &lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/td&gt;
                    &lt;td class="digits"&gt;2 سال&lt;/td&gt;
                &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td class="bd-t-none u-s-tb"&gt;
                    &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/man.png" alt="" data-original-title="" title=""&gt;
                    &lt;div class="d-inline-block"&gt;
                    &lt;h6&gt;Mohsib lara&lt;span class="text-muted digits"&gt;(99+ Online)&lt;/span&gt;&lt;/h6&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td&gt;Tester&lt;/td&gt;
                &lt;td&gt;
                    &lt;div class="progress-showcase"&gt;
                    &lt;div class="progress" style="height: 8px;"&gt;
                    &lt;div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td class="digits"&gt;5 Month&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td class="bd-t-none u-s-tb"&gt;
                    &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/user.png" alt="" data-original-title="" title=""&gt;
                    &lt;div class="d-inline-block"&gt;
                    &lt;h6&gt;Hileri Soli &lt;span class="text-muted digits"&gt;(150+ Online)&lt;/span&gt;&lt;/h6&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td&gt;Designer&lt;/td&gt;
                &lt;td&gt;
                    &lt;div class="progress-showcase"&gt;
                    &lt;div class="progress" style="height: 8px;"&gt;
                    &lt;div class="progress-bar bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td class="digits"&gt;3 Month&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td class="bd-t-none u-s-tb"&gt;
                    &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/designer.jpg" alt="" data-original-title="" title=""&gt;
                    &lt;div class="d-inline-block"&gt;
                    &lt;h6&gt;Pusiz bia &lt;span class="text-muted digits"&gt;(14+ Online)&lt;/span&gt;&lt;/h6&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td&gt;Designer&lt;/td&gt;
                &lt;td&gt;
                    &lt;div class="progress-showcase"&gt;
                    &lt;div class="progress" style="height: 8px;"&gt;
                    &lt;div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                    &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td class="digits"&gt;5 سال&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;
                                    </code></pre>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5>پرفروش ترین کشور ها</h5>
                  <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                      <li><i class="icofont icofont-simple-right"></i></li>
                      <li><i class="view-html fa fa-code"></i></li>
                      <li><i class="icofont icofont-maximize full-card"></i></li>
                      <li><i class="icofont icofont-minus minimize-card"></i></li>
                      <li><i class="icofont icofont-refresh reload-card"></i></li>
                      <li><i class="icofont icofont-error close-card"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-xl-8">
                      <div class="jvector-map-height" id="world"></div>
                    </div>
                    <div class="col-xl-4">
                      <div class="table-responsive map-table">
                        <table class="table mb-0">
                          <thead>
                          <tr>
                            <th>کشور</th>
                            <th>2019</th>
                            <th>2020</th>
                            <th>تغییر</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td>ایران</td>
                            <td>1,048</td>
                            <td>2,213</td>
                            <td>6.8%</td>
                          </tr>
                          <tr>
                            <td>ترکیه</td>
                            <td>576</td>
                            <td>1,297</td>
                            <td>4.3%</td>
                          </tr>
                          <tr>
                            <td>قطر</td>
                            <td>879</td>
                            <td>1,985</td>
                            <td>7.0%</td>
                          </tr>
                          <tr>
                            <td>چین</td>
                            <td>1,871</td>
                            <td>2,546</td>
                            <td>6.2%</td>
                          </tr>
                          <tr>
                            <td>هند</td>
                            <td>957</td>
                            <td>1,975</td>
                            <td>5.6%</td>
                          </tr>
                          <tr>
                            <td>روسیه</td>
                            <td>1,480</td>
                            <td>1,631</td>
                            <td>8.7%</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="code-box-copy">
                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-hea6" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                    <pre class=" language-html"><code class=" language-html" id="example-head6">
&lt;div class="row"&gt;
    &lt;div class="col-xl-8"&gt;
       &lt;div class="jvector-map-height" id="world"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="col-xl-4"&gt;
       &lt;div class="table-responsive map-table"&gt;
          &lt;table class="table"&gt;
             &lt;thead&gt;
                &lt;tr&gt;
                   &lt;th&gt;Country&lt;/th&gt;
                   &lt;th&gt;2018&lt;/th&gt;
                   &lt;th&gt;2019&lt;/th&gt;
                   &lt;th&gt;Change&lt;/th&gt;
                &lt;/tr&gt;
             &lt;/thead&gt;
             &lt;tbody&gt;
                &lt;tr&gt;
                   &lt;td&gt;Bhopal&lt;/td&gt;
                   &lt;td&gt;1,048&lt;/td&gt;
                   &lt;td&gt;2,213&lt;/td&gt;
                   &lt;td&gt;6.8%&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                   &lt;td&gt;Saudi Arbia&lt;/td&gt;
                   &lt;td&gt;576&lt;/td&gt;
                   &lt;td&gt;1,297&lt;/td&gt;
                   &lt;td&gt;4.3%&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                   &lt;td&gt;Kazakstan&lt;/td&gt;
                   &lt;td&gt;879&lt;/td&gt;
                   &lt;td&gt;1,985&lt;/td&gt;
                   &lt;td&gt;7.0%&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                    &lt;td&gt;Canada&lt;/td&gt;
                    &lt;td&gt;1,871&lt;/td&gt;
                    &lt;td&gt;2,546&lt;/td&gt;
                    &lt;td&gt;6.2%&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                    &lt;td&gt;Brazil&lt;/td&gt;
                    &lt;td&gt;957&lt;/td&gt;
                    &lt;td&gt;1,975&lt;/td&gt;
                    &lt;td&gt;5.6%&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                   &lt;td&gt;Russia&lt;/td&gt;
                   &lt;td&gt;1,480&lt;/td&gt;
                   &lt;td&gt;1,631&lt;/td&gt;
                   &lt;td&gt;8.7%&lt;/td&gt;
                &lt;/tr&gt;
             &lt;/tbody&gt;
          &lt;/table&gt;
       &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
                                    </code></pre>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- Container-fluid Ends-->

      </div>

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
@endsection