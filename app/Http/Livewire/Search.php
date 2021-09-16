<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Livewire\Component;

class Search extends Component
{
  public $searchTerm = '';
  public $categories;
  public $currentPage = 1;

  public $sortField = 'name';
  public $sortDirection = 'asc';

  protected $categoryRepository;
  protected $queryString = ['sortField', 'sortDirection'];


  public function __construct()
  {
    $this->categoryRepository = app(CategoryRepository::class);
  }

    public function render(Request $request)
    {
        $ascOrDesc = $this->sortDirection;
        $fieldTek = $this->sortField;

        $searchTerm = '%' . $this->searchTerm . '%';

        $this->categories = Category::where('name', 'like', $searchTerm)->orderBy($this->sortField, $this->sortDirection)->paginate(5);
        $links = $this->categories;
        $this->categories = collect($this->categories->items());

        return view('livewire.search', [
          'categories' => compact($this->categories),
          'links' => $links,
          'ascOrDesc' => $ascOrDesc,
          'fieldTek' => $fieldTek,
        ]);
    }

    public function sortBy($field)
    {

      $this->sortDirection = $this->sortField === $field
        ? $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc'
        :'asc';

      $this->sortField = $field;
    }

    public function setPage($url)
    {
      $this->currentPage = explode('page=', $url)[1];
      Paginator::currentPageResolver(function () {
        return $this->currentPage;
      });
    }
}
