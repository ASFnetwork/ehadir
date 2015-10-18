      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ URL::asset('/admin/dist/img/logoshj.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Menu</p>
              <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
          </div>
          <!-- search form -->
          <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Operasi</li>
            <!-- 1 level Menu -->
            <li><a href="/attendance"><i class="fa fa-book"></i> <span>Kehadiran</span></a></li>
            <li><a href="/planner"><i class="fa fa-book"></i> <span>Planner</span></a></li>
            <li><a href="/staffs"><i class="fa fa-book"></i> <span>Senarai Kakitangan</span></a></li>
            <li><a href="/userinfo"><i class="fa fa-book"></i> <span>Maklumat Pengguna</span></a></li>
            <li class="header">Login</li>
            <li><a href="/logout"><i class="fa fa-circle-o text-red"></i> <span>Keluar</span></a></li>
            <li><a href="/password"><i class="fa fa-circle-o text-yellow"></i> <span>Tukar Katalaluan</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
