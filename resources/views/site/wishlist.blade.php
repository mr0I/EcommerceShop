@extends('site.layout.master')

@section('title')
  لیست علاقه مندی
@endsection

@section('content')
  <!-- breadcrumb start -->
  <div class="breadcrumb-main ">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumb-contain">
            <div>
              <h2>لیست علاقه مندی</h2>
              <ul>
                <li><a href={{ url('/') }}>خانه</a></li>
                <li><i class="fa fa-angle-double-left"></i></li>
                <li><a href="javascript:void(0)">لیست علاقه مندی</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb End -->

  <!--section start-->
  <section class="wishlist-section section-big-py-space b-g-light">
    <div class="custom-container">
      <div class="row">
        <div class="col-sm-12">
          @if(sizeof($products)===0)
            <div class="no-result text-center">
              <p>{{ __('There is no item in list!!!') }}</p>
            </div>
          @else
            <table class="table cart-table table-responsive-xs wish-table">
              <thead>
              <tr class="table-head">
                <th scope="col">تصویر</th>
                <th scope="col">نام محصول</th>
                <th scope="col">قیمت</th>
                <th scope="col">موجود بودن</th>
                <th scope="col">عملیات</th>
              </tr>
              </thead>
              <tbody>
              @foreach($products as $product)
                <tr>
                  <td>
                    <a href="/product/{{ $product->id }}">
                      <img src="{{ url('uploads/productImages/'). '/' . $product->image. '.webp' }}" alt="product" class="img-fluid  ">
                    </a>
                  </td>
                  <td><a href="/product/{{ $product->id }}">{{ $product->title }}</a></td>
                  <td class="digits price">
                    @if($product->price!='0')
                      <h2>{{ $product->price }} تومان</h2>
                    @else
                      <h2>---</h2>
                    @endif
                  </td>
                  <td><p class="<?= ($product->status=='available')? 'available' : 'not-available' ?>">{{ ($product->status=='available')? 'موجود' : 'ناموجود' }}</p></td>
                  <td>
                    <a href="#" class="icon ms-3 remove-wish-product" data-id="{{ $product->id }}"><i class="ti-close"></i> </a>
                    <a href="{{ $product->url }}" class="cart" target="_blank"><i class="ti-shopping-cart"></i></a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>


      @if(sizeof($products) !== 0)
        <div class="product-pagination">
          <div class="theme-paggination-block">
            <div class="container-fluid p-0">
              <div class="row">
                <div class="col-12">
                  <nav aria-label="Page navigation">
                    <ul class="pagination d-flex justify-content-center">
                      @if ($products->currentPage() != 1)
                        <li class="page-item">
                          <a class="page-link"
                             href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                            <span class="sr-only">{{ __('Previous') }}</span>
                          </a>
                        </li>
                      @endif
                      @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <li class="page-item @if ($products->currentPage()==$i)active @endif">
                          <a class="page-link" href="{{ $products->url($i) }}">
                            @if ($products->currentPage()==$i) صفحه {{$i}} از {{$products->lastPage()}} @else {{$i}} @endif
                          </a>
                        </li>
                      @endfor
                      @if ($products->currentPage() != $products->lastPage())
                        <li class="page-item">
                          <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
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
      @endif
    </div>
  </section>
  <!--section end-->
@endsection