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
use App\QuestionCategoryRelation;
use App\QuestionGenderRelation;
use App\QuestionGroup;
use App\QuestionType;


class QuestionairController extends Controller
{
    public function questionair(Request $request){
        
        if(!isset($request->agegroup) || !isset($request->gender)){
            return json_encode(['status'=>false,'data'=>array()]);
        }

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
    
    public function questionans_list(Request $request){
        
        $data = Question::get();
        
        return view('questionair.questionans',['view'=>'list','data'=>$data]);
    }
    
    public function new_questionans(Request $request){
        
        $data = Question::get();
        
        return view('questionair.questionans',['view'=>'new','data'=>'']);
    }
    public function save_questionans(Request $request){
        
        //print_r($request->all());
        $category_id = $request->category_id;
        $group_id = $request->group_id;
        $gender_id = $request->gender_id;
        $question_english = $request->question_english;
        $question_hindi = $request->question_hindi;
        $answer = $request->answer;
        $prakrati_id = $request->prakrati;
        $weightage = $request->weightage;
        
        $type_id = '1';// $request->type_id;

        $id = Question::insertGetId([
            'question_english' => $question_english,
            'question_hindi' => $question_hindi,
            'group_id' => $group_id,
            'type_id' => $type_id,
            'image_hint'=>'' 
        ]);  
        
        foreach($category_id as $cid){
            $QCR_array[] = array('question_id' => $id,'category_id' => $cid);
        }
        $QCRid = QuestionCategoryRelation::insert($QCR_array);
        
        foreach($gender_id as $gid){
            $QGR_array[] = array('question_id' => $id,'gender_id' => $gid);
        }
        $QGRid = QuestionGenderRelation::insert($QGR_array);
        
        
        foreach($answer as $key => $ans){
            if(trim($ans)!=''){
                $ANS_array[] = array('question_id' => $id,'answer_english' => $ans,'prakrati_id'=>$prakrati_id[$key],'weightage'=>$weightage[$key]);
            }
        }
        
        $ans = Answers::insert($ANS_array);
        
        if($id){
            return redirect()->action('QuestionairController@new_questionans');
            //return response()->json(['status'=>true,'message' => 'New Question Created Successfully']);
        }else{
            return response()->json(['status'=>false,'message' => 'Error']);
        }
    }
    
    
    
}//class ends here