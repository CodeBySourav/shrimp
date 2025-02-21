<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\ShrimpProduct;


class ApiController extends Controller
{
    public function profile(Request $request)
    {
        $responceid = $request->input('responceid');
        // log::info('responceid');
        // log::info($responceid);
        // log::info('responceid');
    
        $user_details = User::where('id', $responceid)->get();
    
        return response()->json([
            'user_details' => $user_details
        ], 200);
    }

    public function get_products_by_name(Request $request){

        $product_name = $request->input('product_name');
        log::info('responceid');
        log::info($product_name);
        log::info('responceid');
    
        $Product_details = ShrimpProduct::where('section', $product_name)->get();
    
        return response()->json([
            'Product_details' => $Product_details
        ], 200);    
    }
}
