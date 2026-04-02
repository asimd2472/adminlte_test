<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}} 

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <div class="app-wrapper">

        {{-- Navbar --}}
        @include('admin.partials.navbar')

        {{-- Sidebar --}}
        @include('admin.partials.sidebar')

        {{-- Main Content --}}
        <main class="app-main">
            @yield('content')
        </main>

        <footer class="app-footer">
            <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline">Anything you want</div>
            <!--end::To the end-->
            <!--begin::Copyright-->
            <strong>
            Copyright &copy; 2026&nbsp;
            <a href="#" class="text-decoration-none">Asd</a>.
            </strong>
            All rights reserved.
            <!--end::Copyright-->
        </footer>



    </div>

    @stack('scripts')

    <script>
        var base_url = '{{url('/')}}';
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @if(session('success'))
        <script type="module">
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if(session('error'))
        <script type="module">
            toastr.error("{{ session('error') }}");
        </script>
    @endif

    @if($errors->any())
       <script type="module">
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        </script>
    @endif

</body>
</html>