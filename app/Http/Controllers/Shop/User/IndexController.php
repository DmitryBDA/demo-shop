<?php

namespace App\Http\Controllers\Shop\User;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  protected $categoryRepository;
  protected $productRepository;

  public function __construct()
  {
    $this->categoryRepository = app(CategoryRepository::class);
    $this->productRepository = app(ProductRepository::class);

  }

  public function index()
  {
    $obCategoryList = $this->categoryRepository->getAllCategories();
    $obNewProductList = $this->productRepository->getNewProducts();

    return view('pages.user.index', compact('obCategoryList', 'obNewProductList'));
  }
}
