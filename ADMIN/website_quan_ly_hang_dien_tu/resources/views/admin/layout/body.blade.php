@include('admin.layout.head')

<body>
    <script src="{{ asset('admin/dist/js/demo-theme.min.js') }}"></script>
    <div class="page">
        <!-- Sidebar -->
        @include('admin.layout.sidebar')
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    {{--  --}}
                </div>
            </div>

            <!-- Page body -->
            <div class="page-body">
                @yield('content')
            </div>

            @include('admin.layout.footer')
        </div>
    </div>

    @include('admin.layout.script');

</body>

</html>
