  {{-- Main Sidebar Container --}}
  <aside class="main-sidebar sidebar-dark-primary siderbar-blue elevation-4">
      {{-- Brand Logo --}}
      <a href="{{ url('/') }}" class="brand-link">
          <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">ResiAtlas</span>
      </a>

      {{-- Sidebar --}}
      <div class="sidebar">
          {{-- Sidebar user panel (optional) --}}
          {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('assets/img/admin.png') }}" height="100" width="100"
                      class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Admin</a>
              </div>
          </div> --}}
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
              </div>
          </div>

          {{-- SidebarSearch Form --}}
          {{-- <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-secondary">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div> --}}

          {{-- Sidebar Menu --}}
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Static Pages
                              <i class="right fas fa-angle-right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link active">
                                  <i class="fa fa-file nav-icon"></i>
                                  <p>Home</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="fa fa-file nav-icon"></i>
                                  <p>About</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Simple Link
                              <span class="right badge badge-danger">New</span>
                          </p>
                      </a>
                  </li> --}}
              </ul>
          </nav>
          {{-- /.sidebar-menu --}}
      </div>
      {{-- /.sidebar --}}
  </aside>
