<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>FutureShop | Checkout</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{background:#050a18;color:#fff;font-family:'Poppins',sans-serif;}
#stars,#stars2,#stars3{position:fixed;top:0;left:0;width:100%;height:100%;z-index:-1;}
#stars{background:url('https://www.script-tutorials.com/demos/360/images/stars.png') repeat;animation:move 200s linear infinite;}
#stars2{background:url('https://www.script-tutorials.com/demos/360/images/stars2.png') repeat;animation:move 300s linear infinite;}
#stars3{background:url('https://www.script-tutorials.com/demos/360/images/stars3.png') repeat;animation:move 400s linear infinite;}
@keyframes move{from{background-position:0 0;}to{background-position:10000px 5000px;}}
.card{background:rgba(255,255,255,0.08);border:1px solid rgba(0,255,255,0.2);border-radius:20px;box-shadow:0 0 25px rgba(0,255,255,0.15);padding:35px;}
.btn-futuristic{background:#00ffff;color:#050a18;font-weight:600;border:none;border-radius:12px;box-shadow:0 0 25px rgba(0,255,255,0.4);transition:.3s;}
.btn-futuristic:hover{background:#5efcff;transform:translateY(-3px);}
.logo{color:#00ffff;font-weight:700;font-size:1.8rem;}
.navbar{background:rgba(255,255,255,0.03);border-bottom:1px solid rgba(0,255,255,0.1);backdrop-filter:blur(8px);}
label{font-weight:500;color:#00ffff;}
.form-control,select,textarea{background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(0,255,255,0.3);border-radius:10px;}
.form-control:focus{background:rgba(0,0,0,0.4);box-shadow:0 0 15px rgba(0,255,255,0.3);border-color:#00ffff;}
#popup{display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);backdrop-filter:blur(5px);justify-content:center;align-items:center;z-index:999;overflow:hidden;}
.popup-content{position:relative;background:rgba(0,255,255,0.08);border:1px solid rgba(0,255,255,0.5);box-shadow:0 0 40px rgba(0,255,255,0.6);border-radius:20px;padding:40px 60px;text-align:center;color:#00ffff;font-weight:600;font-size:1.3rem;animation:fadeIn .5s ease,pulseGlow 2s infinite;}
@keyframes fadeIn{from{opacity:0;transform:scale(.9);}to{opacity:1;transform:scale(1);}}
@keyframes pulseGlow{0%{box-shadow:0 0 30px rgba(0,255,255,0.4);}50%{box-shadow:0 0 60px rgba(0,255,255,0.9);}100%{box-shadow:0 0 30px rgba(0,255,255,0.4);}}
.star{position:absolute;border-radius:50%;opacity:.9;animation:fall 2.5s linear forwards;}
@keyframes fall{0%{transform:translateY(0)scale(1);opacity:1;}100%{transform:translateY(250px)translateX(100px)scale(.2);opacity:0;}}
</style>
</head>
<body>
<div id="stars"></div><div id="stars2"></div><div id="stars3"></div>
<nav class="navbar p-3">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="logo">FutureShop</div>
    <a href="{{ route('produk.index') }}" class="btn btn-futuristic">Kembali</a>
  </div>
</nav>
<div class="container mt-5 mb-5">
  <div class="card">
    <h3 class="text-center mb-4" style="color:#00ffff;">Checkout Pembelian</h3>
    <form id="checkoutForm">
      <div class="mb-3"><label>Nama Lengkap</label><input type="text" class="form-control" required></div>
      <div class="mb-3"><label>Alamat Pengiriman</label><textarea class="form-control" rows="3" required></textarea></div>
      <div class="mb-3"><label>Metode Pembayaran</label>
        <select class="form-control" required>
          <option value="">-- Pilih Metode Pembayaran --</option>
          <option>Transfer Bank</option><option>QRIS</option><option>Kartu Kredit</option>
        </select>
      </div>
      <div class="text-center mt-4"><button class="btn btn-futuristic px-4 py-2">Konfirmasi Pembelian</button></div>
    </form>
  </div>
</div>
<div id="popup"><div class="popup-content" id="popupText">Processing...</div></div>

<!-- Audio dari CDN (langsung bisa jalan) -->
<audio id="successSound" preload="auto">
  <source src="https://cdn.pixabay.com/audio/2022/03/15/audio_68f2f7b7a8.mp3" type="audio/mpeg">
</audio>

<script>
const form=document.getElementById('checkoutForm');
const popup=document.getElementById('popup');
const popupText=document.getElementById('popupText');
const sound=document.getElementById('successSound');

form.addEventListener('submit',e=>{
  e.preventDefault();

  // pastikan audio dimainkan setelah klik user
  sound.currentTime=0;
  sound.play().catch(()=>console.warn('Sound blocked once. Try again.'));

  popup.style.display='flex';
  popupText.textContent='Processing...';

  setTimeout(()=>popupText.textContent='Finalizing Payment...',1000);
  setTimeout(()=>popupText.textContent='Success! Terima kasih telah berbelanja di FutureShop.',2200);

  for(let i=0;i<35;i++){
    const s=document.createElement('div');s.classList.add('star');
    const hue=180+Math.random()*160;
    s.style.background=`hsl(${hue},100%,70%)`;
    s.style.boxShadow=`0 0 10px hsl(${hue},100%,70%),0 0 25px hsl(${hue},100%,70%)`;
    s.style.width=s.style.height=Math.random()*5+2+'px';
    s.style.left=Math.random()*window.innerWidth+'px';
    s.style.top=Math.random()*200+'px';
    s.style.animationDuration=(Math.random()*2+1.5)+'s';
    s.style.animationDelay=Math.random()+'s';
    popup.appendChild(s);setTimeout(()=>s.remove(),3000);
  }

  setTimeout(()=>{
    popup.style.display='none';
    window.location.href="{{ route('produk.index') }}";
  },4200);
});
</script>
</body>
</html>
