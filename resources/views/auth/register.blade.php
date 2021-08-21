@extends('layouts.user.main')

@section('title', 'Регистрация')

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
            </span>My Account
          </nav>
          <!-- .woocommerce-breadcrumb -->
          <div id="primary" class="content-area">
            <main id="main" class="site-main">
              <div class="type-page hentry">
                <div class="entry-content">
                  <div class="woocommerce">
                    <div class="customer-login-form">
                      <div id="customer_login" class="u-columns col2-set">
                        <!-- .col-1 -->
                        <div class="u-column2 col-2">
                          <h2>{{ __('Register') }}</h2>
                          <form class="register" method="post" action="{{ route('register') }}">
                            @csrf
                            <p class="before-register-text">
                              Create new account today to reap the benefits of a personalized shopping experience. Praesent placerat, est sed aliquet finibus.
                            </p>
                            <p class="form-row form-row-wide">
                              <label for="name">{{ __('Name') }}
                                <span class="required">*</span>
                              </label>
                              <input type="email" value="{{ old('name') }}" id="name" name="name" class="woocommerce-Input @error('name') is-invalid @enderror woocommerce-Input--text input-text">
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                            </p>
                            <p class="form-row form-row-wide">
                              <label for="reg_email">{{ __('E-Mail Address') }}
                                <span class="required">*</span>
                              </label>
                              <input type="email" value="{{ old('email') }}" id="reg_email" name="email" class="@error('email') is-invalid @enderror woocommerce-Input woocommerce-Input--text input-text">
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                            </p>
                            <p class="form-row form-row-wide">
                              <label for="reg_password">{{ __('Password') }}
                                <span class="required">*</span>
                              </label>
                              <input type="password" id="reg_password" name="password" class="@error('password') is-invalid @enderror woocommerce-Input woocommerce-Input--text input-text">
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                            </p>
                            <p class="form-row form-row-wide">
                              <label for="password-confirm">{{ __('Confirm Password') }}
                                <span class="required">*</span>
                              </label>
                              <input type="password" id="password-confirm" name="password_confirmation" class="woocommerce-Input woocommerce-Input--text input-text">
                            </p>
                            <p class="form-row">
                              <input type="submit" class="woocommerce-Button button" name="register" value="{{ __('Register') }}" />
                            </p>
                            <div class="register-benefits">
                              <h3>Sign up today and you will be able to :</h3>
                              <ul>
                                <li>Speed your way through checkout</li>
                                <li>Track your orders easily</li>
                                <li>Keep a record of all your purchases</li>
                              </ul>
                            </div>
                          </form>
                          <!-- .register -->
                        </div>
                        <!-- .col-2 -->
                      </div>
                      <!-- .col2-set -->
                    </div>
                    <!-- .customer-login-form -->
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

