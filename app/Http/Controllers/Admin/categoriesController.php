<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\categories;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class categoriesController extends Controller
{
    public function index(){
        $data = categories::all();
        return view('admin.pages.categories.index',['data' => $data]);
    }

    public function create(){
        return view('admin.pages.categories.create');
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
                'titleCategories.required' => 'Không để trống tên danh mục',
                'titleCategories.unique' => 'Danh Mục này đã tồn tại',
                'status.required' => 'Vui lòng chọn trạng thái',
                'status.not_in' => 'Vui lòng chọn trạng thái'
            ]
        );
        $imgAvatar = $request->file('imagesCategories');
        $name_avatar = hexdec(uniqid()).".".$imgAvatar->getClientOriginalExtension();
        Image::make($imgAvatar)->resize(100,120)->save('uploads/categories/' . $name_avatar);
        $urlAvatar = 'uploads/categories/' . $name_avatar;
        categories::create([
            'name' => $request->titleCategories,
            'image_categories' =>  $urlAvatar,
            'status' =>  $request->status,
            'created_at' => Carbon::now(),
        ]);
        toastr()->success('Thêm danh mục Thành công','Thành công');

        return redirect()->back();

    }

    public function edit($id){
        $data = categories::find($id);
        return view('admin.pages.categories.edit',['data' => $data]);
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
                'titleCategories.required' => 'Không để trống tên danh mục',
                'status.required' => 'Vui lòng chọn trạng thái',
                'status.not_in' => 'Vui lòng chọn trạng thái'
            ]
        );

        $imgAvatar = $request->file('imagesCategories');
        $urlAvatar = "";
        if(!empty($imgAvatar)){
            $name_avatar = hexdec(uniqid()).".".$imgAvatar->getClientOriginalExtension();
            Image::make($imgAvatar)->resize(100,120)->save('uploads/categories/' . $name_avatar);
            $urlAvatar = 'uploads/categories/' . $name_avatar;
        }

        $categories = categories::find($request->id);
        $categories->name = $request->titleCategories;
        if(!empty($urlAvatar)){
            $categories->image_categories = $urlAvatar;
        }
        $categories->status = $request->status;
        $categories->updated_at = Carbon::now();
        $categories->save();
        toastr()->success('Cập Nhật Thành Công','Thành công');
        return redirect()->route('categories.index');
    }

    public function delete($id){
        categories::find($id)->delete();
        return response()->json(['data' => ['id' => $id,'message' => 'Xóa thành công']],200);
    }

    public function updateStatus(Request $request){
        $record = categories::find($request->id);
        $record->status = $request->id_status;
        $record->save();
        return response()->json(['data' => ['status' => $request->id_status,'message' => 'Cập nhật trạng thái thành công']],200);
    }


}
