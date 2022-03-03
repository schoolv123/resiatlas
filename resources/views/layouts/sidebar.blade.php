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
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('assets/img/admin.png') }}" height="100" width="100"
                      class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Admin</a>
              </div>
          </div>

          {{-- Sidebar Menu --}}
          @php
              $menus = DB::table('menus')
                  ->where(['parent_name' => 'root', 'parent_id' => 0])
                  ->orderBy('position')
                  ->orderBy('parent_id')
                  ->get();
              //   print_r($menus);
          @endphp
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  @foreach ($menus as $item)
                      @if ($item->has_submenu)
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="nav-icon {{ $item->icon }}"></i>
                                  <p>
                                      {{ $item->name }}
                                      <i class="right fas fa-angle-right"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  @php
                                      $submenus = DB::table('menus')
                                          ->where(['parent_id' => $item->id, 'parent_name' => $item->name])
                                          ->orderBy('position')
                                          ->get();
                                  @endphp
                                  @foreach ($submenus as $val)
                                      <li class="nav-item">
                                          <a href="{{ url($item->route . $val->route) }}"
                                              class="nav-link {{ $val->position == 0 ? 'active' : '' }}">
                                              <i class="{{ $val->icon }} nav-icon"></i>
                                              <p>{{ $val->name }}</p>
                                          </a>
                                      </li>
                                  @endforeach
                              </ul>
                          </li>
                      @else
                          <li class="nav-item">
                              <a href="{{ url($item->route) }}"
                                  class="nav-link {{ $item->position == 0 ? 'active' : '' }}">
                                  <i class="nav-icon {{ $item->icon }}"></i>
                                  <p> {{ $item->name }}</p>
                              </a>
                          </li>
                      @endif
                  @endforeach
              </ul>
          </nav>
          {{-- /.sidebar-menu --}}
      </div>
      {{-- /.sidebar --}}
  </aside>
