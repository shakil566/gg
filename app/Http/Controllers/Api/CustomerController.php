<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use File;

class CustomerController extends Controller
{
    public function index()
    {
        $user = User::where('is_admin', '<>', '1')->get();

        return response()->json([
            'status' => 200,
            'customer' => $user,
            'message' => 'All Customer',
        ]);
    }
    public function saveCustomer(Request $request)
    {
        //User photo upload
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $destinationPath = public_path() . '/uploads/user/';
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
        }

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_no = $request->phone_no;

        $user->photo = $filename;

        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;

        if ($user->save()) {
            // Save Image in Storage folder
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
    public function editCustomer(Request $request, $id)
    {
        $user = User::find($id);

        if (!empty($user)) {
            return response()->json([
                'status' => 200,
                'customer' => $user,
                'message' => 'Customer find successfully!',
            ]);
        } else {
            return response()->json([
                'status' => 402,
                'message' => 'Customer not find!',
            ]);
        }
    }
    public function updateCustomer(Request $request, $id)
    {
        $user = User::find($id);

        if (!empty($user)) {
            //User photo upload
            if ($request->file('photo')) {
                $file = $request->file('photo');
                $destinationPath = public_path() . '/uploads/user/';
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
            }
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone_no = $request->phone_no;
            $user->photo = $filename;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->email = $request->email;
            if ($user->save()) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Customer updated successfully!',
                ]);
            } else {
                return response()->json([
                    'status' => 402,
                    'message' => 'Customer not updated!',
                ]);
            }
        } else {
            return response()->json([
                'status' => 402,
                'message' => 'Customer not found!',
            ]);
        }
    }
    public function deleteCustomer(Request $request, $id)
    {
        $user = User::find($id);

        if (empty($user)) {
            return response()->json([
                'status' => 402,
                'message' => 'Customer not found!',
            ]);
        }


        if ($user->delete()) {

            //delete data related file
            $fileName = 'public/uploads/user/' . $user->photo;
            if (File::exists($fileName)) {
                File::delete($fileName);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Customer deleted successfully!',
            ]);
        } else {
            return response()->json([
                'status' => 402,
                'message' => 'Customer not deleted!',
            ]);
        }
    }
}
