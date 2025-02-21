<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Log; 
use App\Models\ShrimpProduct; 
use App\Models\VendorFormSubmission;
use App\Models\User;
use App\Models\Contact;
use App\Mail\VendorActivationMail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class CorporateUserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('corporate_users.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'FName' => 'required|string|max:255',
            'LName' => 'required|string|max:255',
            'Username' => 'required|string|max:255|unique:users,username',
            'Email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'ContactNumber' => 'required|string|min:10|max:15',
        ]);

        $user = User::create([
            'first_name' => $request->FName,
            'last_name' => $request->LName,
            'username' => $request->Username,
            'email' => $request->Email,
            'password' => Hash::make($request->password),
            'contact_number' => $request->ContactNumber,
            'role' => 2,
            'status' => "active"
        ]);
 
          
        return redirect()->back()->with('success', 'Add Corporate User success');
    }

    public function vender() { 
        $vendors = User::where('role', 1)
                       ->where('status', 'active')
                       ->get();
    
        return view('corporate_users.all_vender', compact('vendors'));
    }
    public function awaiting_vender() { 
        $vendors = User::where('role', 1)
                       ->where('status', 'inactive')
                       ->get();
    
        return view('corporate_users.awaiting_vender', compact('vendors'));
    }
    
    public function all_posting() 
    {
        // Join VendorFormSubmission with Users and ShrimpProduct to get company name and product name
        $all_posting = VendorFormSubmission::select(
            'vendor_form_submissions.*', 
            'users.company_name',
            'shrimp_products.name as product_name'
        )
        ->join('users', 'vendor_form_submissions.user_id', '=', 'users.id')
        ->join('shrimp_products', 'vendor_form_submissions.product_id', '=', 'shrimp_products.id')
        ->orderBy('vendor_form_submissions.created_at', 'desc')
        ->get();

        return view('corporate_users.all_posting', compact('all_posting'));
    }

    public function enquiries(){

        $all_enquiries = Contact::all();
        return view('corporate_users.enquiries', compact('all_enquiries'));
    }

    public function change_status(Request $request)
    {
        log::info('status ->' . $request['status']);
        log::info('status aa ra hai');
        log::info('id ->' . $request['id']);
    
        $status = $request['status'];
        $id = $request['id'];
    
        $user = User::find($id);
    
        if ($user) {
            $user->update(['status' => $status]);
    
            // Check if the status is set to "active"
            if ($status === 'active') {
                // Send activation email
                Mail::to($user->email)->send(new VendorActivationMail($user));
            }
    
            session()->flash('success', 'Status updated successfully, and a confirmation email has been sent.');

        } else {
            session()->flash('error', 'User not found');
        }
    
        return back();
    }

    public function categories_corporate_users() {

        $shrimpProducts = ShrimpProduct::where('section', 'Raw vannamei')->get();
        $cookedshrimp = ShrimpProduct::where('section', 'Cooked White Shrimp')->get();
        $blackTigerShrimp = ShrimpProduct::where('section', 'Black Tiger Cooked')->get();

        return view('corporate_users.categories_corporate_users', compact('shrimpProducts', 'cookedshrimp', 'blackTigerShrimp'));
    }

    public function add_corporateuser(){

        return view('corporate_users.add_corporateuser');
    }

    public function deleteEnquiry($id)
    {
        Log::info("Attempting to delete enquiry with ID: " . $id);
        $enquiry = Contact::find($id);

        if ($enquiry) {
            $enquiry->delete();
            Log::info("Enquiry deleted successfully.");
            return response()->json(['success' => true, 'message' => 'Enquiry deleted successfully']);
        } else {
            Log::warning("Enquiry not found with ID: " . $id);
            return response()->json(['success' => false, 'message' => 'Enquiry not found']);
        }
    }
}
