<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ URL::asset('public/adminTheme/dist/img/logo.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Admin</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="<?php  if(Request::segment(2)=='testimonial' ||  Request::segment(2)=='aboutus' ||  Request::segment(2)=='ourpartner' ||  Request::segment(2)=='banner'||  Request::segment(2)=='howitworks'||  Request::segment(2)=='cms'){	echo 'active';	} ?> treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Content Managment</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/admin/banner') }}"><i class="fa fa-circle-o"></i>Home Banner  &  SEO</a></li>
              <!--  <li><a href="{{ url('/admin/aboutus') }}"><i class="fa fa-circle-o"></i>About Us  &  SEO</a></li>
                <li><a href="{{ url('/admin/services') }}"><i class="fa fa-circle-o"></i>Our Services</a></li>
           <li><a href="{{ url('/admin/testimonial') }}"><i class="fa fa-circle-o"></i>Testimonial</a></li> 
                <li><a href="{{ url('/admin/ourpartner') }}"><i class="fa fa-circle-o"></i>Our Partner | About Us</a></li>
                <li><a href="{{ url('/admin/howitworks') }}"><i class="fa fa-circle-o"></i>How It Works Step</a></li>
                <li><a href="{{ url('/admin/cms') }}"><i class="fa fa-circle-o"></i>Front Line Heading</a></li>-->
              </ul>
            </li>
		  </ul>
		  <ul class="sidebar-menu">
            <li class="<?php  if(Request::segment(2)=='pac' ){
				
				echo 'active';
				
			} ?> treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Jain History Management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">  
                <li><a href="{{ url('/admin/pac') }}"><i class="fa fa-circle-o"></i>Topic List</a></li>
               <!-- <li><a href="{{ url('/admin/uppercontent') }}"><i class="fa fa-circle-o"></i>Package Upper Content  &  SEO</a></li> -->
               
              </ul>
            </li>
		  </ul>
      <ul class="sidebar-menu">
            <li class="<?php  if(Request::segment(2)=='services' ){
				
				echo 'active';
				
			} ?> treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Jain Directory Management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">  
                <li><a href="{{ url('/admin/services') }}"><i class="fa fa-circle-o"></i>Directory List</a></li>
               <!-- <li><a href="{{ url('/admin/uppercontent') }}"><i class="fa fa-circle-o"></i>Package Upper Content  &  SEO</a></li> -->
               
              </ul>
            </li>
		  </ul>
      <ul class="sidebar-menu">
            <li class="<?php  if(Request::segment(2)=='events' ){
				
				echo 'active';
				
			} ?> treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Jain Event Management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">  
                <li><a href="{{ url('/admin/events') }}"><i class="fa fa-circle-o"></i>Event Calaneder</a></li>
               <!-- <li><a href="{{ url('/admin/uppercontent') }}"><i class="fa fa-circle-o"></i>Package Upper Content  &  SEO</a></li> -->
               
              </ul>
            </li>
      </ul>
      <ul class="sidebar-menu">
            <li class="<?php  if(Request::segment(2)=='aboutus' ){
				
				echo 'active';
				
			} ?> treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Jain Aboutpage Management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">  
                <li><a href="{{ url('/admin/aboutus') }}"><i class="fa fa-circle-o"></i>About Us</a></li>
               <!-- <li><a href="{{ url('/admin/uppercontent') }}"><i class="fa fa-circle-o"></i>Package Upper Content  &  SEO</a></li> -->
               
              </ul>
            </li>
		  </ul>

        </section>
		
      </aside> 