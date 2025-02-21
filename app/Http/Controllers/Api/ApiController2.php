<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Notification;

use App\Models\ShrimpProduct;
use App\Models\VendorFormSubmission;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Log;

class ApiController2 extends Controller
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

    public function my_postings(Request $request)
    {
        $userid = $request->input('userid');
        Log::info('responceid');
        Log::info($userid);
        Log::info('responceid');
    
        // Join vendor_form_submissions with shrimp_products and fetch product name, order by created_at descending
        $Product_Submission_details = VendorFormSubmission::join('shrimp_products', 'vendor_form_submissions.product_id', '=', 'shrimp_products.id')
            ->where('vendor_form_submissions.user_id', $userid)
            ->select(
                'vendor_form_submissions.*',
                'shrimp_products.name as product_name'
            )
            ->orderBy('vendor_form_submissions.created_at', 'desc') // Order by most recent
            ->get();
    
        return response()->json([
            'Product_Submission_details' => $Product_Submission_details
        ], 200);
    }
    
    
 
    public function product_price_details(Request $request)
    {
        $product_id = $request->input('product_id');
        Log::info('product_id');
        Log::info($product_id);
        Log::info('product_id');
    
        // Join vendor_form_submissions with users and fetch company_name, order by created_at descending
        $Product_Submission_details = VendorFormSubmission::join('users', 'vendor_form_submissions.user_id', '=', 'users.id')
            ->where('vendor_form_submissions.product_id', $product_id)
            ->select(
                'vendor_form_submissions.*',
                'users.company_name'
            )
            ->orderBy('vendor_form_submissions.created_at', 'desc') // Order by most recent
            ->get();
    
        return response()->json([
            'Product_Submission_details' => $Product_Submission_details
        ], 200);
    }
    
    

    public function store(Request $request)
    {
        // Validate incoming data
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer',
            'submission_data' => 'required|array',
            'submission_data.*.quantity_range' => 'required|string',
            'submission_data.*.price' => 'required|numeric',
            'submission_data.*.validity' => 'required|string',
            'submission_data.*.treatment' => 'nullable|string',
            'submission_data.*.description' => 'nullable|string',
            'user_id' => 'required|integer',
            'user_name' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }
    
        // Save each submission in the array
        foreach ($request->input('submission_data') as $data) {
            VendorFormSubmission::create([
                'product_id' => $request->input('product_id'),
                'quantity_range' => $data['quantity_range'],
                'price' => $data['price'],
                'validity' => $data['validity'],
                'treatment' => $data['treatment'] ?? null,
                'description' => $data['description'] ?? null,
                'user_id' => $request->input('user_id'),
                'user_name' => $request->input('user_name'),
            ]);
    
            // Save notification
            Notification::create([
                'message' => 'New data submission by Vendor: ' . $request->input('user_name'),
                'product_id' => $request->input('product_id'),
            ]);
        }
    
        return response()->json([
            'status' => 'success',
            'message' => 'Data saved successfully',
        ]);
    }
    

    public function contactstore(Request $request)
    {
        // Validate form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save the contact message using mass assignment
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
            log::info('contact');
            log::info($contact);
            log::info('contact');
        // Send email notification
        Mail::to($request->email)->send(new ContactMail($contact));

        return response()->json([
            'status' => 'success',
            'message' => 'Data saved successfully',
        ]);
    }

    public function getNotifications(Request $request)
    {
        // Join notifications with vendor_form_submissions on product_id
        $notifications = Notification::join('vendor_form_submissions', 'notifications.product_id', '=', 'vendor_form_submissions.product_id')
            ->select(
                'notifications.*',
                'vendor_form_submissions.user_id', // Example: additional columns from vendor_form_submissions
                'vendor_form_submissions.quantity_range', 
                'vendor_form_submissions.price'
            )
            ->latest('notifications.created_at') // Order by the latest notifications
            ->get();
    
        return response()->json([
            'notifications' => $notifications
        ], 200);
    }
    

}
