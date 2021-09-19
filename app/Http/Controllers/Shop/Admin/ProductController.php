<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param int $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }
}
