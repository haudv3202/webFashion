<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\comments;
use Illuminate\Support\Facades\DB;

class commentsController extends Controller
{

    public function index(){
        $data = comments::paginate(5);
        return view('admin.pages.comments.index',['data' => $data]);
    }

    public function create(Request $request){
        $request->validate([
            'content' => 'required',
            'user_id' => 'required',
            'product_id' => 'required'
        ],
        [
            'content.required' => 'Không để trống nội dung'
        ]);

        $id = DB::table('comments')->insertGetId([
            'content' => $request->content,
            'product_id' => $request->product_id,
            'user_id'  => $request->user_id,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);

        $dataPerson =  comments::find($id);
        $dataPerson->created_atFormat = Carbon::parse($dataPerson->created_at)->format('F d, Y');
        $dataPerson->infoUser = $dataPerson->users->first();
        return response()->json(['data' => $dataPerson],200);
    }


    public function delete($id){
        comments::find($id)->delete();
        return response()->json(['data' => ['id' => $id,'message' => 'Xóa thành công']],200);
    }
}
