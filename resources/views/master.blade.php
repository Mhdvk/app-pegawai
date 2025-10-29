<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>
    @vite('resources/css/master.css')
</head>

<body>
    <header>
        <h1>@yield('page-title', 'App Pegawai')</h1>
        <nav class="navbar">
            <ul>
                <li><a href="{{ url('/employees') }}">Employees</a></li>
                <li><a href="{{ url('/departments') }}">Departments</a></li>
                <li><a href="{{ url('/attendance') }}">Attendance</a></li>
                <li><a href="{{ url('/positions') }}">Positions</a></li>
                <li><a href="{{ url('/salaries') }}">Salaries</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} App Pegawai</p>
    </footer>
</body>

</html>
