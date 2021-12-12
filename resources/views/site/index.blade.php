@extends('site.layout.master')

@section('title')
  {{ __('Main Page') }}
@endsection

@section('content')
  @php
    include_once public_path() . '/libs/helpers/jdatetime.class.php';
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
        <div class="col">
          <div class="slide-1 no-arrow">
            <div>
              <div class="slider-banner p-center slide-banner-1">
                <div class="slider-img">
                  <ul class="layout1-slide-1">
                    <li id="img-1"><img src="{{ url('images/layout-2/slider/1.1.png') }}" class="img-fluid" alt="slider">
                    </li>
                    <li id="img-2" class="slide-center"><img src="{{ url('images/layout-2/slider/1.2.png') }}"
                                                             class="img-fluid" alt="slider">
                    </li>
                  </ul>
                </div>
                <div class="slider-banner-contain">
                  <div>
                    <h1><span>موبایل</span> شیائومی</h1>
                    <h4>سریع و زیبا</h4>
                    <h2>دوربین با کیفیت عالی</h2>
                    <a href="product-page(left-sidebar).html" class="btn btn-normal">
                      شروع خرید
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="slider-banner p-center slide-banner-1">
                <div class="slider-img">
                  <ul class="layout1-slide-2">
                    <li id="img-3" class="slide-center"><img src="{{ url('images/layout-2/slider/2.1.png') }}"
                                                             class="img-fluid" alt="slider"></li>
                    <li id="img-4" class="slide-center"><img src="{{ url('images/layout-2/slider/2.2.png') }}"
                                                             class="img-fluid" alt="slider"></li>
                  </ul>
                </div>
                <div class="slider-banner-contain">
                  <div>
                    <h1><span>فروش</span> بزرگ</h1>
                    <h4>شروع از 99 هزار تومان</h4>
                    <h2>50% تخفیف</h2>
                    <a href="product-page(left-sidebar).html" class="btn btn-normal">
                      شروع خرید
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
          <li class="current"><a href="tab-1">تلفن همراه</a></li>
          <li class=""><a href="tab-2">لپ تاپ</a></li>
          <li class=""><a href="tab-3">تبلت</a></li>
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
                              <img src="{{ url('uploads/product_images/'). '/' . $product->image. '.jpg' }}" class="img-fluid  " alt="product">
                            </a>
                          </div>
                          <div class="product-back">
                            <a href="/product/{{ $product->id }}">
                              <img src="{{ url('uploads/product_images/'). '/' . $product->image. '.jpg' }}" class="img-fluid  " alt="product">
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
                            <a href="#" class="add-to-compare tooltip-top"
                               onclick="addToCompare(event,{{ $product->id }})" data-tippy-content="مقایسه">
                              <i data-feather="refresh-cw"></i>
                            </a>
                          </div>

                        </div>
                        <div class="product-detail detail-inline ">
                          <div class="detail-title">
                            <div class="detail-left">
                              <a href="/product/{{ $product->id }}">
                                <h6 class="price-title">
                                  {{ $product->title }}
                                </h6>
                              </a>
                            </div>
                            <div class="detail-right">
                              @if($product->main_price!==null && $product->main_price!=='')
                                <div class="check-price">
                                  {{ $product->main_price }} تومان
                                </div>
                              @endif
                              <div class="price">
                                <div class="price digits">
                                  {{ $product->price }} تومان
                                </div>
                              </div>
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
                  <div>
                    <div class="product-box">
                      <div class="product-imgbox">
                        <div class="product-front">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/1.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-back">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/a1.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-icon icon-inline">
                          <button onclick="openCart()" class="tooltip-top" data-tippy-content="افزودن به سبد خرید">
                            <i data-feather="shopping-cart"></i>
                          </button>
                          <a href="#" class="add-to-wish tooltip-top"
                             data-tippy-content="افزودن به لیست علاقه مندی">
                            <i data-feather="heart"></i>
                          </a>
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                             class="tooltip-top" data-tippy-content="مشاهده سریع">
                            <i data-feather="eye"></i>
                          </a>
                          <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه">
                            <i data-feather="refresh-cw"></i>
                          </a>
                        </div>
                        <div class="new-label1">
                          <div>جدید</div>
                        </div>
                        <div class="on-sale1">
                          فروش ویژه
                        </div>
                      </div>
                      <div class="product-detail detail-inline ">
                        <div class="detail-title">
                          <div class="detail-left">
                            <div class="rating-star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(left-sidebar).html">
                              <h6 class="price-title">
                                گوشی موبایل
                              </h6>
                            </a>
                          </div>
                          <div class="detail-right">
                            <div class="check-price">
                              56,000 تومان
                            </div>
                            <div class="price">
                              <div class="price">
                                24,000 تومان
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="product-box">
                      <div class="product-imgbox">
                        <div class="product-front">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/2.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-back">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/a2.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-icon icon-inline">
                          <button onclick="openCart()" class="tooltip-top" data-tippy-content="افزودن به سبد خرید">
                            <i data-feather="shopping-cart"></i>
                          </button>
                          <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                             data-tippy-content="افزودن به لیست علاقه مندی">
                            <i data-feather="heart"></i>
                          </a>
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                             class="tooltip-top" data-tippy-content="مشاهده سریع">
                            <i data-feather="eye"></i>
                          </a>
                          <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه">
                            <i data-feather="refresh-cw"></i>
                          </a>
                        </div>
                        <div class="new-label1">
                          <div>جدید</div>
                        </div>
                      </div>
                      <div class="product-detail detail-inline">
                        <div class="detail-title">
                          <div class="detail-left">
                            <div class="rating-star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(left-sidebar).html">
                              <h6 class="price-title">
                                کیف زنانه
                              </h6>
                            </a>
                          </div>
                          <div class="detail-right">
                            <div class="check-price">
                              56,000 تومان
                            </div>
                            <div class="price">
                              <div class="price">
                                24,000 تومان
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="product-box">
                      <div class="product-imgbox">
                        <div class="product-front">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/4.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-back">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/a4.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-icon icon-inline">
                          <button onclick="openCart()" class="tooltip-top" data-tippy-content="افزودن به سبد خرید">
                            <i data-feather="shopping-cart"></i>
                          </button>
                          <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                             data-tippy-content="افزودن به لیست علاقه مندی">
                            <i data-feather="heart"></i>
                          </a>
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                             class="tooltip-top" data-tippy-content="مشاهده سریع">
                            <i data-feather="eye"></i>
                          </a>
                          <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه">
                            <i data-feather="refresh-cw"></i>
                          </a>
                        </div>
                      </div>
                      <div class="product-detail detail-inline">
                        <div class="detail-title">
                          <div class="detail-left">
                            <div class="rating-star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(left-sidebar).html">
                              <h6 class="price-title">
                                دوربین عکاسی
                              </h6>
                            </a>
                          </div>
                          <div class="detail-right">
                            <div class="check-price">
                              60,000 تومان
                            </div>
                            <div class="price">
                              <div class="price">
                                20,000 تومان
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="product-box">
                      <div class="product-imgbox">
                        <div class="product-front">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/5.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-back">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/a5.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-icon icon-inline">
                          <button onclick="openCart()" class="tooltip-top" data-tippy-content="افزودن به سبد خرید">
                            <i data-feather="shopping-cart"></i>
                          </button>
                          <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                             data-tippy-content="افزودن به لیست علاقه مندی">
                            <i data-feather="heart"></i>
                          </a>
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                             class="tooltip-top" data-tippy-content="مشاهده سریع">
                            <i data-feather="eye"></i>
                          </a>
                          <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه">
                            <i data-feather="refresh-cw"></i>
                          </a>
                        </div>
                        <div class="new-label1">
                          <div>جدید</div>
                        </div>
                        <div class="on-sale1">
                          فروش ویژه
                        </div>
                      </div>
                      <div class="product-detail detail-inline">
                        <div class="detail-title">
                          <div class="detail-left">
                            <div class="rating-star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(left-sidebar).html">
                              <h6 class="price-title">
                                لپ تاپ لنوو
                              </h6>
                            </a>
                          </div>
                          <div class="detail-right">
                            <div class="check-price">
                              70,000 تومان
                            </div>
                            <div class="price">
                              <div class="price">
                                30,000 تومان
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="product-box">
                      <div class="product-imgbox">
                        <div class="product-front">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/6.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-back">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/a6.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-icon icon-inline">
                          <button onclick="openCart()" class="tooltip-top" data-tippy-content="افزودن به سبد خرید">
                            <i data-feather="shopping-cart"></i>
                          </button>
                          <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                             data-tippy-content="افزودن به لیست علاقه مندی">
                            <i data-feather="heart"></i>
                          </a>
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                             class="tooltip-top" data-tippy-content="مشاهده سریع">
                            <i data-feather="eye"></i>
                          </a>
                          <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه">
                            <i data-feather="refresh-cw"></i>
                          </a>
                        </div>
                      </div>
                      <div class="product-detail detail-inline">
                        <div class="detail-title">
                          <div class="detail-left">
                            <div class="rating-star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(left-sidebar).html">
                              <h6 class="price-title">
                                کیف گوشی
                              </h6>
                            </a>
                          </div>
                          <div class="detail-right">
                            <div class="check-price">
                              100,000 تومان
                            </div>
                            <div class="price">
                              <div class="price">
                                80,000 تومان
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="product-box">
                      <div class="product-imgbox">
                        <div class="product-front">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/7.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-back">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/a7.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-icon icon-inline">
                          <button onclick="openCart()" class="tooltip-top" data-tippy-content="افزودن به سبد خرید">
                            <i data-feather="shopping-cart"></i>
                          </button>
                          <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                             data-tippy-content="افزودن به لیست علاقه مندی">
                            <i data-feather="heart"></i>
                          </a>
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                             class="tooltip-top" data-tippy-content="مشاهده سریع">
                            <i data-feather="eye"></i>
                          </a>
                          <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه">
                            <i data-feather="refresh-cw"></i>
                          </a>
                        </div>
                      </div>
                      <div class="product-detail detail-inline">
                        <div class="detail-title">
                          <div class="detail-left">
                            <div class="rating-star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(left-sidebar).html">
                              <h6 class="price-title">
                                میز چوبی
                              </h6>
                            </a>
                          </div>
                          <div class="detail-right">
                            <div class="check-price">
                              90,000 تومان
                            </div>
                            <div class="price">
                              <div class="price">
                                28,000 تومان
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="tab-3" class="tab-content">
                <div class="product-slide-6 product-m no-arrow">
                  <div>
                    <div class="product-box">
                      <div class="product-imgbox">
                        <div class="product-front">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/1.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-back">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/a1.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-icon icon-inline">
                          <button onclick="openCart()" class="tooltip-top" data-tippy-content="افزودن به سبد خرید">
                            <i data-feather="shopping-cart"></i>
                          </button>
                          <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                             data-tippy-content="افزودن به لیست علاقه مندی">
                            <i data-feather="heart"></i>
                          </a>
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                             class="tooltip-top" data-tippy-content="مشاهده سریع">
                            <i data-feather="eye"></i>
                          </a>
                          <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه">
                            <i data-feather="refresh-cw"></i>
                          </a>
                        </div>
                        <div class="new-label1">
                          <div>جدید</div>
                        </div>
                        <div class="on-sale1">
                          فروش ویژه
                        </div>
                      </div>
                      <div class="product-detail detail-inline ">
                        <div class="detail-title">
                          <div class="detail-left">
                            <div class="rating-star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(left-sidebar).html">
                              <h6 class="price-title">
                                گوشی موبایل
                              </h6>
                            </a>
                          </div>
                          <div class="detail-right">
                            <div class="check-price">
                              56,000 تومان
                            </div>
                            <div class="price">
                              <div class="price">
                                24,000 تومان
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="product-box">
                      <div class="product-imgbox">
                        <div class="product-front">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/2.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-back">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/a2.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-icon icon-inline">
                          <button onclick="openCart()" class="tooltip-top" data-tippy-content="افزودن به سبد خرید">
                            <i data-feather="shopping-cart"></i>
                          </button>
                          <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                             data-tippy-content="افزودن به لیست علاقه مندی">
                            <i data-feather="heart"></i>
                          </a>
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                             class="tooltip-top" data-tippy-content="مشاهده سریع">
                            <i data-feather="eye"></i>
                          </a>
                          <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه">
                            <i data-feather="refresh-cw"></i>
                          </a>
                        </div>
                        <div class="new-label1">
                          <div>جدید</div>
                        </div>
                      </div>
                      <div class="product-detail detail-inline">
                        <div class="detail-title">
                          <div class="detail-left">
                            <div class="rating-star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(left-sidebar).html">
                              <h6 class="price-title">
                                کیف زنانه
                              </h6>
                            </a>
                          </div>
                          <div class="detail-right">
                            <div class="check-price">
                              56,000 تومان
                            </div>
                            <div class="price">
                              <div class="price">
                                24,000 تومان
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="product-box">
                      <div class="product-imgbox">
                        <div class="product-front">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/4.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-back">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/a4.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-icon icon-inline">
                          <button onclick="openCart()" class="tooltip-top" data-tippy-content="افزودن به سبد خرید">
                            <i data-feather="shopping-cart"></i>
                          </button>
                          <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                             data-tippy-content="افزودن به لیست علاقه مندی">
                            <i data-feather="heart"></i>
                          </a>
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                             class="tooltip-top" data-tippy-content="مشاهده سریع">
                            <i data-feather="eye"></i>
                          </a>
                          <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه">
                            <i data-feather="refresh-cw"></i>
                          </a>
                        </div>
                      </div>
                      <div class="product-detail detail-inline">
                        <div class="detail-title">
                          <div class="detail-left">
                            <div class="rating-star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(left-sidebar).html">
                              <h6 class="price-title">
                                دوربین عکاسی
                              </h6>
                            </a>
                          </div>
                          <div class="detail-right">
                            <div class="check-price">
                              60,000 تومان
                            </div>
                            <div class="price">
                              <div class="price">
                                20,000 تومان
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="product-box">
                      <div class="product-imgbox">
                        <div class="product-front">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/5.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-back">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/a5.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-icon icon-inline">
                          <button onclick="openCart()" class="tooltip-top" data-tippy-content="افزودن به سبد خرید">
                            <i data-feather="shopping-cart"></i>
                          </button>
                          <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                             data-tippy-content="افزودن به لیست علاقه مندی">
                            <i data-feather="heart"></i>
                          </a>
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                             class="tooltip-top" data-tippy-content="مشاهده سریع">
                            <i data-feather="eye"></i>
                          </a>
                          <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه">
                            <i data-feather="refresh-cw"></i>
                          </a>
                        </div>
                        <div class="new-label1">
                          <div>جدید</div>
                        </div>
                        <div class="on-sale1">
                          فروش ویژه
                        </div>
                      </div>
                      <div class="product-detail detail-inline">
                        <div class="detail-title">
                          <div class="detail-left">
                            <div class="rating-star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(left-sidebar).html">
                              <h6 class="price-title">
                                لپ تاپ لنوو
                              </h6>
                            </a>
                          </div>
                          <div class="detail-right">
                            <div class="check-price">
                              70,000 تومان
                            </div>
                            <div class="price">
                              <div class="price">
                                30,000 تومان
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="product-box">
                      <div class="product-imgbox">
                        <div class="product-front">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/6.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-back">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/a6.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-icon icon-inline">
                          <button onclick="openCart()" class="tooltip-top" data-tippy-content="افزودن به سبد خرید">
                            <i data-feather="shopping-cart"></i>
                          </button>
                          <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                             data-tippy-content="افزودن به لیست علاقه مندی">
                            <i data-feather="heart"></i>
                          </a>
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                             class="tooltip-top" data-tippy-content="مشاهده سریع">
                            <i data-feather="eye"></i>
                          </a>
                          <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه">
                            <i data-feather="refresh-cw"></i>
                          </a>
                        </div>
                      </div>
                      <div class="product-detail detail-inline">
                        <div class="detail-title">
                          <div class="detail-left">
                            <div class="rating-star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(left-sidebar).html">
                              <h6 class="price-title">
                                کیف گوشی
                              </h6>
                            </a>
                          </div>
                          <div class="detail-right">
                            <div class="check-price">
                              100,000 تومان
                            </div>
                            <div class="price">
                              <div class="price">
                                80,000 تومان
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="product-box">
                      <div class="product-imgbox">
                        <div class="product-front">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/7.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-back">
                          <a href="product-page(left-sidebar).html">
                            <img src="{{ url('images/layout-2/product/a7.jpg') }}" class="img-fluid  " alt="product">
                          </a>
                        </div>
                        <div class="product-icon icon-inline">
                          <button onclick="openCart()" class="tooltip-top" data-tippy-content="افزودن به سبد خرید">
                            <i data-feather="shopping-cart"></i>
                          </button>
                          <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                             data-tippy-content="افزودن به لیست علاقه مندی">
                            <i data-feather="heart"></i>
                          </a>
                          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                             class="tooltip-top" data-tippy-content="مشاهده سریع">
                            <i data-feather="eye"></i>
                          </a>
                          <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه">
                            <i data-feather="refresh-cw"></i>
                          </a>
                        </div>
                      </div>
                      <div class="product-detail detail-inline">
                        <div class="detail-title">
                          <div class="detail-left">
                            <div class="rating-star">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <a href="product-page(left-sidebar).html">
                              <h6 class="price-title">
                                میز چوبی
                              </h6>
                            </a>
                          </div>
                          <div class="detail-right">
                            <div class="check-price">
                              90,000 تومان
                            </div>
                            <div class="price">
                              <div class="price">
                                28,000 تومان
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
            <h4>پیشنهاد های ویژه</h4>
          </div>
          <!--titel end-->
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
                              <img src="{{ url('uploads/product_images/'). '/' . $product->image. '.jpg' }}" alt="hot-deal"
                                   class="img-fluid  bg-img">
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
                              <h5 style="direction: rtl;">{{ $product->title }} </h5>
                            </a>
                            <ul class="rating">
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star-o"></i></li>
                            </ul>
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
                        <div><img src="{{ url('uploads/product_images/'). '/' . $product->image. '.jpg' }}" alt="hot-dea" class="img-fluid  "></div>
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
      <div class="line">
      </div>
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
                      <p>{{ mb_strimwidth($article->description,0,200,'---') }}</p>
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
        <div id="modal_loading"><i class="fa fa-circle-o-notch" id="modal_loading_icon"></i></div>
      </div>
    </div>
  </div>
  <!-- Quick-view modal popup end-->

@endsection

