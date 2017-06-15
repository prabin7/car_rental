<?php
  $user = $id =Auth::user()->id;
  $user = App\User::findOrFail($id);
?>
	<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('img/dummy_user.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ $user->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Dashboard -->
        <li>
          <a href="{{ url('/admin/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <!-- Home Page -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Home Page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/logo') }}"><i class="fa fa-circle-o"></i> Logo</a></li>
            <li><a href="{{ url('/admin/slider') }}"><i class="fa fa-circle-o"></i> Slider</a></li>
            <li><a href="{{ url('/admin/homeBanner/donate-section') }}"><i class="fa fa-circle-o"></i> Donate Section</a></li>
            <li><a href="{{ url('/admin/homeBanner/signup-section') }}"><i class="fa fa-circle-o"></i> Signup Section</a></li>
          </ul>
        </li> -->



        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>