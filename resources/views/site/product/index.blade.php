@extends('site.layout.master')


@section('productSchema')
  <script type="application/ld+json">
    {
    "@context": "https://www.schema.org",
    "@type": "Product",
    "name": "<?= $product->title ?>",
    "alternateName": "",
    "image": [
        "<?= url('uploads/product_images'). '/' . $product->image . '.jpg' ?>",
    ],
    "description": "<?= $product->description ?>",
    "sku": 100,
    "mpn": <?= $product->id ?>,
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": 0,
        "reviewCount": 0,
        "bestRating": 5,
        "worstRating": 0
    },
    "brand": {
        "@type": "Thing",
        "name": "<?= $product->brand ?>"
    },
    "offers": {
        "@type": "AggregateOffer",
        "priceCurrency": "IRR",
        "lowPrice": <?= $product->price ?>,
        "highPrice": <?= ($product->main_price!==null)? $product->main_price : $product->price ?>,
        "offerCount": 1,
        "offers": {
            "@type": "Offer",
            "priceCurrency": "IRR",
            "price": <?= $product->price ?>,
            "itemCondition": "https://schema.org/UsedCondition",
            "availability": "https://schema.org/InStock",
            "seller": {
                "@type": "Organization",
                "name": "dgmarketz"
            }
        }
    }
}
  </script>
@endsection

@section('title')
  @if($product !== null)
    {{ $product->title }}
  @else
    {{ __('Product Page') }}
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
                      <li class="digits price">{{ $product->price }} تومان</li>
                    @endif
                    @if($product->main_price!==null && $product->main_price!=='')
                      @php
                        $discount = \App\Helpers\functions::calcDiscount($product->main_price,$product->price);
                      @endphp
                      <li><span class="digits">{{ $product->main_price }} تومان</span></li>
                      <li>{{ $discount }}% {{ __('Discount') }}</li>
                    @endif
                  </ul>
                  <ul class="best-seller">
                    <li>
                      <i class="fa fa-eye align-middle mx-2"></i>
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

                @php
                  $encodeUrl = urlencode('/product/'.$product->id);
                @endphp
                <div class="pro-group ">
                  <h6 class="product-title">اشتراک گذاری</h6>
                  <ul class="product-social">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url($encodeUrl) }}"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://plus.google.com/share?url={{ url($encodeUrl) }}"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="https://twitter.com/share?url={{ url($encodeUrl) }}"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://wa.me/?text={{ url($encodeUrl) }}"><i class="fa fa-whatsapp"></i></a></li>
                    <li><a href="https://telegram.me/share/url?url={{ url($encodeUrl) }}"><i class="fa fa-telegram"></i></a></li>
                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ url($encodeUrl) }}"><i class="fa fa-linkedin"></i></a></li>
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
                  <p class="desc">{{ $product->description }} </p>
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
                <h6 class="digits price">{{ $product->price }} تومان</h6>
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