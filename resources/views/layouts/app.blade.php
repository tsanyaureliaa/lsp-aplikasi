<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-light sidebar py-4" style="min-height:100vh; border-right:1px solid #ccc;">
                <h5>Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link{{ request()->routeIs('arsip.index') ? ' active' : '' }}" href="{{ route('arsip.index') }}">&#9733; Arsip</a></li>
                    <li class="nav-item"><a class="nav-link{{ request()->routeIs('kategori.index') ? ' active' : '' }}" href="{{ route('kategori.index') }}">&#128193; Kategori Surat</a></li>
                    <li class="nav-item"><a class="nav-link{{ request()->routeIs('about') ? ' active' : '' }}" href="{{ route('about') }}">&#8505; About</a></li>
                </ul>
            </div>
            <!-- Main Content -->
            <div class="col-md-10 py-4">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
