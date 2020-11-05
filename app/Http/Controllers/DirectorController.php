<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyReference;
class DirectorController extends Controller
{
     public function index()
    {
        return view('director.index');
    }
    public function create()
    {
    	$company_reference=CompanyReference::all();
        return view('director.create',compact('company_reference'));
    }
}
