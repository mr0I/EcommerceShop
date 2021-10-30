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
              <h3>
                {{ __('Articles') }}
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
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5>{{ __('Articles List') }}</h5>
            </div>
            <div class="card-body order-datatable">
              <table class="display" id="basic-1">
                <thead>
                <tr>
                  <th>ردیف</th>
                  <th>عنوان</th>
                  <th>توضیحات</th>
                  <th>وضعیت</th>
                  <th>تاریخ</th>
                  <th>عملیات</th>
                </tr>
                </thead>
                <tbody>

                @php
                  $counter=0;
                  include_once public_path() . '/libs/helpers/jdatetime.class.php';
                  $date = new jDateTime(true, true, 'Asia/Tehran');
                @endphp

                @foreach($articles as $article)
                  <tr>
                    <td>{{ ++$counter }}</td>
                    <td>
                      <img src="{{ url('uploads/article_images') .'/'.$article->articleImage['image'] }}" alt=""
                           class="blur-up lazyloaded" width="50" height="50">
                    </td>
                    <td>{{ $article->title }}</td>
                    <td>
                      <span>
                            {{ mb_strimwidth($article->description,0,50,'---') }}
                      </span>
                    </td>
                    <td>{{ $article->status==='published'? 'منتشر شده' : 'پیشنویس' }}</td>
                    <td>{{ $date->date("l j F Y" , strtotime($article->updated_at))  }}</td>
                    <td>
                      <div>
                        <i class="fa fa-edit ms-2 font-success" style="cursor: pointer"></i>
                        <i class="fa fa-trash font-danger" style="cursor: pointer"
                           onclick="delArticle({{ $article->id }})"></i>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->

  </div>
@endsection