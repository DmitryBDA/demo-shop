<?php

namespace App\Http\Controllers\Shop\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function cartList()
  {
    $obCartList = \Cart::getContent();
    // dd($cartItems);
    return view('pages.user.cart', compact('obCartList'));
  }


  public function addToCart(Request $request)
  {
    $result = \Cart::add([
      'id' => $request->id,
      'name' => $request->name,
      'price' => $request->price,
      'quantity' => $request->quantity,
      'attributes' => array(
        'image' => $request->image,
      )
    ]);
//    session()->flash('success', 'Product is Added to Cart Successfully !');

    return view('layouts.user.partial.header.ajax-elem.info-cart')->render();
  }

  public function updateCart(Request $request)
  {
    \Cart::update(
      $request->id,
      [
        'quantity' => [
          'relative' => false,
          'value' => $request->quantity
        ],
      ]
    );

    session()->flash('success', 'Item Cart is Updated Successfully !');

    return redirect()->route('cart.list');
  }

  public function removeCart(Request $request)
  {
    \Cart::remove($request->id);
    session()->flash('success', 'Item Cart Remove Successfully !');

    $obCartList = \Cart::getContent();
    $data['info-cart'] = view('layouts.user.partial.header.ajax-elem.info-cart')->render();
    $data['product-list'] = view('pages.user.cart.cart-wrapper', compact('obCartList'))->render();
    return $data;
  }

  public function clearAllCart()
  {
    \Cart::clear();

    session()->flash('success', 'All Item Cart Clear Successfully !');

    return redirect()->route('cart.list');
  }
}
