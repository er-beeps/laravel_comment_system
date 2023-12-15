<?php
namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApiHelperController extends Controller
{
     // list all the sessions
     public function create_category(Request $request)
     {
        $data=[
            'code'=>$request->code,
            'title'=>$request->title,
            'is_active'=>true
        ];

        $create = DB::table('post_categories')->insertGetId($data);

        if($create){
            $to_return_array['success'] = true;
            $to_return_array['message'] = 'Record Created Successfully';
        }else{
            $to_return_array['success'] = false;
            $to_return_array['message'] = 'Some Error Occured !!';
        }
         return response()->json($to_return_array);
     }

     // list all the sessions
     public function create_post(Request $request)
     {
          $data=[
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
        ];

        $create = DB::table('posts')->insertGetId($data);

        if($create){
            $to_return_array['success'] = true;
            $to_return_array['message'] = 'Record Created Successfully';
        }else{
            $to_return_array['success'] = false;
            $to_return_array['message'] = 'Some Error Occured !!';
        }
         return response()->json($to_return_array);
     }
}
