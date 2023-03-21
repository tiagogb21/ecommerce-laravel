<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;


class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = Category::all();

    $view = view('categories.index', ['categories' => $categories]);

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
    $view = view('categories.create');

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
    $category = new Category;

    $category->name = $request->input('name');
    $category->description = $request->input('description');
    $category->slug = $request->input('slug');

    $category->save();

    return redirect()->route('categories.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $category = Category::find($id);

    $view =  view('categories.show', compact('category'));

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
    $category = Category::find($id);

    $view = view('categories.edit', compact('category'));

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
    // Validação dos campos de entrada
    $request->validate([
      'name' => 'required',
      'description' => 'nullable',
    ]);

    // Recupera a categoria do banco de dados pelo id
    $category = Category::findOrFail($id);

    // Atualiza os campos da categoria com os dados de entrada
    $category->name = $request->input('name');
    $category->description = $request->input('description');

    // Salva a categoria atualizada no banco de dados
    $category->save();

    return redirect()->route('categories.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy($id)
  {
    $category = Category::find($id);

    if (!$category) {
      return redirect()->back()->with('error', 'Categoria não encontrada');
    }

    $category->delete();

    return redirect()->route('categories.index')->with('success', 'Categoria excluída com sucesso');
  }
}
