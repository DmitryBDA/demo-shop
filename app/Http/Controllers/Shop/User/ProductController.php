<?php

namespace App\Http\Controllers\Shop\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function product()
  {
    return 'product';
  }

  public function search(Request $request)
  {
    $q = $request->input('q');

    if(isset($q)){
      $paginator = Product::where('name', 'LIKE', "%{$q}%")->get();
    } else {
      $paginator = '';
    }

    return view('pages.user.search', compact('paginator'));
  }
  public function searchAutocompilation(Request $request)
  {
    $result = Product::where('name', 'LIKE', "%{$request->input('query')}%")->get();
    return response()->json($result);
  }
}
