<?php


namespace App\Repositories;

use App\filters\ProductFilter;
use App\Models\Product as Model;

class ProductRepository extends CoreRepository
{

  protected function getModelClass()
  {
    return Model::class;
  }

  /**
   *Получить продукты  для вывода пагинатором
   *
   * @param int|null $perPage
   *
   * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
   */
  public function getAllWithPaginate($perPage = null)
  {
    $columns = ['id', 'name', 'category_id', 'slug', 'preview_text', 'description', 'active'];

    $filter = app(ProductFilter::class);

    $result = $this
      ->startCondition()
      ->select($columns)
      ->filter($filter)
      ->with([
        'category:id,name',
      ])
      ->paginate($perPage);

    return $result;
  }

  public function getEdit($id)
  {
    return $this->startCondition()->find($id);
  }

}
