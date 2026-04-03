<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{url('/')}}" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ Vite::asset('resources/images/dummy-logo.png')}}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            {{-- <span class="brand-text fw-light">Admin Panel</span> --}}
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >

              <li class="nav-item">
                  <a href="{{ route('user.dashboard') }}"
                    class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                    
                      <i class="nav-icon bi bi-speedometer"></i>
                      <p>Dashboard</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="#"
                    class="nav-link">
                    
                      <i class="bi bi-arrow-up-square"></i>
                      <p>My Orders</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="{{ route('user.profile') }}"
                    class="nav-link {{ request()->routeIs('user.profile') ? 'active' : '' }}">
                    
                      <i class="bi bi-person-circle"></i>
                      <p>Profile Information</p>
                  </a>
              </li>


              <li class="nav-item">
                  <a href="{{ route('user.logout') }}"
                    class="nav-link {{ request()->routeIs('user.logout') ? 'active' : '' }}">
                    
                      <i class="bi bi-box-arrow-right"></i>
                      <p>Logout</p>
                  </a>
              </li>
              
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>