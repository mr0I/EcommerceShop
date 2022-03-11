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
          @if($productsCount < 4)
            <div class="d-flex justify-content-center mb-3">
              <button class="btn btn-normal btn-sm" data-bs-toggle="modal" data-bs-target="#add_to_compare_modal">
                <i class="fa fa-plus mx-1"></i>{{ __('Add New Product') }}
              </button>
            </div>
          @endif
            @if($productsCount === 0)
              <div class="no-result text-center">
                <p>{{ __('THERE IS NO ITEM!!!') }}</p>
              </div>
            @endif
          <div class="compare-page">
            <div class="table-wrapper table-responsive">
              @if($productsCount !== 0)
                <table class="table">
                  <thead>
                  <tr class="th-compare">
                    @if($product1!==null && $productsCount > 1)
                    <td></td>
                      <th class="item-row">
                        <button type="button" class="remove-compare text-danger text-center w-100" data-pid="1"
                                onclick="removeCompare({{ $product1->id }})">
                          {{ __('Remove') }}
                          <i data-feather="remove"></i>
                        </button>
                      </th>
                    @endif
                    @if($product2!==null)
                      <th class="item-row">
                        <button type="button" class="remove-compare text-danger text-center w-100" data-pid="2"
                        onclick="removeCompare({{ $product2->id }})">
                          {{ __('Remove') }}
                        </button>
                      </th>
                    @endif
                    @if($product3!==null)
                      <th class="item-row">
                        <button type="button" class="remove-compare text-danger text-center w-100" data-pid="3"
                        onclick="removeCompare({{ $product3->id }})">
                          {{ __('Remove') }}
                        </button>
                      </th>
                    @endif
                    @if($product4!==null)
                      <th class="item-row">
                        <button type="button" class="remove-compare text-danger text-center w-100" data-pid="4"
                        onclick="removeCompare({{ $product4->id }})">
                          {{ __('Remove') }}
                        </button>
                      </th>
                    @endif
                  </tr>
                  </thead>
                  <tbody id="table-compare">
                  <tr>
                    <th class="product-name">نام محصول</th>
                    @if($product1!==null) <td class="grid-link__title"><a href="/product/{{ $product1  ->id }}" target="_blank">{{ $product1->title }}</a> </td> @endif
                    @if($product2!==null) <td class="grid-link__title"><a href="/product/{{ $product2  ->id }}" target="_blank">{{ $product2->title }}</a> </td> @endif
                    @if($product3!==null) <td class="grid-link__title"><a href="/product/{{ $product3  ->id }}" target="_blank">{{ $product3->title }}</a> </td> @endif
                    @if($product4!==null) <td class="grid-link__title"><a href="/product/{{ $product4  ->id }}" target="_blank">{{ $product4->title }}</a> </td> @endif
                  </tr>
                  <tr>
                    <th class="product-name">تصویر محصول</th>
                    @if($product1!==null)
                      <td class="item-row">
                        <a href="/product/{{ $product1  ->id }}" target="_blank">
                          <img src="{{ url('uploads/productImages/').'/'. $product1->image . '.webp' }}" alt="product"
                               class="featured-image">
                        </a>
                        @if($product1->status=='available')
                          <div class="product_price digits price">
                            <strong>قیمت : </strong><span>{{ $product1->price }} تومان</span>
                          </div>
                          <a href="{{ $product1->url }}" class="btn btn-info btn-rounded"
                             target="_blank" rel="noopener noreferrer">
                            {{ __('Buy') }}
                          </a>                        @else
                          <div class="product_price">
                            <strong>قیمت : </strong><span>--- </span>
                          </div>
                        @endif
                      </td>
                    @endif
                    @if($product2!==null)
                      <td class="item-row">
                        <a href="/product/{{ $product2  ->id }}" target="_blank">
                          <img src="{{ url('uploads/productImages/').'/'. $product2->image . '.webp' }}" alt="product"
                               class="featured-image">
                        </a>
                        @if($product2->status=='available')
                          <div class="product_price digits price">
                            <strong>قیمت : </strong><span>{{ $product2->price }} تومان</span>
                          </div>
                          <a href="{{ $product2->url }}" class="btn btn-info btn-rounded"
                             target="_blank" rel="noopener noreferrer">
                            {{ __('Buy') }}
                          </a>
                        @else
                          <div class="product_price">
                            <strong>قیمت : </strong><span>--- </span>
                          </div>
                        @endif
                      </td>
                    @endif
                    @if($product3!==null)
                      <td class="item-row">
                        <a href="/product/{{ $product3  ->id }}" target="_blank">
                          <img src="{{ url('uploads/productImages/').'/'. $product3->image . '.webp' }}" alt="product"
                               class="featured-image">
                        </a>
                        @if($product3->status=='available')
                          <div class="product_price digits price">
                            <strong>قیمت : </strong><span>{{ $product3->price }} تومان</span>
                          </div>
                          <a href="{{ $product3->url }}" class="btn btn-info btn-rounded"
                             target="_blank" rel="noopener noreferrer">
                            {{ __('Buy') }}
                          </a>                        @else
                          <div class="product_price">
                            <strong>قیمت : </strong><span>--- </span>
                          </div>
                        @endif
                      </td>
                    @endif
                    @if($product4!==null)
                      <td class="item-row">
                        <a href="/product/{{ $product4  ->id }}" target="_blank">
                          <img src="{{ url('uploads/productImages/').'/'. $product4->image . '.webp' }}" alt="product"
                               class="featured-image">
                        </a>
                        @if($product4->status=='available')
                          <div class="product_price digits price">
                            <strong>قیمت : </strong><span>{{ $product4->price }} تومان</span>
                          </div>
                          <a href="{{ $product4->url }}" class="btn btn-info btn-rounded"
                             target="_blank" rel="noopener noreferrer">
                            {{ __('Buy') }}
                          </a>                        @else
                          <div class="product_price">
                            <strong>قیمت : </strong><span>--- </span>
                          </div>
                        @endif
                      </td>
                    @endif
                  </tr>
                  <tr>
                    <th class="product-name">توضیحات محصول</th>
                    @if($product1!==null)
                      <td class="item-row">
                        <p class="description-compare desc">
                          {{ mb_strimwidth( $product1->description,0,300,'---') }}
                        </p>
                      </td>
                    @endif
                    @if($product2!==null)
                      <td class="item-row">
                        <p class="description-compare desc">
                          {{ mb_strimwidth( $product2->description,0,300,'---') }}
                        </p>
                      </td>
                    @endif
                    @if($product3!==null)
                      <td class="item-row">
                        <p class="description-compare desc">
                          {{ mb_strimwidth( $product3->description,0,300,'---') }}
                        </p>
                      </td>
                    @endif
                    @if($product4!==null)
                      <td class="item-row">
                        <p class="description-compare desc">
                          {{ mb_strimwidth( $product4->description,0,300,'---') }}
                        </p>
                      </td>
                    @endif
                  </tr>
                  <tr>
                    <th class="product-name">وضعیت</th>
                    @php
                      $available_txt = __('Available');
                      $not_available_txt = __('Not Available');
                    @endphp

                    @if($product1!==null)
                      <td class="availabel-stock">
                        <p class="{{ ($product1->status=='available')? 'text-success' : 'text-danger' }}">
                          {{ ($product1->status=='available')? $available_txt : $not_available_txt  }}
                        </p>
                      </td>
                    @endif
                    @if($product2!==null)
                      <td class="availabel-stock">
                        <p class="{{ ($product2->status=='available')? 'text-success' : 'text-danger' }}">
                          {{ ($product2->status=='available')? $available_txt : $not_available_txt  }}
                        </p>
                      </td>
                    @endif
                    @if($product3!==null)
                      <td class="availabel-stock">
                        <p class="{{ ($product3->status=='available')? 'text-success' : 'text-danger' }}">
                          {{ ($product3->status=='available')? $available_txt : $not_available_txt  }}
                        </p>
                      </td>
                    @endif
                    @if($product4!==null)
                      <td class="availabel-stock">
                        <p class="{{ ($product4->status=='available')? 'text-success' : 'text-danger' }}">
                          {{ ($product4->status=='available')? $available_txt : $not_available_txt  }}
                        </p>
                      </td>
                    @endif
                  </tr>
                  </tbody>
                </table>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- add to compare modal --}}
    <div class="modal fade bd-example-modal-lg theme-modal" id="add_to_compare_modal" tabindex="-1" role="dialog"
         aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
          <div class="modal-body">
            <form class="form-header w-75 m-auto mb-4">
              <div class="input-group">
                <input type="text" class="form-control" id="compare_product_input" placeholder="{{ __('product name...') }}"
                       name="compare_product_input" required autocomplete="compare_product_input">
                <button type="submit" class="btn btn-normal" id="add_compare_product_btn" disabled
                        onclick="addCompareProduct(event)">
                  {{ __('Search') }} <i class="fa fa-search mx-1"></i>
                </button>
              </div>
            </form>

            <div class="compare-products-table" style="display: none">
              <table class="jsgrid-table m-auto w-100">
                <thead>
                <tr class="jsgrid-header-row">
                  <th class="jsgrid-header-cell" style="width: 10%;">{{ __('Row') }}</th>
                  <th class="jsgrid-header-cell jsgrid-align-right" style="width: 40%;">{{ __('Product Title') }}</th>
                  <th class="jsgrid-header-cell jsgrid-align-right" style="width: 40%;">{{ __('Product Price') }}</th>
                  <th class="jsgrid-header-cell jsgrid-align-right" style="width: 10%;">{{ __('Add') }}</th>
                </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- Section ends -->
@endsection
