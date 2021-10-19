@extends('admin.layout.master')

@section('title')
  Admin Dash
@endsection

@section('content')
  <div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-lg-6">
            <div class="page-header-left">
              <h3>سفارشات
                <small>پنل مدیریتی فروشگاه بیگ دیل</small>
              </h3>
            </div>
          </div>
          <div class="col-lg-6">
            <ol class="breadcrumb pull-right">
              <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a>
              </li>
              <li class="breadcrumb-item">فروش</li>
              <li class="breadcrumb-item active">سفارشات</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5>مدیریت سفارشات</h5>
            </div>
            <div class="card-body order-datatable">
              <table class="display" id="basic-1">
                <thead>
                <tr>
                  <th>کد سفارش</th>
                  <th>محصولات</th>
                  <th>وضعیت پرداخت</th>
                  <th>شیوه پرداخت</th>
                  <th>وضعیت سفارش</th>
                  <th>تاریخ</th>
                  <th>مبلغ کل سفارش</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>#51240</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-1/product/1.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/2.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/3.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-secondary">پرداخت نقدی</span></td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>18 مهر 99</td>
                  <td>543,000 تومان</td>
                </tr>
                <tr>
                  <td>#51241</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-1/product/4.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/5.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>15 مهر 99</td>
                  <td>231,000 تومان</td>
                </tr>
                <tr>
                  <td>#51242</td>
                  <td><img src="../assets/images/layout-1/product/6.jpg" alt=""
                           class="img-fluid img-30 me-2 "></td>
                  <td><span class="badge badge-warning">در انتظار تایید</span>
                  </td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-warning">در حال بررسی</span></td>
                  <td>27 شهریور 99</td>
                  <td>879,000 تومان</td>
                </tr>
                <tr>
                  <td>#51243</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-1/product/7.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/8.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-danger">پرداخت شکست خورد</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-danger">لغو شده</span></td>
                  <td>24 شهریور 99</td>
                  <td>139,000 تومان</td>
                </tr>
                <tr>
                  <td>#51244</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/cosmetic/product/1.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/cosmetic/product/2.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>18 شهریور 99</td>
                  <td>456,700 تومان</td>
                </tr>
                <tr>
                  <td>#51245</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/cosmetic/product/3.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/cosmetic/product/4.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/cosmetic/product/5.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>14 شهریور 99</td>
                  <td>653,000 تومان</td>
                </tr>
                <tr>
                  <td>#51246</td>
                  <td><img src="../assets/images/cosmetic/product/6.jpg" alt=""
                           class="img-fluid img-30 me-2 "></td>
                  <td><span class="badge badge-warning">در انتظار تایید</span>
                  </td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-warning">در حال بررسی</span></td>
                  <td>12 شهریور 99</td>
                  <td>97,600 تومان</td>
                </tr>
                <tr>
                  <td>#51247</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/cosmetic/product/7.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/cosmetic/product/8.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-danger">پرداخت شکست خورد</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-danger">لغو شده</span></td>
                  <td>28 فروردین 99</td>
                  <td>312,320 تومان</td>
                </tr>
                <tr>
                  <td>#51248</td>
                  <td><img src="../assets/images/cosmetic/product/9.jpg" alt=""
                           class="img-fluid img-30 me-2 "></td>
                  <td><img src="../assets/images/cosmetic/product/10.jpg" alt=""
                           class="img-fluid img-30 me-2 "></td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>10 شهریور 99</td>
                  <td>679,000 تومان</td>
                </tr>
                <tr>
                  <td>#51249</td>
                  <td><img src="../assets/images/cosmetic/product/11.jpg" alt=""
                           class="img-fluid img-30 me-2 "></td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-secondary">در حال بررسی</span></td>
                  <td>08 شهریور 99</td>
                  <td>975,000 تومان</td>
                </tr>
                <tr>
                  <td>#51250</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/cosmetic/product/12.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/cosmetic/product/13.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>18 مهر 99</td>
                  <td>870,000 تومان</td>
                </tr>
                <tr>
                  <td>#51251</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/kids/product/1.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/kids/product/2.jpg" alt=""
                           class="img-fluid img-30 me-2 "> ">
                    </div>
                  </td>
                  <td><span class="badge badge-secondary">Cash On Delivered</span></td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>15 مهر 99</td>
                  <td>115,000 تومان</td>
                </tr>
                <tr>
                  <td>#51252</td>
                  <td>
                    <img src="../assets/images/kids/product/3.jpg" alt=""
                         class="img-fluid img-30 me-2 ">
                  </td>
                  <td><span class="badge badge-danger">پرداخت شکست خورد</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-danger">لغو شده</span></td>
                  <td>27 شهریور 99</td>
                  <td>182,000 تومان</td>
                </tr>
                <tr>
                  <td>#51253</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/kids/product/4.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/kids/product/5.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/kids/product/6.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>واریز بانکی</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>30 مرداد 99</td>
                  <td>376,000 تومان</td>
                </tr>
                <tr>
                  <td>#51254</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/kids/product/8.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/kids/product/9.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-warning">در انتظار تایید</span>
                  </td>
                  <td>0.80 %</td>
                  <td><span class="badge badge-warning">در حال بررسی</span></td>
                  <td>25 مرداد 99</td>
                  <td>976,000 تومان</td>
                </tr>
                <tr>
                  <td>#51255</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/kids/product/10.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/kids/product/5.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-secondary">Cash On Delivered</span></td>
                  <td>0.70 %</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>18 مرداد 99</td>
                  <td>645,000 تومان</td>
                </tr>
                <tr>
                  <td>#51256</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/1.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/furniture1/product/2.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/furniture1/product/3.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-danger">پرداخت شکست خورد</span></td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-danger">لغو شده</span></td>
                  <td>12 مرداد 99</td>
                  <td>273,000 تومان</td>
                </tr>
                <tr>
                  <td>#51257</td>
                  <td>
                    <img src="../assets/images/furniture1/product/1.jpg" alt=""
                         class="img-fluid img-30 me-2 ">
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>07 مرداد 99</td>
                  <td>860,000 تومان</td>
                </tr>
                <tr>
                  <td>#51258</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/4.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/furniture1/product/5.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>04 مرداد 99</td>
                  <td>976,310 تومان</td>
                </tr>
                <tr>
                  <td>#51259</td>
                  <td><img src="../assets/images/furniture1/product/6.jpg" alt=""
                           class="img-fluid img-30 me-2 "></td>
                  <td><span class="badge badge-warning">در انتظار تایید</span>
                  </td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-warning">در حال بررسی</span></td>
                  <td>01 مرداد 99</td>
                  <td>168,000 تومان</td>
                </tr>
                <tr>
                  <td>#51260</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/7.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/furniture1/product/8.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-secondary">پرداخت نقدی</span></td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>27 خرداد 99</td>
                  <td>60,000 تومان</td>
                </tr>
                <tr>
                  <td>#51261</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/9.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/furniture1/product/10.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/1.jpg" alt=""
                           class="img-fluid img-30 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>24 خرداد 99</td>
                  <td>181,400 تومان</td>
                </tr>
                <tr>
                  <td>#51262</td>
                  <td><img src="../assets/images/grocery/product/1.jpg" alt=""
                           class="img-fluid img-30 "></td>
                  <td><span class="badge badge-danger">پرداخت شکست خورد</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-danger">لغو شده</span></td>
                  <td>21 خرداد 99</td>
                  <td>352,000 تومان</td>
                </tr>
                <tr>
                  <td>#51263</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-1/product/3.jpg" alt=""
                           class="img-fluid img-30 me-2">
                      <img src="../assets/images/layout-1/product/4.jpg" alt=""
                           class="img-fluid img-30 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>18 خرداد 99</td>
                  <td>150,000 تومان</td>
                </tr>
                <tr>
                  <td>#51264</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-1/product/6.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/7.jpg" alt=""
                           class="img-fluid img-30 ">
                    </div>
                  </td>
                  <td><span class="badge badge-warning">در انتظار تایید</span>
                  </td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-warning">در حال بررسی</span></td>
                  <td>17 خرداد 99</td>
                  <td>66,000 تومان</td>
                </tr>
                <tr>
                  <td>#51265</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-1/product/7.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/8.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/a1.jpg" alt=""
                           class="img-fluid img-30 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>11 خرداد 99</td>
                  <td>74,210 تومان</td>
                </tr>
                <tr>
                  <td>#51266</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-1/product/a2.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/a3.jpg" alt=""
                           class="img-fluid img-30 ">
                    </div>
                  </td>
                  <td><span class="badge badge-secondary">پرداخت نقدی</span></td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>09 خرداد 99</td>
                  <td>161,700 تومان</td>
                </tr>
                <tr>
                  <td>#51267</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-1/product/a4.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/a5.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/a6.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>07 خرداد 99</td>
                  <td>91,000 تومان</td>
                </tr>
                <tr>
                  <td>#51268</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-1/product/a7.jpg" alt=""
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/a8.jpg" alt=""
                           class="img-fluid img-30 ">
                    </div>
                  </td>
                  <td><span class="badge badge-danger">پرداخت شکست خورد</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-danger">لغو شده</span></td>
                  <td>03 خرداد 998</td>
                  <td>67,500 تومان</td>
                </tr>
                <tr>
                  <td>#51269</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/3.jpg"
                           alt="pro-img" class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/furniture1/product/4.jpg"
                           alt="pro-img" class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/furniture1/product/5.jpg"
                           alt="pro-img" class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>12 مرداد 99</td>
                  <td>860,000 تومان</td>
                </tr>
                <tr>
                  <td>#51270</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/6.jpg"
                           alt="pro-img" class="img-fluid img-30 me-2 "><img
                              src="../assets/images/furniture1/product/9.jpg" alt=""
                              class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/furniture1/product/7.jpg"
                           alt="pro-img" class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>30 اردیبهشت 99</td>
                  <td>178,000 تومان</td>
                </tr>
                <tr>
                  <td>#51271</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/8.jpg"
                           alt="pro-img" class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/furniture1/product/9.jpg"
                           alt="pro-img" class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/furniture1/product/10.jpg"
                           alt="pro-img" class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-warning">در انتظار تایید</span>
                  </td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-warning">در حال بررسی</span></td>
                  <td>27 اردیبهشت 99</td>
                  <td>70,000 تومان</td>
                </tr>
                <tr>
                  <td>#51272</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-3/product/1.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-3/product/2.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-danger">پرداخت شکست خورد</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-danger">لغو شده</span></td>
                  <td>20 اردیبهشت 99</td>
                  <td>84,600 تومان</td>
                </tr>
                <tr>
                  <td>#51273</td>
                  <td><img src="../assets/images/layout-1/product/8.jpg" alt=""
                           class="img-fluid img-30 me-2 "></td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>18 اردیبهشت 99</td>
                  <td>192,430 تومان</td>
                </tr>
                <tr>
                  <td>#51274</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-3/product/4.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-3/product/5.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-3/product/6.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>15 اردیبهشت 99</td>
                  <td>72,000 تومان</td>
                </tr>
                <tr>
                  <td>#51275</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-3/product/7.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-3/product/8.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-2/product/1.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>13 اردیبهشت 99</td>
                  <td>86,740 تومان</td>
                </tr>
                <tr>
                  <td>#51276</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-2/product/2.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-2/product/3.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-warning">در انتظار تایید</span>
                  </td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-warning">در حال بررسی</span></td>
                  <td>12 اردیبهشت 99</td>
                  <td>74,200 تومان</td>
                </tr>
                <tr>
                  <td>#51277</td>
                  <td>
                    <img src="../assets/images/layout-2/product/4.jpg" alt="pro-img"
                         class="img-fluid img-30 me-2 ">
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>11 اردیبهشت 99</td>
                  <td>347,000 تومان</td>
                </tr>
                <tr>
                  <td>#51278</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-2/product/5.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-2/product/6.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-danger">پرداخت شکست خورد</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-danger">لغو شده</span></td>
                  <td>09 اردیبهشت 99</td>
                  <td>100,500 تومان</td>
                </tr>
                <tr>
                  <td>#51279</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-2/product/7.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-2/product/8.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/1.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-warning">در انتظار تایید</span>
                  </td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-warning">در حال بررسی</span></td>
                  <td>08 اردیبهشت 99</td>
                  <td>456,000 تومان</td>
                </tr>
                <tr>
                  <td>#51280</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-1/product/2.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/3.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>06 اردیبهشت 99</td>
                  <td>17,450 تومان</td>
                </tr>
                <tr>
                  <td>#51281</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-1/product/4.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/5.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/6.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>17 خرداد 99</td>
                  <td>58,000 تومان</td>
                </tr>
                <tr>
                  <td>#51282</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-1/product/7.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/8.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-danger">پرداخت شکست خورد</span></td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-danger">لغو شده</span></td>
                  <td>05 اردیبهشت 99</td>
                  <td>370,000 تومان</td>
                </tr>
                <tr>
                  <td>#51283</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-2/product/1.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-3/product/1.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-4/product/1.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-warning">در انتظار تایید</span>
                  </td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-warning">در حال بررسی</span></td>
                  <td>03 اردیبهشت 99</td>
                  <td>91,100 تومان</td>
                </tr>
                <tr>
                  <td>#51284</td>
                  <td><img src="../assets/images/layout-5/product/1.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 "></td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>12 اردیبهشت 99</td>
                  <td>79,000 تومان</td>
                </tr>
                <tr>
                  <td>#51285</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/1.jpg"
                           alt="pro-img" class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/cosmetic/product/1.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>31 فروردین 99</td>
                  <td>151,000 تومان</td>
                </tr>
                <tr>
                  <td>#51286</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-1/product/3.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-2/product/4.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-3/product/5.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-danger">پرداخت شکست خورد</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-danger">لغو شده</span></td>
                  <td>29 فروردین 99</td>
                  <td>94,260 تومان</td>
                </tr>
                <tr>
                  <td>#51287</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/layout-6/product/1.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/1.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>28 فروردین 99</td>
                  <td>78,500 تومان</td>
                </tr>
                <tr>
                  <td>#51288</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/5.jpg"
                           alt="pro-img" class="img-fluid img-30 me-2 ">
                      <img src="../assets/images/layout-1/product/4.jpg" alt="pro-img"
                           class="img-fluid img-30 me-2 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>24 فروردین 99</td>
                  <td>67,180 تومان</td>
                </tr>
                <tr>
                  <td>#51289</td>
                  <td>
                    <img src="../assets/images/furniture1/product/1.jpg" alt=""
                         class="img-fluid img-30 ">
                  </td>
                  <td><span class="badge badge-warning">در انتظار تایید</span>
                  </td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-warning">در حال بررسی</span></td>
                  <td>12 مرداد 99</td>
                  <td>96,700 تومان</td>
                </tr>
                <tr>
                  <td>#51290</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/1.jpg" alt=""
                           class="img-fluid img-30 ">
                      <img src="../assets/images/furniture1/product/3.jpg" alt=""
                           class="img-fluid img-30 ">
                      <img src="../assets/images/furniture1/product/8.jpg" alt=""
                           class="img-fluid img-30 ">
                    </div>
                  </td>
                  <td><span class="badge badge-warning">در انتظار تایید</span>
                  </td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-warning">در حال بررسی</span></td>
                  <td>27 فروردین 99</td>
                  <td>86,400 تومان</td>
                </tr>
                <tr>
                  <td>#51291</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/1.jpg" alt=""
                           class="img-fluid img-30 ">
                      <img src="../assets/images/furniture1/product/2.jpg" alt=""
                           class="img-fluid img-30 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>25 فروردین 99</td>
                  <td>867,000 تومان</td>
                </tr>
                <tr>
                  <td>#51292</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/3.jpg" alt=""
                           class="img-fluid img-30 ">
                      <img src="../assets/images/furniture1/product/4.jpg" alt=""
                           class="img-fluid img-30 ">
                    </div>
                  </td>
                  <td><span class="badge badge-danger">پرداخت شکست خورد</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-danger">لغو شده</span></td>
                  <td>19 فروردین 99</td>
                  <td>16,000 تومان</td>
                </tr>
                <tr>
                  <td>#51293</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/6.jpg" alt=""
                           class="img-fluid img-30 ">
                      <img src="../assets/images/furniture1/product/7.jpg" alt=""
                           class="img-fluid img-30 ">
                      <img src="../assets/images/furniture1/product/8.jpg" alt=""
                           class="img-fluid img-30 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>زرین پال</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>18 فروردین 99</td>
                  <td>57,000 تومان</td>
                </tr>
                <tr>
                  <td>#51294</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/furniture1/product/9.jpg" alt=""
                           class="img-fluid img-30 ">
                      <img src="../assets/images/furniture1/product/10.jpg" alt=""
                           class="img-fluid img-30 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-success">تحویل داده شده</span></td>
                  <td>20 فروردین 99</td>
                  <td>74,000 تومان</td>
                </tr>
                <tr>
                  <td>#51294</td>
                  <td>
                    <img src="../assets/images/furniture1/product/2.jpg" alt=""
                         class="img-fluid img-30 ">
                  </td>
                  <td><span class="badge badge-danger">پرداخت شکست خورد</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-danger">لغو شده</span></td>
                  <td>12 مرداد 99</td>
                  <td>86,000 تومان</td>
                </tr>
                <tr>
                  <td>#51295</td>
                  <td>
                    <div class="d-flex">
                      <img src="../assets/images/cosmetic/product/2.jpg" alt=""
                           class="img-fluid img-30 ">
                      <img src="../assets/images/cosmetic/product/4.jpg" alt=""
                           class="img-fluid img-30 ">
                    </div>
                  </td>
                  <td><span class="badge badge-success">پرداخت شده</span></td>
                  <td>کارت به کارت</td>
                  <td><span class="badge badge-primary">در حال ارسال</span></td>
                  <td>17 فروردین 99</td>
                  <td>19,000 تومان</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->

  </div>
@endsection