      <!-- Main Header -->
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SISTEM PERAKAM WAKTU</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
                <!-- Mail -->
                  <!-- include('layout.includes.mail'); -->
                <!-- End Mail -->


              <!-- Notifications: style can be found in dropdown.less -->
                <!-- Notifications -->
                  <!-- include('layout.includes.notification'); -->
                <!-- End Notifications -->

              <!-- Tasks: style can be found in dropdown.less -->
                <!-- Tasks -->
                  <!-- include('layout.includes.task'); -->
                <!-- End Tasks -->
            

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  {{ Session::get('user') }}
                  <!-- <img src="{{ URL::asset('/admin/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">-->
                  <span class="hidden-xs">{{ Session::get('user') }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <!-- <img src="{{ URL::asset('/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image"> -->
                    <p>
                        {{ Session::get('user') }} - {{Auth::user()->userid}}
                      <small>{{Auth::user()->userid}}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                  <!--
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                  <!--
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                  -->
                    <div class="pull-right">
                      <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
              </li>
            </ul>
          </div>
        </nav>
      </header>
