<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="/">Asrama</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            </form>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="/" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @if (Auth::user()->role === "admin") 

                <li class="sidebar-item">
                    <a href="{{ route('users.index') }}" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('asrama.index') }}" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Asrama</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('siswa.index') }}" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Siswa</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('jadwal.index') }}" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Jadwal</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('absen.index') }}" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Absen</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('absen.rekapbulanan') }}" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Rekap Absen Bulanan</span>
                    </a>
                </li>
                
                @endif

                @if (Auth::user()->role === "siswa" && Auth::user()->siswa)
                    <li class="sidebar-item">
                        <a href="{{ route('jadwal.index') }}" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Jadwal</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('absen.index') }}" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Absen</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>