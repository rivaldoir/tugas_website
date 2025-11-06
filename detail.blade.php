<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>FutureShop | Detail Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
  background-color: #050a18;
  color: #ffffff;
  font-family: 'Poppins', sans-serif;
  line-height: 1.8;
}

/* Latar belakang bintang */
#stars, #stars2, #stars3 {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  z-index: -1;
  background: transparent;
}
#stars { background: url('https://www.script-tutorials.com/demos/360/images/stars.png') repeat top center; animation: moveStars 200s linear infinite; }
#stars2 { background: url('https://www.script-tutorials.com/demos/360/images/stars2.png') repeat top center; animation: moveStars 300s linear infinite; }
#stars3 { background: url('https://www.script-tutorials.com/demos/360/images/stars3.png') repeat top center; animation: moveStars 400s linear infinite; }
@keyframes moveStars { from { background-position: 0 0; } to { background-position: 10000px 5000px; } }

/* Kartu detail */
.card {
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(0,255,255,0.2);
  border-radius: 20px;
  box-shadow: 0 0 25px rgba(0,255,255,0.15);
  padding: 35px;
  color: #ffffff;
}

/* Teks */
h3, h5, p, strong {
  color: #ffffff !important;
}
h3 {
  color: #00ffff !important;
  font-weight: 700;
}
h5 {
  color: #5efcff !important;
  margin-bottom: 15px;
}
p {
  color: #ffffff !important;
  text-align: justify;
  font-size: 15.5px;
}

/* Tombol */
.btn-futuristic {
  background: #00ffff;
  color: #050a18;
  font-weight: 600;
  border: none;
  border-radius: 12px;
  box-shadow: 0 0 25px rgba(0,255,255,0.4);
}
.btn-futuristic:hover {
  background: #5efcff;
  transform: translateY(-3px);
}

/* Navbar */
.navbar {
  background: rgba(255,255,255,0.03);
  border-bottom: 1px solid rgba(0,255,255,0.1);
  backdrop-filter: blur(8px);
}
.logo {
  color: #00ffff;
  font-weight: 700;
  font-size: 1.8rem;
}

/* Animasi */
@keyframes fadeInUp {
  0% { opacity: 0; transform: translateY(40px); filter: blur(5px); }
  100% { opacity: 1; transform: translateY(0); filter: blur(0); }
}
.fade-in { animation: fadeInUp 1s ease forwards; }
</style>
</head>
<body>
<div id="stars"></div><div id="stars2"></div><div id="stars3"></div>

<nav class="navbar p-3">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="logo">FutureShop</div>
    <a href="{{ route('produk.index') }}" class="btn btn-futuristic fade-in">Kembali</a>
  </div>
</nav>

<div class="container mt-5 mb-5">
  <div class="card fade-in">
    <img src="{{ asset($produk['foto']) }}" alt="{{ $produk['nama'] }}" class="img-fluid mb-4" style="border-radius:15px;box-shadow:0 0 25px rgba(0,255,255,0.2);">
    <h3>{{ $produk['nama'] }}</h3>
    <h5>{{ $produk['harga'] }}</h5>

    <p>{{ $produk['deskripsi'] }}</p>

    <p>
      Produk {{ $produk['nama'] }} dirancang dengan material premium dan teknologi masa depan.  
      Desain rampingnya memadukan estetika modern dan fungsionalitas tinggi, menjadikannya pilihan ideal 
      bagi pengguna yang mengutamakan performa dan gaya. Sistem internal canggih memberikan efisiensi optimal, 
      sementara lapisan luar yang halus memperlihatkan keindahan futuristik. Cocok untuk kebutuhan profesional, 
      gaming, maupun gaya hidup digital masa kini.
    </p>

    <div class="text-center mt-4">
      <a href="{{ route('checkout', ['id' => $produk['id'] ?? 1]) }}" class="btn btn-futuristic px-4 py-2 fade-in">Beli Sekarang</a>
    </div>
  </div>
</div>
</body>
</html>
