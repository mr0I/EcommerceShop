@extends('site.layout.master')


@section('title')
  {{ __('Article') }}
@endsection


@section('content')
  @php
    include_once public_path() . '/libs/helpers/jdatetime.class.php';
    $date = new jDateTime(true, true, 'Asia/Tehran');
  @endphp

  <!-- breadcrumb start -->
  <div class="breadcrumb-main ">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumb-contain">
            <div>
              {{--<h2>جزئیات خبر</h2>--}}
              <ul>
                <li><a href="{{ url('/') }}">خانه</a></li>
                <li><i class="fa fa-angle-double-left"></i></li>
                <li>{{ $article->title }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb End -->

  <!--section start-->
  <section class="blog-detail-page section-big-py-space ratio2_3">
    <div class="container">
      <div class="row section-big-pb-space">
        <div class="col-sm-12 blog-detail">
          <div class="creative-card">
            @if($article->article_image_id!==null)
              <img src="{{ url('uploads/article_images/'.$article->articleImage['image']) }}"
                   alt="blog" class="img-fluid w-100" style="max-height: 250px;">
            @endif
            <h3>{{ $article->title }}</h3>
            <ul class="post-social">
              <li>{{ $date->date("j F Y" , strtotime($article->updated_at)) }}</li>
              <li>نویسنده : مدیر سایت</li>
              <li><i class="fa fa-heart"></i> 5 پسند</li>
              <li><i class="fa fa-comments"></i> 10 دیدگاه</li>
            </ul>
            <p>{{ $article->description }}</p>
          </div>
        </div>
      </div>

      <div class="row section-big-pb-space">
        <div class="col-sm-12 ">
          <div class="creative-card">
            <ul class="comment-section">
              <li>
                <div class="media"><img src="../assets/images/avtar/1.jpg" alt="Generic placeholder image">
                  <div class="media-body">
                    <h6>رضا افشار <span>( 12 فروردین 1400 در 01:30 عصر )</span></h6>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با
                      تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم
                      ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                      سادگی نامفهوم، لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="media"><img src="../assets/images/avtar/2.jpg" alt="Generic placeholder image">
                  <div class="media-body">
                    <h6>رضا افشار <span>( 12 فروردین 1400 در 01:30 عصر )</span></h6>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با
                      تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم
                      ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                      سادگی نامفهوم، لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="media"><img src="../assets/images/avtar/3.jpg" alt="Generic placeholder image">
                  <div class="media-body">
                    <h6>رضا افشار <span>( 12 فروردین 1400 در 01:30 عصر )</span></h6>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با
                      تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم
                      ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                      سادگی نامفهوم، لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class=" row blog-contact">
        <div class="col-sm-12  ">
          <div class="creative-card">
            <h2>{{ __('Send your feedback') }}</h2>

            @if($errors->any())
              {{ $errors }}
            @endif
            <form class="theme-form" action="{{ url('/storeComment') }}" method="post">
              @csrf
              <div class="row g-3">
                <div class="col-md-12">
                  <label for="name">{{ __('name') }}</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autocomplete="name"
                         placeholder="{{ __('Enter your name') }}" autofocus>
                </div>
                <div class="col-md-12">
                  <label for="email">{{ __('Email') }}</label>
                  <input type="email" class="form-control" id="email" name="email"
                         placeholder="{{ __('Enter your email') }}">
                  @if($errors->has('email'))
                    <span class="invalid-feedbackkk" role="alert">
                      @for($i=0;$i<sizeof($errors->email);$i++)
                        <strong>{{ $errors->email[$i] }}</strong>
                        @endfor
                    </span>
                  @endif
                </div>
                <div class="col-md-12">
                  <label for="exampleFormControlTextarea1">{{ __('Comment text') }}</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="comment"
                            rows="6"></textarea>
                  @if($errors->has('comment'))
                    <span class="invalid-feedbackkk" role="alert">
                        <strong>{{ $errors->first('comment') }}</strong>
                    </span>
                  @endif
                </div>
                <input type="hidden" value="{{ $article->id }}" name="article_id">
                <div class="col-md-12">
                  <button class="btn btn-normal" type="submit">{{ __('Send') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!--Section ends-->
@endsection