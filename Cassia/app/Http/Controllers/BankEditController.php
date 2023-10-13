<?php

namespace App\Http\Controllers;

use App\DataTables\BankEditDataTable;
use App\DataTables\BankEditDataTableEditor;
use Illuminate\Http\Request;

class BankEditController extends Controller
{
    public function index(BankEditDataTable $dataTable)
    {
        return $dataTable->render('bankedit');
    }
 
    public function store(BankEditDataTableEditor $editor)
    {
        return $editor->process(request());
    }
}
