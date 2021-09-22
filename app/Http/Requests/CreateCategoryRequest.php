<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => 'required',
      'slug' => 'max:200|unique:categories',
      'description' => 'string|max:1000',
//      'category_id' => 'required|integer|exists:blog_categories,id'
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Введите название категории',
//      'description.min' => 'Минимальная длина статьи [:min] символов'
    ];
  }

  public function attributes()
  {
    return [
      'name' => 'Название',
    ];
  }
}
