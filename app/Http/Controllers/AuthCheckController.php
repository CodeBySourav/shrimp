<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\ShrimpProduct; 
use App\Models\VendorFormSubmission;
use App\Models\User;


class AuthCheckController extends Controller
{
    public function dashboard()
    {
        if (!Auth::check()) {
            Log::info('Unauthenticated access attempt to dashboard.');
            return redirect()->route('login');
        }

        $role = Auth::user()->role;
        Log::info('User role:', ['role' => $role, 'user_id' => Auth::id()]);

        if ($role == '1') { 
            return view('vender.dashboard');
            } elseif ($role == '2') {  
                $users = User::where('role', "1")->get();
                return view('corporate_users.dashboard', compact('users'));
                
            } else {
            Log::warning('Invalid role access attempt to dashboard.', ['role' => $role, 'user_id' => Auth::id()]);
            return redirect()->route('not_approve')->with('error', 'Access denied.'); // or any other route that makes sense for invalid roles
        }
    }
}
