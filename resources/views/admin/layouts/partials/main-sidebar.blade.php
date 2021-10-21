  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src={{ asset('admin/dist/img/admin-settings-male.png') }} class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/" class="d-block"> {{ auth('admin')->user()->first_name }} {{ auth('admin')->user()->last_name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href={{ route('admin.homepage') }} class="nav-link {{ url()->current() == route('admin.homepage') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{ route('admin.leads') }} class="nav-link {{ url()->current() == route('admin.leads') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Leads
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{ route('admin.courses') }} class="nav-link {{ url()->current() == route('admin.courses') ? 'active' : '' }}">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Kurslar
              </p>
            </a>
          </li>
          <li class="nav-item {{ (url()->current() == route('admin.tests') || url()->current() == route('admin.testscore')) ? 'menu-open' : '' }}">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Testlər
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{ route('admin.tests') }} class="nav-link {{ url()->current() == route('admin.tests') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Online testlər</p>
                </a>
              </li>
              <li class="nav-item">
                <a href={{ route('admin.testscore') }} class="nav-link {{ url()->current() == route('admin.testscore') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Test nəticəsi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ (url()->current() == route('admin.news') || url()->current() == route('admin.events')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                İnformasiya
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{ route('admin.news') }} class="nav-link {{ url()->current() == route('admin.news') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xəbərlər</p>
                </a>
              </li>
              <li class="nav-item">
                <a href={{ route('admin.events') }} class="nav-link {{ url()->current() == route('admin.events') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tədbirlər</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href={{ route('admin.index') }} class="nav-link {{ url()->current() == route('admin.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                İdarə heyəti
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href={{ route('admin.vacancy') }} class="nav-link {{ url()->current() == route('admin.vacancy') ? 'active' : '' }}">
              <i class="nav-icon fas fa-pencil-ruler"></i>
              <p>
                Vakansiya
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href={{ route('admin.messages') }} class="nav-link {{ url()->current() == route('admin.messages') ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Mesajlar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{ route('admin.about') }} class="nav-link {{ url()->current() == route('admin.about') ? 'active' : '' }}">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Haqqımızda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{ route('admin.method') }} class="nav-link {{ url()->current() == route('admin.method') ? 'active' : '' }}">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Method
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{ route('admin.studies') }} class="nav-link {{ url()->current() == route('admin.studies') ? 'active' : '' }}">
              <i class="nav-icon fas fa-code-branch"></i>
              <p>
                Studies
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{ route('admin.gallery') }} class="nav-link {{ url()->current() == route('admin.gallery') ? 'active' : '' }}">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href={{ route('admin.settings') }} class="nav-link {{ url()->current() == route('admin.settings') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Quraşdırmalar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
