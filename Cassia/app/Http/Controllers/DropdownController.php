<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Category;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return view('employcreate', compact('banks'));
    }

    public function fetchData($value)
    {
        // Query the MySQL table based on the selected value
        $data = Bank::where('bk_type', $value)->get();

        return response()->json($data);
    }
}
