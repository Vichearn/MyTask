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

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::paginate(12);
        return view('products.index', compact('products'));
        /*if($request->has('category_selected')){
            $products = Product::where('category_id', 3)->get();
            return view('products.index', compact('products'));
        }else{
            $products = Product::paginate(12);
            return view('products.index', compact('products'));
        }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'pd_name'   => 'required',
            'pd_detail' => 'required',
            'pd_price'  => 'required',
            'pd_image'  => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
            return Redirect::to('products/create')->withErrors($validator);
        }
        else{
            $product = new Product();
            $product->pd_name     = Input::get('pd_name');
            $product->pd_detail   = Input::get('pd_detail');
            $product->pd_price    = Input::get('pd_price');
            $product->category_id = Input::get('category_id');
            $product->created_at  = Input::get('created_at');
            $product->updated_at  = Input::get('updated_at');
            if($request->hasFile('pd_image')){
                $img = $request->file('pd_image');
                $filename = time().'.'.$img->getClientOriginalExtension();
                $location = public_path('/images/'.$filename);
                Image::make($img)->resize(300, 300)->save($location);
                $product->pd_image = $filename;
            }
            $product->save();
            Session::flash('message', 'Successfully Created Product');
            return Redirect::to('products');
        }
    }


    /*if($request->hasInput('category_selected')){
        $products = Product::where('id', $this->category_id)->get();
        return view('products.index', compact('products'));
    }else{
        $products = Product::paginate(6);
        return view('products.index', compact('products'));
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Product::find($id);
        return View::make('products.show')->with('show', $show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function findPc()
    {
        $productsCate = Product::where('category_id', 1)->get();
        return view('products.findPc', compact('productsCate'));
    }

    public function findNotebook()
    {
        $productsCate = Product::where('category_id', 2)->get();
        return view('products.findNotebook', compact('productsCate'));
    }

    public function findPhone()
    {
        $productsCate = Product::where('category_id', 3)->get();
        return view('products.findPhone', compact('productsCate'));
    }
}
