<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use Auth;

class HomeController extends Controller
{
   
    public function dashboard()
    {
        $categories = Category::active()->whereNull('parent_id')->count();
        $products = Product::active()->count();
        return view('admin.dashboard')->with([
            'categories'  => $categories,
            'products'  => $products
        ]);
    }

    public function profile()
    {
        $user = User::with('role')->where('id', Auth::user()->id)->first();
        return view('admin.profile')->with([
            'user'  => $user
        ]);
    }

    public function profileUpdate(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
        ]);

        if(User::where('id', Auth()->user()->id)->update([
                'email' => $request->email,
                'name' => $request->name
        ])){
            return \Redirect::back()->with('success','Success! Profile updated successfully.');
        }

        return \Redirect::back()->with('error','Opps! Something went wrong, please try again later.');
    }

    public function passwordUpdate(Request $request){
        // Validate the form data
        $this->validate($request, [
            'password' => 'min:5|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:5'
        ]);

        if(User::where('id', Auth()->user()->id)->update([
                'password' => \Hash::make($request->password)
        ])){
            return \Redirect::back()->with('success','Success! Password updated successfully.');
        }

        return \Redirect::back()->with('error','Opps! Something went wrong, please try again later.');
    }
}
