<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShrimpProduct; 
use App\Models\VendorFormSubmission;
use App\Models\User;
use Log;

class AjaxController extends Controller
{
    public function getProductNames(Request $request)
    {
        $id = $request->id;
        Log::info("Fetching products for user ID: " . $id);
    
        $products = ShrimpProduct::join('vendor_form_submissions', 'shrimp_products.id', '=', 'vendor_form_submissions.product_id')
            ->join('users', 'users.id', '=', 'vendor_form_submissions.user_id')
            ->where('users.id', $id)
            ->select('shrimp_products.id', 'shrimp_products.name')
            ->distinct() // Ensure unique product names
            ->get();
    
        Log::info("Fetched unique products: " . json_encode($products));
    
        if ($products->isNotEmpty()) {
            return response()->json(['success' => true, 'products' => $products]);
        } else {
            return response()->json(['success' => false, 'message' => 'No products found']);
        }
    }
    
    

    public function getProductCount(Request $request)
{
    Log::info("getProductCount calling");

    // Validate the request to ensure 'id' is provided
    $request->validate([
        'id' => 'required|integer'
    ]);

    Log::info("Inside getProductCount function");
    Log::info("Product ID: " . $request->id);

    // Get the unique quantity range values for the specified product_id
    $quantityRanges = VendorFormSubmission::where('product_id', $request->id)
        ->distinct()
        ->pluck('quantity_range');

    Log::info("Unique quantity_ranges: " . json_encode($quantityRanges));

    // Get the count of products
    $count = VendorFormSubmission::where('product_id', $request->id)->count();

    // Check if any records were found
    if ($count > 0) {
        return response()->json([
            'success' => true,
            'quantity_ranges' => $quantityRanges,
            'count' => $count
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Product not found'
        ]);
    }
}


    public function getVendorProducts(Request $request)
    {
        $vendorId = auth()->id(); // Get the logged-in vendor's ID
        Log::info("Fetching products for vendor ID: " . $vendorId);
    
        $products = ShrimpProduct::join('vendor_form_submissions', 'shrimp_products.id', '=', 'vendor_form_submissions.product_id')
            ->where('vendor_form_submissions.user_id', $vendorId)
            ->select('shrimp_products.id', 'shrimp_products.name')
            ->distinct('shrimp_products.name') // Ensure unique product names
            ->get();
    
        Log::info("Fetched vendor-specific products: " . json_encode($products));
    
        if ($products->isNotEmpty()) {
            return response()->json(['success' => true, 'products' => $products]);
        } else {
            return response()->json(['success' => false, 'message' => 'No products found']);
        }
    }
    

     
    public function deleteVendor(Request $request)
    {
        Log::error(" request->id: " .$request->id);
        
        try {
            $vendor = User::findOrFail($request->id); // Fetch vendor by ID
            $vendor->delete(); // Delete vendor

            return response()->json(['success' => true, 'message' => 'Vendor deleted successfully.']);
        } catch (\Exception $e) {
            Log::error("Error deleting vendor: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error deleting vendor.']);
        }
    }
} 