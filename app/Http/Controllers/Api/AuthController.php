<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Log;


class AuthController extends Controller
{  
        // Login User
        public function login(Request $request){
        log::info("login aapi callinfg");
            //validate user
            $attrs = $request->validate([
                'username' => 'required',
                'password' => 'required|min:6'
            ]);
    
            //attempt login
            if(!Auth::attempt($attrs)){
                
                return response([
                    'message' => 'Invalid credentials.'
                ],403);
            }
    
            //return user & token in responce
            return response([
                'user' => auth()->user(),
                'token'=> auth()->user()->createToken('secret')->plainTextToken
            ],200);
        }
    
        public function logout(){
            auth()->user()->tokens()->delete();
            return response([
                'message' => 'Logout success.'
            ], 200);
        }

        public function profile(Request $request)
        {
            // Get the authenticated user
            $user = Auth::user();

            // Return the user details
            return response()->json([
                'success' => true,
                'message' => 'Profile fetched successfully',
                'data' => [
                    'id' => $user->id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'contact_number' => $user->contact_number,
                    'company_name' => $user->company_name,
                    'address' => $user->address,
                    'role_type' => $user->role,
                ],
            ], 200);
        }

        public function all_vender()
        {
            try {
                // Fetch users where role = 1
                $users = User::where('role', 1)->get();

                // Check if any users were found
                if ($users->isEmpty()) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'No users found with role = 1.',
                    ], 404);
                }

                // Return the users
                return response()->json([
                    'status' => 'success',
                    'data' => $users,
                ], 200);
            } catch (\Exception $e) {
                // Handle any errors
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to fetch users.',
                    'error' => $e->getMessage(),
                ], 500);
            }
        }
}
