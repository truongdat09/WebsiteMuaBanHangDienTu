@include('admin.layout.head')

<body>
    <script src="{{ asset('admin/dist/js/demo-theme.min.js') }}"></script>
    <div class="page">
        <div class="page-wrapper">
            <div class="page-body">
                @yield('content')
            </div>
        </div>
    </div>

    @include('admin.layout.script');

</body>

</html>
