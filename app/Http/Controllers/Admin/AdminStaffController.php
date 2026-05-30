<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class AdminStaffController extends Controller
{
    // Display all admins and customers side-by-side
    public function index()
    {
        $admins = User::all();
        $customers = Customer::all();

        return view('admin.users', compact('admins', 'customers'));
    }

    // Assign a customer to also be an Admin
    public function makeAdmin($customerId)
    {
        $customer = Customer::findOrFail($customerId);

        // Check if an admin with this email already exists
        $exists = User::where('email', $customer->email)->exists();
        if ($exists) {
            return redirect()->back()->with('error', 'This user is already an admin.');
        }

        // Copy customer data into the users (admin) table
        User::create([
            'name'     => $customer->customer_name,
            'email'    => $customer->email,
            'password' => $customer->password_hash, // Preserves their current login password
        ]);

        return redirect()->back()->with('success', "{$customer->customer_name} has successfully been assigned as an Admin!");
    }

    // Remove an account from the admin table
    public function removeAdmin($adminId)
    {
        $admin = User::findOrFail($adminId);
        
        // Prevent accidental self-lockout if only one admin is left
        if (User::count() <= 1) {
            return redirect()->back()->with('error', 'Cannot remove the last admin account.');
        }

        $admin->delete();
        return redirect()->back()->with('success', 'Admin access removed successfully.');
    }
}