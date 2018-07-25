<header class="main-header">
        <!-- Logo -->
        <a href="{{ route('dashboard.index')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>J</b>D</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>JAIN DHARM </b>ADMIN</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ URL::asset('public/adminTheme/dist/img/logo.png') }}" class="user-image" alt="User Image">
                  <span class="hidden-xs"> <?php echo $user=Session::get('username'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ URL::asset('public/adminTheme/dist/img/logo.png') }}" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $user=Session::get('username'); ?>

                      <small> <?php echo $user=Session::get('createdate'); ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                       <a href="{{ route('profile.index') }}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
