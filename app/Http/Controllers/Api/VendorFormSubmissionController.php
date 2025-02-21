<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorFormSubmission;

class VendorFormSubmissionController extends Controller
{
    public function getVendorPostings()
    {
        try {
            // Fetch all vendor postings
            $postings = VendorFormSubmission::all();

            // Check if any postings exist
            if ($postings->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No vendor postings found.',
                ], 404);
            }

            // Return the postings
            return response()->json([
                'status' => 'success',
                'data' => $postings,
            ], 200);
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch vendor postings.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
