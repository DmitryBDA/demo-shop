<?php


namespace App\filters;


class ProductFilter extends QueryFilter
{
  protected $sortDirection;

  public function searchFields($search_string = '')
  {
    return $this->builder
      ->where(function ($query) use ($search_string) {
        $query->where('name', 'LIKE', '%' . $search_string . '%')
          ->orWhere('description', 'LIKE', '%' . $search_string . '%');
      });
  }



  public function sortField($sort = null)
  {

    return $this->builder
      ->when($sort, function ($query) use ($sort) {
        $parametrsSearch = explode('|', $sort);

        $query->orderBy($parametrsSearch[0], $parametrsSearch[1]);
      });

  }


}
