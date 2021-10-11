@extends('site.layout.master')

@section('title')
  @if($product !== null)
    {{ $product->title }}
  @else
    صفحه محصول
  @endif
@endsection

@section('content')

  @if($product === null)
    <div class="alert alert-danger">محصول موردنظر یافت نشد</div>
  @endif


  @if (\Session::has('review_error'))
    {{--<script>{{ \Session::get('review_error') }}</script>--}}
    <script type="text/javascript">
        alert('Error');
    </script>
  @endif
  @if (\Session::has('review_success'))
    {{--<script>{{ \Session::get('review_error') }}</script>--}}
    <script type="text/javascript">
        alert('Success');
    </script>
  @endif


  @if($product !== null)
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="breadcrumb-contain">
              <div>
                {{--<h2>محصول</h2>--}}
                <ul>
                  <li><a href="/">خانه</a></li>
                  <li><i class="fa fa-angle-double-left"></i></li>
                  <li><a href="{{ url('category' , $product->category['name']) }}">{{ $product->category['name_fa'] }}</a></li>
                  <li><i class="fa fa-angle-double-left"></i></li>
                  <li>{{ $product->title }}</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="section-big-pt-space b-g-light">
      <div class="collection-wrapper">
        <div class="custom-container">
          <div class="row">
            <div class="col-lg-4">
              <div class="product-slick">
                <div><img src="{{ url('uploads/product_images'). '/' . $product->image . '.jpg' }}" alt="" class="img-fluid  image_zoom_cls-0"></div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="product-right product-description-box ">
                <div class="pro-group">
                  <h2>{{ $product->title }}</h2>
                  <ul class="pro-price">
                    @if($product->price==0)
                      <li class="text-danger">{{ __('Not Available') }} </li>
                    @else
                      <li class="digits">{{ $product->price }} تومان</li>
                    @endif
                    @if($product->main_price!==null && $product->main_price!=='')
                      @php
                        $discount = \App\Helpers\functions::calcDiscount($product->main_price,$product->price);
                      @endphp
                      <li><span class="digits">{{ $product->main_price }} تومان</span></li>
                      <li>{{ $discount }}% تخفیف</li>
                    @endif
                  </ul>
                  <ul class="best-seller">
                    <li>
                      <svg enable-background="new 0 0 497 497" viewBox="0 0 497 497" xmlns="http://www.w3.org/2000/svg">
                        <g>
                          <path
                                  d="m329.63 405.42-.38.43c-10.048 19.522-48.375 35.567-80.775 35.607-24.881 0-53.654-9.372-71.486-20.681-5.583-3.54-2.393-10.869-6.766-15.297l19.149-5.13c3.76-1.22 6.46-4.54 6.87-8.47l8.574-59.02 82.641-2.72 12.241 28.06.837 8.668-1.844 9.951 3.456 6.744.673 6.967c.41 3.93 3.11 7.25 6.87 8.47z"
                                  fill="#f2d1a5" />
                          <path
                                  d="m420.39 497h-343.78c-6.21 0-7.159-6.156-6.089-12.266l2.53-14.57c3.82-21.96 16.463-37.323 37.683-44.153l27.702-8.561 28.754-8.035c18.34 18.57 48.615 27.957 81.285 27.957 32.4-.04 61.709-8.478 80.259-26.809l.38-.43 31.486 5.256 26.39 8.5c21.22 6.83 36.9 24.87 40.72 46.83l2.53 14.57c1.07 6.111-3.64 11.711-9.85 11.711z"
                                  fill="#7e8b96" />
                          <g>
                            <path
                                    d="m384.055 215c-2.94 43.71-18.85 104.74-24.92 130.96-.68 2.94-2.33 5.45-4.56 7.22-2.23 1.78-5.05 2.82-8.06 2.82-6.88 0-12.55-5.37-12.94-12.23 0 0-5.58-84.28-7.63-128.77z"
                                    fill="#dc4955" />
                          </g>
                          <path
                                  d="m141 271c-27.062 0-49-21.938-49-49 0-11.046 8.954-20 20-20h8.989l240.468-6.287 8.293 6.287h15.25c11.046 0 20 8.954 20 20 0 27.062-21.938 49-49 49z"
                                  fill="#f2bb88" />
                          <path
                                  d="m360.6 415.39-.06.09c-49.3 66.23-174.56 66.38-223.76.56l-.43-.63 18.171-1.91 12.669-8.02c18.34 18.57 48.41 29.8 81.08 29.8h.15c32.4-.04 62.28-11.1 80.83-29.43l.38-.43z"
                                  fill="#a9a4d3" />
                          <path
                                  d="m147.8 418.394v10.136l-32.89 10.59c-15.6 5.02-27.05 18.18-29.86 34.34l-3.59 23.54h-4.85c-6.21 0-10.92-5.6-9.85-11.71l2.53-14.57c3.82-21.96 19.5-40 40.72-46.83l26.34-8.48z"
                                  fill="#64727a" />
                          <path
                                  d="m182.19 417.45-34.39 11.08c-3.99-3.86-7.68-8.02-11.02-12.49l-.43-.63 30.84-9.93c1.828 1.848 10.344.351 12.353 2.02 2.928 2.433-.561 7.928 2.647 9.95z"
                                  fill="#938dc8" />
                          <path
                                  d="m299.7 358.2-2.71-28.06-79.861 2.255.001-.005-16.48.47-2.98 26.56-.763 6.8 2.039 12.83-3.989 4.55-.778 6.93c-.41 3.93-3.11 7.25-6.87 8.47l-20.12 6.48c4.37 4.43 9.41 8.44 15 11.97l10.02-3.22c9.79-3.17 16.79-11.79 17.88-21.97l2.058-17.506c.392-3.33 3.888-5.367 6.958-4.02 11.414 5.008 21.565 7.765 28.393 7.765 11.322.001 31.852-7.509 52.202-20.299z"
                                  fill="#f2bb88" />
                          <path
                                  d="m134.539 164.427s-.849 18.411-.849 33.002c0 38.745 9.42 76.067 25.701 105.572 20.332 36.847 72.609 61.499 88.109 61.499s68.394-24.653 89.275-61.499c14.137-24.946 23.338-55.482 25.843-87.741.458-5.894-9.799-20.073-9.799-26.058l10.491-24.775c0-38.422-36.205-111.427-114.81-111.427s-113.961 73.005-113.961 111.427z"
                                  fill="#f2d1a5" />
                          <g>
                            <path
                                    d="m294 227.5c-4.142 0-7.5-3.358-7.5-7.5v-15c0-4.142 3.358-7.5 7.5-7.5s7.5 3.358 7.5 7.5v15c0 4.142-3.358 7.5-7.5 7.5z"
                                    fill="#64727a" />
                          </g>
                          <g>
                            <path
                                    d="m203 227.5c-4.142 0-7.5-3.358-7.5-7.5v-15c0-4.142 3.358-7.5 7.5-7.5s7.5 3.358 7.5 7.5v15c0 4.142-3.358 7.5-7.5 7.5z"
                                    fill="#64727a" />
                          </g>
                          <g>
                            <path
                                    d="m249 260.847c-5.976 0-11.951-1.388-17.398-4.163-3.691-1.88-5.158-6.397-3.278-10.087 1.88-3.691 6.398-5.158 10.087-3.278 6.631 3.379 14.547 3.379 21.178 0 3.689-1.881 8.207-.413 10.087 3.278 1.88 3.69.413 8.207-3.278 10.087-5.447 2.775-11.422 4.163-17.398 4.163z"
                                    fill="#f2bb88" />
                          </g>
                          <path
                                  d="m288.989 40.759c0 22.511-9.303 40.759-40.489 40.759s-48.702-42.103-48.702-42.103 17.516-39.415 48.702-39.415c25.911 0 47.746 12.597 54.392 29.769 1.353 3.497-13.903 7.182-13.903 10.99z"
                                  fill="#df646e" />
                          <path
                                  d="m254.305 81.307c1.031-.099 2.069-.167 3.093-.295 26.96-3.081 47.572-19.928 47.572-40.252 0-3.81-.72-7.49-2.08-10.99-15.42-6.31-33.46-10.34-54.39-10.34-4.139 0-8.163.159-12.073.462-5.127.397-7.393-6.322-3.107-9.163 7.36-4.878 16.519-8.364 26.68-9.879-3.71-.56-7.56-.85-11.5-.85-25.933 0-47.766 12.621-54.393 29.813-.006.002-.011.004-.017.007-1.337 3.487-2.055 7.201-2.06 10.94 0 22.51 25.28 40.76 56.47 40.76 1.946.008 3.872-.09 5.805-.213z"
                                  fill="#dc4955" />
                          <path
                                  d="m363.31 164.43v33c0 5.99-.23 11.94-.7 17.83-4.32-.91-8.4-2.66-12.05-5.19-22.785-15.834-31.375-40.163-37.64-60.936-.382-1.268-1.547-2.134-2.871-2.134h-30.949c-4.96 0-9.65-2.15-12.89-5.91l-10.947-12.711c-1.197-1.39-3.349-1.39-4.546 0l-10.947 12.711c-3.24 3.76-7.93 5.91-12.89 5.91h-90.33c8.47-39.6 44.09-94 111.95-94 78.61 0 114.81 73 114.81 111.43z"
                                  fill="#f2bb88" />
                          <path
                                  d="m381 164.19v37.81h-11.25c-4 0-7.93-1.16-11.22-3.44-19.74-13.72-26.93-35.65-33.69-58.43-1.26-4.24-5.16-7.13-9.58-7.13h-36.165c-.873 0-1.703-.38-2.273-1.042l-21.559-25.029c-1.197-1.389-3.349-1.389-4.546 0l-21.559 25.029c-.57.662-1.4 1.042-2.273 1.042h-38.015c-5.3 0-9.68 4.14-9.98 9.44 0 0-2.331 25.591-4.032 66.31-1.765 42.256-7.908 135.02-7.908 135.02-.16 2.822-1.215 5.393-2.879 7.441-2.381 2.929-5.67.375-9.72.375-3.01 0-5.83-1.04-8.06-2.82-2.23-1.77-.792-5.474-1.472-8.414-6.7-28.94-23.83-94.686-23.83-138.351 0-13.73-.14-34.689 0-37.649.14-26.43 12.74-54.048 32-78.128 12.937-16.178 28.667-38.955 58.628-47.692 10.986-3.204 23.248-5.101 36.883-5.101 50.8 0 82.75 26.31 100.6 48.39 19.68 24.319 31.9 55.879 31.9 82.369z"
                                  fill="#df646e" />
                          <path
                                  d="m211.62 38.54c-19.38 9.9-33.55 23.84-43.37 36.44-19.26 24.69-31.27 56.78-31.41 83.88-.14 3.03-.84 25.18-.84 39.25 0 44.77 18.69 117.93 25.39 147.6.47 2.08 1.4 3.94 2.68 5.5-2.38 2.93-6.01 4.79-10.06 4.79-3.01 0-5.83-1.04-8.06-2.82-2.23-1.77-3.88-4.28-4.56-7.22-6.7-28.94-25.39-100.29-25.39-143.96 0-13.73.7-35.33.84-38.29.14-26.43 12.15-57.73 31.41-81.81 12.94-16.18 33.4-34.63 63.37-43.36z"
                                  fill="#dc4955" />
                          <g>
                            <path
                                    d="m316.539 193.816c-1.277 0-2.571-.327-3.755-1.013-11.762-6.82-25.806-6.82-37.567 0-3.583 2.078-8.172.858-10.25-2.726-2.078-3.583-.857-8.172 2.726-10.25 16.474-9.552 36.143-9.552 52.616 0 3.583 2.078 4.804 6.667 2.726 10.25-1.392 2.399-3.909 3.739-6.496 3.739z"
                                    fill="#df646e" />
                          </g>
                          <g>
                            <path
                                    d="m225.539 193.816c-1.277 0-2.571-.327-3.755-1.013-11.762-6.82-25.806-6.82-37.567 0-3.583 2.078-8.171.858-10.25-2.726-2.078-3.583-.857-8.172 2.726-10.25 16.474-9.552 36.143-9.552 52.616 0 3.583 2.078 4.804 6.667 2.726 10.25-1.392 2.399-3.909 3.739-6.496 3.739z"
                                    fill="#df646e" />
                          </g>
                          <g>
                            <path
                                    d="m302.143 383.517c-16.23 10.87-34.973 16.353-53.643 16.353s-37.3-5.41-53.54-16.27l3.476-6.313-1.526-11.067 4.15 3.37c28.46 20.41 66.63 20.37 95.05-.12.2-.14.39-.27.6-.39l3.826-2.211z"
                                    fill="#a9a4d3" />
                          </g>
                          <g>
                            <path
                                    d="m211.98 376.2-1.85 15.68c-5.23-2.27-10.31-5.03-15.17-8.28l1.95-17.38 4.15 3.37c3.5 2.51 7.15 4.72 10.92 6.61z"
                                    fill="#938dc8" />
                          </g>
                          <g>
                            <path
                                    d="m269.5 306.5h-42c-4.142 0-7.5-3.358-7.5-7.5s3.358-7.5 7.5-7.5h42c4.142 0 7.5 3.358 7.5 7.5s-3.358 7.5-7.5 7.5z"
                                    fill="#df646e" />
                          </g>
                        </g>
                      </svg>
                      {{ $views }} مشاهده
                    </li>
                  </ul>

                  @if($product->specifications!==null && $product->specifications!=='')
                    <ul class="product-specifications mt-5">
                      @foreach(json_decode($product->specifications , true) as $key=>$value)
                        <li class="w-100">{{ $key }}  {{ $value }}</li>
                      @endforeach
                    </ul>
                  @endif

                  <div class="product-buttons">
                    @if($product->price!=0)
                      <a href="{{ $product->url }}" id="cartEffect" class="btn cart-btn btn-normal tooltip-top"
                         data-tippy-content="افزودن به سبد خرید" target="_blank">
                        <i class="fa fa-shopping-cart"></i>
                        افزودن به سبد خرید
                      </a>
                    @endif
                    <a href="#" class="btn btn-normal add-to-wish tooltip-top" onclick="addToWish(event,{{ $product->id }})"
                       data-tippy-content="افزودن به لیست علاقه مندی">
                      <i class="fa fa-heart" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>

                <div class="pro-group ">
                  <h6 class="product-title">اشتراک گذاری</h6>
                  <ul class="product-social">
                    <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-rss"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Section ends -->

    <!-- product-tab starts -->
    <section class="tab-product  tab-exes">
      <div class="custom-container">
        <div class="row">
          <div class="col-sm-12 col-lg-12">
            <div class="creative-card creative-inner">
              <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home"
                                        role="tab" aria-selected="true">توضیحات</a>
                  <div class="material-border"></div>
                </li>
                <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile"
                                        role="tab" aria-selected="false">جزئیات</a>
                  <div class="material-border"></div>
                </li>
              </ul>
              <div class="tab-content nav-material" id="top-tabContent">
                <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                  <p>{{ $product->description }} </p>
                </div>
                <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                  <div class="single-product-tables">
                    <table>
                      <tbody>
                      @foreach(json_decode($product->parameters , true) as $key=>$value)
                        <tr>
                          <td>{{ $key }}</td>
                          <td> {{ $value }}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- product-tab ends -->

    <!-- related products -->
    <section class="section-big-py-space  ratio_asos b-g-light">
      <div class="custom-container">
        <div class="row">
          <div class="col-12 product-related">
            <h2>محصولات مرتبط</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12 product">
            <div class="product-slide-6 product-m no-arrow">
              @foreach($related_products as $related_product)
                <div>
                  <div class="product-box">
                    <div class="product-imgbox">
                      <div class="product-front">
                        <a href="/product/{{ $related_product->id }}">
                          <img src="{{ url('uploads/product_images'). '/' . $related_product->image . '.jpg' }}" class="img-fluid" alt="product">
                        </a>
                      </div>
                      <div class="product-back">
                        <a href="/product/{{ $related_product->id }}">
                          <img src="{{ url('uploads/product_images'). '/' . $related_product->image . '.jpg' }}" class="img-fluid  " alt="product">
                        </a>
                      </div>
                      <div class="product-icon icon-inline">
                        <button data-bs-toggle="modal" data-bs-target="#addtocart" class="tooltip-top"
                                data-tippy-content="افزودن به سبد خرید">
                          <i data-feather="shopping-cart"></i>
                        </button>
                        <a href="#" class="add-to-wish tooltip-top" onclick="addToWish(event,{{ $related_product->id }})"
                           data-tippy-content="افزودن به لیست علاقه مندی">
                          <i data-feather="heart"></i>
                        </a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"
                           data-tippy-content="مشاهده سریع" onclick="viewModal({{ $related_product->id }})">
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
                          <div class="rating-star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                          <a href="/product/{{ $related_product->id }}">
                            <h6 class="price-title">
                              {{ $related_product->title }}
                            </h6>
                          </a>
                        </div>
                        <div class="detail-right">
                          @if($related_product->main_price!==null && $related_product->main_price!=='')
                            <div class="check-price">
                              {{ $related_product->main_price }}  تومان
                            </div>
                          @endif
                          <div class="price">
                            <div class="price digits">
                              {{ $related_product->price }} تومان
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
        </div>
      </div>
    </section>
    <!-- related products -->


    <!-- add to cart bottom sticky start-->
    <div class="bottom-cart-sticky ">
      <div class="container">
        <div class="cart-content">
          <div class="product-image">
            <img src="{{ url('uploads/product_images'). '/' . $product->image . '.jpg' }}" class="img-fluid" alt="" >
            <div class="content d-lg-block d-none">
              <h5>{{ $product->title }}</h5>
              @if($product->price==0)
              <h6 class="text-danger">{{ __('Not Available') }}</h6>
              @else
                <h6 class="digits">{{ $product->price }} تومان</h6>
                @endif
            </div>
          </div>

          <div class="add-btn">
            @if($product->price!=0)
              <a href="{{ $product->url }}" class="btn btn-solid btn-sm" target="_blank">افزودن به سبد خرید</a>
            @endif
          </div>
        </div>
      </div>
    </div>
    <!-- add to cart bottom sticky end-->

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