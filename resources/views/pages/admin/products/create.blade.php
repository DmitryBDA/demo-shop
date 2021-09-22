@extends('layouts.admin.main')

@section('title', 'Создание продукта')

@section('custom_css')

@endsection

@section('custom_js')

@endsection

@section('content')
  <div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Создание продукта</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" name="active" value="1" id="active">
                      <label class="custom-control-label" for="active">Активный</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Название</label>
                    <input type="name" class="form-control" id="name" name="name" placeholder="Введите название">
                  </div>
                  <div class="form-group">
                    <label>Родитель</label>
                    <select class="form-control" name="category_id">
                      @foreach($categoryList as $category)
                        <option value="{{$category->id}}">{{$category->id_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="slug" class="form-control" id="slug" name="slug" placeholder="Введите slug">
                  </div>
                  <div class="form-group">
                    <label for="price">Цена</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Введите цену">
                  </div>
                  <div class="form-group">
                    <label for="old_price">Старая цена</label>
                    <input type="number" class="form-control" id="old_price" name="old_price" placeholder="Введите старую цену">
                  </div>
                  <div class="form-group">
                    <label>Краткое описание</label>
                    <textarea class="form-control" name="preview_text" rows="2" placeholder="Enter ..."></textarea>
                  </div><div class="form-group">
                    <label>Полное описание</label>
                    <textarea class="form-control" name="description" rows="4" placeholder="Enter ..."></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Изображение</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Создать</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
              </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
