<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SectorIndustry;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $sector = DB::table('sector_industries')
            ->select('sector')
            ->groupBy('sector')->where('sector','!=','')
            ->pluck('sector');
        if(\Auth::user()->hasRole(['DataEntry'])){
        return view('company.index');
        }
        return view('home',compact('sector'));
    }
}
