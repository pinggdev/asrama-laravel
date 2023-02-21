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