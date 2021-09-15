@extends('layouts.admin.main')

@section('title', 'Категории')

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
            <h1>Категории</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Категории</li>
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
                      <a href="{{route('categories.create')}}" class="btn btn-block btn-primary">Создать</a>
                    </div>
                    <div class="col-sm-12 col-md-11">
                      <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                                                                               class="form-control form-control-sm"
                                                                                               placeholder=""
                                                                                               aria-controls="example1"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                             aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                          <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                              aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                              style="">ID
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                              aria-label="Browser: activate to sort column ascending" style="">Название
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                              aria-label="Platform(s): activate to sort column ascending" style="">Slug
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                              aria-label="Engine version: activate to sort column ascending">Родитель
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                              aria-label="CSS grade: activate to sort column ascending">Активный
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categoryList as $category)
                          <tr class="odd">
                            <td class="sorting_1 dtr-control" tabindex="0" style="">{{$category->id}}</td>
                            <td style=""><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                            <td style="">{{$category->slug}}</td>
                            <td class="">{{$category->parentTitle}}</td>
                            <td>{{$category->active}}</td>
                          </tr>
                        @endforeach


                        </tbody>
                        <tfoot>
                        <tr>
                          <th rowspan="1" colspan="1" style="">Rendering engine</th>
                          <th rowspan="1" colspan="1" style="">Browser</th>
                          <th rowspan="1" colspan="1" style="">Platform(s)</th>
                          <th rowspan="1" colspan="1">Engine version</th>
                          <th rowspan="1" colspan="1">CSS grade</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-5">
                      <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10
                        of 57 entries
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                      <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                          <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#"
                                                                                                            aria-controls="example1"
                                                                                                            data-dt-idx="0"
                                                                                                            tabindex="0"
                                                                                                            class="page-link">Previous</a>
                          </li>
                          <li class="paginate_button page-item active"><a href="#" aria-controls="example1"
                                                                          data-dt-idx="1" tabindex="0"
                                                                          class="page-link">1</a></li>
                          <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                          <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                          <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                          <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">5</a></li>
                          <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6"
                                                                    tabindex="0" class="page-link">6</a></li>
                          <li class="paginate_button page-item next" id="example1_next"><a href="#"
                                                                                           aria-controls="example1"
                                                                                           data-dt-idx="7" tabindex="0"
                                                                                           class="page-link">Next</a>
                          </li>
                        </ul>
                      </div>
                    </div>
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
