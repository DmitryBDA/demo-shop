<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'slug',
    'category_id',
    'description',
    'preview_text',
    'active',
  ];

  /**
   *Получить категорию
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function category()
  {
    return $this->belongsTo(Category::class,'category_id', 'id');
  }

  public function scopeFilter(Builder $builder, QueryFilter $filter){
    return $filter->apply($builder);
  }
}
