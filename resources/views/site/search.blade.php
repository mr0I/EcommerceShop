@extends('site.layout.master')


@section('title')
  {{ __('Product Search') }}
@endsection


@section('content')
  <!-- breadcrumb start -->
  <div class="breadcrumb-main ">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumb-contain">
            <div style="direction: @if(\Illuminate\Support\Facades\App::getLocale() !=='fa') ltr @else rtl @endif">
              <h2>{{ __('Search Results for ') }} <strong class="text-success">{{ $search_query }}</strong></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb End -->

  <!-- product section start -->
  <section class="section-big-py-space ratio_asos b-g-light">
    <div class="custom-container">
      <div class="row search-product related-pro1">
        @foreach($products as $product)
          <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="product">
              <div class="product-box">
                <div class="product-imgbox">
                  <div class="product-front">
                    <img src="{{ url('uploads/product_images'). '/' . $product->image . '.jpg' }}" class="img-fluid  " alt="product">
                  </div>
                  <div class="product-back">
                    <img src="{{ url('uploads/product_images'). '/' . $product->image . '.jpg' }}" class="img-fluid  " alt="product">
                  </div>
                </div>
                <div class="product-detail detail-center ">
                  <div class="detail-title">
                    <div class="detail-left">
                      <a href="/product/{{ $product->id }}">
                        <h6 class="price-title">{{ $product->title }}</h6>
                      </a>
                    </div>
                    <div class="detail-right">
                      <div class="check-price">
                        {{ $product->main_price }}   تومان
                      </div>
                      <div class="price">
                        <div class="price">
                          {{ $product->price }}   تومان
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="icon-detail">
                    <button class="tooltip-top add-cartnoty" data-tippy-content="افزودن به سبد خرید">
                      <i data-feather="shopping-cart"></i>
                    </button>
                    <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                       data-tippy-content="افزودن به لیست علاقه مندی">
                      <i data-feather="heart"></i>
                    </a>
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view" class="tooltip-top"
                       data-tippy-content="مشاهده سریع">
                      <i data-feather="eye"></i>
                    </a>
                    <a href="compare.html" class="tooltip-top" data-tippy-content="مقایسه">
                      <i data-feather="refresh-cw"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      @if($products->lastPage() > 1)
        <div class="row justify-content-center">
          <div class="col-9">
            <div class="product-pagination">
              <div class="theme-paggination-block">
                <div class="row">
                  <div class="col-xl-6 col-md-6 col-sm-12">
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        @if ($products->currentPage() != 1)
                          <li class="page-item">
                            <a class="page-link"
                               href="{{ $products->path().'/?q='.$search_query.'&page='.($products->currentPage()-1) }}"
                               aria-label="Previous">
                              <span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                              <span class="sr-only">{{ __('Previous') }}</span>
                            </a>
                          </li>
                        @endif
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                          @php
                          $productUrl = $products->url($i);
                          $page = explode('?',$productUrl)[1];
                          $finalUrl = $products->path().'/?q='.$search_query.'&'.$page;
                          @endphp
                          <li class="page-item @if ($products->currentPage()==$i)active @endif">
                            <a class="page-link" @if($products->currentPage()!=$i) href="{{ $finalUrl  }}" @endif>
                              @if ($products->currentPage()==$i) صفحه {{$i}} از {{$products->lastPage()}} @else {{$i}} @endif
                            </a>
                          </li>
                        @endfor
                        @if ($products->currentPage() != $products->lastPage())
                          <li class="page-item">
                            <a class="page-link"
                               href="{{ $products->path().'/?q='.$search_query.'&page='.($products->currentPage()+1) }}" aria-label="Next">
                              <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                              <span class="sr-only">{{ __('Next') }}</span>
                            </a>
                          </li>
                        @endif
                      </ul>
                    </nav>
                  </div>
                  <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="product-search-count-bottom">
                      @php
                        $from = (($products->currentPage() -1)  * $products->perPage()) + 1;
                        $to = (($from + $products->perPage()) <= $products->total()) ? ($from + $products->perPage())-1 : $products->total();
                      @endphp
                      <h5 style="direction: ltr">  {{ $from }}-{{ $to  }}  {{ __('From') }} {{ $products->total() }} </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </section>
  <!-- product section end -->


@endsection