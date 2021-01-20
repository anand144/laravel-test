<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use App\ProductCategory;
use Auth;

class ProductController extends Controller
{
    public function list(){
        $products = Product::with('productCategory')->orderBy('created_at','DESC')->get();
        return view('admin.product.list')->with('products' , $products);
    }

    public function add(){

        // check custom permission
        if(Auth::user()->role_id==1) abort(403);

        $categories = Category::active()->get();
        return view('admin.product.add',['categories' => $categories]);
    }

    public function save(Request $request){

        // check custom permission
        if(Auth::user()->role_id==1) abort(403);
        
        $current_time=\Carbon\Carbon::now();
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        $product_id = Product::insertGetId([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $categories = $request->category;
        foreach ($categories as $cat) {
            ProductCategory::insert([
                'product_id' => $product_id,
                'category_id' =>  $cat,
            ]);
        }

        return \Redirect::back()->with('success','Success! New Product added successfully.');
    }

    public function edit($id){
        $product = Product::with('productCategory')->where('id', $id)->first();
        $categories = Category::active()->get();
        return view('admin.product.edit',[
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Request $request){
        
        $current_time=\Carbon\Carbon::now();

        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        Product::where('id', $request->id)->update([
            'name' => $request->name,
            'price' => str_replace(",", "", $request->price),
            'status' => $request->status,
        ]);

        $categories = $request->category;
        if(count($categories) > 0)
            ProductCategory::where('product_id',$request->id)->delete();

        foreach ($categories as $cat) {
            ProductCategory::firstOrCreate([
                'product_id' => $request->id,
                'category_id' =>  $cat,
            ]);
        }


        return \Redirect::back()->with('success','Success! Product updated successfully.');
    }

    public function delete(Request $request){
        
        $this->validate($request, ['delete_id' => 'required' ]);
        Product::where('id', $request->delete_id)->update(['status' => 2]);
        return \Redirect::back()->with('success','Success! Product status updated successfully.');
    }
    
}
