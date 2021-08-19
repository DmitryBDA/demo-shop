<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('pages.admin.index');
    }
}
