@extends('admin.layout.master')

@section('title', 'Admin Dash')


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
              <table class="display" id="articles_table">
                <thead>
                <tr>
                  <th>ردیف</th>
                  <th>تصویر</th>
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
                      @if($article->article_image_id!==null)
                        <img src="{{ url('uploads/article_images') .'/'.$article->articleImage['image'] }}" alt=""
                             class="blur-up lazyloaded" width="50" height="50">
                      @else
                        <img src="{{ url('images/custom/unknown_article.jpg') }}" alt=""
                             class="blur-up lazyloaded" width="50" height="50">
                      @endif
                    </td>
                    <td>{{ $article->title }}</td>
                    <td>
                      <span>
                            {{ strip_tags(mb_strimwidth($article->description,0,50,'---')) }}
                      </span>
                    </td>
                    <td>
                      @if($article->status==='published')
                        <span class="text-success" style="font-weight: bold;">منتشر شده</span>
                      @else
                        <span class="text-danger" style="font-weight: bold;">پیشنویس</span>
                      @endif
                    </td>
                    <td>{{ $date->date("l j F Y" , strtotime($article->updated_at))  }}</td>
                    <td>
                      <div>
                        <a href="{{ url('admin/dashboard/edit_article', $article->id) }}">
                          <i class="fa fa-edit ms-2 font-success" style="cursor: pointer"></i>
                        </a>

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


@section('inlineScripts')
  <script type="text/javascript">
      $(document).ready(function() {
          $('#articles_table').DataTable({
              'order':[[1,'asc']]
          });
      });
  </script>
@endsection
