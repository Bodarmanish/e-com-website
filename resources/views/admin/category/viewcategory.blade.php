@extends('sitedesign.adminlayout.admin_design')
<title>view category</title>

@section('maincont')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div id="content">
<!-- <img src ="{{asset('image/bachend_image/select2.png') }}" -->
  <div id="content-header">
   <div id="breadcrumb"> <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{ url('/admin/addcategory') }}" class="current">Categories</a><a href="{{ url('/admin/addcategory') }}" class="current">view Categories</a> </div>
    <h1>Categories</h1>
    
                        @if(session()->has("message_error"))
                                 <div  class="alert alert-success fade in" style="margin-bottom: 00px;">
                                    <strong>{{session()->get("message_error")}}</strong> 

                                 </div>
                            
                                <script>
                                $(".alert").fadeTo(2000,500).slideUp(500,function(){$(".alert").slideUp(500);});
                                </script>
                        @endif
                     
  </div>
  <div class="container-fluid">
  
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Categories</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <!-- <th><input type="checkbox" style="border:2px dashed #fff;background:red;" /></th> -->
                  <th>Category Id</th>
                  <th>Category Name</th>
                  <th>Category url</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
               
                @foreach($category as $categories)

                    <tr class="gradeX">

                      <!-- <td><input type="checkbox" /></td> -->
                      <td>{{$categories->id}}</td>
                      <td>{{$categories->name}}</td>
                      <td>{{$categories->url}}</td>
                      <td class="center"><div style="float:left; " class="fr"><a href="{{'/admin/editcategory/'.$categories->id }}" class="btn btn-primary btn-mini">Edit</a> <span class="delete"><a  href="{{'/admin/deletecategory/'.$categories->id }}" class="btn btn-danger btn-mini">Delete</a></span></div>
                      </td>   
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection