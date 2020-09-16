<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Company;
use Config;


class DashboardController extends Controller
{

    public function home(){
        return view('dashboard');
    }
    
}