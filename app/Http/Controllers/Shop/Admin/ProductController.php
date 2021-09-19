<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

  protected $productRepository;
  protected $categoryRepository;

  public function __construct()
  {
    $this->productRepository = app(ProductRepository::class);
    $this->categoryRepository = app(CategoryRepository::class);

  }

  public function index(Request $request)
  {
    $paginator = $this->productRepository->getAllWithPaginate(10);
    if ($request->ajax()) {
      return view('pages.admin.ajax.products-list', compact('paginator'))->render();
    }
    return view('pages.admin.products.index', compact('paginator'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $categoryList = $this->categoryRepository->getForComboBox();
    return view('pages.admin.products.create', compact('categoryList'));
  }


  public function store(Request $request)
  {
    $path = $request->file('image')->store('products');

    $data = $request->input();
    $data['image'] = $path;
    $obProduct = Product::create($data);

    if($obProduct){
      return redirect()
        ->route('products.index')
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
   * @param int $id
   * @return Response
   */
  public function show($id)
  {
    //
  }


  public function edit($id)
  {
    $obProduct = $this->productRepository->getEdit($id);

    $categoryList = $this->categoryRepository->getForComboBox();

    return view('pages.admin.products.edit', compact('obProduct', 'categoryList'));
  }


  public function update(Request $request, $id)
  {
    $obProduct = $this->productRepository->getEdit($id);
    if(empty($obProduct)){
      return back()
        ->with(['error' => "Запись id={$id} не найдена"])
        ->withInput();
    }
    $data = $request->input();

    if($request->file('image')){
      Storage::delete($obProduct->image);
      File::delete(public_path('/assets/images/').$obProduct->image);
      $path = $request->file('image')->store('categories');
      $data['image'] = $path;
    }

    $result = $obProduct->update($data);

    if($result){
      return redirect()
        ->route('products.edit', $obProduct->id)
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
    $result = Product::destroy($id);

    //полное удаление
    //$result = Product::find($id)->forceDelete();
    if($result){
      //BlogPostAfterDeleteJob::dispatch($id)->delay(30);

      return redirect()
        ->route('products.index')
        ->with(['success' => "Запись id=$id удалена"]);
    } else {
      return back()
        ->with(['error' => 'Ошибка удаление']);
    }
  }
}
