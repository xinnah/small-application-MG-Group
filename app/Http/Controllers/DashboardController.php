<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use Validator;
use Response;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource article table.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
        
    return view('dashboard.index');
        
    }

    
}
