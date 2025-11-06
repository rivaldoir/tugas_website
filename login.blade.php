<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>FutureShop | Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    
    
body {
  background-color: #050a18;
  color: #ffffff;
  font-family: 'Poppins', sans-serif;
  overflow: hidden;
  height: 100vh;
}

/* LATAR BINTANG */
#stars, #stars2, #stars3 {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  display: block;
  z-index: -1;
}
#stars { background: url('https://www.script-tutorials.com/demos/360/images/stars.png') repeat top center; animation: moveStars 200s linear infinite; }
#stars2 { background: url('https://www.script-tutorials.com/demos/360/images/stars2.png') repeat top center; animation: moveStars 300s linear infinite; }
#stars3 { background: url('https://www.script-tutorials.com/demos/360/images/stars3.png') repeat top center; animation: moveStars 400s linear infinite; }
@keyframes moveStars { from{background-position:0 0;} to{background-position:10000px 5000px;} }

/* CARD LOGIN */
.card {
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(0,255,255,0.2);
  border-radius: 20px;
  box-shadow: 0 0 25px rgba(0,255,255,0.15);
  padding: 35px;
  color: #ffffff;
}
h2 {
  text-align: center;
  color: #00ffff;
  text-shadow: 0 0 25px #00ffff;
  margin-bottom: 25px;
  font-weight: 700;
}
label { color: #e8faff; font-weight: 600; }
.form-control {
  background-color: rgba(255,255,255,0.07);
  border: 1px solid rgba(0,255,255,0.25);
  color: #ffffff;
  border-radius: 10px;
}
.form-control::placeholder { color: #b6faff; }
.form-control:focus {
  background-color: rgba(255,255,255,0.1);
  border-color: #00ffff;
  box-shadow: 0 0 20px rgba(0,255,255,0.3);
}
.btn-futuristic {
  background: #00ffff;
  color: #050a18;
  font-weight: 600;
  border: none;
  border-radius: 12px;
  box-shadow: 0 0 25px rgba(0,255,255,0.4);
}
.btn-futuristic:hover { background: #5efcff; transform: translateY(-3px); }
.text-danger { color: #ff5e5e !important; text-align: center; }

/* ANIMASI */
@keyframes fadeInUp {
  0% { opacity: 0; transform: translateY(40px); filter: blur(5px); }
  100% { opacity: 1; transform: translateY(0); filter: blur(0); }
}
.fade-in { animation: fadeInUp 1s ease forwards; }
</style>
</head>
<body>
<div id="stars"></div><div id="stars2"></div><div id="stars3"></div>

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
  <div class="card col-md-5 fade-in">
    <h2 class="fade-in">FutureShop Login</h2>
    <form method="POST" action="{{ route('login.submit') }}">
      @csrf
      <div class="mb-3"><label>Username</label><input type="text" name="username" class="form-control" placeholder="Masukkan username..." required></div>
      <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" placeholder="Masukkan password..." required></div>
      <button type="submit" class="btn btn-futuristic w-100 mt-3 fade-in">Masuk</button>
    </form>
    @if(session('error'))
    <p class="text-danger mt-3 fade-in">{{ session('error') }}</p>
    @endif
  </div>
</div>
</body>
</html>
