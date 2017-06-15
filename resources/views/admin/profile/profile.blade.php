@extends('admin.layouts.master')

@section('body')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Profile</h3>

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
            @if (Session::has('flash_msg'))
              <div class="alert alert-success">
                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_msg') }}
              </div>
            @endif
            <table class="table table-hover" style="margin-left: 20px;">
              <tr>
                <td class="col-sm-2">Name</td>
                <td class="col-sm-10">{{ $user->name }}</td>
              </tr>
              <tr>
                <td class="col-sm-2">Email</td>
                <td class="col-sm-10">{{ $user->email }}</td>
              </tr>
              <tr>
                <td class="col-sm-2">Joined Date</td>
                <td class="col-sm-10">{{ $user->created_at }}</td>
              </tr>
              <tr>
                <td class="col-sm-2">Last Login</td>
                <td class="col-sm-10">{{ $user->updated_at }}</td>
              </tr>
              <tr>
                <td><a href="{{ url('/admin/changePassword') }}" class="btn btn-primary">Change Password</a></td>
                <td><a href="{{ url('/admin/editProfile') }}" class="btn btn-primary">Edit Profile</a></td>
              </tr>
            </table>
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

