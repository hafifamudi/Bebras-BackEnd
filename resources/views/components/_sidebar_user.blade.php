<ul class="sidebar-menu">
    <li class="menu-header">Beranda</li>
    <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a href="{{ route('user.dashboard.index') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Data Utama</li>
    <li class="nav-item {{ request()->is('admin/category*') ? 'active' : '' }}">
        <a href="{{ route('user.category.index') }}" class="nav-link"><i class="fas fa-folder"></i><span>Kategori</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/post*') ? 'active' : '' }}">
        <a href="{{ route('user.post.index') }}" class="nav-link"><i class="fas fa-book-open"></i><span>Berita</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/event*') ? 'active' : '' }}">
        <a href="{{ route('user.event.index') }}" class="nav-link"><i class="fas fa-bell"></i><span>Agenda</span></a>
    </li>
    <li class="menu-header">Galeri</li>
    <li class="nav-item {{ request()->is('admin/photo*') ? 'active' : '' }}">
        <a href="{{ route('user.photo.index') }}" class="nav-link"><i class="fas fa-image"></i><span>Foto</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/video*') ? 'active' : '' }}">
        <a href="{{ route('user.video.index') }}" class="nav-link"><i class="fas fa-video"></i><span>Video</span></a>
    </li>
    <li class="menu-header">PENGATURAN</li>
    <li class="nav-item {{ request()->is('admin/slider*') ? 'active' : '' }}">
        <a href="{{ route('user.slider.index') }}" class="nav-link"><i class="fas fa-laptop"></i><span>Slider</span></a>
    </li>
</ul>