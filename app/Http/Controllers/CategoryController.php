<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use Auth;

class CategoryController extends Controller
{
    public function list(){
        $categories = Category::orderBy('name','asc')->get();
       // dd($categories);
        return view('admin.category.list')->with('categories' , $categories);
    }

    public function add(){

        // check custom permission
        if(Auth::user()->role_id==2) abort(403);

        $categories = Category::active()->get();
        return view('admin.category.add',['categories' => $categories]);
    }

    public function save(Request $request){

        // check custom permission
        if(Auth::user()->role_id==2) abort(403);
        
        $current_time=\Carbon\Carbon::now();
        $this->validate($request, [
            'name' => 'required',
            'parent' => 'required',
            'status' => 'required',
        ]);

        $parents = $request->parent;
        Category::insert([
            'name' => trim($request->name),
            'parent_id' => json_encode($parents),
            'created_at' => now(),
            'updated_at' => now(),
            'status' => $request->status,
        ]);
        return \Redirect::back()->with('success','Success! New Category added successfully.');
    }

    public function edit($id){
        $category = Category::where('id', $id)->first();
        $categories = Category::where('id','!=',$id)->orderBy('name','asc')->get();
        return view('admin.category.edit',[
            'categories' => $categories,
            'category' => $category
        ]);
    }

    public function update(Request $request){
        
        $current_time=\Carbon\Carbon::now();

        $this->validate($request, [
             'id' => 'required',
             'name' => 'required',
            'parent' => 'required',
            'status' => 'required',
        ]);

        $parents = $request->parent;
        Category::where('id' , $request->id )->update([
            'name' => trim($request->name),
            'parent_id' => json_encode($parents),
            'status' => $request->status,
        ]);

        return \Redirect::back()->with('success','Success! Category updated successfully.');
    }

    public function delete(Request $request){
        
        $this->validate($request, ['delete_id' => 'required' ]);
        Category::where('id', $request->delete_id)->update(['status' => 2]);
        return \Redirect::back()->with('success','Success! Category status updated successfully.');
    }
}
