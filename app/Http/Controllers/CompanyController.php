<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Company;

class CompanyController extends Controller
{

    public function company(){
        $data = Company::select('id','company_name')->orderby('company_name')->get();
        return view('company',['data'=>$data]);
    }

    public function create_company(Request $request){

        $company_name = $request->company_name;        

        $id = Company::insertGetId([
            'company_name' => $company_name,
            'created_at'=> now()->setTimezone('UTC')
        ]);        
        if($id){
            return response()->json(['status'=>true,'message' => 'New Company Created Successfully']);
        }else{
            return response()->json(['status'=>false,'message' => 'Error']);
        }
    }

}