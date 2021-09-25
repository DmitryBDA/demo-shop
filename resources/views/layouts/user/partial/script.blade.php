<script type="text/javascript" src="user/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="user/assets/js/tether.min.js"></script>
<script type="text/javascript" src="user/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="user/assets/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="user/assets/js/hidemaxlistitem.min.js"></script>
<script type="text/javascript" src="user/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="user/assets/js/hidemaxlistitem.min.js"></script>
<script type="text/javascript" src="user/assets/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="user/assets/js/scrollup.min.js"></script>
<script type="text/javascript" src="user/assets/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="user/assets/js/waypoints-sticky.min.js"></script>
<script type="text/javascript" src="user/assets/js/pace.min.js"></script>
<script type="text/javascript" src="user/assets/js/slick.min.js"></script>
<script type="text/javascript" src="user/assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
  var path = "{{ route('search.autocompilation') }}";
  $('#search').typeahead({
    minLength: 2,
    source:  function (query, process) {
      return $.get(path, { query: query }, function (data) {
        return process(data);
      });
    }
  });
</script>
<script src="{{mix('/assets/js/main.js')}}"></script>
