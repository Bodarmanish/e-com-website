@extends('sitedesign.adminlayout.admin_design')

@section('maincont')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{ url('/admin/addcategory') }}" class="current">Categories</a><a href="{{ url('/admin/addcategory') }}" class="current">Add Categories</a> </div>
    <h1>Add Categories</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Categories</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/addcategory') }}" name="add_category" id="add_category" novalidate="novalidate">
            	{{ csrf_field()}}

              <div class="control-group">
                <label class="control-label">Category Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Category Level </label>
                <div class="controls">
                  <select name="parent_id" style="width: 220px">
                    <option value="0">Select Category</option>
                    @foreach($subcategory as $val)
                      <option value="{{ $val->id }}">{{ $val->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                 <textarea name="des" id="des"></textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">URL</label>
                <div class="controls">
                  <input type="text"  name="url" id="url">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Add Categories" class="btn btn-success">
              </div>
          </form>
              

@endsection