<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\category;


class Categorycontroller extends Controller
{
    public function addcategory(Request $request)
    
    {
    	if($request->isMethod('post'))
    	{
    		$data = $request->all();
    		$category = new category;
    		$category->name = $data['name'];
    		$category->parent_id = $data['parent_id'];
    		$category->description = $data['des'];
    		$category->url = $data['url'];
    		$category->save();
    		return redirect('admin/viewcategories')->with('message_error','Category Added Succcessfully!');
    	}
    	$subcategory = category::where(['parent_id'=>0])->get();

    	return view('admin/category/addcategory')->with(compact('subcategory'));
    }

    public function viewcategories(Request $request)
    {
    	$category = category::get();
    	return view("admin.category.viewcategory",compact('category'));
    }
    
    public function editcategory(Request $request, $id=null)
    {
    	if($request->isMethod('post'))
    	{
    		$data = $request->all();
    		category::where(['id'=>$id])->update(['name'=>$data['name'],'description'=>$data['des'],'url'=>$data['url'] ]);

    		return redirect('admin/viewcategories')->with('message_error','Category Edit Succcessfully!');
    	}
    	$data = category::where(['id'=>$id])->first();
    	$subcategory = category::where(['parent_id'=>0])->get();
    	//print_r($data);die();
    	return view('admin.category.editcategory')->with(compact('data','subcategory'));
    }

    public function deletecategory($id=null)
    {
    	if(!empty($id))
    	{
    		category::where(['id'=>$id])->delete();
    		//return redirect()->back()->with('message_error','Category Deleted Succcessfully!');
    		return redirect('admin/viewcategories')->with('message_error','Category Deleted Succcessfully!');
    	}
    }
}

