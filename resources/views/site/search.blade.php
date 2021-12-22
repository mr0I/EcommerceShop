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
              @if(sizeof($products)!==0)
              <h2>{{ __('Search Results for ') }} <strong class="text-success">{{ $search_query }}</strong></h2>
                @else
                <h2>{{ __('Nothing Found for ') }} <strong class="text-danger">{{ $search_query }}</strong></h2>
                @endif
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
      <div class="row search-product related-pro1" id="search-product">
        @foreach($products as $product)
          <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="product">
              <div class="product-box">
                <div class="product-imgbox">
                  <div class="product-front">
                    <a href="/product/{{ $product->id }}">
                    <img src="{{ url('uploads/product_images'). '/' . $product->image . '.jpg' }}" class="img-fluid  " alt="product">
                    </a>
                  </div>
                  <div class="product-back">
                    <a href="/product/{{ $product->id }}">
                      <img src="{{ url('uploads/product_images'). '/' . $product->image . '.jpg' }}" class="img-fluid  " alt="product">
                    </a>                  </div>
                </div>
                <div class="product-detail detail-center ">
                  <div class="detail-title">
                    <div class="detail-left">
                      <a href="/product/{{ $product->id }}">
                        <h6 class="price-title">{{ $product->title }}</h6>
                      </a>
                    </div>
                    <div class="detail-right d-flex justify-content-center">
                      @if($product->main_price!==null)
                      <div class="check-price digits text-muted">
                        {{ $product->main_price }}   تومان
                      </div>
                      @endif
                      <div class="price">
                        <div class="digits price">
                          {{ $product->price }}   تومان
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="icon-detail">
                    <a href="{{ $product->url }}" class="tooltip-top add-cartnoty"
                       data-tippy-content="{{ _('Add to basket') }}" target="_blank">
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
                  <div class="col-12">
                    <nav aria-label="Page navigation">
                      <ul class="pagination justify-content-center">
                        @if ($products->currentPage() != 1)
                          <li class="page-item">
                            <a class="page-link"
                               href="{{ $products->path().'/?q='.$search_query.'&cat='.$category_id.'&page='.($products->currentPage()-1) }}"
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
                          $finalUrl = $products->path().'/?q='.$search_query.'&cat='.$category_id.'&'.$page;
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
                               href="{{ $products->path().'/?q='.$search_query.'&cat='.$category_id.'&page='.($products->currentPage()+1) }}" aria-label="Next">
                              <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                              <span class="sr-only">{{ __('Next') }}</span>
                            </a>
                          </li>
                        @endif
                      </ul>
                    </nav>
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


@section('scripts')
  <script type="application/ld+json" id="sq">
    {
      "searchQuery" : "<?= $search_query ?>"
  }
</script>

  <script type="text/javascript">
      jQuery(document).ready(function($) {
          let sq = JSON.parse(document.getElementById("sq").innerHTML,false);

          $('#search-product').mark(sq.searchQuery,{
              element:'mark',
              className:'highlight-text',
              caseSensitive:false,
              wildcards:true
          });
      })
  </script>
@endsection