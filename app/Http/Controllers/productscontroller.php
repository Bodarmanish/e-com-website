<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use Auth;
use Egulias\EmailValidator\Validation\isValid;
use Illuminate\Http\Concerns\hasFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Session;

class productscontroller extends Controller
{
    public function addproduct(Request $request)
    {
    	if ($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>";print_r($data);die;
    		if (empty($data['category_id'])) {
    			return redirect()->back()->with('message_error','Under category is missing!');
    		}
    		$product = new product;
    		$product->category_id = $data['category_id'];
    		$product->product_name = $data['name'];
    		$product->product_code = $data['code'];
    		$product->product_color = $data['color'];
    		$product->description = $data['des'];
    		$product->price = $data['price'];
    		//upload image
    		if($request->hasFile('image')){
    			$image_tem = Input::file('image');
    			
    			if($image_tem->isValid()){
    				$extension = $image_tem->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				//save difrent size of image
    				$large_image = public_path('/image/bachend_image/product/large/'.$filename);
    				$medium_image = public_path('/image/bachend_image/product/medium/'.$filename);
    				$small_image = public_path('/image/bachend_image/product/small/'.$filename);
    				//resize image
    				Image::make($image_tem)->save($large_image);
    				Image::make($image_tem)->resize(600,600)->save($medium_image);
    				Image::make($image_tem)->resize(300,300)->save($small_image);

    				$product->image = $filename;
    			}
    		}
    		if(empty($product->image)){
    			$product->image ='';
    		}

    		//end upload image
    		$product->save();
    		return redirect()->back()->with('message_add','Product Added Succcessfully!');
    	}

    	$categories = category::where(['parent_id'=>0])->get();
    	$category_dropdown = "<option value='' selected disabled>select</option>";
    	foreach ($categories as $cat) {
    		$category_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
    		$sub_categories = category::where(['parent_id'=>$cat->id])->get();
    		foreach ($sub_categories as $sub_cat) {
    			$category_dropdown .= "<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
    		}
    	}
    	return view('admin.products.addproduct')->with(compact('category_dropdown'));
    }
    public function viewproduct()
    {
    	$products = product::get();
    	foreach ($products as $key => $val) {
    		$category_name = category::where(['id'=>$val->category_id])->first();
    		$products[$key]->category_name = $category_name->name;

    	}

    	//echo "<pre>"; print_r($products);die();
    	return view('admin.products.viewproduct')->with(compact('products'));
    }

    public function editproduct(Request $request,$id=null)
    {

    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>";print_r($data);die();
    		//upload image
    		if($request->hasFile('image')){
    			$image_tem = Input::file('image');
    			
    			if($image_tem->isValid()){
    				$extension = $image_tem->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				//save difrent size of image
    				$large_image = public_path('/image/bachend_image/product/large/'.$filename);
    				$medium_image = public_path('/image/bachend_image/product/medium/'.$filename);
    				$small_image = public_path('/image/bachend_image/product/small/'.$filename);
    				//resize image
    				Image::make($image_tem)->save($large_image);
    				Image::make($image_tem)->resize(600,600)->save($medium_image);
    				Image::make($image_tem)->resize(300,300)->save($small_image);

    			}

    		}
    		else{
    				$filename = $data['current_image'];
    			}
    			
    		//end upload image
    		product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'product_name'=>$data['name'],'product_code'=>$data['code'],'product_color'=>$data['color'],'description'=>$data['des'],'price'=>$data['price'],'image'=>$filename]);
    		if (empty($data['category_id'])) {
    			return redirect()->back()->with('message_error','Under category is missing!');
    		}
    		if(empty($data['image'])){
    			$data['image'] ='';
    		}

    		return redirect('/admin/viewproduct')->with('message_edit','Product Edit Succcessfully!');
    	}


    	$productsdetail = product::where(['id'=>$id])->first();

    	//dropdown category
    	$categories = category::where(['parent_id'=>0])->get();
    	$category_dropdown = "<option value='' selected disabled>select</option>";
    	foreach ($categories as $cat) {
    		if ($cat->id==$productsdetail->category_id) {
    			$selected = 'selected';
    		}
    		else{
    			$selected = "";
    		}
    		$category_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
    		$sub_categories = category::where(['parent_id'=>$cat->id])->get();
    		foreach ($sub_categories as $sub_cat) {
    			if ($sub_cat->id==$productsdetail->category_id) {
    			$selected = 'selected';
    		}
    		else{
    			$selected = "";
    		}
    			$category_dropdown .= "<option value='".$sub_cat->id."' ".$selected." >&nbsp;--&nbsp;".$sub_cat->name."</option>";
    		}
    	}
    	//end dropwond category
    	
    	return view('admin.products.editproduct')->with(compact('productsdetail','category_dropdown'));
    }

    public function delproductimage($id=null)
    {
    	product::where(['id'=>$id])->update(['image'=>'']);
    	return redirect()->back()->with('image_delete','Product Image has been deleted Succcessfully!');
    }

    public function deleteproduct($id=null)
    {
    	product::where(['id'=>$id])->delete();
   		return redirect()->back()->with('message_delete','Product Deleted Succcessfully!');

    }
}
