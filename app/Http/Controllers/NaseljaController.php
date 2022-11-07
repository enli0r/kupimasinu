<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\NaseljaImport;
use Maatwebsite\Excel\Facades\Excel;

class NaseljaController extends Controller
{
    public function import(){
        Excel::import(new NaseljaImport, 'spisak_naselja.xlsx', 'import');

        return redirect('/')->with('success', 'All good!');
    }

}
