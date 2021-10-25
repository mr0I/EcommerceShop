@extends('admin.layout.master')

@section('title')
  Admin Dash
@endsection

@section('content')
  <div class="page-body">
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
              <form class="needs-validation" name="addArticlePublic">
                <h4>عمومی</h4>
                <div class="form-group row">
                  <div class="col-xl-3 col-md-4">
                    <label for="validationCustom0"><span>*</span> عنوان</label>
                  </div>
                  <div class="col-xl-8 col-md-7">
                    <input class="form-control " name="title" type="text">
                  </div>
                </div>
                <div class="form-group row editor-label">
                  <div class="col-xl-3 col-md-4">
                    <label><span>*</span> توضیحات</label>
                  </div>
                  <div class="col-xl-8 col-md-7">
                    <div class=" editor-space">
                      <textarea class="w-100" name="desc" cols="50 " rows="5"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xl-3 col-md-4">
                    <label>وضعیت</label>
                  </div>
                  <div class="col-xl-8 col-md-7">
                    <div class="checkbox checkbox-primary ">
                      <input type="checkbox" name="status" id="status_checkbox"
                             data-original-title="" title="">
                      <label for="status_checkbox">انتشار این صفحه</label>
                    </div>
                  </div>
                  <div class="col-xl-8 col-md-7">
                    <label for="status_checkbox">آپلود تصویر</label>
                    <input type="file" class="upload" onchange="previewImage(event)" id="article_image" accept="image/*">
                    <img src="{{ url('images/ArticleDefault.jpg') }}" id="article_image_preview" width="100" height="100">
                    <button id="upload_img_btn" onclick="uploadToServer(event)">upload</button>
                    <p><span id="loaded"></span></p>
                    <div class="progress">
                      <div id="prog" class="progress-bar progress-bar-striped progress-bar-animated"
                           role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                           style="width: 0">
                      </div>
                    </div>
                    <p><span id="percent"></span></p>
                    <p><span id="result"></span></p>
                    <input type="hidden" id="uploaded_image_id" name="image_id">
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tabs">
              <form class="needs-validation" name="addArticleSeo">
                <h4>سئو</h4>
                <div class="form-group row">
                  <div class="col-xl-3 col-md-4">
                    <label for="validationCustom2">عنوان متا</label>
                  </div>
                  <div class="col-xl-8 col-md-7">
                    <input class="form-control " type="text" name="meta_title">
                  </div>
                </div>
                <div class="form-group row editor-label">
                  <div class="col-xl-3 col-md-4">
                    <label>توضیحات متا</label>
                  </div>
                  <div class="col-xl-8 col-md-7">
                    <textarea rows="4" class="col-12" name="meta_desc"></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="pull-right">
            <button type="button" class="btn btn-primary" id="addArticleFrmSubmit">ذخیره</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->

  </div>
@endsection