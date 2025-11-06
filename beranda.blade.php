<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda | Sistem Penjualan Futuristik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: radial-gradient(circle at top, #0f2027, #203a43, #2c5364);
            color: white;
            font-family: 'Poppins', sans-serif;
        }
        h1 { text-shadow: 0 0 15px cyan; }
        .btn-glow {
            border: 1px solid cyan;
            color: cyan;
            transition: 0.3s;
        }
        .btn-glow:hover {
            background-color: cyan;
            color: black;
            box-shadow: 0 0 15px cyan;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand fw-bold text-cyan" href="{{ route('beranda') }}">Sistem Penjualan</a>
    <div class="d-flex">
      <a href="{{ route('login') }}" class="btn btn-glow">Login</a>
    </div>
  </div>
</nav>

<div class="container text-center mt-5">
    <h1 class="fw-bold">🌐 Selamat Datang di Sistem Penjualan Futuristik</h1>
    <p class="lead">Jelajahi produk masa depan dengan desain modern dan interaktif.</p>
    <img src="{{ asset('images/produk_laptop.jpg') }}" width="250" class="rounded shadow-lg mt-4">
</div>

</body>
</html>
