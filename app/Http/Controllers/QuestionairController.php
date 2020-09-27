<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Config;
use App\Utilities\Common_helper;
use App\Question;
use App\Answers;

class QuestionairController extends Controller
{
    public function questionair(Request $request){
        $agegroup = $request->agegroup;
        $gender = $request->gender;
        
        $data = Question::join('question_category_relation','question_category_relation.question_id','=','question.id')
                        ->join('question_category','question_category.id','=','question_category_relation.category_id')
                        ->join('question_gender_relation','question_gender_relation.question_id','=','question.id')
                        ->where('question_category.id',$agegroup)
                        ->where('question_gender_relation.gender_id',$gender)
                        ->selectRaw('distinct(question.id) as id,question_english')
                        ->get();
                foreach($data as $key => $d){
                    $answers = Answers::where('question_id',$d->id)->get();
                    $data[$key]['answers'] = $answers;
                }
        if($data){
            return json_encode(['status'=>true,'data'=>$data]);
        }else{
            return json_encode(['status'=>false,'data'=>array()]);
        }
    }
}//class ends here