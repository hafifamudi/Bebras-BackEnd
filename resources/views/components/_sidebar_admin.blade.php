<ul class="sidebar-menu">
    <li class="menu-header">Beranda</li>
    <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard.index') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Data Utama</li>
    <li class="nav-item {{ request()->is('admin/category*') ? 'active' : '' }}">
        <a href="{{ route('admin.category.index') }}" class="nav-link"><i class="fas fa-folder"></i><span>Kategori</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/post*') ? 'active' : '' }}">
        <a href="{{ route('admin.post.index') }}" class="nav-link"><i class="fas fa-book-open"></i><span>Berita</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/event*') ? 'active' : '' }}">
        <a href="{{ route('admin.event.index') }}" class="nav-link"><i class="fas fa-bell"></i><span>Agenda</span></a>
    </li>
    <li class="menu-header">Galeri</li>
    <li class="nav-item {{ request()->is('admin/photo*') ? 'active' : '' }}">
        <a href="{{ route('admin.photo.index') }}" class="nav-link"><i class="fas fa-image"></i><span>Foto</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/video*') ? 'active' : '' }}">
        <a href="{{ route('admin.video.index') }}" class="nav-link"><i class="fas fa-video"></i><span>Video</span></a>
    </li>
    <li class="menu-header">PENGATURAN</li>
    <li class="nav-item {{ request()->is('admin/slider*') ? 'active' : '' }}">
        <a href="{{ route('admin.slider.index') }}" class="nav-link"><i class="fas fa-laptop"></i><span>Slider</span></a>
    </li>
    <li class="menu-header">Akun</li>
    <li class="nav-item {{ request()->is('admin/user*') ? 'active' : '' }}">
        <a href="{{ route('admin.user.index') }}" class="nav-link"><i class="fas fa-user"></i><span>User</span></a>
    </li>
</ul>