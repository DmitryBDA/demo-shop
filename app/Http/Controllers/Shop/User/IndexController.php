<?php

namespace App\Http\Controllers\Shop\User;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  protected $categoryRepository;

  public function __construct()
  {
    $this->categoryRepository = app(CategoryRepository::class);

  }

  public function index()
  {
    $obCategoryList = $this->categoryRepository->getAllCategories();

    return view('pages.user.index', compact('obCategoryList'));
  }
}
