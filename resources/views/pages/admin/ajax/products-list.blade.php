

  <div class="row">
    <div class="col-sm-12">
      <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
             aria-describedby="example1_info">
        <thead>
        <tr role="row">
          <th class="sorting sorting_asc "  tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
              aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
              style="">ID
          </th>
          <th class="sorting"  tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
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
      <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Показано с {{$paginator->toArray()['from']}} по {{$paginator->toArray()['to']}}
        из {{$paginator->toArray()['total']}} записей
      </div>
    </div>
    <div class="col-sm-12 col-md-7">
      <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
        {{ $paginator->withQueryString()->links('vendor.pagination.custom') }}
      </div>
    </div>
  </div>

