<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\comments;

class homeController extends Controller
{
    public function index(){
        $slider = DB::table('slider_models')->where('status',2)->get();
        $productsTrenning = DB::table('products')->where('status',2)->take(10)->orderBy('view', 'desc')
            ->orderBy('like', 'desc')->get();
        $productsArrival = DB::table('products')->where('status',2)->take(10)->orderBy('created_at', 'desc')->get();
        $commentsClient = comments::where('status', 2)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('client.pages.home.index',['sliders' => $slider,'productsTrenning' => $productsTrenning,'productsArrival' => $productsArrival,'commentsClient' => $commentsClient]);
    }

}
