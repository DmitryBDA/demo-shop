<?php

namespace App\Http\Controllers\Shop\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
      return view('pages.user.catalog.index');
    }
}
