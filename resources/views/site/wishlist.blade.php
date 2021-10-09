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
                <li><a href="index.html">خانه</a></li>
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
          <table class="table cart-table table-responsive-xs">
            <thead>
            <tr class="table-head">
              <th scope="col">تصویر</th>
              <th scope="col">نام محصول</th>
              <th scope="col">قیمت</th>
              <th scope="col">دسترسی</th>
              <th scope="col">عمل</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
              <tr>
                <td>
                  <a href="/product/{{ $product->id }}">
                    <img src="{{ url('uploads/product_images/'). '/' . $product->image. '.jpg' }}" alt="product" class="img-fluid  ">
                  </a>
                </td>
                <td><a href="javascript:void(0)">{{ $product->title }}</a>
                  <div class="mobile-cart-content">
                    <div class="col-xs-3">
                      <p>موجود در انبار</p>
                    </div>
                    <div class="col-xs-3">
                      <h2 class="td-color">63,000 تومان</h2>
                    </div>
                    <div class="col-xs-3">
                      <h2 class="td-color"><a href="javascript:void(0)" class="icon me-1"><i class="ti-close"></i>
                        </a><a href="javascript:void(0)" class="cart"><i class="ti-shopping-cart"></i></a></h2>
                    </div>
                  </div>
                </td>
                <td>
                  <h2>63,000 تومان</h2>
                </td>
                <td>
                  <p>موجود در انبار</p>
                </td>
                <td><a href="javascript:void(0)" class="icon ms-3"><i class="ti-close"></i> </a><a
                          href="javascript:void(0)" class="cart"><i class="ti-shopping-cart"></i></a></td>
              </tr>
            @endforeach
            </tbody>
            {{--<tbody>--}}
            {{--<tr>--}}
            {{--<td>--}}
            {{--<a href="javascript:void(0)"><img src="../assets/images/layout-2/product/2.jpg" alt="product"--}}
            {{--class="img-fluid  "></a>--}}
            {{--</td>--}}
            {{--<td><a href="javascript:void(0)">محصول نمونه</a>--}}
            {{--<div class="mobile-cart-content">--}}
            {{--<div class="col-xs-3">--}}
            {{--<p>موجود در انبار</p>--}}
            {{--</div>--}}
            {{--<div class="col-xs-3">--}}
            {{--<h2 class="td-color">63,000 تومان</h2>--}}
            {{--</div>--}}
            {{--<div class="col-xs-3">--}}
            {{--<h2 class="td-color"><a href="javascript:void(0)" class="icon me-1"><i class="ti-close"></i>--}}
            {{--</a><a href="javascript:void(0)" class="cart"><i class="ti-shopping-cart"></i></a></h2>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</td>--}}
            {{--<td>--}}
            {{--<h2>63,000 تومان</h2>--}}
            {{--</td>--}}
            {{--<td>--}}
            {{--<p>موجود در انبار</p>--}}
            {{--</td>--}}
            {{--<td><a href="javascript:void(0)" class="icon ms-3"><i class="ti-close"></i> </a><a--}}
            {{--href="javascript:void(0)" class="cart"><i class="ti-shopping-cart"></i></a></td>--}}
            {{--</tr>--}}
            {{--</tbody>--}}
            {{--<tbody>--}}
            {{--<tr>--}}
            {{--<td>--}}
            {{--<a href="javascript:void(0)"><img src="../assets/images/layout-1/product/3.jpg" alt="product"--}}
            {{--class="img-fluid  "></a>--}}
            {{--</td>--}}
            {{--<td><a href="javascript:void(0)">محصول نمونه</a>--}}
            {{--<div class="mobile-cart-content">--}}
            {{--<div class="col-xs-3">--}}
            {{--<p>موجود در انبار</p>--}}
            {{--</div>--}}
            {{--<div class="col-xs-3">--}}
            {{--<h2 class="td-color">63,000 تومان</h2>--}}
            {{--</div>--}}
            {{--<div class="col-xs-3">--}}
            {{--<h2 class="td-color"><a href="javascript:void(0)" class="icon me-1"><i class="ti-close"></i>--}}
            {{--</a><a href="javascript:void(0)" class="cart"><i class="ti-shopping-cart"></i></a></h2>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</td>--}}
            {{--<td>--}}
            {{--<h2>63,000 تومان</h2>--}}
            {{--</td>--}}
            {{--<td>--}}
            {{--<p>موجود در انبار</p>--}}
            {{--</td>--}}
            {{--<td><a href="javascript:void(0)" class="icon ms-3"><i class="ti-close"></i> </a><a--}}
            {{--href="javascript:void(0)" class="cart"><i class="ti-shopping-cart"></i></a></td>--}}
            {{--</tr>--}}
            {{--</tbody>--}}
          </table>
        </div>
      </div>

    </div>
  </section>
  <!--section end-->
@endsection