@if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif

@if ($message = Session::get('error'))
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif

@if ($message = Session::get('warning'))
  <div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif

@if ($message = Session::get('info'))
  <div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
@endif

@if ($errors->any())
  <div class="row justify-content-center">
    <div class="col-md-11">
      <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
        <ul>
          @foreach($errors->all() as $errorText)
            <li>{{ $errorText }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endif
