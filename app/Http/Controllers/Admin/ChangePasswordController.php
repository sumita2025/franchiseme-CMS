<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHome;
use App\Models\HomeClientLogo;
use App\Models\Team;

class ChangePasswordController extends Controller
{
   
    // Show change password form
    public function showChangePassword()
    {
        return view('pages.change_password');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => [
                'required',
                'min:8',
                'different:current_password',
                'regex:/[A-Z]/',           // At least one uppercase
                'regex:/[a-z]/',           // At least one lowercase
                'regex:/[0-9]/',           // At least one number
                'regex:/[!@#$%^&*()_+\-=\[\]{};:\'"\\\|,.<>\/?]/', // At least one special char
            ],
            'confirm_password' => 'required|same:new_password',
        ], [
            'current_password.required' => 'Current password is required.',
            'new_password.required' => 'New password is required.',
            'new_password.min' => 'New password must be at least 8 characters.',
            'new_password.different' => 'New password must be different from current password.',
            'new_password.regex' => 'Password must contain uppercase, lowercase, number, and special character.',
            'confirm_password.required' => 'Confirm password is required.',
            'confirm_password.same' => 'Passwords do not match.',
        ]);

        $user = Auth::guard('admin')->user();

        // Verify current password
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'current_password' => ['Current password is incorrect.']
                ]
            ], 422);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully!'
        ]);
    }
   
}
