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
                <span class="filter-back"><i class="fa fa-angle-right" aria-hidden="true"></i>بازگشت</span></div>
              @if(sizeof($brands)!==0 && (sizeof($brands)!==1 && $brands[0]!=null))
                <div class="collection-collapse-block open">
                  <h3 class="collapse-block-title mt-0">برند</h3>
                  <div class="collection-collapse-block-content">
                    <div class="collection-brand-filter">
                      @foreach($brands as $brand)
                        <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                          <input type="checkbox" class="custom-control-input form-check-input brands-filter"
                                 id="brand_{{ $brand }}" data-brand="{{ $brand }}">
                          <label class="custom-control-label form-check-label" for="brand_{{ $brand }}">
                            {{ ucwords($brand) }}
                          </label>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
            @endif
            <!-- price filter start here -->
              <div class="collection-collapse-block border-0">
                <h3 class="collapse-block-title">قیمت</h3>
                <div class="collection-collapse-block-content">
                  <div class="filter-slide">
                    <input class="js-range-slider price-range" type="text" name="my_range" value="" data-type="double" />
                  </div>
                </div>
              </div>
              <div class="collection-collapse-block border-0">
                <h3 class="collapse-block-title">وضعیت موجودی</h3>
                <div class="collection-collapse-block-content mt-2">
                  <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                    <input type="checkbox" class="custom-control-input form-check-input" id="status_checkbox">
                    <label class="custom-control-label form-check-label" for="status_checkbox">{{ __('Only Available Products') }}</label>
                  </div>
                </div>
              </div>


              <button class="btn btn-success btn-outline category-apply-filters w-100 mt-4 p-1">
                {{ __('Apply Filters') }}
              </button>
              <button class="btn btn-danger btn-outline category-reset-filters w-100 mt-2 p-1">
                {{ __('Reset Filters') }}
              </button>

            </div>
            <!-- silde-bar colleps block end here -->
            <!-- side-bar single product slider start -->
            <div class="theme-card creative-card creative-inner">
              <h5 class="title-border">محصولات جدید</h5>
              <div class="slide-1">
                <div>
                  <div class="media-banner plrb-0 b-g-white1 border-0">
                    @foreach($latest_mobile_accessories_products as $product)
                      <div class="media-banner-box">
                        <div class="media">
                          <a href="/product/{{ $product->id }}" tabindex="0">
                            <img src="{{ url('uploads/productImages'). '/' . $product->image . '.webp' }}" class="img-fluid " alt="banner" width="65">
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
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @else
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @endif
                                </div>
                                <div class="cart-info">
                                  <a href="{{ $product->url }}" class="tooltip-top add-cartnoty" data-tippy-content="افزودن به سبد خرید">
                                    <i data-feather="shopping-cart"></i>
                                  </a>
                                  <a href="#" class="add-to-wish tooltip-top" onclick="addToWish(event,{{ $product->id }})" data-tippy-content="افزودن به لیست علاقه مندی"><i data-feather="heart"></i></a>
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" onclick="viewModal({{ $product->id }})"
                                     class="tooltip-top" data-tippy-content="مشاهده سریع"><i data-feather="eye"></i></a>
                                  <a href="#" class="tooltip-top" onclick="addToCompare(event,{{ $product->id }})" data-tippy-content="مقایسه"><i
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
                    @foreach($latest_computer_parts_products as $product)
                      <div class="media-banner-box">
                        <div class="media">
                          <a href="/product/{{ $product->id }}" tabindex="0">
                            <img src="{{ url('uploads/productImages'). '/' . $product->image . '.webp' }}" class="img-fluid " alt="banner" width="65">
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
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @else
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @endif
                                </div>
                                <div class="cart-info">
                                  <a href="{{ $product->url }}" class="tooltip-top add-cartnoty" data-tippy-content="افزودن به سبد خرید">
                                    <i data-feather="shopping-cart"></i>
                                  </a>
                                  <a href="#" class="add-to-wish tooltip-top" onclick="addToWish(event,{{ $product->id }})" data-tippy-content="افزودن به لیست علاقه مندی"><i data-feather="heart"></i></a>
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" onclick="viewModal({{ $product->id }})"
                                     class="tooltip-top" data-tippy-content="مشاهده سریع"><i data-feather="eye"></i></a>
                                  <a href="#" class="tooltip-top" onclick="addToCompare(event,{{ $product->id }})" data-tippy-content="مقایسه"><i
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
                    @foreach($latest_laptop_accessories_products as $product)
                      <div class="media-banner-box">
                        <div class="media">
                          <a href="/product/{{ $product->id }}" tabindex="0">
                            <img src="{{ url('uploads/productImages'). '/' . $product->image . '.webp' }}" class="img-fluid " alt="banner" width="65">
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
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @else
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @endif
                                </div>
                                <div class="cart-info">
                                  <a href="{{ $product->url }}" class="tooltip-top add-cartnoty" data-tippy-content="افزودن به سبد خرید">
                                    <i data-feather="shopping-cart"></i>
                                  </a>
                                  <a href="#" class="add-to-wish tooltip-top" onclick="addToWish(event,{{ $product->id }})" data-tippy-content="افزودن به لیست علاقه مندی"><i data-feather="heart"></i></a>
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" onclick="viewModal({{ $product->id }})"
                                     class="tooltip-top" data-tippy-content="مشاهده سریع"><i data-feather="eye"></i></a>
                                  <a href="#" class="tooltip-top" onclick="addToCompare(event,{{ $product->id }})" data-tippy-content="مقایسه"><i
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
                    @foreach($latest_wearable_gadget_products as $product)
                      <div class="media-banner-box">
                        <div class="media">
                          <a href="/product/{{ $product->id }}" tabindex="0">
                            <img src="{{ url('uploads/productImages'). '/' . $product->image . '.webp' }}" class="img-fluid " alt="banner" width="65">
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
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @else
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @endif
                                </div>
                                <div class="cart-info">
                                  <a href="{{ $product->url }}" class="tooltip-top add-cartnoty" data-tippy-content="افزودن به سبد خرید">
                                    <i data-feather="shopping-cart"></i>
                                  </a>
                                  <a href="#" class="add-to-wish tooltip-top" onclick="addToWish(event,{{ $product->id }})" data-tippy-content="افزودن به لیست علاقه مندی"><i data-feather="heart"></i></a>
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" onclick="viewModal({{ $product->id }})"
                                     class="tooltip-top" data-tippy-content="مشاهده سریع"><i data-feather="eye"></i></a>
                                  <a href="#" class="tooltip-top" onclick="addToCompare(event,{{ $product->id }})" data-tippy-content="مقایسه"><i
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
                    @foreach($latest_tablet_products as $product)
                      <div class="media-banner-box">
                        <div class="media">
                          <a href="/product/{{ $product->id }}" tabindex="0">
                            <img src="{{ url('uploads/productImages'). '/' . $product->image . '.webp' }}" class="img-fluid " alt="banner" width="65">
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
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @else
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @endif
                                </div>
                                <div class="cart-info">
                                  <a href="{{ $product->url }}" class="tooltip-top add-cartnoty" data-tippy-content="افزودن به سبد خرید">
                                    <i data-feather="shopping-cart"></i>
                                  </a>
                                  <a href="#" class="add-to-wish tooltip-top" onclick="addToWish(event,{{ $product->id }})" data-tippy-content="افزودن به لیست علاقه مندی"><i data-feather="heart"></i></a>
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" onclick="viewModal({{ $product->id }})"
                                     class="tooltip-top" data-tippy-content="مشاهده سریع"><i data-feather="eye"></i></a>
                                  <a href="#" class="tooltip-top" onclick="addToCompare(event,{{ $product->id }})" data-tippy-content="مقایسه"><i
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
                    @foreach($latest_laptop_products as $product)
                      <div class="media-banner-box">
                        <div class="media">
                          <a href="/product/{{ $product->id }}" tabindex="0">
                            <img src="{{ url('uploads/productImages'). '/' . $product->image . '.webp' }}" class="img-fluid " alt="banner" width="65">
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
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @else
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @endif
                                </div>
                                <div class="cart-info">
                                  <a href="{{ $product->url }}" class="tooltip-top add-cartnoty" data-tippy-content="افزودن به سبد خرید">
                                    <i data-feather="shopping-cart"></i>
                                  </a>
                                  <a href="#" class="add-to-wish tooltip-top" onclick="addToWish(event,{{ $product->id }})" data-tippy-content="افزودن به لیست علاقه مندی"><i data-feather="heart"></i></a>
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" onclick="viewModal({{ $product->id }})"
                                     class="tooltip-top" data-tippy-content="مشاهده سریع"><i data-feather="eye"></i></a>
                                  <a href="#" class="tooltip-top" onclick="addToCompare(event,{{ $product->id }})" data-tippy-content="مقایسه"><i
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
                    @foreach($latest_office_machines_products as $product)
                      <div class="media-banner-box">
                        <div class="media">
                          <a href="/product/{{ $product->id }}" tabindex="0">
                            <img src="{{ url('uploads/productImages'). '/' . $product->image . '.webp' }}" class="img-fluid " alt="banner" width="65">
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
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @else
                                    <h6 class="digits">{{ $product->price }} تومان </h6>
                                  @endif
                                </div>
                                <div class="cart-info">
                                  <a href="{{ $product->url }}" class="tooltip-top add-cartnoty" data-tippy-content="افزودن به سبد خرید">
                                    <i data-feather="shopping-cart"></i>
                                  </a>
                                  <a href="#" class="add-to-wish tooltip-top" onclick="addToWish(event,{{ $product->id }})" data-tippy-content="افزودن به لیست علاقه مندی"><i data-feather="heart"></i></a>
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" onclick="viewModal({{ $product->id }})"
                                     class="tooltip-top" data-tippy-content="مشاهده سریع"><i data-feather="eye"></i></a>
                                  <a href="#" class="tooltip-top" onclick="addToCompare(event,{{ $product->id }})" data-tippy-content="مقایسه"><i
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
                                              class="fa fa-angle-right" aria-hidden="true"></i> بازگشت</span>
                                  </div>

                                  <div class="filter-group">
                                    <div class="collection-collapse-block">
                                      @if(sizeof($brands)!==0 && (sizeof($brands)!==1 && $brands[0]!=null))
                                        <div class="collection-collapse-block open">
                                          <h3 class="collapse-block-title mt-0">برند</h3>
                                          <div class="collection-collapse-block-content">
                                            <div class="collection-brand-filter">
                                              @foreach($brands as $brand)
                                                <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                                  <input type="checkbox" class="custom-control-input form-check-input brands-filter" id="brand_{{ $brand }}" data-brand="{{ $brand }}">
                                                  <label class="custom-control-label form-check-label" for="brand_{{ $brand }}">{{ ucwords($brand) }}</label>
                                                </div>
                                              @endforeach
                                            </div>
                                          </div>
                                        </div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="filter-group">
                                    <div class="collection-collapse-block">
                                      <h3 class="collapse-block-title">قیمت</h3>
                                      <div class="collection-collapse-block-content">
                                        <div class="filter-slide">
                                          <input class="js-range-slider price-range" type="text" name="my_range" value="" data-type="double" />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="filter-group">
                                    <div class="collection-collapse-block">
                                      <div class="collection-collapse-block-content mt-2">
                                        <div class="custom-control custom-checkbox  form-check collection-filter-checkbox">
                                          <input type="checkbox" class="custom-control-input form-check-input" id="status_checkbox">
                                          <label class="custom-control-label form-check-label" for="status_checkbox">{{ __('Only Available Products') }}</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="filter-group">
                                    <button onclick="closeSidebarFilter()"
                                            class="btn-success btn-outline category-apply-filters w-100 mt-4 p-1 mobile-submit-filter-btn">
                                      {{ __('Apply Filters') }}
                                    </button>
                                    <button class="btn-danger btn-outline category-reset-filters w-100 mt-2 p-1">
                                      {{ __('Reset Filters') }}
                                    </button>
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
                        <li class="sorting-option">
                          <a href="#" class="sorting-option-btn <?= ((isset($_GET['sortBy']) && $_GET['sortBy']=='latest') || !isset($_GET['sortBy']))? 'active' : '' ?>"
                             data-sort="latest">جدیدترین</a>
                        </li>
                        <li class="sorting-option">
                          <a href="#" class="sorting-option-btn sorting-option-btn <?= (isset($_GET['sortBy']) && $_GET['sortBy']=='cheap')? 'active' : '' ?>"
                             data-sort="cheap">ارزان‌ترین</a></li>
                        <li class="sorting-option">
                          <a href="#" class="sorting-option-btn sorting-option-btn <?= (isset($_GET['sortBy']) && $_GET['sortBy']=='expensive')? 'active' : '' ?>"
                             data-sort="expensive">گران‌ترین</a></li>
                        <li class="sorting-option">
                          <a href="#" class="sorting-option-btn sorting-option-btn <?= (isset($_GET['sortBy']) && $_GET['sortBy']=='most_viewed')? 'active' : '' ?>"
                             data-sort="most_viewed">پربازدیدترین</a></li>
                      </ul>
                    </div>

                    <div class="product-wrapper-grid product">
                      <div class="row">
                        @if(sizeof($products)!==0)
                          @foreach($products as $product)
                            <div class="col-lg-3 col-grid-box">
                              <div class="product-box">
                                <div class="product-imgbox">
                                  <div class="product-front">
                                    <a href="/product/{{ $product->id }}">
                                      <img src="{{ url('uploads/productImages'). '/' . $product->image . '.webp' }}" class="img-fluid" alt="product">
                                    </a>
                                  </div>
                                  <div class="product-back">
                                    <a href="/product/{{ $product->id }}">
                                      <img src="{{ url('uploads/productImages'). '/' . $product->image . '.webp' }}" class="img-fluid " alt="product">
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
                                      <div class="price text-center mx-0 my-2 w-100" style="font-weight: bold;">
                                        @if($product->status=='not-available')
                                          <div class="text-danger"> {{ __('Not Available') }} </div>
                                        @else
                                          <div class="digits"> {{ $product->price }} تومان </div>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                  <div class="icon-detail">
                                    <a href="{{ $product->url }}" class="tooltip-top add-cartnoty" data-tippy-content="{{ __('Add To Cart') }}"> <i
                                              data-feather="shopping-cart"></i> </a>
                                    <a href="#" class="add-to-wish tooltip-top" onclick="addToWish(event,{{ $product->id }})"
                                       data-tippy-content="افزودن به لیست علاقه مندی"> <i data-feather="heart"></i> </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" onclick="viewModal({{ $product->id }})"
                                       class="tooltip-top" data-tippy-content="مشاهده سریع"> <i data-feather="eye"></i> </a>
                                    <a href="#" class="tooltip-top add-to-compare" onclick="addToCompare(event,{{ $product->id }})" data-tippy-content="مقایسه"> <i
                                              data-feather="refresh-cw"></i> </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endforeach
                        @else
                          <div class="alert alert-warning">{{ __('No product in this category') }}</div>
                        @endif
                      </div>
                      <div class="bottomLoader text-center mt-5"><i class="fa fa-spinner fa-pulse fa-3x"></i></div>
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


@section('productsByCategory')
  <!-- range sldier -->
  <script src="{{ url('js/ion.rangeSlider.js') }}"></script>


  <script type="application/ld+json" id="json_content">
    {
      "publicDir" : "/uploads/productImages",
      "productsCount" : <?= $products_count ?>,
      "productsPerPage" : <?= Config::get('constants.catProductsPerPage') ?>,
      "priceMin" : <?= $priceMin ?>,
      "priceMax" : <?= $priceMax ?>
    }
  </script>
  <script type="text/javascript" src="{{ url('/libs/js/products_by_category.js') }}"></script>

@endsection