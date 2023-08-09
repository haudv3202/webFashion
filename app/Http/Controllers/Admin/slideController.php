<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\sliderModel;
class slideController extends Controller
{
    public function index(){
        $slider = DB::table('slider_models')->get();
        return view('admin.pages.slide.index',['data' => $slider]);
    }

    public function AddSlide(){
        return view('admin.pages.slide.create');
    }

    public function edit($id){
        $slider = DB::table('slider_models')->where('id', $id)->first();
        return view('admin.pages.slide.edit',['data' => $slider]);
    }

    public function update(Request $request){
        $request->validate(
            [
                'titleBanner' => 'required',
                'titleSale' => 'required',
                'inputBanner' => 'image',
                'status' => 'required'
            ],
            [
                'titleBanner.required' => 'Không để trống tiêu đề banner',
                'titleSale.required' => 'Mô tả khuyến mại không để trống',
                'inputBanner.required' => 'Không để trống ảnh',
                'status.required' => 'Vui lòng chọn trạng thái'
            ]
        );
        $data = sliderModel::find($request->idSlider);
        $data->title_slider = $request->titleBanner;
        $data->title_sale = $request->titleSale;

        if ($request->hasFile('inputBanner')) {

            if(File::exists(public_path($data->link_image))){
                File::delete(public_path($data->link_image));
            }
            $img = $request->file('inputBanner');
            $name_gen = hexdec(uniqid()).".".$img->getClientOriginalExtension();
            Image::make($img)->resize(1920,766)->save('uploads/slides/' . $name_gen);
            $url = 'uploads/slides/' . $name_gen;
            $data->link_image =  $url;
        }
        $data->status = $request->status;
        $data->created_at = Carbon::now();
        $data->save();
        toastr()->success('Cập nhật Banner Thành công','Thành công');
        return redirect()->route('admin.slide');


    }

    public function postSlide(Request $request){
        $request->validate(
            [
                'titleBanner' => 'required',
                'titleSale' => 'required',
                'inputBanner' => 'required|image',
                'status' => 'required'
            ],
            [
                'titleBanner.required' => 'Không để trống tiêu đề banner',
                'titleSale.required' => 'Mô tả khuyến mại không để trống',
                'inputBanner.required' => 'Không để trống ảnh',
                'status.required' => 'Vui lòng chọn trạng thái'
            ]
        );

        $img = $request->file('inputBanner');
        $name_gen = hexdec(uniqid()).".".$img->getClientOriginalExtension();
        Image::make($img)->resize(1920,766)->save('uploads/slides/' . $name_gen);
        $url = 'uploads/slides/' . $name_gen;


        DB::table('slider_models')->insert([
           'title_slider' => $request->titleBanner,
            'title_sale' => $request->titleSale,
            'link_image' => $url,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        toastr()->success('Thêm banner Thành công','Thành công');

        return redirect()->back();
    }

    public function updateStatus(Request $request){
        $dataCount = DB::table('slider_models')->where('status',2)->count();
        if($dataCount < 3){
            DB::table('slider_models')->where('id',$request->id)->update([
                'status' => $request->id_status,
            ]);
            return response()->json(['data' => ['status' => $request->id_status,'message' => 'Cập nhật thành công']],200);
        }
        return response()->json(['data' => ['status' => $request->id_status,'message' => 'Chỉ hiện được 3 Banner Vui lòng tắt banner khác']],404);
    }

    public function delete($id){
        $recordSlider = sliderModel::find($id);
        if(File::exists(public_path($recordSlider->link_image))){
            File::delete(public_path($recordSlider->link_image));
        }
        $recordSlider->delete();
        return response()->json(['data' => ['id' => $id,'message' => 'Xóa thành công']],200);
    }
}
