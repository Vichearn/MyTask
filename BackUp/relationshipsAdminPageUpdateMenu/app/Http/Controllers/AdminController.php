<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use Session;
use Image;
use File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('admin.layouts.admin');
    }

    public function products(Request $request)
    {
    	$products = Product::all();
        return view('admin.products', compact('products'));
    }
}
