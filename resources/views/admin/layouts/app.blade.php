<!DOCTYPE html>
<html lang="id">
@include('common.head')
<body class="abe-app">
    @include('common.sidebar')
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>
    <div class="abe-main">
        @include('common.header')
        <main class="abe-content">
            @yield('content')
        </main>
        @include('common.footer')
    </div>
    @include('common.logout-modal')
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    @yield('scripts')
</body>
</html>
