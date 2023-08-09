<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\products;
use App\Models\comments;
use App\Models\categories;
use App\Models\brands;
class productController extends Controller
{
    public function index(){
        $dataProducts = products::orderBy('created_at', 'desc')->paginate(16);
//        $dataProductsbar2 = products::orderBy('created_at', 'desc')->paginate(4);
//        ,'dataProductsbar2' => $dataProductsbar2
        $categories = categories::orderBy('created_at', 'desc')->get();
        $brands = brands::orderBy('created_at', 'desc')->get();
        $topProducts = products::orderBy('like', 'desc')
            ->take(3)
            ->get();
        return view('client.pages.products.index',['products' => $dataProducts ,'categories' => $categories,'brands' => $brands,'topProducts' => $topProducts]);
    }
    public function detail($id){
        $dataDetail = products::where('id', $id)->first();
//        dd($dataDetail);
        $comments = comments::where('product_id', $id)->orderBy('created_at', 'desc')->paginate(5);

        foreach($comments as $value){
            $value->created_atFormat = Carbon::parse($value->created_at)->format('F d, Y');
            $value->infoUser = $value->users->first();
        }

        $productShare = products::where('category_id', $dataDetail->category_id)->take(8)->get();
        return view('client.pages.products.productDetail',['dataDetail' => $dataDetail,'comments' => $comments,'productShare' => $productShare] );
    }
}
