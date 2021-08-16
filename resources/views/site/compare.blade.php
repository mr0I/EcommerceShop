@extends('site.layout.master')

@section('title')
  مقایسه محصولات
@endsection

@section('content')
  <!-- breadcrumb start -->
  <div class="breadcrumb-main ">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumb-contain">
            <div>
              <ul>
                <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                <li><i class="fa fa-angle-double-left"></i></li>
                <li>{{ __('Compare Products') }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb End -->

  <!-- section start -->
  <section class="compare-padding section-big-py-space b-g-light">
    <div class="custom-container">
      <div class="row">
        <div class="col-sm-12">
          <div class="compare-page">
            <div class="table-wrapper table-responsive">
              @if($product1!==null || $product2!==null || $product3!==null || $product4!==null )
                <table class="table">
                  <thead>
                  <tr class="th-compare">
                    <td>عمل</td>
                    @if($product1!==null)
                      <th class="item-row">
                        <button type="button" class="remove-compare text-danger text-center w-100" data-pid="1">
                          حذف
                          <i data-feather="remove"></i>
                        </button>
                      </th>
                    @endif
                    @if($product2!==null)
                      <th class="item-row">
                        <button type="button" class="remove-compare text-danger text-center w-100" data-pid="2">
                          حذف
                        </button>
                      </th>
                    @endif
                    @if($product3!==null)
                      <th class="item-row">
                        <button type="button" class="remove-compare text-danger text-center w-100" data-pid="3">
                          حذف
                        </button>
                      </th>
                    @endif
                    @if($product4!==null)
                      <th class="item-row">
                        <button type="button" class="remove-compare text-danger text-center w-100" data-pid="4">
                          حذف
                        </button>
                      </th>
                    @endif
                  </tr>
                  </thead>
                  <tbody id="table-compare">
                  <tr>
                    <th class="product-name">نام محصول</th>
                    @if($product1!==null) <td class="grid-link__title">{{ $product1->title }} </td> @endif
                    @if($product2!==null) <td class="grid-link__title">{{ $product2->title }} </td> @endif
                    @if($product3!==null) <td class="grid-link__title">{{ $product3->title }} </td> @endif
                    @if($product4!==null) <td class="grid-link__title">{{ $product4->title }} </td> @endif
                  </tr>
                  <tr>
                    <th class="product-name">تصویر محصول</th>
                    @if($product1!==null)
                      <td class="item-row"><img src="{{ $product1->image }}" alt="product"
                                                class="   featured-image">
                        <div class="product-price product_price">
                          <strong>قیمت : </strong><span>{{ $product1->price }} تومان</span>
                        </div>

                        <a href="{{ $product1->url }}" class="btn btn-white btn-outline tooltip-top"
                           data-tippy-content="خرید" target="_blank" rel="noopener noreferrer">
                          {{ __('Buy') }}
                        </a>
                      </td>
                    @endif
                    @if($product2!==null)
                      <td class="item-row"><img src="{{ $product2->image }}" alt="product"
                                                class="   featured-image">
                        <div class="product-price product_price">
                          <strong>قیمت : </strong><span>{{ $product2->price }} تومان</span>
                        </div>

                        <a href="{{ $product2->url }}" class="btn btn-white btn-outline tooltip-top"
                           data-tippy-content="خرید" target="_blank" rel="noopener noreferrer">
                          {{ __('Buy') }}
                        </a>
                      </td>
                    @endif
                    @if($product3!==null)
                      <td class="item-row"><img src="{{ $product3->image }}" alt="product"
                                                class="   featured-image">
                        <div class="product-price product_price">
                          <strong>قیمت : </strong><span>{{ $product3->price }} تومان</span>
                        </div>

                        <a href="{{ $product3->url }}" class="btn btn-white btn-outline tooltip-top"
                           data-tippy-content="خرید" target="_blank" rel="noopener noreferrer">
                          {{ __('Buy') }}
                        </a>
                      </td>
                    @endif
                    @if($product4!==null)
                      <td class="item-row"><img src="{{ $product4->image }}" alt="product"
                                                class="   featured-image">
                        <div class="product-price product_price">
                          <strong>قیمت : </strong><span>{{ $product4->price }} تومان</span>
                        </div>

                        <a href="{{ $product4->url }}" class="btn btn-white btn-outline tooltip-top"
                           data-tippy-content="خرید" target="_blank" rel="noopener noreferrer">
                          {{ __('Buy') }}
                        </a>
                      </td>
                    @endif
                  </tr>
                  <tr>
                    <th class="product-name">توضیحات محصول</th>
                    @if($product1!==null)
                      <td class="item-row">
                        <p class="description-compare">
                          {{ mb_strimwidth( $product1->description,0,300,'---') }}
                        </p>
                      </td>
                    @endif
                    @if($product2!==null)
                      <td class="item-row">
                        <p class="description-compare">
                          {{ mb_strimwidth( $product2->description,0,300,'---') }}
                        </p>
                      </td>
                    @endif
                    @if($product3!==null)
                      <td class="item-row">
                        <p class="description-compare">
                          {{ mb_strimwidth( $product3->description,0,300,'---') }}
                        </p>
                      </td>
                    @endif
                    @if($product4!==null)
                      <td class="item-row">
                        <p class="description-compare">
                          {{ mb_strimwidth( $product4->description,0,300,'---') }}
                        </p>
                      </td>
                    @endif
                  </tr>
                  <tr>
                    <th class="product-name">وضعیت</th>
                    @if($product1!==null)
                      <td class="availabel-stock">
                        <p>{{ $product1->status }}</p>
                      </td>
                    @endif
                    @if($product2!==null)
                      <td class="availabel-stock">
                        <p>{{ $product2->status }}</p>
                      </td>
                    @endif
                    @if($product3!==null)
                      <td class="availabel-stock">
                        <p>{{ $product3->status }}</p>
                      </td>
                    @endif
                    @if($product4!==null)
                      <td class="availabel-stock">
                        <p>{{ $product4->status }}</p>
                      </td>
                    @endif
                  </tr>
                  </tbody>
                </table>
                @else
                <p class="alert alert-warning text-center">{{ __('THERE IS NO ITEM!!!') }}</p>
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section ends -->
@endsection
