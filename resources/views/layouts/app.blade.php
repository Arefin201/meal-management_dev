<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Management System - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <!--Datatable -->
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.2.2/r-3.0.3/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.2.2/r-3.0.3/datatables.min.js"></script>

</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        @include('layouts.header')

        <!-- All Navigation Menu -->
        @include('layouts.navigation')

        <!-- Main Content -->
        
        <main class="container mx-auto px-4 py-6">
            <!-- Add success/error messages -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white shadow-inner mt-auto py-4">
            <div class="container mx-auto px-4">
                <p class="text-center text-gray-500 text-sm">© 2024 Meal Management System. All rights reserved.</p>
            </div>
        </footer>
    </div>
    <script src="{{ asset('assets/script.js') }}"></script>
    @stack('scripts')
</body>

</html>
