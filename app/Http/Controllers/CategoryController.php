<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryType;
use Illuminate\Http\Request;

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
        return view('pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = CategoryType::all();
        return view('pages.categories.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= [
            'category_type_id' => 'required',
            'name' => 'required',
            'description' => 'required',

         ];

         $message = [
             'required'  => ':attribute tidak boleh kosong',
         ];

         $this->validate($request, $rules, $message);
        $data = new Category();
        $data->category_type_id = $request->category_type_id;
        $data->name = $request->name;
        $data->description = $request->description;

        $data->save();

        return redirect()->route('category.index')->with('create', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::find($id);
        $category_types = CategoryType::all();
        return view('pages.categories.edit', compact('category', 'category_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules= [
            'category_type_id' => 'required',
            'name' => 'required',
            'description' => 'required',

         ];

         $message = [
             'required'  => ':attribute tidak boleh kosong',
         ];

         $this->validate($request, $rules, $message);
        $data = Category::find($id);
        $data->category_type_id = $request->category_type_id;
        $data->name = $request->name;
        $data->description = $request->description;

        $data->update();
        return redirect()->route('category.index')->with('update', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->route('category.index')->with('delete', 'Berhasil Menghapus Data');
    }
}
