<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="{{ asset('school/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8"> <span class="brand-text font-weight-light">EduTech Academy</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if(auth()->user()->img)
      <img src="{{ asset('storage') . "/" . auth()->user()->img }}" class="img-circle elevation-2" alt="User Image">

    @else
    <img src="{{ asset('assets/img/profile.png') }}" class="img-circle elevation-2" alt="Image set Nai">

  @endif

      </div>
      <div class="info">
        <a href="{{ route('profile') }}" style="text-decoration:underline" class="d-block">asad@gmail.com</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="./" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.courses') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Courses</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.lesson') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>Lessons</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('catagory_index') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>Threads</p>
          </a>
        </li>

        <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-file-invoice"></i>
                <p>
                  Accounts
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="{{ route('admin.users','instructor') }}" class="nav-link">
                <i class="fa fa-users" aria-hidden="true"></i>
                  <p>Instructors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.users','student') }}" class="nav-link">
                <i class="fa fa-users" aria-hidden="true"></i>
                  <p>Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.users','user') }}" class="nav-link">
                <i class="fa fa-users" aria-hidden="true"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
          </li>


        <li class="nav-item">
          <a href="/admin/sell_report.php" class="nav-link">
            <i class="fa-solid fa-receipt"></i>
            <p>Sell Report</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.feedback')}}" class="nav-link">
            <i class="fa-solid fa-message"></i>
            <p>Feedback</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('profile.password.edit') }}" class="nav-link">
            <i class="fa-solid fa-key"></i>
            <p>Change Password</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>