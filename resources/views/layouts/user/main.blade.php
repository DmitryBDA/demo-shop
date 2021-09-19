<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<head>

  @include('layouts.user.partial.meta')

  @include('layouts.user.partial.style')
  {{--    <link rel="stylesheet" type="text/css" href="user/assets/css/custom.css" media="all" />--}}

</head>
@yield('body')
<div id="page" class="hfeed site">

  @include('layouts.user.partial.topbar')

  @include('layouts.user.partial.header')

  @yield('content')

  @include('layouts.user.partial.script')

  @include('layouts.user.partial.footer')

</div>
</body>
</html>
