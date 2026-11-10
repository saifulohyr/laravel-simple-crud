<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Simple CRUD')</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #f6f6f4;
            color: #1c1917;
            line-height: 1.5;
            font-size: 14px;
        }
        a { color: #1d4ed8; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .topbar {
            background: #ffffff;
            border-bottom: 1px solid #e7e5e4;
        }
        .topbar-inner {
            max-width: 960px;
            margin: 0 auto;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }
        .brand {
            font-weight: 700;
            color: #1c1917;
            font-size: 15px;
        }
        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            color: #57534e;
        }
        .container {
            max-width: 960px;
            margin: 24px auto;
            padding: 0 16px;
        }
        .auth-wrap {
            max-width: 400px;
            margin: 48px auto;
            padding: 0 16px;
        }
        .card {
            background: #ffffff;
            border: 1px solid #e7e5e4;
            border-radius: 6px;
            padding: 20px;
        }
        .header-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
        }
        h1 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
        }
        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 10px 12px;
            border-radius: 4px;
            margin-bottom: 16px;
            font-size: 13px;
        }
        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 10px 12px;
            border-radius: 4px;
            margin-bottom: 16px;
            font-size: 13px;
        }
        .field { margin-bottom: 14px; }
        label {
            display: block;
            font-weight: 500;
            font-size: 13px;
            margin-bottom: 4px;
            color: #44403c;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #d6d3d1;
            border-radius: 4px;
            font: inherit;
            background: #ffffff;
        }
        input:focus, textarea:focus {
            outline: 2px solid #1c1917;
            outline-offset: -1px;
        }
        .error-text {
            color: #b91c1c;
            font-size: 12px;
            margin-top: 4px;
        }
        .btn {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 4px;
            border: 1px solid transparent;
            font: inherit;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover { text-decoration: none; }
        .btn-primary {
            background: #1c1917;
            color: #ffffff;
        }
        .btn-primary:hover { background: #292524; }
        .btn-secondary {
            background: #ffffff;
            color: #1c1917;
            border-color: #d6d3d1;
        }
        .btn-secondary:hover { background: #f5f5f4; }
        .btn-danger {
            background: #ffffff;
            color: #b91c1c;
            border-color: #fecaca;
        }
        .btn-danger:hover { background: #fef2f2; }
        .btn-sm { padding: 4px 10px; font-size: 12px; }
        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
        }
        th, td {
            text-align: left;
            padding: 10px 12px;
            border-bottom: 1px solid #e7e5e4;
            vertical-align: middle;
        }
        th {
            background: #fafaf9;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            color: #57534e;
        }
        tr:last-child td { border-bottom: none; }
        .num { text-align: right; font-variant-numeric: tabular-nums; }
        .actions { display: flex; gap: 6px; align-items: center; }
        .search-form {
            display: flex;
            gap: 8px;
            margin-bottom: 14px;
        }
        .search-form input { max-width: 280px; }
        .pagination {
            display: flex;
            gap: 6px;
            align-items: center;
            justify-content: flex-end;
            margin-top: 14px;
            font-size: 13px;
        }
        .pagination a, .pagination span {
            padding: 5px 10px;
            border: 1px solid #d6d3d1;
            border-radius: 4px;
            background: #ffffff;
            color: #1c1917;
        }
        .pagination .active {
            background: #1c1917;
            color: #ffffff;
            border-color: #1c1917;
        }
        .pagination .disabled {
            color: #a8a29e;
            background: #fafaf9;
        }
        .muted { color: #78716c; font-size: 13px; }
    </style>
</head>
<body>
    @auth
        <header class="topbar">
            <div class="topbar-inner">
                <a href="{{ route('products.index') }}" class="brand">Simple CRUD</a>
                <div class="nav-right">
                    <span>{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" class="btn btn-secondary btn-sm">Logout</button>
                    </form>
                </div>
            </div>
        </header>
    @endauth

    @yield('content')
</body>
</html>
