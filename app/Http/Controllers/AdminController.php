<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categories;
use App\Models\Coupons;
use App\Models\DeleteStore;
use App\Models\Language;
use App\Models\Networks;
use App\Models\Stores;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function dashboard()
    {
        $coupons =Coupons::all();
        $blogs =Blog::all();
        $categories =Categories::all();
        $networks =Networks::all();
        $users = User::all();
        $stores =Stores::all();
        $langs =Language::all();
        return view('admin.dashboard',compact('stores','coupons','blogs','categories','networks','users','langs'));
    }


    public function index()
    {  
    $users =User::all();
    return view('admin.user.index', compact('users',));
    }
    
    public function create_user()
    {
        $users = User::all();
        return view('admin.user.create',compact('users'));
    }
    public function store_user(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ]);
        return redirect()->back()->withInput()->with('success', 'User created successfully.');
    }

   public function edit_user($id)
{
    $user = User::find($id);
    return view('admin.user.edit', compact('user'));
}

    public function update_user(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
       'role' => 'nullable', 
        ]);
       
        $user->update([
            'role' => $request->input('role'),
      
        ]);
        return redirect()->route('admin.user.index')->with('success', 'user Updated Successfully');
    }
    public function destroy($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if user exists
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User not found.');
        }

        // Delete the user
        $user->delete();

        // Redirect with a success message
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
}
