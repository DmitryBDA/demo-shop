<?php


namespace App\Repositories;

use App\Models\Category as Model;

class CategoryRepository extends CoreRepository
{

  protected function getModelClass()
  {
    return Model::class;
  }

  /**
   *Получить категории для вывода пагинатором
   *
   * @param int|null $perPage
   *
   * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
   */
  public function getAllWithPaginate($perPage = null)
  {
    $columns = ['id', 'name', 'parent_id', 'slug', 'preview_text', 'description', 'active'];

    $result = $this
      ->startCondition()
      ->select($columns)
      ->with([
        'parentCategory:id,name',
      ])
      ->paginate($perPage);

    return $result;
  }

  public function getEdit($id)
  {
    return $this->startCondition()->find($id);
  }

  public function getForComboBox()
  {
    $columns = implode(', ', [
      'id',
      'CONCAT (id, ". ", name) AS id_name',
    ]);

    $result = $this->startCondition()
      ->selectRaw($columns)
      ->toBase()
      ->get();

    return $result;
  }
}
