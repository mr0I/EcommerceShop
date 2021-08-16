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
              <table class="table">
                <thead>
                <tr class="th-compare">
                  <td>عمل</td>
                  <th class="item-row">
                    <button type="button" class="remove-compare text-danger text-center w-100">حذف</button>
                  </th>
                  <th class="item-row">
                    <button type="button" class="remove-compare text-danger text-center w-100">حذف</button>
                  </th>
                  <th class="item-row">
                    <button type="button" class="remove-compare text-danger text-center w-100">حذف</button>
                  </th>
                  <th class="item-row">
                    <button type="button" class="remove-compare text-danger text-center w-100">حذف</button>
                  </th>
                </tr>
                </thead>
                <tbody id="table-compare">
                <tr>
                  <th class="product-name">نام محصول</th>
                  <td class="grid-link__title">محصول شماره 1</td>
                  <td class="grid-link__title">محصول شماره 2</td>
                  <td class="grid-link__title">محصول شماره 3</td>
                  <td class="grid-link__title">محصول شماره 4</td>
                </tr>
                <tr>
                  <th class="product-name">تصویر محصول</th>
                  <td class="item-row"><img src="{{ $product1->image }}" alt="product"
                                            class="   featured-image">
                    <div class="product-price product_price">
                      <strong>قیمت : </strong><span>{{ $product1->price }} تومان</span>
                    </div>
                    <a href="{{ $product1->url }}" target="_blank" rel="noopener noreferrer">{{ __('Buy') }}</a>
                    <p class="grid-link__title hidden">{{ $product1->title }} </p>
                  </td>
                  <td class="item-row"><img src="{{ $product2->image }}" alt="product"
                                            class="   featured-image">
                    <div class="product-price product_price">
                      <strong>قیمت : </strong><span>{{ $product2->price }} تومان</span>
                    </div>
                    <a href="{{ $product2->url }}" target="_blank" rel="noopener noreferrer">{{ __('Buy') }}</a>
                    <p class="grid-link__title hidden">{{ $product2->title }} </p>
                  </td>
                  <td class="item-row"><img src="{{ $product3->image }}" alt="product"
                                            class="   featured-image">
                    <div class="product-price product_price">
                      <strong>قیمت : </strong><span>{{ $product3->price }} تومان</span>
                    </div>
                    <a href="{{ $product3->url }}" target="_blank" rel="noopener noreferrer">{{ __('Buy') }}</a>
                    <p class="grid-link__title hidden">{{ $product3->title }} </p>
                  </td>
                  <td class="item-row"><img src="{{ $product4->image }}" alt="product"
                                            class="   featured-image">
                    <div class="product-price product_price">
                      <strong>قیمت : </strong><span>{{ $product4->price }} تومان</span>
                    </div>
                    <a href="{{ $product4->url }}" target="_blank" rel="noopener noreferrer">{{ __('Buy') }}</a>
                    <p class="grid-link__title hidden">{{ $product4->title }} </p>
                  </td>
                </tr>
                <tr>
                  <th class="product-name">توضیحات محصول</th>
                  <td class="item-row">
                    <p class="description-compare">لورم ایپسوم متن ساختگی با تولید سادگی
                      نامفهوم، لورم ایپسوم ...</p>
                  </td>
                  <td class="item-row">
                    <p class="description-compare">لورم ایپسوم متن ساختگی با تولید سادگی
                      نامفهوم، لورم ایپسوم ...</p>
                  </td>
                  <td class="item-row">
                    <p class="description-compare">لورم ایپسوم متن ساختگی با تولید سادگی
                      نامفهوم، لورم ایپسوم ...</p>
                  </td>
                  <td class="item-row">
                    <p class="description-compare">لورم ایپسوم متن ساختگی با تولید سادگی
                      نامفهوم، لورم ایپسوم ...</p>
                  </td>
                </tr>
                <tr>
                  <th class="product-name">وضعیت</th>
                  <td class="availabel-stock">
                    <p>موجود در انبار</p>
                  </td>
                  <td class="availabel-stock">
                    <p>موجود در انبار</p>
                  </td>
                  <td class="availabel-stock">
                    <p>موجود در انبار</p>
                  </td>
                  <td class="availabel-stock">
                    <p>موجود در انبار</p>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section ends -->
@endsection
