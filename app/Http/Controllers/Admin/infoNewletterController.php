<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\newletter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\infonewletster;
use Intervention\Image\ImageManagerStatic as Image;

class infoNewletterController extends Controller
{
    public function index(){
        $data = infonewletster::paginate(5);
        return view('admin.pages.infoNewletter.index',['data' => $data]);
    }

    public function createPost(Request $request){
        $request->validate(
            [
                'EmailUser' => 'required|unique:infonewletsters,email',
            ],
            [
                'EmailUser.required' => 'Vui lòng nhập Email',
                'EmailUser.unique' => 'Email đã tồn tại',
            ]
        );

        infonewletster::create([
            'email' =>  $request->EmailUser,
            'created_at' => Carbon::now(),
        ]);
        toastr()->success('Cảm ơn bạn đã để lại thông tin','Thành công');
        echo "<script>setItemWithExpiration('newsletter__show', 'true', 1440);
        const value = getItemWithExpiration('newsletter__show');
        </script>";
        return redirect()->back();
    }


    public function delete($id){
        infonewletster::find($id)->delete();
        return response()->json(['data' => ['id' => $id,'message' => 'Xóa thành công']],200);
    }
}
