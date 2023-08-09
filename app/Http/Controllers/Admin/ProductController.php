<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sliderModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\categories;
use App\Models\brands;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function index(){
        $data = products::paginate(10);
//        dd($data);
        return view('admin.pages.products.index',['data' => $data]);
    }

    public function create(Request $request){
        $categories = categories::where('status',2)->get();
        $brands = brands::where('status',2)->get();
        if($request->isMethod('post')){
            $request->validate(
                [
                    "nameProduct" => 'required|unique:products,name',
                    "imagesProductsAvatar" => ['image', 'mimes:jpeg,png,jpg', 'max:5000000'],
                    "imagesProducts.*" => ['image', 'mimes:jpeg,png,jpg', 'max:5000000'],
                    "price" => 'required',
                    "sale" => 'required',
                    'categories' => 'required|not_in:0',
                    'brand_id' => 'required|not_in:0',
                    'status' => 'required|not_in:0',
                ],
                [
                    "nameProduct.required" => "Không để trống tên sản phẩm",
                    "imagesProductsAvatar.image" => "Vui lòng chọn file ảnh 1",
                    "imagesProductsAvatar.mimes" => "Vui lòng chọn file ảnh đuôi jpeg,png,jpg",
                    "imagesProductsAvatar.max" => "Vui lòng chọn file ảnh dưới 5mb",
                    "imagesProducts.image" => "Vui lòng chọn file ảnh 1",
                    "imagesProducts.mimes" => "Vui lòng chọn file ảnh đuôi jpeg,png,jpg",
                    "imagesProducts.max" => "Vui lòng chọn file ảnh dưới 5mb",
                    "price.required" => "Vui lòng nhập giá",
                    "sale.required" => "Vui lòng nhập giảm giá",
                    "categories.required" => "Vui lòng chọn danh mục",
                    "categories.not_in" => "Vui lòng chọn danh mục",
                    "brand_id.required" => "Vui lòng chọn nhãn hàng",
                    "brand_id.not_in" => "Vui lòng chọn nhãn hàng",
                    "status.required" => "Vui lòng chọn trạng thái",
                    "status.not_in" => "Vui lòng chọn trạng thái",
                ]
            );

            $imgAvatar = $request->file('imagesProductsAvatar');
            $name_avatar = hexdec(uniqid()).".".$imgAvatar->getClientOriginalExtension();
            Image::make($imgAvatar)->resize(282,310)->save('uploads/products/product_Avatar/' . $name_avatar);
            $urlAvatar = 'uploads/products/product_Avatar/' . $name_avatar;


            $img = $request->file('imagesProducts');
            $urldesProduct = [];
            foreach ($img as $value){
                $name_gen = hexdec(uniqid()).".".$value->getClientOriginalExtension();
                Image::make($value)->resize(580,630)->save('uploads/products/product_desc/' . $name_gen);
                $urldesProduct[] = 'uploads/products/product_desc/' . $name_gen;
            }
            $urldesProduct = json_encode($urldesProduct);
            products::insert(
                [
                    'name' => $request->nameProduct,
                    'images' => $urlAvatar,
                    'price' => $request->price,
                    'discount_price' => $request->sale,
                    'view' => 0,
                    'like' => 0,
                    'status' => $request->status,
                    'category_id' => $request->categories,
                    'brand_id' => $request->brand_id,
                    'created_at' => Carbon::now(),
                    'image_avatar' => $urldesProduct,
                ]
            );
            toastr()->success('Thêm sản phâm thành công','Thành công');
            return redirect()->back();
        }
        return view('admin.pages.products.create',['categories' => $categories,'brands' => $brands]);
    }

    public function edit($id){
        $categories = categories::where('status',2)->get();
        $brands = brands::where('status',2)->get();
        $data = products::find($id);
        return view('admin.pages.products.edit',['categories' => $categories,'brands' => $brands,'data'=> $data]);

    }

    public function update(Request $request){
        $request->validate(
            [
                "nameProduct" => 'required',
                "imagesProductsAvatar" => ['image', 'mimes:jpeg,png,jpg', 'max:5000000'],
                "imagesProducts.*" => ['image', 'mimes:jpeg,png,jpg', 'max:5000000'],
                "price" => 'required',
                "sale" => 'required',
                'categories' => 'required|not_in:0',
                'brand_id' => 'required|not_in:0',
                'status' => 'required|not_in:0',
            ],
            [
                "nameProduct.required" => "Không để trống tên sản phẩm",
                "imagesProductsAvatar.image" => "Vui lòng chọn file ảnh 1",
                "imagesProductsAvatar.mimes" => "Vui lòng chọn file ảnh đuôi jpeg,png,jpg",
                "imagesProductsAvatar.max" => "Vui lòng chọn file ảnh",
                "imagesProducts.image" => "Vui lòng chọn file ảnh 1",
                "imagesProducts.mimes" => "Vui lòng chọn file ảnh đuôi jpeg,png,jpg",
                "imagesProducts.max" => "Vui lòng chọn file ảnh",
                "price.required" => "Vui lòng nhập giá",
                "sale.required" => "Vui lòng nhập giảm giá",
                "categories.required" => "Vui lòng chọn danh mục",
                "categories.not_in" => "Vui lòng chọn danh mục",
                "brand_id.required" => "Vui lòng chọn nhãn hàng",
                "brand_id.not_in" => "Vui lòng chọn nhãn hàng",
                "status.required" => "Vui lòng chọn trạng thái",
                "status.not_in" => "Vui lòng chọn trạng thái",
            ]
        );

        $imgAvatar = $request->file('imagesProductsAvatar');
        $urlAvatar = "";
        if(!empty($imgAvatar)){
            $name_avatar = hexdec(uniqid()).".".$imgAvatar->getClientOriginalExtension();
            Image::make($imgAvatar)->resize(282,310)->save('uploads/products/product_Avatar/' . $name_avatar);
            $urlAvatar = 'uploads/products/product_Avatar/' . $name_avatar;
        }



        $img = $request->file('imagesProducts');
        $urldesProduct = [];
        if(!empty($img)){
            foreach ($img as $value){
                $name_gen = hexdec(uniqid()).".".$value->getClientOriginalExtension();
                Image::make($value)->resize(580,630)->save('uploads/products/product_desc/' . $name_gen);
                $urldesProduct[] = 'uploads/products/product_desc/' . $name_gen;
            }
            $urldesProduct = json_encode($urldesProduct);
        }
        $recordProducts = products::find($request->id);
        $recordProducts->name = $request->nameProduct;
        $recordProducts->price = $request->price;
        $recordProducts->discount_price = $request->sale;
        $recordProducts->status = $request->status;
        $recordProducts->category_id = $request->categories;
        $recordProducts->brand_id = $request->brand_id;
        $recordProducts->updated_at = Carbon::now();
        if(!empty($urlAvatar) || !empty($urldesProduct)){
            $recordProducts->images = $urlAvatar;
            $recordProducts->image_avatar = $urldesProduct;
        }
        $recordProducts->save();
        toastr()->success('Cập nhật thành công','Thành công');
        return redirect()->route('products.index');
    }

    public function updateStatus(Request $request){
            DB::table('products')->where('id',$request->id)->update([
                'status' => $request->id_status,
            ]);
            return response()->json(['data' => ['status' => $request->id_status,'message' => 'Cập nhật thành công']],200);
    }

    public function delete($id){
        $product = products::find($id);
        if(File::exists(public_path($product->images))){
            File::delete(public_path($product->images));
        }
        $dataimgs = $product != "" ? json_decode($product->image_avatar) : "";
        if(!empty($dataimgs)){
            foreach($dataimgs as $value){
                if(File::exists(public_path($value))){
                    File::delete(public_path($value));
                }
            }
        }
        $product->delete();
        return response()->json(['data' => ['id' => $id,'message' => 'Xóa thành công']],200);
    }


}
