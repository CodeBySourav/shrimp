<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShrimpProduct;

class ProductCategory extends Controller
{
      // Get all categories
      public function getProductsBySection($section)
      {
          try {
              // Fetch all products for the given section
              $products = ShrimpProduct::where('section', $section)->get();
      
              // Check if any products are found
              if ($products->isEmpty()) {
                  return response()->json([
                      'status' => 'error',
                      'message' => "No products found for the section: $section.",
                  ], 404);
              }
      
              return response()->json([
                  'status' => 'success',
                  'data' => $products,
              ], 200);
          } catch (\Exception $e) {
              return response()->json([
                  'status' => 'error',
                  'message' => 'Failed to fetch products.',
                  'error' => $e->getMessage(),
              ], 500);
          }
      }
      
      
          // Get category by ID
          public function show($id)
          {
              try {
                  // Fetch products by section ID (assuming 'id' maps to 'section')
                  $products = ShrimpProduct::where('id', $id)->get();
      
                  if ($products->isEmpty()) {
                      return response()->json([
                          'status' => 'error',
                          'message' => 'No products found for the given category.',
                      ], 404);
                  }
      
                  return response()->json([
                      'status' => 'success',
                      'data' => $products,
                  ], 200);
              } catch (\Exception $e) {
                  return response()->json([
                      'status' => 'error',
                      'message' => 'Failed to fetch category products.',
                      'error' => $e->getMessage(),
                  ], 500);
              }
          }
}
