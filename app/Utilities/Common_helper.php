<?php

namespace App\Utilities;

use Exception;
use Log;
use DB;
use Carbon\Carbon;

class Common_helper
{
	// spaces
	public static function delete_records($table_name,$column,$value){
        $del = DB::table($table_name)->where($column, '=', $value)->delete();
        if($del){
            return true;
        }else{
            return false;
        }
    }
	
}