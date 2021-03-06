<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct()
    {
      $this->categoryRepository = app(CategoryRepository::class);

    }

  public function index()
    {
      $paginator = $this->categoryRepository->getAllWithPaginate(5);

      return view('pages.admin.categories.index', compact('paginator'));
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


    public function store(CreateCategoryRequest $request)
    {

      $data = $request->input();

      if($request->file('image')){
        $path = $request->file('image')->store('categories');
        $data['image'] = $path;
      }
      $category = Category::create($data);

      if($category){
        return redirect()
          ->route('categories.index')
          ->with(['success' => 'Успешно сохранено']);
      } else {
        return back()
          ->with(['error' => "Ошибка сохранения"])
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
          ->with(['error' => "Запись id={$id} не найдена"])
          ->withInput();
      }
      $data = $request->input();

      if($request->file('image')){
        Storage::delete($obCategory->image);
        File::delete(public_path('/assets/images/').$obCategory->image);
        $path = $request->file('image')->store('categories');
        $data['image'] = $path;
      }

      $result = $obCategory->update($data);

      if($result){
        return redirect()
          ->route('categories.edit', $obCategory->id)
          ->with(['success' => 'Успешно сохранено']);
      } else {
        return back()
          ->with(['error' => "Ошибка сохранения"])
          ->withInput();
      }
    }


    public function destroy($id)
    {
      //софт удаление
      $result = Category::destroy($id);

      //полное удаление
      //$result = Product::find($id)->forceDelete();
      if($result){
        //BlogPostAfterDeleteJob::dispatch($id)->delay(30);

        return redirect()
          ->route('categories.index')
          ->with(['success' => "Запись id=$id удалена"]);
      } else {
        return back()
          ->with(['error' => 'Ошибка удаление']);
      }
    }
}
