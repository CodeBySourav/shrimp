<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ShrimpProduct;
use App\Models\VendorFormSubmission;
use Log;


class PageController extends Controller
{
    public function contact(): View
    {
        return view('contact');
    }

    /**
     * Show the about page.
     */
    public function about(): View
    {
        return view('about');
    }

    /**
     * Show the categories page.
     */
    public function categories(): View
    {
        $shrimpProducts = ShrimpProduct::where('section', 'Raw vannamei')->get();
        $cookedshrimp = ShrimpProduct::where('section', 'Cooked White Shrimp')->get();
        $blackTigerShrimp = ShrimpProduct::where('section', 'Black Tiger Cooked')->get();


        return view('categories', compact('shrimpProducts', 'cookedshrimp','blackTigerShrimp')); 
    }

    public function product_show($id)
    {
        // Fetch the product by ID
        $product = ShrimpProduct::findOrFail($id);
    
   // Fetch the most recent pricing data with the company_name from the users table
   $product_pricing = VendorFormSubmission::where('product_id', $id)
   ->join('users', 'vendor_form_submissions.user_id', '=', 'users.id') // Join with users table
   ->select('vendor_form_submissions.*', 'users.company_name') // Select fields from both tables
   ->orderBy('vendor_form_submissions.created_at', 'desc') // Sort by the most recent
   ->get();
    
        // Log the retrieved data
        Log::info("Product Pricing:");
        Log::info($product_pricing);
    
        // Return the data to the view
        return view('product_show', compact('product', 'product_pricing'));
    }
    
}
