<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $user = User::where('is_admin','<>','1')->get();

        return response()->json([
            'status' => 200,
            'customer' => $user,
            'message' => 'All Customer',
        ]);
    }
    public function saveCustomer(Request $request)
    {
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_no = $request->phone_no;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;

        if ($user->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Customer created successfully!',
            ]);
        } else {
            return response()->json([
                'status' => 402,
                'message' => 'Customer not created!',
            ]);
        }
    }
}
