<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'name',
    'slug',
    'category_id',
    'description',
    'preview_text',
    'image',
    'active',
    'price',
    'old_price',
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

  public function createSlug($name)
  {
    if (static::whereSlug($slug = Str::slug($name))->exists()) {

      $max = static::whereName($name)->latest('id')->value('slug');

      if (isset($max[-1]) && is_numeric($max[-1])) {

        return preg_replace_callback('/(\d+)$/', function ($mathces) {

          return $mathces[1] + 1;
        }, $max);
      }
      return "{$slug}-2";
    }
    return $slug;
  }
}
