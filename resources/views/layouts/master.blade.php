@include('layouts.includes.header')

<body>
    <div id="app">
        @include('layouts.includes.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Dashboard</h3>
                <h4>Selamat Datang {{Auth::user()->name}}</h4>
                @if(Auth::user()->role === "admin")
                    <p></p>
                @elseif(!Auth::user()->siswa && Auth::user()->role === "siswa")
                    <p>Anda belum terdaftar dalam asrama, hubungi admin!</p>
                @endif
            </div>
            <div class="page-content">
                @yield('content')
            </div>


        </div>
    </div>
    <script src="{{ ('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}""></script>
    <script src="{{ ('assets/js/bootstrap.bundle.min.js') }}""></script>

    <script src="{{ ('assets/vendors/apexcharts/apexcharts.js') }}""></script>
    <script src="{{ ('assets/js/pages/dashboard.js') }}""></script>

    <script src="{{ ('assets/js/main.js') }}""></script>
</body>

</html>