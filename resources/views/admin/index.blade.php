@extends('admin.layout.master')

@section('title')
  Admin Dash
@endsection

@section('content')
  <div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-lg-6">
            <div class="page-header-left">
              <h3>داشبورد
                <small>پنل مدیریتی دیجی مارکتز</small>
              </h3>
            </div>
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
                  <h3 class="mb-0"><span class="counter">{{ $products_count }}</span><small> این ماه</small>
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
                <div class="media-body"><span class="m-0">کاربران</span>
                  <h3 class="mb-0"><span class="counter">{{ $users_count }}</span><small> این ماه</small>
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
                <div class="media-body"><span class="m-0">سایت ها</span>
                  <h3 class="mb-0"><span class="counter">{{ $sites_count }}</span><small> تومان / این
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
                <div class="media-body"><span class="m-0">دسته بندی ها</span>
                  <h3 class="mb-0"><span class="counter">{{ $cats_count }}</span><small> این ماه</small>
                  </h3>
                </div>
                <div class="icons-widgets">
                  <i data-feather="users"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->

  </div>
@endsection