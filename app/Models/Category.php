<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const ROOT_ID = 1;
    protected $fillable = [
      'name',
      'slug',
      'parent_id',
      'description',
      'preview_text',
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
}
