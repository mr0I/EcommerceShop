@extends('site.layout.master')


@section('title')
  {{ '  دیجی مارکت | ' . $article->meta_title}}
@endsection
@section('metadesc',$article->meta_desc)
@section('keywords', $article->meta_keywords)



@section('content')
  @php
    include_once public_path() . '/helpers/jdatetime.class.php';
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
              <li>{{ __('Author: Site Admin') }}</li>
              {{--<li><i class="fa fa-heart"></i> 5 پسند</li>--}}
              <li><i class="fa fa-comments"></i> {{ sizeof($comments) }} دیدگاه</li>
            </ul>
            <p>{!! $article->description !!}</p>
          </div>
        </div>
      </div>


      @if(sizeof($comments)!==0)
        <div class="row section-big-pb-space">
          <div class="col-sm-12 ">
            <div class="creative-card">
              <ul class="comment-section">
                @foreach($comments as $comment)
                  <li>
                    <div class="media">
                      <img src="http://www.gravatar.com/avatar/<?= md5($comment->email); ?>?rating=PG&size=24&size=50&d=identicon" alt="Generic placeholder image">
                      <div class="media-body">
                        <h6>{{ $comment->name }}
                          <p>
                            <span class="m-0">( {{ $date->date("j F Y در H:i A" , strtotime($comment->created_at)) }} )</span>
                          </p>
                        </h6>
                        <p>{{ $comment->comment }}</p>
                      </div>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      @endif

      <div class=" row blog-contact">
        <div class="col-sm-12  ">
          <div class="creative-card">
            <h2>{{ __('Send your feedback') }}</h2>
            <form class="theme-form" action="{{ url('/storeComment') }}" method="post">
              @csrf
              <div class="row g-3">
                <div class="col-md-12">
                  <label for="name">{{ __('name') }}</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autocomplete="name"
                         autofocus>
                  @if($errors->has('name'))
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                  @endif
                </div>
                <div class="col-md-12">
                  <label for="email">{{ __('Email') }}</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                  @if($errors->has('email'))
                    <ul>
                      @foreach ($errors->get('email') as $error)
                        <li class="w-100 my-1"><small class="text-danger">{{ $error }}</small></li>
                      @endforeach
                    </ul>
                  @endif
                </div>
                <div class="col-md-12">
                  <label for="exampleFormControlTextarea1">{{ __('Comment text') }}</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="comment"
                            rows="6" required></textarea>
                  @if($errors->has('comment'))
                    <ul>
                      @foreach ($errors->get('comment') as $error)
                        <li class="w-100 my-1"><small class="text-danger">{{ $error }}</small></li>
                      @endforeach
                    </ul>
                  @endif
                </div>
                <div class="col-md-12">
                  {{-- composer require haruncpi/laravel-simple-captcha --}}
                  <label for="captcha">{{ __('Captcha') }}</label>
                  <p class="row w-100 p-4">{{getCaptchaQuestion()}}</p>
                  <input type="number" name="_answer" class="form-control" required>
                  @if($errors->has('_answer'))
                    <ul>
                      @foreach ($errors->get('_answer') as $error)
                        <li class="w-100 my-1"><small class="text-danger">{{ $error }}</small></li>
                      @endforeach
                    </ul>
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
    {{-- Add trans localizations --}}
    <input type="hidden" value="{{ __('Your comment has been submitted and will be displayed after approval') }}">
    <input type="hidden" value="{{ __('Error in filling form') }}">
    {{-- Add trans localizations --}}
  </section>
  <!--Section ends-->
@endsection

