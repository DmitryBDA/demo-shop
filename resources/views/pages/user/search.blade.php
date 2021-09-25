@extends('layouts.user.main')

@section('title', 'Поиск')

@section('body')
  <body class="page-template-template-homepage-v3">
  @endsection

  @section('content')
    <div id="content" class="site-content" tabindex="-1">
      <div class="col-full">
        <nav class="woocommerce-breadcrumb">
          <a href="home-v1.html">Home</a>
          <span class="delimiter">
              <i class="tm tm-breadcrumbs-arrow-right"></i>
            </span>Search
        </nav>
        <div class="row">
          <div id="primary" class="content-area">
            <main id="main" class="site-main">
              <div class="tab-content">
                <div id="grid-extended" class="tab-pane active" role="tabpanel">
                  <div class="woocommerce columns-4">
                    @if(!empty($paginator))
                    <div class="products _search_products">
                      @foreach($paginator as $obProduct)
                      <div class="product ">
                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                           href="#">
                          <picture>
                            <source class="attachment-shop_catalog size-shop_catalog wp-post-image" type="image/webp"
                                    srcset="">
                            <img class="attachment-shop_catalog size-shop_catalog wp-post-image" loading="lazy"
                                 src=""
                                 alt="" width="224" height="197">
                          </picture>
                          <span class="price">
                              <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">Р</span>{{ $obProduct->price }}</span>
                          </span>
                          <h2 class="woocommerce-loop-product__title"> {{ $obProduct->name }}</h2>
                        </a>
                      </div>
                      @endforeach
                    </div>
                    @endif
                  </div>
                </div>
              </div>
              <div class="shop-control-bar-bottom">
                <nav class="woocommerce-pagination _woocommerce-pagination">
 {{--                 <ul class="page-numbers">
                    {% for obPagination in arPaginationList %}
                    <li class="_shopaholic-pagination" data-page="{{obPagination.value}}">
                      {% if obPagination.class == ' active' %}
                      <span class="page-numbers current">{{ obPagination.name }}</span>
                      {% else %}
                      <a href="?page={{obPagination.value}}"
                         class="{{ obPagination.class }} page-numbers">{{ obPagination.name }}</a>
                      {% endif %}
                    </li>
                    {% endfor %}
                  </ul>--}}
                </nav>
              </div>
            </main>
          </div>
        </div>
      </div>
    </div>

@endsection

