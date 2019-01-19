@extends('sitedesign.adminlayout.admin_design')

@section('maincont')
        @if(session()->has("message_add"))
            <div id="gritter-notice-wrapper">
                <div id="gritter-item-1" class="gritter-item-wrapper" style="opacity: 0.7;">
                   <div class="gritter-top"></div>
                    <div class="gritter-item" style="background:green">
                     <div class="gritter-with-image">
                        <span class="gritter-title">{{session()->get("message_add")}}</span>
                      </div>
                    <div style="clear:both"></div>
                  </div>
                <div class="gritter-bottom"></div>
              </div>
            </div>    
        @endif

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{ url('/admin/editproduct/'.$productsdetail->id) }}" class="current">Products</a><a href="{{ url('/admin/editproduct/'.$productsdetail->id) }}" class="current">Edit Products</a> </div>
    <h1> Edit Products</h1>
  </div>                        

  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Products</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/editproduct'.$productsdetail->id) }}" name="edit_product" id="edit_product" novalidate="novalidate">
              {{ csrf_field()}}
              <div class="control-group">
                <label class="control-label">Under Category</label>
                  
                  <div class="controls">
                    <div class="select2-container" id="s2id_autogen1">
                        <select name="category_id" style="width: 220px">   
                          <?php echo $category_dropdown;?>
                        </select>
                    @if(session()->has("message_error"))
                    <strong style="width: 270px;background:white;margin-top:-53px;color: red;">{{session()->get("message_error")}}</strong> 
                  @endif
                    </div>
                  </div>
              </div>

              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name" value="{{ $productsdetail->product_name }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Product code</label>
                <div class="controls">
                  <input type="text" name="code" id="code"value="{{ $productsdetail->product_code }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Product color</label>
                <div class="controls">
                  <input type="text" name="color" id="color" value="{{ $productsdetail->product_color }}">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                 <textarea name="des" id="des">{{ $productsdetail->description }}</textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" name="price" id="price" value="{{ $productsdetail->price }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">image</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Edit Product" class="btn btn-success">
              </div>
          </form>
              

@endsection