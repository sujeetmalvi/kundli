  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ url('/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{env('SOFTWARE_NAME')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/dashboard') }}" class="d-block">{{ucfirst(Auth::user()->name)}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!--<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">4</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/rpt_usersbtdistances') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Volations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/rpt_active_cases') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Cases</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/rpt_defaulters') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Defaulters</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/rpt_breaches') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Breaches</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/rpt_usershealth') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Health</p>
                </a>
              </li>
            </ul>
          </li>-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Masters
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/users') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              @if(Auth::user()->role_id==1)
              <li class="nav-item">
                <a href="{{ url('/company') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>City</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>