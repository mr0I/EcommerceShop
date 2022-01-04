@extends('site.dashboard.layout.master')

@section('title')
  User Wish List
@endsection


@section('content')
  <div class="dashboard-right">
    <div class="dashboard">
      <div class="box-account box-info">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-title">
                <h3>{{ __('My Wish List') }}</h3>
              </div>
              <div class="box-content">
                @if(sizeof($products)===0)
                  <div class="alert alert-warning text-center">{{ __('There is no item in list!!!') }}</div>
                @else
                  <table class="table cart-table table-responsive-xs wish-table">
                    <thead>
                    <tr class="table-head">
                      <th scope="col">تصویر</th>
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
                            <img src="{{ url('uploads/product_images/'). '/' . $product->image. '.jpg' }}" width="65"
                                 alt="product" class="img-fluid  tooltip-top" data-tippy-content="{{ $product->title }}">
                          </a>
                        </td>
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

              @if(sizeof($products)!==0)
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
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection