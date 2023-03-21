<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $products = Product::all();

    $view = view('products.index', ['products' => $products]);

    $response = new Response($view);

    return $response;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();

    $view = view('products.create', compact('categories'));

    $response = new Response($view);

    return $response;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $product = new Product;

    $product->name = $request->input('name');
    $product->slug = $request->input('slug');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->quantity = $request->input('quantity');
    $product->category_id = $request->input('category_id');

    $product->save();

    return redirect()->route('products.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $product = Product::find($id);

    $view =  view('products.show', compact('product'));

    $response = new Response($view);

    return $response;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $product = Product::find($id);

    $categories = Category::all();

    $view = view('products.edit', compact('product', 'categories'));

    $response = new Response($view);

    return $response;
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
    $request->validate([
      'name' => 'required',
      'description' => 'required',
      'price' => 'required|numeric',
      'quantity' => 'required|integer',
      'category_id' => 'required|exists:categories,id',
    ]);

    $product = Product::findOrFail($id);

    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->quantity = $request->input('quantity');
    $product->category_id = $request->input('category_id');

    $product->save();

    return redirect()->route('products.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http
   */
  public function destroy($id)
  {
    $product = Product::find($id);

    if (!$product) {
      return redirect()->back()->with('error', 'Produto não encontrado');
    }

    $product->delete();

    $view = view('products.destroy', compact('product'));

    $response = new Response($view);

    return $response;
  }
}
