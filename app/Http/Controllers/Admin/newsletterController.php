<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\newletter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;

class newsletterController extends Controller
{
    public function index(){
        $data = newletter::all();
        return view('admin.pages.newletter.index',['data' => $data]);
    }


    public function create(){
        return view('admin.pages.newletter.create');
    }

    public function store(Request $request){

        $request->validate(
            [
                'titleCategories' => 'required|unique:categories,name',
                "imagesCategories" => ['image', 'mimes:jpeg,png,jpg', 'max:5000000'],
                'status' => 'required|not_in:0'
            ],
            [
                "imagesCategories.image" => "Vui lòng chọn file ảnh ",
                "imagesCategories.mimes" => "Vui lòng chọn file ảnh đuôi jpeg,png,jpg",
                "imagesCategories.max" => "Vui lòng chọn file ảnh dưới 5mb",
                'titleCategories.required' => 'Không để trống tiêu đề bản tin',
                'titleCategories.unique' => 'Tiêu đề bản tin đã tồn tại',
                'status.required' => 'Vui lòng chọn trạng thái',
                'status.not_in' => 'Vui lòng chọn trạng thái'
            ]
        );

        $imgAvatar = $request->file('imagesCategories');
        $name_avatar = hexdec(uniqid()).".".$imgAvatar->getClientOriginalExtension();
        Image::make($imgAvatar)->resize(350,400)->save('uploads/newletter/' . $name_avatar);
        $urlAvatar = 'uploads/newletter/' . $name_avatar;
        newletter::create([
            'image_url_newletter' =>  $urlAvatar,
            'des_newleter' => $request->titleCategories,
            'status' =>  $request->status,
            'created_at' => Carbon::now(),
        ]);
        toastr()->success('Thêm bản tin Thành công','Thành công');

        return redirect()->back();

    }

    public function edit($id){
        $data = newletter::find($id);
        return view('admin.pages.newletter.edit',['data' => $data]);
    }

    public function update(Request $request){
        $request->validate(
            [
                'titleCategories' => 'required',
                "imagesCategories" => ['image', 'mimes:jpeg,png,jpg', 'max:5000000'],
                'status' => 'required|not_in:0'
            ],
            [
                "imagesCategories.image" => "Vui lòng chọn file ảnh 1",
                "imagesCategories.mimes" => "Vui lòng chọn file ảnh đuôi jpeg,png,jpg",
                "imagesCategories.max" => "Vui lòng chọn file ảnh dưới 5mb",
                'titleCategories.required' => 'Không để trống tên bản tin',
                'status.required' => 'Vui lòng chọn trạng thái',
                'status.not_in' => 'Vui lòng chọn trạng thái'
            ]
        );

        $imgAvatar = $request->file('imagesCategories');
        $urlAvatar = "";
        if(!empty($imgAvatar)){
            $name_avatar = hexdec(uniqid()).".".$imgAvatar->getClientOriginalExtension();
            Image::make($imgAvatar)->resize(350,400)->save('uploads/newletter/' . $name_avatar);
            $urlAvatar = 'uploads/newletter/' . $name_avatar;

        }

        $newletter = newletter::find($request->id);
        $newletter->des_newleter = $request->titleCategories;
        if(!empty($urlAvatar)){
            unlink($newletter->image_url_newletter);
            $newletter->image_url_newletter = $urlAvatar;
        }
        $newletter->status = $request->status;
        $newletter->updated_at = Carbon::now();
        $newletter->save();
        toastr()->success('Cập Nhật Thành Công','Thành công');
        return redirect()->route('newletter.index');
    }

    public function delete($id){
        newletter::find($id)->delete();
        return response()->json(['data' => ['id' => $id,'message' => 'Xóa thành công']],200);
    }

    public function updateStatus(Request $request){
        $record = newletter::find($request->id);
        $record->status = $request->id_status;
        $record->save();
        return response()->json(['data' => ['status' => $request->id_status,'message' => 'Cập nhật trạng thái thành công']],200);
    }
}
