<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
   
    <li class="nav-item ">
      <a class="nav-link" href="{{ route('admin.index') }}">
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Dashbord Admin</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('vaksin.index') }}">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Data Vaksin</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{ route('posts.index') }}">
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Data Posts</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('member.index') }}">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">Data Pengguna</span>
      </a>
    </li>

  </ul>
</nav>