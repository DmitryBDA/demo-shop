<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct()
    {
      $this->categoryRepository = app(CategoryRepository::class);

    }

  public function index()
    {
      $categoryList = $this->categoryRepository->getAllWithPaginate(25);

      return view('pages.admin.categories.index', compact('categoryList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList = $this->categoryRepository->getForComboBox();


        return view('pages.admin.categories.create', compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

      $data = $request->input();

      $category = (new Category())->create($data);

      if($category){
        return redirect()
          ->route('categories.index')
          ->with(['success' => 'Успешно сохранено']);
      } else {
        return back()
          ->withErrors(['msg' => "Ошибка сохранения"])
          ->withInput();
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $obCategory = $this->categoryRepository->getEdit($id);

        $categoryList = $this->categoryRepository->getForComboBox();

        return view('pages.admin.categories.edit', compact('obCategory', 'categoryList'));
    }


    public function update(Request $request, $id)
    {
      $obCategory = $this->categoryRepository->getEdit($id);
      if(empty($obCategory)){
        return back()
          ->withErrors(['msg' => "Запись id={$id} не найдена"])
          ->withInput();
      }

      $data = $request->all();

      $result = $obCategory->update($data);

      if($result){
        return redirect()
          ->route('categories.edit', $obCategory->id)
          ->with(['success' => 'Успешно сохранено']);
      } else {
        return back()
          ->withErrors(['msg' => "Ошибка сохранения"])
          ->withInput();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
