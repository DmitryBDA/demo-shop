<?php


namespace App\filters;


class ProductFilter extends QueryFilter
{

    public function searchFields($search_string = ''){
        return $this->builder
            ->where(function ($query) use ($search_string){
                $query->where('name', 'LIKE', '%'.$search_string.'%')
                    ->orWhere('description', 'LIKE', '%'.$search_string.'%');
            });
    }

}
