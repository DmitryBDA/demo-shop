<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    const ROOT_ID = 1;
    protected $fillable = [
      'name',
      'slug',
      'parent_id',
      'description',
      'preview_text',
      'image',
      'active',
    ];

  /**
   *Получить родительскую категорию
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function parentCategory()
  {
    return $this->belongsTo(Category::class,'parent_id', 'id');
  }

  /**
   *Пример аксесуара (Accessor)
   *
   *@return string
   */
  public function getParentTitleAttribute()
  {

    $title = $this->parentCategory->name
      ?? ($this->isRoot()
        ? 'Корень'
        : '???');

    return $title;
  }

  /**
   *Является ли текущий объект корнем
   *
   * @return bool
   */
  private function isRoot()
  {
    return $this->id === Category::ROOT_ID;
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
