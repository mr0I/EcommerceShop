@extends('site.layout.master')

@section('title')
  صفحه اصلی
@endsection

@section('content')

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
                              <img src="{{ $product->image }}" class="img-fluid  " alt="product">
                            </a>
                          </div>
                          <div class="product-back">
                            <a href="/product/{{ $product->id }}">
                              <img src="{{ $product->image }}" class="img-fluid  " alt="product">
                            </a>
                          </div>
                          <div class="product-icon icon-inline">

                            <a href="{{ $product->url }}" class="add-to-wish tooltip-top" target="_blank" rel="noreferrer noopener"
                               data-tippy-content="خرید">
                              <i data-feather="shopping-cart"></i>
                            </a>
                            <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                               data-tippy-content="افزودن به لیست علاقه مندی">
                              <i data-feather="heart"></i>
                            </a>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                               class="tooltip-top" data-tippy-content="مشاهده سریع">
                              <i data-feather="eye"></i>
                            </a>
                            <a href="#" class="add-to-compare tooltip-top" data-id="{{ $product->id }}" data-tippy-content="مقایسه">
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
  <section class="deal-banner">
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
  <section class="hot-deal hotdeal-first b-g-white section-big-pb-space space-abjust">
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
                              <img src="{{ $product->image }}" alt="hot-deal"
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
                        <div><img src="{{ $product->image }}" alt="hot-dea" class="img-fluid  "></div>
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


  <!-- title start -->
  <div class="title4 b-g-white text-left">
    <h3>آخرین اخبار ما</h3>
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
            <div>
              <div class="blog-contain blog-border">
                <div class="blog-img">
                  <a href="blog-details.html">
                    <img src="{{ url('images/marketplace/blog/1.jpg') }}" alt="blog" class="img-fluid w-100">
                  </a>
                </div>
                <div class="blog-details-2">
                  <a href="blog-details.html">
                    <h4>پیشرفت در بازار دیجیتال </h4>
                  </a>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                    سادگی نامفهوم، لورم ایپسوم.</p>
                  <a href="blog-details.html" class=" btn btn-rounded  btn-xs">
                    مطالعه بیشتر
                  </a>
                </div>
                <div class="blog-label1">27 <br>مهر</div>
              </div>
            </div>
            <div>
              <div class="blog-contain blog-border">
                <div class="blog-img">
                  <a href="blog-details.html">
                    <img src="{{ url('images/marketplace/blog/2.jpg') }}" alt="blog" class="img-fluid w-100">
                  </a>
                </div>
                <div class="blog-details-2">
                  <a href="blog-details.html">
                    <h4>آموزش طراحی قالب فروشگاهی </h4>
                  </a>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                    سادگی نامفهوم، لورم ایپسوم.</p>
                  <a href="blog-details.html" class=" btn btn-rounded  btn-xs">
                    مطالعه بیشتر
                  </a>
                </div>
                <div class="blog-label1">27 <br>مهر</div>
              </div>
            </div>
            <div>
              <div class="blog-contain blog-border">
                <div class="blog-img">
                  <a href="blog-details.html">
                    <img src="{{ url('images/marketplace/blog/3.jpg') }}" alt="blog" class="img-fluid w-100">
                  </a>
                </div>
                <div class="blog-details-2">
                  <a href="blog-details.html">
                    <h4>راهنمای طراحی گرافیک </h4>
                  </a>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                    سادگی نامفهوم، لورم ایپسوم.</p>
                  <a href="blog-details.html" class=" btn btn-rounded  btn-xs">
                    مطالعه بیشتر
                  </a>
                </div>
                <div class="blog-label1">27 <br>مهر</div>
              </div>
            </div>
            <div>
              <div class="blog-contain blog-border">
                <div class="blog-img">
                  <a href="blog-details.html">
                    <img src="{{ url('images/marketplace/blog/4.jpg') }}" alt="blog" class="img-fluid w-100">
                  </a>
                </div>
                <div class="blog-details-2">
                  <a href="blog-details.html">
                    <h4>5 رازی که باید بدانید</h4>
                  </a>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                    سادگی نامفهوم، لورم ایپسوم.</p>
                  <a href="blog-details.html" class=" btn btn-rounded  btn-xs">
                    مطالعه بیشتر
                  </a>
                </div>
                <div class="blog-label1">27 <br>مهر</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--blog end-->
@endsection

