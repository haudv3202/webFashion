<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\brands;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class brandsController extends Controller
{
    public function index(){
        $data = brands::all();
        return view('admin.pages.brands.index',['data' => $data]);
    }

    public function create(){
        return view('admin.pages.brands.create');
    }

    public function store(Request $request){

        $request->validate(
            [
                'titleCategories' => 'required|unique:categories,name',
                'status' => 'required|not_in:0'
            ],
            [
                'titleCategories.required' => 'Không để trống tên danh mục',
                'titleCategories.unique' => 'Danh Mục này đã tồn tại',
                'status.required' => 'Vui lòng chọn trạng thái',
                'status.not_in' => 'Vui lòng chọn trạng thái'
            ]
        );

        brands::create([
            'name' => $request->titleCategories,
            'status' =>  $request->status,
            'created_at' => Carbon::now(),
        ]);
        toastr()->success('Thêm  Thành công','Thành công');

        return redirect()->back();

    }

    public function edit($id){
        $data = brands::find($id);
        return view('admin.pages.brands.edit',['data' => $data]);
    }

    public function update(Request $request){
        $request->validate(
            [
                'titleCategories' => 'required',
                'status' => 'required|not_in:0'
            ],
            [
                'titleCategories.required' => 'Không để trống tên danh mục',
                'status.required' => 'Vui lòng chọn trạng thái',
                'status.not_in' => 'Vui lòng chọn trạng thái'
            ]
        );


        $brands = brands::find($request->id);
        $brands->name = $request->titleCategories;
        $brands->status = $request->status;
        $brands->updated_at = Carbon::now();
        $brands->save();
        toastr()->success('Cập Nhật Thành Công','Thành công');
        return redirect()->route('brands.index');
    }

    public function delete($id){
        brands::find($id)->delete();
        return response()->json(['data' => ['id' => $id,'message' => 'Xóa thành công']],200);
    }

    public function updateStatus(Request $request){
        $record = brands::find($request->id);
        $record->status = $request->id_status;
        $record->save();
        return response()->json(['data' => ['status' => $request->id_status,'message' => 'Cập nhật trạng thái thành công']],200);
    }

}
