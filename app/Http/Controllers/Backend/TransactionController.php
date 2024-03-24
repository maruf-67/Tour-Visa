<?php

namespace App\Http\Controllers\Backend;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $data = Transaction::all();

        // dd($data);
        return view('backend.transaction.paypal.index',compact('data'));
    }
}
