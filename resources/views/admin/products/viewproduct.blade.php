@extends('sitedesign.adminlayout.admin_design')
<title>view category</title>

@section('maincont')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div id="content">
<!-- <img src ="{{asset('image/bachend_image/select2.png') }}" -->
  <div id="content-header">
   <div id="breadcrumb"> <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{ url('/admin/viewproduct') }}" class="current">Product</a><a href="{{ url('/admin/viewproduct') }}" class="current">view Product</a> </div>
    <h1>Product</h1>
    
        @if(session()->has("message_edit"))
            <div id="gritter-notice-wrapper">
                <div id="gritter-item-1" class="gritter-item-wrapper" style="opacity: 0.7;">
                   <div class="gritter-top"></div>
                    <div class="gritter-item" style="background:green">
                     <div class="gritter-with-image">
                        <span class="gritter-title">{{session()->get("message_edit")}}</span>
                      </div>
                    <div style="clear:both"></div>
                  </div>
                <div class="gritter-bottom"></div>
              </div>
            </div>    
        @endif
        @if(session()->has("message_delete"))
            <div id="gritter-notice-wrapper">
                <div id="gritter-item-1" class="gritter-item-wrapper" style="opacity: 0.7;">
                   <div class="gritter-top"></div>
                    <div class="gritter-item" style="background:red">
                     <div class="gritter-with-image">
                        <span class="gritter-title">{{session()->get("message_delete")}}</span>
                      </div>
                    <div style="clear:both"></div>
                  </div>
                <div class="gritter-bottom"></div>
              </div>
            </div>    
        @endif
  </div>
  <div class="container-fluid">
  
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View product</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <!-- <th><input type="checkbox" style="border:2px dashed #fff;background:red;" /></th> -->
                  <th>product Id</th>
                  <th>Category Id</th>
                  <th>category Name</th>
                  <th>product Name</th>
                  <th>product code</th>
                  <th>product color</th>
                  <th>product image</th>
                  <th>price</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
               
                @foreach($products as $product)

                    <tr class="gradeX">

                      <!-- <td><input type="checkbox" /></td> -->
                      <td>{{$product->id}}</td>
                      <td>{{$product->category_id}}</td>
                      <td>{{$product->category_name}}</td>
                      <td>{{$product->product_name}}</td>
                      <td>{{$product->product_code}}</td>
                      <td>{{$product->product_color}}</td>
                      <td>{{$product->price}}</td>
                       <td>
                        @if(!empty($product->image))
                          <img src="{{asset('/image/bachend_image/product/small/'.$product->image)}}" width="50px">
                        @endif
                       </td>

                      <td class="center"><div style="float:left; " class="fr"> <a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-success btn-mini">View</a> <a href="{{'/admin/editproduct/'.$product->id }}" class="btn btn-primary btn-mini">Edit</a> <span class="delete1"><a  href="{{'/admin/deleteproduct/'.$product->id }}" class="btn btn-danger btn-mini">Delete</a></span></div>
                      </td>   
                    </tr>

                    <div id="myModal{{$product->id}}" class="modal hide">
                      <div class="modal-header">
                       <button data-dismiss="modal" class="close" type="button">×</button>
                         <h3>{{$product->product_name}} Full Details</h3>
                      </div>
                        <div class="modal-body">
                          <p>product Id: {{$product->id}}</p>
                          <p>Category Id: {{$product->category_id}}</p>
                          <p>category Name: {{$product->category_name}}</p>
                          <p>product Name: {{$product->product_name}}</p>
                          <p>product description: {{$product->description}}</p>  
                          <p>product code: {{$product->product_code}}</p>
                          <p>product color: {{$product->product_color}}</p>
                          <p>product image:  <img src="{{asset('/image/bachend_image/product/small/'.$product->image)}}" width="50px"></p>
                          <p>price: {{$product->price}}</p>                   
                        </div>
                    </div>

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
        
          
            
            

@endsection