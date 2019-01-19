@extends('sitedesign.adminlayout.admin_design')

@section('maincont')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<style>
       
           .message1{margin-bottom: ;}
        
    </style>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="" class="current">Setting</a> </div>
    <h1>Admin Setting</h1>
  </div>
   <div class="message1">
                        @if(session()->has("flash_message_update"))
                                 <div  class="alert fade in" style="margin-bottom: 00px;background:black;">
                                    <span style="color:blue;">{{session()->get("flash_message_update")}} </span> 

                                 </div>
                            
                                <script>
                                $(".alert").fadeTo(3000,500).slideUp(500,function(){$(".alert").slideUp(500);});
                                </script>
                        @endif
                    </div> 
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Update Password</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('/admin/updatepass') }}" name="password_validate" id="password_validate" novalidate="novalidate">
              	{{ csrf_field() }}

                <div class="control-group">
                  <label class="control-label">Current Password</label>
                  <div class="controls">
                    <input type="password" name="current_Pwd" id="current_Pwd" />
                    <span id="chkpass"></span>
                  </div>

                  <div class="control-group">
                  <label class="control-label">New Password</label>
                  <div class="controls">
                    <input type="password" name="new_Pwd" id="new_Pwd" />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Confirm password</label>
                  <div class="controls">
                    <input type="password" name="confirm_Pwd" id="confirm_Pwd" />
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Update Password" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection