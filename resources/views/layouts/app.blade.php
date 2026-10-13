
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Task Manager')</title>

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            color: #222;
        }

        header {
            background: #172554;
            color: white;
            padding: 18px 6%;
        }

        header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        main {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px #0000000d;
        }

        .btn {
            display: inline-block;
            background: #1d4ed8;
            color: white;
            padding: 9px 13px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .danger { background: #dc2626; }
        .secondary { background: #64748b; }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 6px 0 15px;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
        }

        label { font-weight: bold; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        .success {
            background: #dcfce7;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .error { color: #dc2626; }
        .actions { display: flex; gap: 7px; flex-wrap: wrap; }
    </style>
</head>
<body>
    <header>
        <a href="{{ route('tasks.index') }}">Task Manager</a>
    </header>

    <main>
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="card">
                <strong>Please correct these errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
