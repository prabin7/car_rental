@extends('admin.layouts.master')

@section('body')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('admin/profile') }}"><i class="fa fa-dashboard"></i> Profile</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Change Password</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <!-- Small boxes (Stat box) -->
      
          <div class="col-md-12">
            <form class="form-horizontal" action="{{ url('/admin/updatePassword') }}" method="post" onsubmit="return validate();">
              {{ csrf_field() }}
              
              <div class="form-group">
                <label for="old-password">Old Password</label>
                <input name="old_password" type="password" class="form-control" id="old-password" required="required">
              </div>

              <div class="form-group">
                <label for="new-password">New Password</label>
                <input name="new_password" type="password" class="form-control" id="new-password" minlength="5" required="required">
              </div>

              <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input name="confirm_password" type="password" class="form-control" id="confirm-password" minlength="5" required="required">
              </div>
              <p id="validate-status"></p>
              <div class="error">
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              </div>


              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://getengineeringtroops.com" target="_blank">Get Engineering Troops</a>.</strong> All rights
    reserved.
  </footer>
@stop

@section('scripts')
  @parent
  <script type="text/javascript">
    //Check if two password input field matach or not
    $(document).ready(function() {
      $("#confirm-password").keyup(validate);
    });


    function validate() {
      var password = $("#new-password").val();
      var password1 = $("#confirm-password").val();

        if(password == password1) {
           $("#validate-status").text("Password matched");    
           document.getElementById("validate-status").style.color = "green";    
           return true;
        }
        else {
            $("#validate-status").text("Password do not match");
            document.getElementById("validate-status").style.color = "red";
            return false;  
        }
        
    }
  </script>
@stop

