<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryType;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = Transaction::all();
        return view('pages.transactions.index', compact('datas'));
    }

    public function search(Request $request)
    {
        $fromDate = $request->input('daritanggal');
        $toDate = $request->input('sampaitanggal');

        $datas = Transaction::where('date', '>=', $fromDate)->where('date', '<=', $toDate)->get();
        $role = DB::table('categories')
        ->select('category_type.name')
        ->join('categories.name', '=', 'category_types.id')->get();
        return view('pages.transactions.index', compact('datas', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_types = CategoryType::all();
        $categories = Category::all();
        return view('pages.transactions.create', compact('category_types', 'categories'));
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
            'category_id' => 'required',
            'nominal' => 'required',
            'description' => 'required',
         ];

         $message = [
             'required'  => ':attribute tidak boleh kosong',
         ];

         $this->validate($request, $rules, $message);
        $data = new Transaction();
        $data->category_type_id = $request->category_type_id;
        $data->category_id = $request->category_id;
        $data->nominal = $request->nominal;
        $data->description = $request->description;
        $data->date = $request->date;

        $data->save();

        return redirect()->route('transaction.index')->with('create', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        $category_types = CategoryType::all();
        $categories = Category::all();
        return view('pages.transactions.edit', compact('transaction', 'category_types', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules= [
            'category_type_id' => 'required',
            'category_id' => 'required',
            'nominal' => 'required',
            'description' => 'required',

         ];

         $message = [
             'required'  => ':attribute tidak boleh kosong',
         ];

         $this->validate($request, $rules, $message);
        $data = Transaction::find($id);
        $data->category_type_id = $request->category_type_id;
        $data->category_id = $request->category_id;
        $data->nominal = $request->nominal;
        $data->description = $request->description;
        $data->date = $request->date;


        $data->update();

        return redirect()->route('transaction.index')->with('update', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Transaction::find($id);
        $data->delete();
        return redirect()->route('transaction.index')->with('delete', 'Berhasil Menghapus Data');
    }
}
