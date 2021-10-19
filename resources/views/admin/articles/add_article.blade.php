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
              <h3>ایجاد صفحه
                <small>پنل مدیریتی فروشگاه بیگ دیل</small>
              </h3>
            </div>
          </div>
          <div class="col-lg-6">
            <ol class="breadcrumb pull-right">
              <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a>
              </li>
              <li class="breadcrumb-item">صفحات</li>
              <li class="breadcrumb-item active">ایجاد صفحه</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="card tab2-card">
        <div class="card-header">
          <h5>ایجاد صفحه</h5>
        </div>
        <div class="card-body">
          <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active show" id="general-tab"
                                    data-bs-toggle="tab" href="#general" role="tab" aria-controls="general"
                                    aria-selected="true" data-original-title="" title="">عمومی</a></li>
            <li class="nav-item"><a class="nav-link" id="seo-tabs" data-bs-toggle="tab" href="#seo"
                                    role="tab" aria-controls="seo" aria-selected="false" data-original-title=""
                                    title="">سئو</a></li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="general" role="tabpanel"
                 aria-labelledby="general-tab">
              <form class="needs-validation">
                <h4>عمومی</h4>
                <div class="form-group row">
                  <div class="col-xl-3 col-md-4">
                    <label for="validationCustom0"><span>*</span> نام</label>
                  </div>
                  <div class="col-xl-8 col-md-7">
                    <input class="form-control " id="validationCustom0" type="text">
                  </div>
                </div>
                <div class="form-group row editor-label">
                  <div class="col-xl-3 col-md-4">
                    <label><span>*</span> توضیحات</label>
                  </div>
                  <div class="col-xl-8 col-md-7">
                    <div class=" editor-space">
                                                    <textarea id="editor1" name="editor1" cols="30"
                                                              rows="10"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xl-3 col-md-4">
                    <label>وضعیت</label>
                  </div>
                  <div class="col-xl-8 col-md-7">
                    <div class="checkbox checkbox-primary ">
                      <input id="checkbox-primary-2" type="checkbox"
                             data-original-title="" title="">
                      <label for="checkbox-primary-2">انتشار این صفحه</label>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tabs">
              <form class="needs-validation">
                <h4>سئو</h4>
                <div class="form-group row">
                  <div class="col-xl-3 col-md-4">
                    <label for="validationCustom2">عنوان متا</label>
                  </div>
                  <div class="col-xl-8 col-md-7">
                    <input class="form-control " id="validationCustom2" type="text">
                  </div>
                </div>
                <div class="form-group row editor-label">
                  <div class="col-xl-3 col-md-4">
                    <label>توضیحات متا</label>
                  </div>
                  <div class="col-xl-8 col-md-7">
                    <textarea rows="4" class="col-12"></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="pull-right">
            <button type="button" class="btn btn-primary">ذخیره</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->

  </div>
@endsection