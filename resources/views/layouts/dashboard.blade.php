<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
            position: fixed;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        /* Custom Pagination */
        .pagination {
            font-size: 0.9rem;
            margin: 0;
        }

        .pagination li {
            margin: 0 2px;
        }

        .pagination a,
        .pagination span {
            padding: 4px 12px;
            border-radius: 3px;
            border: 1px solid #dee2e6;
            min-width: 32px;
            text-align: center;
            display: inline-block;
        }

        .pagination a:hover {
            background-color: #f8f9fa;
        }

        .pagination .active {
            background-color: #007bff;
            border-color: #007bff;
            color: white !important;
        }

        .pagination .disabled {
            color: #6c757d;
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center text-white">CMS Barbershop</h4>
        <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('capsters.index') }}">💇‍♂️ Capster</a>
        <a href="{{ route('services.index') }}">Service</a>
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger w-100 text-start">🚪 Logout</button>
        </form>
        {{-- <a href="{{ route('services.index') }}">✂️ Service</a>
        <a href="{{ route('transactions.index') }}">💳 Transactions</a>
        <a href="{{ route('settings.index') }}">⚙️ Settings</a>
        <a href="{{ route('logout') }}" class="text-danger">🚪 Logout</a> --}}
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

</body>

</html>
