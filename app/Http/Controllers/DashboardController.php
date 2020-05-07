<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Siswa;
use DB;

class DashboardController extends Controller
{
    public function index(){
        
        
        return view('dashboard.index');
    }
    
}
