<div class="top-bar top-bar-v2">
  <div class="col-full">
    <ul id="menu-top-bar-left" class="nav menu-top-bar-left">
      <li class="menu-item animate-dropdown">
        <a title="TechMarket eCommerce - Always free delivery" href="contact-v1.html">TechMarket eCommerce &#8211; Always free delivery</a>
      </li>
      <li class="menu-item animate-dropdown">
        <a title="Quality Guarantee of products" href="shop.html">Quality Guarantee of products</a>
      </li>
      <li class="menu-item animate-dropdown">
        <a title="Fast returnings program" href="track-your-order.html">Fast returnings program</a>
      </li>
      <li class="menu-item animate-dropdown">
        <a title="No additional fees" href="contact-v2.html">No additional fees</a>
      </li>
    </ul>
    <!-- .nav -->
    <ul id="menu-top-bar-right" class="nav menu-top-bar-right">
      <li class="hidden-sm-down menu-item animate-dropdown">
        <a title="Track Your Order" href="track-your-order.html">
          <i class="tm tm-order-tracking"></i>Track Your Order</a>
      </li>
      <li class="menu-item menu-item-has-children animate-dropdown dropdown">
        <a title="Dollar (US)" data-toggle="dropdown" class="dropdown-toggle" href="#">
          <i class="tm tm-dollar"></i>Dollar (US)
          <span class="caret"></span>
        </a>
        <ul role="menu" class="dropdown-menu">
          <li class="menu-item animate-dropdown">
            <a title="AUD" href="#">AUD</a>
          </li>
          <li class="menu-item animate-dropdown">
            <a title="INR" href="#">INR</a>
          </li>
          <li class="menu-item animate-dropdown">
            <a title="AED" href="#">AED</a>
          </li>
          <li class="menu-item animate-dropdown">
            <a title="SGD" href="#">SGD</a>
          </li>
        </ul>
        <!-- .dropdown-menu -->
      </li>
      @auth
        <li class="menu-item">
          <a title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      @endauth

      @guest
        <li class="menu-item">
          <a title="Sign in" href="{{route('login')}}">Sign in</a>
        </li>
        <li class="menu-item">
          <a title="Register" href="login-and-register.html">Register</a>
        </li>
      @endguest

    </ul>
    <!-- .nav -->
  </div>
  <!-- .col-full -->
</div>
