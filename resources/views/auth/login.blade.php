@extends('layouts.user.main')

@section('title', 'Авторизация')

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
                        <div class="u-column1 col-1">
                          <h2>{{ __('Login') }}</h2>
                          <form method="post" action="{{ route('login') }}"
                                class="woocomerce-form woocommerce-form-login login">
                            @csrf
                            <p class="before-login-text">
                              Vestibulum lacus magna, faucibus vitae dui eget, aliquam
                              fringilla. In et commodo elit. Class aptent taciti sociosqu
                              ad litora.
                            </p>
                            <p class="form-row form-row-wide">
                              <label for="email">{{ __('E-Mail Address') }}
                                <span class="required">*</span>
                              </label>
                              <input type="text" class="input-text @error('email') is-invalid @enderror" name="email"
                                     id="email" value="{{ old('email') }}"/>
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                            </p>
                            <p class="form-row form-row-wide">
                              <label for="password">{{ __('Password') }}
                                <span class="required">*</span>
                              </label>
                              <input class="input-text @error('password') is-invalid @enderror" type="password" name="password"
                                     id="password" />
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                            </p>
                            <p class="form-row">
                              <input class="woocommerce-Button button" type="submit"
                                     value="{{ __('Login') }}" name="login">
                              <label for="remember"
                                     class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                <input
                                  class="woocommerce-form__input woocommerce-form__input-checkbox"
                                  name="remember" type="checkbox" id="remember"
                                  value="forever" {{ old('remember') ? 'checked' : '' }} /> {{ __('Remember Me') }}
                              </label>
                            </p>
                            @if (Route::has('password.request'))
                              <p class="woocommerce-LostPassword lost_password">
                                <a href="{{ route('password.request') }}">{{ __('Lost your password?') }}</a>
                              </p>
                            @endif

                          </form>
                        </div>
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

{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}
