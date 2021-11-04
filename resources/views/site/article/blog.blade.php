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
              {{--<h2>اخبار</h2>--}}
              <ul>
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li><i class="fa fa-angle-double-left"></i></li>
                <li>{{ __('Articles') }}</li>
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
          @foreach($articles as $article)
            @php
              $comments = \App\Comment::where('article_id',$article->id)->where('status','approved')->get();
            @endphp
            <div class="row blog-media">
              <div class="col-xl-6">
                <div class="blog-left">
                  <a href="{{ url('/artilce/'.$article->slug) }}">
                    @if($article->article_image_id!==null)
                    <img src="{{ url('uploads/article_images/'.$article->articleImage['image']) }}"
                         class="img-fluid" alt="{{ __('Article Image') }}">
                      @else
                      <img src="{{ url('images/custom/noimage.png') }}"
                           class="img-fluid" alt="{{ __('Article Image') }}">
                    @endif
                  </a>
                  <div class="date-label">{{ $date->date("j F Y" , strtotime($article->updated_at)) }}</div>
                </div>
              </div>
              <div class="col-xl-6">
                <div class="blog-right">
                  <div>
                    <a href="{{ url('/artilce/'.$article->slug) }}">
                      <h4>{{ $article->title }}</h4>
                    </a>
                    <ul class="post-social">
                      <li>{{ __('Author: Site Admin') }}</li>
                      {{--<li><i class="fa fa-heart"></i> 5 پسند</li>--}}
                      <li><i class="fa fa-comments"></i> {{ sizeof($comments) }} دیدگاه</li>
                    </ul>
                    <p>{{ mb_strimwidth($article->description,0,200,'---') }}</p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

        </div>

        <div class="col-xl-3 col-lg-4 col-md-5 order-sec">
          <div class="blog-sidebar">
            <div class="theme-card">
              <h4>{{ __('The most popular articles') }}</h4>
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

        <div class="row justify-content-center">
          <div class="col-9">
            <div class="product-pagination">
              <div class="theme-paggination-block">
                <div class="row">
                  <div class="col-xl-6 col-md-6 col-sm-12">
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        @if ($articles->currentPage() != 1)
                          <li class="page-item">
                            <a class="page-link"
                               href="{{ $articles->previousPageUrl() }}" aria-label="Previous">
                              <span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                              <span class="sr-only">{{ __('Previous') }}</span>
                            </a>
                          </li>
                        @endif
                        @for ($i = 1; $i <= $articles->lastPage(); $i++)
                          <li class="page-item @if ($articles->currentPage()==$i)active @endif">
                            <a class="page-link" href="{{ $articles->url($i)  }}">
                              @if ($articles->currentPage()==$i) صفحه {{$i}} از {{$articles->lastPage()}} @else {{$i}} @endif
                            </a>
                          </li>
                          {{--@if ($i === ($products->lastPage()-3))--}}
                          {{--<li><a>...</a></li>--}}
                          {{--@endif--}}
                        @endfor
                        @if ($articles->currentPage() != $articles->lastPage())
                          <li class="page-item">
                            <a class="page-link" href="{{ $articles->nextPageUrl() }}" aria-label="Next">
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
                        $from = (($articles->currentPage() -1)  * $articles->perPage()) + 1;
                        $to = (($from + $articles->perPage()) <= $articles->total()) ? ($from + $articles->perPage())-1 : $articles->total();
                      @endphp
                      <h5 style="direction: ltr">  {{ $from }}-{{ $to  }}  {{ __('From') }} {{ $articles->total() }} </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Section ends -->

@endsection