@extends('site.layout.master')


@section('title')
  {{ __('Blog') }}
@endsection


@section('content')
  @php
    include_once public_path() . '/libs/helpers/jdatetime.class.php';
    $date = new jDateTime(true, true, 'Asia/Tehran');
  @endphp

  <!-- breadcrumb start -->
  <div class="breadcrumb-main ">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumb-contain">
            <div>
              <h2>اخبار</h2>
              <ul>
                <li><a href="javascript:void(0)">خانه</a></li>
                <li><i class="fa fa-angle-double-left"></i></li>
                <li><a href="javascript:void(0)">اخبار</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb End -->

  <!-- section start -->
  <section class="section-big-py-space blog-page ratio2_3">
    <div class="custom-container">
      <div class="row">
        <div class="col-xl-9 col-lg-8 col-md-7">
          <div class="row blog-media">
            <div class="col-xl-6">
              <div class="blog-left">
                <a href="javascript:void(0)"><img src="../assets/images/blog/1.jpg" class="img-fluid  " alt=""></a>
                <div class="date-label">
                  26 تیر 1400
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="blog-right">
                <div>
                  <a href="javascript:void(0)">
                    <h4>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی.</h4>
                  </a>
                  <ul class="post-social">
                    <li>نویسنده : مدیر سایت</li>
                    <li><i class="fa fa-heart"></i> 5 پسند</li>
                    <li><i class="fa fa-comments"></i> 10 دیدگاه</li>
                  </ul>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با تولید
                    سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن
                    ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم
                    ایپسوم متن ساختگی با تولید سادگی نامفهوم.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row blog-media">
            <div class="col-xl-6">
              <div class="blog-left">
                <a href="javascript:void(0)"><img src="../assets/images/blog/2.jpg" class="img-fluid  " alt=""></a>
                <div class="date-label">
                  26 تیر 1400
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="blog-right">
                <div>
                  <a href="javascript:void(0)">
                    <h4>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی.</h4>
                  </a>
                  <ul class="post-social">
                    <li>نویسنده : مدیر سایت</li>
                    <li><i class="fa fa-heart"></i> 5 پسند</li>
                    <li><i class="fa fa-comments"></i> 10 دیدگاه</li>
                  </ul>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با تولید
                    سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن
                    ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم
                    ایپسوم متن ساختگی با تولید سادگی نامفهوم.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row blog-media">
            <div class="col-xl-6">
              <div class="blog-left">
                <a href="javascript:void(0)"><img src="../assets/images/blog/3.jpg" class="img-fluid  " alt=""></a>
                <div class="date-label">
                  26 تیر 1400
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="blog-right">
                <div>
                  <a href="javascript:void(0)">
                    <h4>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی.</h4>
                  </a>
                  <ul class="post-social">
                    <li>نویسنده : مدیر سایت</li>
                    <li><i class="fa fa-heart"></i> 5 پسند</li>
                    <li><i class="fa fa-comments"></i> 10 دیدگاه</li>
                  </ul>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با تولید
                    سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن
                    ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم
                    ایپسوم متن ساختگی با تولید سادگی نامفهوم.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row blog-media">
            <div class="col-xl-6">
              <div class="blog-left">
                <a href="javascript:void(0)"><img src="../assets/images/blog/4.jpg" class="img-fluid  " alt=""></a>
                <div class="date-label">
                  26 تیر 1400
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="blog-right">
                <div>
                  <a href="javascript:void(0)">
                    <h4>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی.</h4>
                  </a>
                  <ul class="post-social">
                    <li>نویسنده : مدیر سایت</li>
                    <li><i class="fa fa-heart"></i> 5 پسند</li>
                    <li><i class="fa fa-comments"></i> 10 دیدگاه</li>
                  </ul>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با تولید
                    سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن
                    ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم
                    ایپسوم متن ساختگی با تولید سادگی نامفهوم.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-5 order-sec">
          <div class="blog-sidebar">
            <div class="theme-card">
              <h4>جدیدترین اخبار</h4>
              <ul class="recent-blog">
                <li>
                  <div class="media"> <img class="img-fluid " src="../assets/images/blog/1.jpg"
                                           alt="Generic placeholder image">
                    <div class="media-body align-self-center">
                      <h6>25 فروردین 1400</h6>
                      <p>0 بازدید</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media"> <img class="img-fluid " src="../assets/images/blog/2.jpg"
                                           alt="Generic placeholder image">
                    <div class="media-body align-self-center">
                      <h6>25 فروردین 1400</h6>
                      <p>0 بازدید</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media"> <img class="img-fluid " src="../assets/images/blog/3.jpg"
                                           alt="Generic placeholder image">
                    <div class="media-body align-self-center">
                      <h6>25 فروردین 1400</h6>
                      <p>0 بازدید</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media"> <img class="img-fluid " src="../assets/images/blog/4.jpg"
                                           alt="Generic placeholder image">
                    <div class="media-body align-self-center">
                      <h6>25 فروردین 1400</h6>
                      <p>0 بازدید</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media"> <img class="img-fluid " src="../assets/images/blog/5.jpg"
                                           alt="Generic placeholder image">
                    <div class="media-body align-self-center">
                      <h6>25 فروردین 1400</h6>
                      <p>0 بازدید</p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="theme-card">
              <h4>محبوب ترین اخبار</h4>
              <ul class="popular-blog">
                <li>
                  <div class="media">
                    <div class="blog-date"><span>03 </span><span>تیر</span></div>
                    <div class="media-body align-self-center">
                      <h6>لورم ایپسوم متن ساختگی</h6>
                      <p>0 بازدید</p>
                    </div>
                  </div>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</p>
                </li>
                <li>
                  <div class="media">
                    <div class="blog-date"><span>03 </span><span>تیر</span></div>
                    <div class="media-body align-self-center">
                      <h6>لورم ایپسوم متن ساختگی</h6>
                      <p>0 بازدید</p>
                    </div>
                  </div>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</p>
                </li>
                <li>
                  <div class="media">
                    <div class="blog-date"><span>03 </span><span>تیر</span></div>
                    <div class="media-body align-self-center">
                      <h6>لورم ایپسوم متن ساختگی</h6>
                      <p>0 بازدید</p>
                    </div>
                  </div>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</p>
                </li>
                <li>
                  <div class="media">
                    <div class="blog-date"><span>03 </span><span>تیر</span></div>
                    <div class="media-body align-self-center">
                      <h6>لورم ایپسوم متن ساختگی</h6>
                      <p>0 بازدید</p>
                    </div>
                  </div>
                  <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section ends -->

@endsection