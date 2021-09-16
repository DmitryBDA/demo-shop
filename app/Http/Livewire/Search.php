<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Pagination\Paginator;
use Livewire\Component;

class Search extends Component
{
  public $searchTerm = '';
  public $categories;
  public $currentPage = 1;

  protected $categoryRepository;


  public function __construct()
  {
    $this->categoryRepository = app(CategoryRepository::class);
  }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $this->categories = Category::where('name', 'like', $searchTerm)->paginate(5);
        $links = $this->categories;
        $this->categories = collect($this->categories->items());

        return view('livewire.search', [
          'categories' => compact($this->categories),
          'links' => $links
        ]);
    }

    public function setPage($url)
    {
      $this->currentPage = explode('page=', $url)[1];
      Paginator::currentPageResolver(function () {
        return $this->currentPage;
      });
    }
}
