@extends('site.layout.master')

@section('title')
  {{ __('Category Page') }}
@endsection

@section('content')
  <!-- breadcrumb start -->
  <div class="breadcrumb-main ">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumb-contain">
            <div>
              <h2>دسته بندی</h2>
              <ul>
                <li><a href="{{ route('home') }}">خانه</a></li>
                <li><i class="fa fa-angle-double-left"></i></li>
                <li>{{ $products[0]['category']->name_fa }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb End -->

  <!-- section start -->
  <section class="section-big-pt-space ratio_asos b-g-light">
    <div class="collection-wrapper">
      <div class="custom-container">
        <div class="row">
          <div class="col-sm-3 collection-filter category-page-side">
            <!-- side-bar colleps block stat -->
            <div class="collection-filter-block creative-card creative-inner category-side">
              <!-- brand filter start -->
              <div class="collection-mobile-back">
                <span class="filter-back"><i class="fa fa-angle-right" aria-hidden="true"></i> بازگشت</span></div>
              <div class="collection-collapse-block open">
                <h3 class="collapse-block-title mt-0">برند</h3>
                <div class="collection-collapse-block-content">
                  <div class="collection-brand-filter">
                    @foreach($brands as $brand)
                      <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                        <input type="checkbox" class="custom-control-input form-check-input" id="{{ $brand }}">
                        <label class="custom-control-label form-check-label" for="zara">{{ ucwords($brand) }}</label>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>

              <!-- price filter start here -->
              <div class="collection-collapse-block border-0 open">
                <h3 class="collapse-block-title">قیمت</h3>
                <div class="collection-collapse-block-content">
                  <div class="filter-slide">
                    <input class="js-range-slider" type="text" name="my_range" value="" data-type="double" />
                  </div>
                </div>
              </div>
            </div>
            <!-- silde-bar colleps block end here -->
            <!-- side-bar single product slider start -->
            <div class="theme-card creative-card creative-inner">
              <h5 class="title-border">محصولات جدید</h5>
              <div class="slide-1">
                <div>
                  <div class="media-banner plrb-0 b-g-white1 border-0">
                    @foreach($latest_mobile_products as $product)
                      <div class="media-banner-box">
                        <div class="media">
                          <a href="/product/{{ $product->id }}" tabindex="0">
                            <img src="{{ url('uploads/product_images'). '/' . $product->image }}" class="img-fluid " alt="banner" width="65">
                          </a>
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="product-detail">
                                  <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                  </ul>
                                  <a href="/product/{{ $product->id }}" tabindex="0">
                                    <p style="font-size: 75%;">{{ $product->title }}</p>
                                  </a>
                                  @if($product->main_price!==null)
                                    <h6>{{ $product->price }} تومان <span>{{ $product->main_price }}</span></h6>
                                    @else
                                    <h6>{{ $product->price }} تومان </h6>
                                  @endif
                                </div>
                                <div class="cart-info">
                                  <button class="tooltip-top add-cartnoty" data-tippy-content="افزودن به سبد خرید"> <svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-shopping-cart">
                                      <circle cx="9" cy="21" r="1"></circle>
                                      <circle cx="20" cy="21" r="1"></circle>
                                      <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg> </button>
                                  <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                                     data-tippy-content="افزودن به لیست علاقه مندی"><i data-feather="heart"
                                                                                       class="add-to-wish"></i></a>
                                  <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                                     class="tooltip-top" data-tippy-content="مشاهده سریع"><i data-feather="eye"></i></a>
                                  <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه"><i
                                            data-feather="refresh-cw"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
                <div>
                  <div class="media-banner plrb-0 b-g-white1 border-0">
                    @foreach($latest_mobile_products as $product)
                      <div class="media-banner-box">
                        <div class="media">
                          <a href="/product/{{ $product->id }}" tabindex="0">
                            <img src="{{ url('uploads/product_images'). '/' . $product->image }}" class="img-fluid " alt="banner" width="65">
                          </a>
                          <div class="media-body">
                            <div class="media-contant">
                              <div>
                                <div class="product-detail">
                                  <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                  </ul>
                                  <a href="/product/{{ $product->id }}" tabindex="0">
                                    <p style="font-size: 75%;">{{ $product->title }}</p>
                                  </a>
                                  @if($product->main_price!==null)
                                    <h6>{{ $product->price }} تومان <span>{{ $product->main_price }}</span></h6>
                                    @else
                                    <h6>{{ $product->price }} تومان </h6>
                                  @endif
                                </div>
                                <div class="cart-info">
                                  <button class="tooltip-top add-cartnoty" data-tippy-content="افزودن به سبد خرید"> <svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-shopping-cart">
                                      <circle cx="9" cy="21" r="1"></circle>
                                      <circle cx="20" cy="21" r="1"></circle>
                                      <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg> </button>
                                  <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                                     data-tippy-content="افزودن به لیست علاقه مندی"><i data-feather="heart"
                                                                                       class="add-to-wish"></i></a>
                                  <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                                     class="tooltip-top" data-tippy-content="مشاهده سریع"><i data-feather="eye"></i></a>
                                  <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه"><i
                                            data-feather="refresh-cw"></i></a>
                                </div>
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
            <!-- side-bar single product slider end -->
            <!-- side-bar banner start here -->
            <div class="collection-sidebar-banner">
              <a href="javascript:void(0)"><img src="{{ url('/images/category/side-banner.png') }}" class="img-fluid "
                                                alt=""></a>
            </div>
            <!-- side-bar banner end here -->
          </div>

          <div class="collection-content col">
            <div class="page-main-content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="top-banner-wrapper">
                    <a href="product-page(left-sidebar).html">
                      <img src="{{ url('/images/category/1.jpg') }}"
                           class="img-fluid  w-100" alt=""></a>
                    <div class="top-banner-content small-section">
                      <h4>مُد</h4>
                      <h5>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی
                      </h5>
                      <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با
                        تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم
                        ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                        سادگی نامفهوم، لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم
                        متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با تولید سادگی
                        نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                        ساختگی با تولید سادگی نامفهوم.</p>
                    </div>
                  </div>
                  <div class="collection-product-wrapper">
                    <div class="product-top-filter">
                      <div class="container-fluid p-0">
                        <div class="row">
                          <div class="col-xl-12">
                            <div class="filter-main-btn ">
                              <span class="filter-btn ">
                                <i class="fa fa-filter" aria-hidden="true"></i> فیلتر
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 position-relative">
                            <div class="product-filter-content horizontal-filter-mian ">
                              <div class="horizontal-filter-toggle">
                                <h4><i data-feather="filter"></i>فیلتر</h4>
                              </div>

                              <div class="horizontal-filter collection-filter">
                                <div class="horizontal-filter-contain">
                                  <div class="collection-mobile-back"><span class="filter-back"><i
                                              class="fa fa-angle-right" aria-hidden="true"></i> بازگشت</span></div>
                                  <div class="filter-group">
                                    <div class="collection-collapse-block">
                                      <h6 class="collapse-block-title">انتخاب رنگ</h6>
                                      <div class="collection-collapse-block-content">
                                        <div class="color-selector">
                                          <ul>
                                            <li>
                                              <div class="color-1 active"></div> سفید(14)
                                            </li>
                                            <li>
                                              <div class="color-2"></div> قهوه ای(24)
                                            </li>
                                            <li>
                                              <div class="color-3"></div> قرمز(18)
                                            </li>
                                            <li>
                                              <div class="color-4"></div> بنفش(10)
                                            </li>
                                            <li>
                                              <div class="color-5"></div> کله غازی(9)
                                            </li>
                                            <li>
                                              <div class="color-6"></div> صورتی(11)
                                            </li>
                                            <li>
                                              <div class="color-7"></div> نارنجی(15)
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="filter-group">
                                    <div class="collection-collapse-block">
                                      <h6 class="collapse-block-title">انتخاب رنگ</h6>
                                      <div class="collection-collapse-block-content">
                                        <div class="size-selector">
                                          <div class="collection-brand-filter">
                                            <div
                                                    class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                              <input type="checkbox" class="custom-control-input form-check-input"
                                                     id="xssmall">
                                              <label class="custom-control-label form-check-label"
                                                     for="xssmall">xs</label>
                                            </div>
                                            <div
                                                    class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                              <input type="checkbox" class="custom-control-input form-check-input"
                                                     id="small">
                                              <label class="custom-control-label form-check-label" for="small">s</label>
                                            </div>
                                            <div
                                                    class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                              <input type="checkbox" class="custom-control-input form-check-input"
                                                     id="mediam">
                                              <label class="custom-control-label form-check-label"
                                                     for="mediam">m</label>
                                            </div>
                                            <div
                                                    class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                              <input type="checkbox" class="custom-control-input form-check-input"
                                                     id="large">
                                              <label class="custom-control-label form-check-label" for="large">l</label>
                                            </div>
                                            <div
                                                    class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                              <input type="checkbox" class="custom-control-input form-check-input"
                                                     id="extralarge">
                                              <label class="custom-control-label form-check-label"
                                                     for="extralarge">xl</label>
                                            </div>
                                            <div
                                                    class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                              <input type="checkbox" class="custom-control-input form-check-input"
                                                     id="2extralarge">
                                              <label class="custom-control-label form-check-label"
                                                     for="2extralarge">2xl</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="filter-group">
                                    <div class="collection-collapse-block">
                                      <h6 class="collapse-block-title">انتخاب قیمت</h6>
                                      <div class="collection-collapse-block-content">
                                        <div class="size-selector">
                                          <div class="collection-brand-filter">
                                            <div
                                                    class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                              <input type="checkbox" class="custom-control-input form-check-input"
                                                     id="hundred">
                                              <label class="custom-control-label form-check-label" for="hundred">10 تا
                                                100 هزار
                                                تومان</label>
                                            </div>
                                            <div
                                                    class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                              <input type="checkbox" class="custom-control-input form-check-input"
                                                     id="twohundred">
                                              <label class="custom-control-label form-check-label" for="twohundred">100
                                                تا 200 هزار
                                                تومان</label>
                                            </div>
                                            <div
                                                    class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                              <input type="checkbox" class="custom-control-input form-check-input"
                                                     id="threehundred">
                                              <label class="custom-control-label form-check-label"
                                                     for="threehundred">200 تا 300 هزار
                                                تومان</label>
                                            </div>
                                            <div
                                                    class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                              <input type="checkbox" class="custom-control-input form-check-input"
                                                     id="fourhundred">
                                              <label class="custom-control-label form-check-label" for="fourhundred">300
                                                تا 400 هزار
                                                تومان</label>
                                            </div>
                                            <div
                                                    class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                              <input type="checkbox" class="custom-control-input form-check-input"
                                                     id="fourhundredabove">
                                              <label class="custom-control-label form-check-label"
                                                     for="fourhundredabove">بیشتر از 400 هزار
                                                تومان</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="filter-group">
                                    <div class="collection-collapse-block">
                                      <h6 class="collapse-block-title">انتخاب برند</h6>
                                      <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter">
                                          <div
                                                  class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input form-check-input"
                                                   id="zara">
                                            <label class="custom-control-label form-check-label" for="zara">زارا</label>
                                          </div>
                                          <div
                                                  class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input form-check-input"
                                                   id="vera-moda">
                                            <label class="custom-control-label form-check-label"
                                                   for="vera-moda">سامسونگ</label>
                                          </div>
                                          <div
                                                  class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input form-check-input"
                                                   id="forever-21">
                                            <label class="custom-control-label form-check-label" for="forever-21">ال سی
                                              من</label>
                                          </div>
                                          <div
                                                  class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input form-check-input"
                                                   id="roadster">
                                            <label class="custom-control-label form-check-label"
                                                   for="roadster">هوآوی</label>
                                          </div>
                                          <div
                                                  class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input form-check-input"
                                                   id="only">
                                            <label class="custom-control-label form-check-label"
                                                   for="only">اسنوا</label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <a href="javascript:void(0)" class="btn btn-solid btn-sm close-filter"> بستن فیلتر</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row w-100 text-center mt-2">
                      <ul class="sorting-options">
                        <li class="sorting-option">{{ __('Sorting By: ') }}</li>
                        <li class="sorting-option"><a href="#" class="sorting-option-btn active" data-sort="22">مرتبط ترین</a></li>
                        <li class="sorting-option"><a href="#" class="sorting-option-btn" data-sort="22">محبوب‌ترین</a></li>
                        <li class="sorting-option"><a href="#" class="sorting-option-btn" data-sort="4" class="is-active">پربازدیدترین</a></li>
                        <li class="sorting-option"><a href="#" class="sorting-option-btn" data-sort="cheap">ارزان‌ترین</a></li>
                        <li class="sorting-option"><a href="#" class="sorting-option-btn" data-sort="expensive">گران‌ترین</a></li>
                      </ul>
                    </div>

                    <div class="product-wrapper-grid product">
                      <div class="row">
                        @foreach($products as $product)
                          <div class="col-lg-3 col-grid-box">
                            <div class="product-box">
                              <div class="product-imgbox">
                                <div class="product-front">
                                  <a href="/product/{{ $product->id }}">
                                    <img src="{{ url('uploads/product_images'). '/' . $product->image }}" class="img-fluid" alt="product">
                                  </a>
                                </div>
                                <div class="product-back">
                                  <a href="/product/{{ $product->id }}">
                                    <img src="{{ url('uploads/product_images'). '/' . $product->image }}" class="img-fluid " alt="product">
                                  </a>
                                </div>
                              </div>
                              <div class="product-detail detail-center detail-inverse">
                                <div class="detail-title">
                                  <div class="detail-left">
                                    <div class="rating-star"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                              class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    </div>
                                    <p>{{ mb_strimwidth($product->decription,0,100,'---') }}</p>
                                    <a href="/product/{{ $product->id }}">
                                      <h6 class="price-title">{{ $product->title }}</h6>
                                    </a>
                                  </div>
                                  <div class="detail-right">
                                    @if($product->main_price!==null)
                                      <div class="check-price digits"> {{ $product->main_price }} تومان </div>
                                    @endif
                                    <div class="price">
                                      <div class="price digits"> {{ $product->price }} تومان </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="icon-detail">
                                  <button class="tooltip-top add-cartnoty" data-tippy-content="افزودن به سبد خرید"> <i
                                            data-feather="shopping-cart"></i> </button>
                                  <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                                     data-tippy-content="افزودن به لیست علاقه مندی"> <i data-feather="heart"></i> </a>
                                  <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                                     class="tooltip-top" data-tippy-content="مشاهده سریع"> <i data-feather="eye"></i> </a>
                                  <a href="#" class="tooltip-top add-to-compare" data-id="{{ $product->id }}" data-tippy-content="مقایسه"> <i
                                            data-feather="refresh-cw"></i> </a>
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
        </div>
      </div>
    </div>
  </section>
  <!-- section End -->




@endsection


@section('productsByCategory')
  <script type="text/javascript">
    const publicDir = '/uploads/product_images';
    const productsCount = <?= $products_count ?>;
    const productsPerPage = <?= Config::get('constants.catProductsPerPage') ?>;
  </script>
  <script type="text/javascript" src="{{ url('js/custom/products_by_category.js') }}"></script>
@endsection