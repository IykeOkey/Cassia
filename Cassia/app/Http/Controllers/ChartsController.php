<?php

namespace App\Http\Controllers;

use App\DataTables\ChartsDataTable;
use App\DataTables\ChartsDataTableEditor;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public function index(ChartsDataTable $dataTable)
    {
        return $dataTable->render('chartedit');
    }
 
    public function store(ChartsDataTableEditor $editor)
    {
        return $editor->process(request());
    }
}
