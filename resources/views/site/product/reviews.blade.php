@extends('site.layout.master')

@section('title')
    {{ __('Product Reviews') }}
@endsection

@section('content')
  {{-- Date --}}
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
              <h2>{{ __('Reviews') }}</h2>
              <ul>
                <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                <li><i class="fa fa-angle-double-left"></i></li>
                <li><a href="/product/{{ $product->id }}">{{ __('Product Reviews Of: ') . $product->title }}</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb End -->

  <!--review start-->
  @if(sizeof($comments)===0)
    <div class="alert alert-warning">هیچ نظری ثبت نشده است!!!</div>
    @else
  <section class="review  section-big-py-space">
    <div class="container">
      <div class="row review-block">
        @foreach($comments as $comment)
        <div class="col-lg-4 col-md-6">
          <div class="review-box">
            <img class="img-fluid" src="http://www.gravatar.com/avatar/<?= md5($comment->email); ?>?rating=PG&size=24&size=50&d=identicon" alt="تصویر کاربر">
            <h5>{{ $comment->name }}</h5>
            <ul class="rating-star">
              <li><i class="fa <?= ($comment->star >= 1)? 'fa-star' : 'fa-star-o'  ?>" aria-hidden="true"></i></li>
              <li><i class="fa <?= ($comment->star >= 2)? 'fa-star' : 'fa-star-o'  ?>" aria-hidden="true"></i></li>
              <li><i class="fa <?= ($comment->star >= 3)? 'fa-star' : 'fa-star-o'  ?>" aria-hidden="true"></i></li>
              <li><i class="fa <?= ($comment->star >= 4)? 'fa-star' : 'fa-star-o'  ?>" aria-hidden="true"></i></li>
              <li><i class="fa <?= ($comment->star >= 5)? 'fa-star' : 'fa-star-o'  ?>" aria-hidden="true"></i></li>
            </ul>
            <div class="review-message">
              <p>{{ mb_strimwidth($comment->comment,0,150,'---') }}</p>
            </div>
            <h6>{{ $date->date("l j F Y" , strtotime($comment->created_at)) }}</h6>
          </div>
        </div>
          @endforeach
      </div>
    </div>
  </section>
  @endif
  <!--review end-->

@endsection