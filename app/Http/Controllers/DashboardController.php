<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $pengeluaran = Transaction::all();
        return view('pages.dashboard');
    }
}
