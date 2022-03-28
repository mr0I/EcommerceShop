@extends('site.layout.master')

@section('title')
  {{ __('Main Page') }}
@endsection

@section('content')
  @php
    include_once public_path() . '/helpers/jdatetime.class.php';
    $date = new jDateTime(true, true, 'Asia/Tehran');
  @endphp

  @if(\Session::has('user_create_success'))
    <div class="alert alert-success my-2 w-75" style="margin: 0 auto;">
      {{ \Session::get('user_create_success') }}
    </div>
  @endif


  <!--slider start-->
  <section class="theme-slider home-slide b-g-white " id="home-slide">
    <div class="custom-container">
      <div class="row">
        <div class="col" style="padding: 0;">
          <div class="slide-1 no-arrow">
            <div>
              <div class="slider-banner p-center slide-banner-1">
                <div class="slider-img">
                  <img src="{{ url('images/banner/banner1.webp') }}" class="img-fluid" alt="slider">
                </div>
                <div class="slider-banner-contain">
                  <div class="w-100">
                    <h2 class="slider-banner-contain-title">انواع لپ تاپ</h2>
                    <a href="{{ url('category/laptop') }}" class="btn btn-normal">
                      {{ __('Start buying') }}
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="slider-banner p-center slide-banner-1">
                <div class="slider-img">
                  <img src="{{ url('images/banner/banner2.webp') }}" class="img-fluid" alt="slider">
                </div>
                <div class="slider-banner-contain">
                  <div class="w-100">
                    <h2 class="slider-banner-contain-title" style="text-align: left;">انواع تبلت</h2>
                    <a href="{{ url('category/tablet') }}" class="btn btn-normal" style="float: left;">
                      {{ __('Start buying') }}
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="slider-banner p-center slide-banner-1">
                <div class="slider-img">
                  <img src="{{ url('images/banner/banner3.webp') }}" class="img-fluid" alt="slider">
                </div>
                <div class="slider-banner-contain">
                  <div class="w-100">
                    <h2 class="slider-banner-contain-title">گجت های پوشیدنی</h2>
                    <a href="{{ url('category/wearableGadget') }}" class="btn btn-normal">
                      {{ __('Start buying') }}
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--slider end-->


  <!--tab product-->
  <section class="section-pt-space">
    <div class="tab-product-main">
      <div class="tab-prodcut-contain">
        <ul class="tabs tab-title">
          <li class="current"><a href="tab-1">موبایل</a></li>
          <li><a href="tab-2">لپ تاپ</a></li>
          <li><a href="tab-3">تبلت</a></li>
          <li><a href="tab-4">لوازم جانبی موبایل</a></li>
        </ul>
      </div>
    </div>
  </section>
  <!--tab product-->



  <!-- slider tab  -->
  <section class="section-py-space ratio_square product">
    <div class="custom-container">
      <div class="row">
        <div class="col pr-0">
          <div class="theme-tab product mb--5">
            <div class="tab-content-cls ">
              <div id="tab-1" class="tab-content active default">
                <div class="product-slide-6 product-m no-arrow">
                  @foreach($mobileProducts as $product)
                    <div>
                      <div class="product-box">
                        <div class="product-imgbox">
                          <div class="product-front">
                            <a href="/product/{{ $product->id }}">
                              <img src="{{ url('uploads/productImages/'). '/' . $product->image. '.webp' }}"
                                   class="img-fluid" alt="{{ $product->title }}" onerror="this.src='{{ url('images/inf.jpg') }}'">
                            </a>
                          </div>
                          <div class="product-back">
                            <a href="/product/{{ $product->id }}">
                              <img src="{{ url('uploads/productImages/'). '/' . $product->image. '.webp' }}"
                                   class="img-fluid" alt="{{ $product->title }}" onerror="this.src='{{ url('images/inf.jpg') }}'">
                            </a>
                          </div>
                          <div class="product-icon icon-inline">
                            <a href="{{ $product->url }}" class="tooltip-top" target="_blank"
                               data-tippy-content="خرید">
                              <i data-feather="shopping-cart"></i>
                            </a>
                            <a href="#" class="add-to-wish tooltip-top" data-id="{{ $product->id }}"
                               onclick="addToWish(event,{{ $product->id }})" data-tippy-content="افزودن به لیست علاقه مندی">
                              <i data-feather="heart"></i>
                            </a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" onclick="viewModal({{ $product->id }})"
                               class="tooltip-top" data-tippy-content="مشاهده سریع">
                              <i data-feather="eye"></i>
                            </a>
                            <a href="{{ url('compare/pr-'. $product->id) }}" class="tooltip-top"
                               data-tippy-content="مقایسه">
                              <i data-feather="refresh-cw"></i>
                            </a>
                          </div>

                        </div>
                        <div class="product-detail detail-inline ">
                          <div class="detail-title">
                            <div class="detail-left">
                              <a href="/product/{{ $product->id }}">
                                <h6 class="price-title" style="font-family: vazir;">
                                  {{ $product->title }}
                                </h6>
                              </a>
                            </div>
                            <div class="detail-right d-flex justify-content-center w-100">
                              @if($product->status === 'out_of_stock')
                                <div class="text-danger">
                                  {{ __('Not Available') }}
                                </div>
                              @else
                                @if($product->main_price === $product->price)
                                  <div class="price">
                                    <div class="price digits">{{ $product->price }} تومان</div>
                                  </div>
                                @else
                                  <div class="check-price digits">
                                    {{ $product->main_price }} تومان
                                  </div>
                                  <div class="price">
                                    <div class="price digits">
                                      {{ $product->price }} تومان
                                    </div>
                                  </div>
                                @endif
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              <div id="tab-2" class="tab-content">
                <div class="product-slide-6 product-m no-arrow">
                  @foreach($laptopProducts as $product)
                    <div>
                      <div class="product-box">
                        <div class="product-imgbox">
                          <div class="product-front">
                            <a href="/product/{{ $product->id }}">
                              <img src="{{ url('uploads/productImages/'). '/' . $product->image. '.webp' }}"
                                   class="img-fluid" alt="{{ $product->title }}" onerror="this.src='{{ url('images/inf.jpg') }}'">
                            </a>
                          </div>
                          <div class="product-back">
                            <a href="/product/{{ $product->id }}">
                              <img src="{{ url('uploads/productImages/'). '/' . $product->image. '.webp' }}"
                                   class="img-fluid" alt="{{ $product->title }}" onerror="this.src='{{ url('images/inf.jpg') }}'">
                            </a>
                          </div>
                          <div class="product-icon icon-inline">
                            <a href="{{ $product->url }}" class="tooltip-top" target="_blank"
                               data-tippy-content="خرید">
                              <i data-feather="shopping-cart"></i>
                            </a>
                            <a href="#" class="add-to-wish tooltip-top" data-id="{{ $product->id }}"
                               onclick="addToWish(event,{{ $product->id }})" data-tippy-content="افزودن به لیست علاقه مندی">
                              <i data-feather="heart"></i>
                            </a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" onclick="viewModal({{ $product->id }})"
                               class="tooltip-top" data-tippy-content="مشاهده سریع">
                              <i data-feather="eye"></i>
                            </a>
                            <a href="{{ url('compare/pr-'. $product->id) }}" class="tooltip-top"
                               data-tippy-content="مقایسه">
                              <i data-feather="refresh-cw"></i>
                            </a>
                          </div>

                        </div>
                        <div class="product-detail detail-inline ">
                          <div class="detail-title">
                            <div class="detail-left">
                              <a href="/product/{{ $product->id }}">
                                <h6 class="price-title" style="font-family: vazir;">
                                  {{ $product->title }}
                                </h6>
                              </a>
                            </div>
                            <div class="detail-right d-flex justify-content-center w-100">
                              @if($product->status === 'out_of_stock')
                                <div class="text-danger">
                                  {{ __('Not Available') }}
                                </div>
                              @else
                                @if($product->main_price === $product->price)
                                  <div class="price">
                                    <div class="price digits">{{ $product->price }} تومان</div>
                                  </div>
                                @else
                                  <div class="check-price digits">
                                    {{ $product->main_price }} تومان
                                  </div>
                                  <div class="price">
                                    <div class="price digits">
                                      {{ $product->price }} تومان
                                    </div>
                                  </div>
                                @endif
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              <div id="tab-3" class="tab-content">
                <div class="product-slide-6 product-m no-arrow">
                  @foreach($tabletProducts as $product)
                    <div>
                      <div class="product-box">
                        <div class="product-imgbox">
                          <div class="product-front">
                            <a href="/product/{{ $product->id }}">
                              <img src="{{ url('uploads/productImages/'). '/' . $product->image. '.webp' }}"
                                   class="img-fluid" alt="{{ $product->title }}" onerror="this.src='{{ url('images/inf.jpg') }}'">
                            </a>
                          </div>
                          <div class="product-back">
                            <a href="/product/{{ $product->id }}">
                              <img src="{{ url('uploads/productImages/'). '/' . $product->image. '.webp' }}"
                                   class="img-fluid" alt="{{ $product->title }}" onerror="this.src='{{ url('images/inf.jpg') }}'">
                            </a>
                          </div>
                          <div class="product-icon icon-inline">

                            <a href="{{ $product->url }}" class="tooltip-top" target="_blank"
                               data-tippy-content="خرید">
                              <i data-feather="shopping-cart"></i>
                            </a>
                            <a href="#" class="add-to-wish tooltip-top" data-id="{{ $product->id }}"
                               onclick="addToWish(event,{{ $product->id }})" data-tippy-content="افزودن به لیست علاقه مندی">
                              <i data-feather="heart"></i>
                            </a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" onclick="viewModal({{ $product->id }})"
                               class="tooltip-top" data-tippy-content="مشاهده سریع">
                              <i data-feather="eye"></i>
                            </a>
                            <a href="{{ url('compare/pr-'. $product->id) }}" class="tooltip-top"
                               data-tippy-content="مقایسه">
                              <i data-feather="refresh-cw"></i>
                            </a>
                          </div>

                        </div>
                        <div class="product-detail detail-inline ">
                          <div class="detail-title">
                            <div class="detail-left">
                              <a href="/product/{{ $product->id }}">
                                <h6 class="price-title" style="font-family: vazir;">
                                  {{ $product->title }}
                                </h6>
                              </a>
                            </div>
                            <div class="detail-right d-flex justify-content-center w-100">
                              @if($product->status === 'out_of_stock')
                                <div class="text-danger">
                                  {{ __('Not Available') }}
                                </div>
                              @else
                                @if($product->main_price === $product->price)
                                  <div class="price">
                                    <div class="price digits">{{ $product->price }} تومان</div>
                                  </div>
                                @else
                                  <div class="check-price digits">
                                    {{ $product->main_price }} تومان
                                  </div>
                                  <div class="price">
                                    <div class="price digits">
                                      {{ $product->price }} تومان
                                    </div>
                                  </div>
                                @endif
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              <div id="tab-4" class="tab-content">
                <div class="product-slide-6 product-m no-arrow">
                  @foreach($mobileAccessoriesProducts as $product)
                    <div>
                      <div class="product-box">
                        <div class="product-imgbox">
                          <div class="product-front">
                            <a href="/product/{{ $product->id }}">
                              <img src="{{ url('uploads/productImages/'). '/' . $product->image. '.webp' }}"
                                   class="img-fluid" alt="{{ $product->title }}" onerror="this.src='{{ url('images/inf.jpg') }}'">
                            </a>
                          </div>
                          <div class="product-back">
                            <a href="/product/{{ $product->id }}">
                              <img src="{{ url('uploads/productImages/'). '/' . $product->image. '.webp' }}"
                                   class="img-fluid" alt="{{ $product->title }}" onerror="this.src='{{ url('images/inf.jpg') }}'">
                            </a>
                          </div>
                          <div class="product-icon icon-inline">

                            <a href="{{ $product->url }}" class="tooltip-top" target="_blank"
                               data-tippy-content="خرید">
                              <i data-feather="shopping-cart"></i>
                            </a>
                            <a href="#" class="add-to-wish tooltip-top" data-id="{{ $product->id }}"
                               onclick="addToWish(event,{{ $product->id }})" data-tippy-content="افزودن به لیست علاقه مندی">
                              <i data-feather="heart"></i>
                            </a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" onclick="viewModal({{ $product->id }})"
                               class="tooltip-top" data-tippy-content="مشاهده سریع">
                              <i data-feather="eye"></i>
                            </a>
                            <a href="{{ url('compare/pr-'. $product->id) }}" class="tooltip-top"
                               data-tippy-content="مقایسه">
                              <i data-feather="refresh-cw"></i>
                            </a>
                          </div>

                        </div>
                        <div class="product-detail detail-inline ">
                          <div class="detail-title">
                            <div class="detail-left">
                              <a href="/product/{{ $product->id }}">
                                <h6 class="price-title" style="font-family: vazir;">
                                  {{ $product->title }}
                                </h6>
                              </a>
                            </div>
                            <div class="detail-right d-flex justify-content-center w-100">
                              @if($product->status === 'out_of_stock')
                                <div class="text-danger">
                                  {{ __('Not Available') }}
                                </div>
                              @else
                                @if($product->main_price === $product->price)
                                  <div class="price">
                                    <div class="price digits">{{ $product->price }} تومان</div>
                                  </div>
                                @else
                                  <div class="check-price digits">
                                    {{ $product->main_price }} تومان
                                  </div>
                                  <div class="price">
                                    <div class="price digits">
                                      {{ $product->price }} تومان
                                    </div>
                                  </div>
                                @endif
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- slider tab end -->

  <!--deal banner start-->
  <section class="deal-banner d-none">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="deal-banner-containe">
            <h2>
              از 30 تا 40 درصد تخفیف ویژه
            </h2>
            <h1>
              از پیشنهاد های شگفت انگیز ما دیدن فرمایید !
            </h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4 ">
          <div class="deal-banner-containe">
            <diV class="deal-btn">
              <a href="category-page(left-sidebar).html" class="btn-white">
                مشاهده بیشتر
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--deal banner end-->

  <!--hot deal start-->
  <section class="hot-deal hotdeal-first b-g-white section-big-pb-space space-abjust mt-5">
    <div class="custom-container">
      <div class="row hot-2 ">
        <div class="col-12">
          <!--title start-->
          <div class="title3 b-g-white text-left">
            <h4>{{ __('Hot Deals') }}</h4>
          </div>
          <!--title end-->
        </div>
        <div class="col-lg-12">
          <div class="slide-1 no-arrow">
            <div>
              <div class="hot-deal-contain ">
                <div class="row hot-deal-subcontain hotdeal-block1">
                  <div class="col-lg-4 col-md-4  ">
                    <div class="hotdeal-right-slick border-0">
                      @foreach($specialProducts as $product)
                        <a href="/product/{{ $product->id }}">
                          <div class="img-wrraper">
                            <div>
                              <img src="{{ url('uploads/productImages/'). '/' . $product->image. '.webp' }}" alt="hot-deal"
                                   class="img-fluid bg-img" onerror="this.src='{{ url('images/inf.jpg') }}'">
                            </div>
                          </div>
                        </a>
                      @endforeach
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 deal-order-3">
                    <div class="hotdeal-right-slick border-0">
                      @foreach($specialProducts as $product)
                        <div>
                          <div>
                            <a href="/product/{{ $product->id }}">
                              <h5 style="direction: rtl;font-family: vazir;">{{ $product->title }} </h5>
                            </a>
                            <p style="direction: rtl">{{ mb_strimwidth($product->description,0,650,'---') }}</p>
                            @php
                              $discount = \App\Helpers\functions::calcDiscount($product->main_price,$product->price);
                            @endphp
                            <h6><strong class="digits">{{ $product->price }}</strong> تومان
                              <span class="mx-2 digits" style="color: #acacac;text-decoration: line-through">{{ $product->main_price }} تومان </span>
                              <strong class="mx-2">{{ $discount }}% تخفیف </strong>
                            </h6>
                            <div class="timer">
                              <p id="demo">
                              </p>
                            </div>
                            <a href="{{ $product->url }}" class="btn btn-normal btn-md ">شروع خرید</a>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="col-md-2 ">
                    <div class="hotdeal-right-nav">
                      @foreach($specialProducts as $product)
                        <div>
                          <img class="img-fluid" src="{{ url('uploads/productImages/'). '/' . $product->image. '.webp' }}"
                               alt="{{ $product->title }}" onerror="this.src='{{ url('images/inf.jpg') }}'">
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--hot deal start-->


  @if(sizeof($articles)!==0)
    <!-- title start -->
    <div class="title4 b-g-white text-left">
      <h3>{{ __('Latest News') }}</h3>
      <div class="line"></div>
    </div>
    <!-- title end -->

    <!--blog start-->
    <section class="blog  section-big-pb-space b-g-white blog-inverce">
      <div class="custom-container">
        <div class="row blog-block">
          <div class="col-12 ">
            <div class="blog-slide-4 no-arrow">
              @foreach($articles as $article)
                <div>
                  <div class="blog-contain blog-border">
                    <div class="blog-img">
                      <a href="{{ url('article/'.$article->slug) }}">
                        @if($article->article_image_id!==null)
                          <img src="{{ url('uploads/article_images/'.$article->articleImage['image']) }}"
                               alt="blog_pic" class="img-fluid w-100" style="max-height: 250px;">
                        @else
                          <img src="{{ url('images/custom/noimage.png') }}"
                               alt="blog_pic" class="img-fluid w-100" style="max-height: 250px;">
                        @endif
                      </a>
                    </div>
                    <div class="blog-details-2">
                      <h4>{{ $article->title }} </h4>
                      <p>{!! mb_strimwidth($article->description,0,200,'---') !!}</p>
                      <a href="{{ url('article/'.$article->slug) }}" class=" btn btn-rounded  btn-xs">
                        {{ __('Read More') }}
                      </a>
                    </div>
                    <div class="blog-label1" style="direction: rtl">
                      {{ $date->date("j F Y" , strtotime($article->updated_at)) }}
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

          </div>
        </div>
      </div>
    </section>
    <!--blog end-->
  @endif





  <!-- Quick-view modal popup start-->
  <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
       aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content quick-view-modal">
        <div class="modal-body"></div>
        <div class="row block-row @if(session()->get('theme') =='light') block-light @else block-dark @endif"
             id="ph_animation">
          <div class="block-container w-50">
            <div class="block w-100 h-100">
              <div class="load-wraper">
                <div class="activity"></div>
              </div>
            </div>
          </div>
          <div class="block-container w-50">
            <div class="block w-100 h-25">
              <div class="load-wraper">
                <div class="activity"></div>
              </div>
            </div>
            <div class="block w-50 h-25">
              <div class="load-wraper">
                <div class="activity"></div>
              </div>
            </div>
            <div class="block w-25 h-25">
              <div class="load-wraper">
                <div class="activity"></div>
              </div>
            </div>
            <div class="block w-100 h-50">
              <div class="load-wraper">
                <div class="activity"></div>
              </div>
            </div>
            <div class="block w-100 h-25">
              <div class="load-wraper">
                <div class="activity"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- Quick-view modal popup end-->

@endsection

