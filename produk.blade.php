<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>FutureShop | Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body {
  background-color: #050a18;
  color: #ffffff;
  font-family: 'Poppins', sans-serif;
}
#stars,#stars2,#stars3{position:fixed;top:0;left:0;width:100%;height:100%;z-index:-1;background:transparent;}
#stars{background:url('https://www.script-tutorials.com/demos/360/images/stars.png')repeat top center;animation:moveStars 200s linear infinite;}
#stars2{background:url('https://www.script-tutorials.com/demos/360/images/stars2.png')repeat top center;animation:moveStars 300s linear infinite;}
#stars3{background:url('https://www.script-tutorials.com/demos/360/images/stars3.png')repeat top center;animation:moveStars 400s linear infinite;}
@keyframes moveStars{from{background-position:0 0;}to{background-position:10000px 5000px;}}

.navbar{background:rgba(255,255,255,0.03);border-bottom:1px solid rgba(0,255,255,0.1);backdrop-filter:blur(8px);}
.logo{font-size:1.8rem;font-weight:700;color:#00ffff;text-shadow:0 0 25px #00ffff;}
.card{background:rgba(255,255,255,0.07);border:1px solid rgba(0,255,255,0.15);border-radius:15px;padding:15px;box-shadow:0 0 25px rgba(0,255,255,0.1);}
.card img{height:200px;object-fit:cover;border-radius:10px;}
h5{color:#5efcff;}
.btn-futuristic{background:#00ffff;color:#050a18;font-weight:600;border:none;border-radius:12px;box-shadow:0 0 25px rgba(0,255,255,0.4);}
.btn-futuristic:hover{background:#5efcff;}
@keyframes fadeInUp{0%{opacity:0;transform:translateY(40px);filter:blur(5px);}100%{opacity:1;transform:translateY(0);filter:blur(0);}}
.fade-in{animation:fadeInUp 1s ease forwards;}
</style>
</head>
<body>
<div id="stars"></div><div id="stars2"></div><div id="stars3"></div>

<nav class="navbar p-3">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="logo">FutureShop</div>
    <a href="{{ route('logout') }}" class="btn btn-futuristic fade-in">Logout</a>
  </div>
</nav>

<div class="container mt-5">
  <h2 class="text-center mb-4 fade-in" style="color:#00ffff;text-shadow:0 0 25px #00ffff;">Produk Futuristik</h2>
  <div class="row">
    @foreach($produk as $p)
    <div class="col-md-3 mb-4 fade-in">
      <div class="card text-center">
        <img src="{{ asset($p['foto']) }}" alt="{{ $p['nama'] }}">
        <h5 class="mt-2">{{ $p['nama'] }}</h5>
        <p class="text-info">{{ $p['harga'] }}</p>
        <a href="{{ route('produk.detail',$p['id']) }}" class="btn btn-futuristic w-100 fade-in">Lihat Detail</a>
      </div>
    </div>
    @endforeach
  </div>
</div>
</body>
</html>
