<div class="row">
  <div class="col-sm-12">
    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
           aria-describedby="example1_info">
      <thead>

      <tr role="row">
        <th
          class="sorting @if(isset($_GET['sortField']) and $_GET['sortField'] == 'id|asc') sorting_asc @elseif(isset($_GET['sortField']) and $_GET['sortField'] == 'id|desc') sorting_desc @endif"
          data-sorting="@if(isset($_GET['sortField']) and $_GET['sortField'] == 'id|asc') id|desc @else id|asc @endif"
          tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
          aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
          style="">ID
        </th>
        <th
          class="sorting @if(isset($_GET['sortField']) and $_GET['sortField'] == 'name|asc') sorting_asc @elseif(isset($_GET['sortField']) and $_GET['sortField'] == 'name|desc') sorting_desc @endif"
          data-sorting="@if(isset($_GET['sortField']) and $_GET['sortField'] == 'name|asc')name|desc @else name|asc @endif"
          tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
          aria-label="Browser: activate to sort column ascending" style="">Название
        </th>
        <th
          class="sorting @if(isset($_GET['sortField']) and $_GET['sortField'] == 'slug|asc') sorting_asc @elseif(isset($_GET['sortField']) and $_GET['sortField'] == 'slug|desc') sorting_desc @endif"
          data-sorting="@if(isset($_GET['sortField']) and $_GET['sortField'] == 'slug|asc') slug|desc @else slug|asc @endif"
          tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
          aria-label="Platform(s): activate to sort column ascending" style="">Slug
        </th>
        <th
          class="sorting @if(isset($_GET['sortField']) and $_GET['sortField'] == 'category_id|asc') sorting_asc @elseif(isset($_GET['sortField']) and $_GET['sortField'] == 'category_id|desc') sorting_desc @endif"
          data-sorting="@if(isset($_GET['sortField']) and $_GET['sortField'] == 'category_id|asc') category_id|desc @else category_id|asc @endif"
          tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
          aria-label="Engine version: activate to sort column ascending">Родитель
        </th>
        <th
          class="sorting @if(isset($_GET['sortField']) and $_GET['sortField'] == 'active|asc') sorting_asc @elseif(isset($_GET['sortField']) and $_GET['sortField'] == 'active|desc') sorting_desc @endif"
          data-sorting="@if(isset($_GET['sortField']) and $_GET['sortField'] == 'active|asc') active|desc @else active|asc @endif"
          tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
          aria-label="CSS grade: activate to sort column ascending">Активный
        </th>
      </tr>
      </thead>
      <tbody>

      @foreach($paginator as $obProduct)
        <tr class="odd">
          <td class="sorting_1 dtr-control" tabindex="0" style="">{{$obProduct->id}}</td>
          <td style=""><a href="{{route('categories.edit', $obProduct->id)}}">{{$obProduct->name}}</a></td>
          <td style="">{{$obProduct->slug}}</td>
          <td class="">{{$obProduct->category->name}}</td>
          <td>{{$obProduct->active}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="row">
  <div class="col-sm-12 col-md-5">
    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Показано
      с {{$paginator->toArray()['from']}} по {{$paginator->toArray()['to']}}
      из {{$paginator->toArray()['total']}} записей
    </div>
  </div>
  <div class="col-sm-12 col-md-7">
    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
      {{ $paginator->withQueryString()->links('vendor.pagination.custom') }}
    </div>
  </div>
</div>


