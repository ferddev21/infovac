<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
     
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.index') }}">
          <i class="icon-grid-2 menu-icon"></i>
          <span class="menu-title">Dashbord Admin</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.vaksin') }}">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Data Vaksin</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.posts') }}">
          <i class="icon-grid-2 menu-icon"></i>
          <span class="menu-title">Data Posts</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.user') }}">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Data Pengguna</span>
        </a>
      </li>

     
    </ul>
  </nav>