@extends('layouts.user.main')

@section('title', 'Корзина')

@section('body')
  <body class="page home page-template-default">
  @endsection

  @section('content')
    <div id="content" class="site-content">
      <div class="col-full">
        <div class="row">
          <nav class="woocommerce-breadcrumb">
            <a href="home-v1.html">Home</a>
            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
            Cart
          </nav>
          <!-- .woocommerce-breadcrumb -->
          <div id="primary" class="content-area">
            <main id="main" class="site-main">
              <div class="type-page hentry">
                <div class="entry-content">
                  <div class="woocommerce">
                    <div class="cart-wrapper _cart-wrapper">
                      @include('pages.user.cart.cart-wrapper')
                    </div>
                    <!-- .cart-wrapper -->
                  </div>
                  <!-- .woocommerce -->
                </div>
                <!-- .entry-content -->
              </div>
              <!-- .hentry -->
            </main>
            <!-- #main -->
          </div>
          <!-- #primary -->
        </div>
        <!-- .row -->
      </div>
      <!-- .col-full -->
    </div>
@endsection

