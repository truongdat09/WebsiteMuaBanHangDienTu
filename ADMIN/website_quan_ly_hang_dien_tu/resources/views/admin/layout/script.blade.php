@stack('scripts')
<!-- Libs JS -->
<script src="{{ asset('admin/dist/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
<script src="{{ asset('admin/dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
<script src="{{ asset('admin/dist/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
<script src="{{ asset('admin/dist/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>
<!-- Tabler Core -->
<script src="{{ asset('admin/dist/js/tabler.min.js') }}" defer></script>
<script src="{{ asset('admin/dist/js/demo.min.js') }}" defer></script>

<script>
    $('form').parsley();
</script>

<script>
    toastr.options = {
        'progressBar': true,
        'timeOut': '1500'
    }
</script>

@if (Session::has('error'))
    <script>
        toastr.error('{{ session('error') }}');
    </script>
@endif

@if (Session::has('success'))
    <script>
        toastr.success('{{ session('success') }}');
    </script>
@endif

@if (Session::has('warning'))
    <script>
        toastr.warning('{{ session('warning') }}');
    </script>
@endif

@if (Session::has('info'))
    <script>
        toastr.info('{{ session('info') }}');
    </script>
@endif

{{-- datatable js --}}
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
