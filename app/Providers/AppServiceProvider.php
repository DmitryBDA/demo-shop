<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Observers\CategoryObserver;
use App\Observers\ProductObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CategoryRepository $categoryRepository)
    {
      Category::observe(CategoryObserver::class);
      Product::observe(ProductObserver::class);

      //Переменная $categoryList будет доступна во всех шаблонах
      $obTreeCategoryList = $categoryRepository->getTree();

      $obAllCategoryList = $categoryRepository->getAllCategories();
      $obFavoritesCategoryList = $categoryRepository->getFavoritesCategories();

      View::share([
        'obTreeCategoryList' => $obTreeCategoryList,
        'obAllCategoryList' => $obAllCategoryList,
        'obFavoritesCategoryList' => $obFavoritesCategoryList,
      ]);

      Paginator::useBootstrap();
    }
}
