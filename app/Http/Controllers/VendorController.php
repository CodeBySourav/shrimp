<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\VendorRegistrationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\ShrimpProduct;
use App\Models\VendorFormSubmission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Log;

class VendorController extends Controller
{
    public function showRegistrationForm()
    {
        return view('vendor_registration');
    }

    public function register(Request $request)
{
    $request->validate([
        'FName' => 'required|string|max:255',
        'LName' => 'required|string|max:255',
        'Username' => 'required|string|max:255|unique:users',
        'Email' => 'required|email|unique:users',
        'Email1' => 'nullable|email',
        'CompanyName' => 'required|string|max:255',
        'password' => 'required|string|min:8|confirmed',
        'ContactNumber' => 'required|string|min:10|max:15',
        'Address' => 'required|string|max:500',
    ]);

    // Create the user and store it in the $vendor variable
    $vendor = User::create([
        'first_name' => $request->FName,
        'last_name' => $request->LName,
        'username' => $request->Username,
        'email' => $request->Email,
        'email_1' => $request->Email1,
        'company_name' => $request->CompanyName,
        'password' => Hash::make($request->password),
        'contact_number' => $request->ContactNumber,
        'address' => $request->Address,
        'role' => 1,
        'status' => "inactive"
    ]);

    // Send the vendor registration email
    Mail::to($vendor->email)->send(new VendorRegistrationMail($vendor));

    return redirect()->route('login')->with('success', 'Registration successful. Please check your email for confirmation.');
}



    public function categories_vender()
    {
        $shrimpProducts = ShrimpProduct::where('section', 'Raw vannamei')->get();
        $cookedshrimp = ShrimpProduct::where('section', 'Cooked White Shrimp')->get();
        $blackTigerShrimp = ShrimpProduct::where('section', 'Black Tiger Cooked')->get();

        return view('vender.categories_vender', compact('shrimpProducts', 'cookedshrimp','blackTigerShrimp')); 
    }
    

      
    public function product_show($id)
    {
        $product = ShrimpProduct::findOrFail($id);  
        return view('vender.product_show', compact('product'));
    } 

    public function storeVendorFormSubmission(Request $request)
    {
        Log::info( $request);
        $product_id = $request->input('product_id');
        $description = $request->input('description');
        $user_id = Auth::id();
        $user_name = Auth::user()->username;
        $rating = $request->input('rating');
        $certified = $request->input('certified');

        log::info('user_name');
        log::info($user_name);
        log::info('user_name');
        
        // Loop through each selected quantity range
        foreach ($request->input('quantities') as $quantityRange) {
            // Create a new VendorFormSubmission for each quantity range
            VendorFormSubmission::create([
                'product_id' => $product_id,
                'quantity_range' => $quantityRange,
                'price' => $request->input('prices')[$quantityRange] ?? null,
                'currency' => $request->input("currency.$quantityRange") ?? null, 
                'validity' => $request->input('validities')[$quantityRange] ?? null,
                'treatment' => $request->input('treatment')[$quantityRange] ?? null,
                'description' => $description,
                'user_id' => $user_id,     
                'user_name' => $user_name,
                'rating' => $rating,
                'certified' => $certified,
            ]);
        }
        return redirect()->back()->with('success', 'Vendor form submission saved successfully.');
    }

    public function my_posting() {

        $userId = Auth::id(); 

            // Join VendorFormSubmission with ShrimpProduct based on product_id
            $submissions = VendorFormSubmission::select('vendor_form_submissions.*', 'shrimp_products.name')
                ->join('shrimp_products', 'vendor_form_submissions.product_id', '=', 'shrimp_products.id')
                ->where('vendor_form_submissions.user_id', $userId)
                ->orderBy('vendor_form_submissions.created_at', 'desc')
                ->get();
     
        return view('vender.my_posting', compact('submissions'));
    }

}
