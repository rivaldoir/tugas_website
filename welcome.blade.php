<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>FutureShop | Selamat Datang</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
  margin: 0;
  height: 100vh;
  overflow: hidden;
  background: radial-gradient(circle at 50% 50%, #031036 0%, #020617 100%);
  color: #ffffff;
  font-family: 'Poppins', sans-serif;
}

/* Efek bintang */
#stars, #stars2, #stars3 {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -2;
}
#stars { background: url('https://www.script-tutorials.com/demos/360/images/stars.png') repeat; animation: moveStars 200s linear infinite; }
#stars2 { background: url('https://www.script-tutorials.com/demos/360/images/stars2.png') repeat; animation: moveStars 300s linear infinite; }
#stars3 { background: url('https://www.script-tutorials.com/demos/360/images/stars3.png') repeat; animation: moveStars 400s linear infinite; }

@keyframes moveStars {
  from { background-position: 0 0; }
  to { background-position: 10000px 5000px; }
}

/* Efek comet */
.comet {
  position: fixed;
  top: -10px;
  width: 2px;
  height: 80px;
  background: linear-gradient(180deg, rgba(255,255,255,0.9), rgba(255,255,255,0));
  opacity: 0.7;
  z-index: -1;
  transform: rotate(45deg);
  border-radius: 50%;
  animation: fall 2s linear infinite;
}
@keyframes fall {
  0% {
    transform: translateX(0) translateY(0) rotate(45deg);
    opacity: 1;
  }
  100% {
    transform: translateX(-100vw) translateY(100vh) rotate(45deg);
    opacity: 0;
  }
}

/* Konten utama */
.hero {
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  animation: fadeIn 1.2s ease forwards;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}
.hero h1 {
  font-size: 4rem;
  color: #00ffff;
  text-shadow: 0 0 25px rgba(0,255,255,0.6);
  letter-spacing: 2px;
  margin-bottom: 30px;
  animation: glow 2s ease-in-out infinite alternate;
}
@keyframes glow {
  from { text-shadow: 0 0 10px #00ffff, 0 0 20px #00ffff, 0 0 30px #0099ff; }
  to { text-shadow: 0 0 20px #00ffff, 0 0 40px #00ffff, 0 0 60px #0099ff; }
}
.hero p {
  font-size: 1.2rem;
  color: #a8d8ff;
  margin-bottom: 40px;
}
.btn-futuristic {
  background: #00ffff;
  color: #050a18;
  font-weight: 600;
  border: none;
  border-radius: 12px;
  padding: 12px 35px;
  font-size: 1.1rem;
  box-shadow: 0 0 25px rgba(0,255,255,0.4);
  transition: all 0.3s ease;
}
.btn-futuristic:hover {
  background: #5efcff;
  transform: translateY(-3px);
  box-shadow: 0 0 40px rgba(0,255,255,0.7);
}
</style>
</head>
<body>
<div id="stars"></div>
<div id="stars2"></div>
<div id="stars3"></div>

<div class="hero">
  <h1>FutureShop</h1>
  <p>Tempat Belanja Teknologi Masa Depan</p>
  <a href="{{ route('login') }}" class="btn-futuristic">Login Sekarang</a>
</div>

<!-- Script untuk comet -->
<script>
function createComet() {
  const comet = document.createElement('div');
  comet.classList.add('comet');
  document.body.appendChild(comet);

  // posisi acak
  comet.style.left = Math.random() * window.innerWidth + 'px';
  comet.style.top = -50 + 'px';

  // ukuran acak
  const size = Math.random() * 2 + 1;
  comet.style.width = size + 'px';
  comet.style.height = (size * 80) + 'px';
  comet.style.animationDuration = (Math.random() * 2 + 1.5) + 's';

  // hapus setelah animasi selesai
  setTimeout(() => comet.remove(), 3000);
}

// interval muncul comet
setInterval(createComet, 2000);
</script>
</body>
</html>
