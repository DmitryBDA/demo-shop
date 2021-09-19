@extends('layouts.admin.main')

@section('title', 'Продукты')

@section('custom_css')
  <link rel="stylesheet" href="{{asset('adm/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adm/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adm/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('custom_js')

@endsection

@section('content')
  <div class="content-wrapper" style="min-height: 1299.69px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Продукты</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Продукты</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->

              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-sm-12 col-md-1">
                      <a href="{{route('products.create')}}" class="btn btn-block btn-primary">Создать</a>
                    </div>
                    <div class="col-sm-12 col-md-11">
                      <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="text"
                                                                                               class="form-control form-control-sm _input_search"
                                                                                               placeholder=""
                                                                                               aria-controls="example1"
                                                                                               @if(isset($_GET['searchFields'])) value="{{$_GET['searchFields']}}" @endif></label>
                      </div>
                    </div>
                  </div>
                  <div class="_ajax_product_list">
                    @include('pages.admin.ajax.products-list')
                  </div>

                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
