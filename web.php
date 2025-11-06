<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::view('/', 'welcome')->name('home');
Route::view('/login', 'login')->name('login');
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    if ($username === 'admin' && $password === '12345') {
        session(['login' => true]);
        return redirect()->route('produk.index');
    } else {
        return back()->with('error', '❌ Username atau password salah!');
    }
})->name('login.submit');

// LOGOUT
Route::get('/logout', function () {
    session()->flush();
    return redirect()->route('login');
})->name('logout');

// PRODUK
Route::get('/produk', function () {
    if (!session('login')) return redirect()->route('login');

    $produk = [
        ['id'=>1,'nama'=>'Laptop Razer Blade 15','harga'=>'Rp 36.000.000','foto'=>'images/produk_razer.jpg','deskripsi'=>'Laptop gaming futuristik dengan GPU RTX dan desain bercahaya neon.'],
        ['id'=>2,'nama'=>'DJI Mini 4 Pro','harga'=>'Rp 19.500.000','foto'=>'images/produk_drone.jpg','deskripsi'=>'Drone ringan dengan kamera 4K HDR dan stabilitas luar biasa.'],
        ['id'=>3,'nama'=>'Apple Vision Pro','harga'=>'Rp 59.000.000','foto'=>'images/produk_vr.jpg','deskripsi'=>'Headset realitas campuran tercanggih dengan visual imersif.'],
        ['id'=>4,'nama'=>'Sony WH-1000XM5','harga'=>'Rp 6.000.000','foto'=>'images/produk_headphone.jpg','deskripsi'=>'Headphone wireless dengan noise cancelling dan kualitas suara jernih.'],
        ['id'=>5,'nama'=>'Samsung Galaxy Z Fold','harga'=>'Rp 25.000.000','foto'=>'images/produk_hp.jpg','deskripsi'=>'Smartphone lipat futuristik dengan layar AMOLED fleksibel.'],
        ['id'=>6,'nama'=>'Nikon Z Futurist','harga'=>'Rp 21.000.000','foto'=>'images/produk_kamera.jpg','deskripsi'=>'Kamera mirrorless profesional dengan perekaman 8K.'],
        ['id'=>7,'nama'=>'Apple Watch Ultra 2','harga'=>'Rp 13.500.000','foto'=>'images/produk_watch.jpg','deskripsi'=>'Jam tangan pintar dengan fitur canggih dan desain titanium.'],
        ['id'=>8,'nama'=>'Laptop Neon X','harga'=>'Rp 28.000.000','foto'=>'images/produk_laptop.jpg','deskripsi'=>'Laptop RGB performa tinggi dengan layar 4K 240Hz.']
    ];
    return view('produk', compact('produk'));
})->name('produk.index');

// DETAIL PRODUK
Route::get('/produk/{id}', function ($id) {
    if (!session('login')) return redirect()->route('login');
    $produk = [
        1 => ['id'=>1,'nama'=>'Laptop Razer Blade 15','harga'=>'Rp 36.000.000','foto'=>'images/produk_razer.jpg','deskripsi'=>'Laptop Razer Blade 15 menghadirkan kekuatan dan keindahan dengan prosesor Intel generasi terbaru dan GPU RTX.'],
        2 => ['id'=>2,'nama'=>'DJI Mini 4 Pro','harga'=>'Rp 19.500.000','foto'=>'images/produk_drone.jpg','deskripsi'=>'Drone ringan dengan sensor 48MP, perekaman 4K, dan sistem penghindaran rintangan.'],
        3 => ['id'=>3,'nama'=>'Apple Vision Pro','harga'=>'Rp 59.000.000','foto'=>'images/produk_vr.jpg','deskripsi'=>'Headset mixed reality Apple dengan chip M2 dan tampilan 3D imersif.'],
        4 => ['id'=>4,'nama'=>'Sony WH-1000XM5','harga'=>'Rp 6.000.000','foto'=>'images/produk_headphone.jpg','deskripsi'=>'Headphone premium Sony dengan noise cancelling adaptif dan mikrofon ganda.'],
        5 => ['id'=>5,'nama'=>'Samsung Galaxy Z Fold','harga'=>'Rp 25.000.000','foto'=>'images/produk_hp.jpg','deskripsi'=>'Smartphone lipat AMOLED dengan performa tinggi Snapdragon 8 Gen 2.'],
        6 => ['id'=>6,'nama'=>'Nikon Z Futurist','harga'=>'Rp 21.000.000','foto'=>'images/produk_kamera.jpg','deskripsi'=>'Kamera mirrorless profesional dengan sensor full-frame dan autofokus cepat.'],
        7 => ['id'=>7,'nama'=>'Apple Watch Ultra 2','harga'=>'Rp 13.500.000','foto'=>'images/produk_watch.jpg','deskripsi'=>'Smartwatch tangguh dengan layar terang, sensor canggih, dan daya tahan tinggi.'],
        8 => ['id'=>8,'nama'=>'Laptop Neon X','harga'=>'Rp 28.000.000','foto'=>'images/produk_laptop.jpg','deskripsi'=>'Laptop performa tinggi dengan desain RGB dan layar 4K 240Hz.']
    ];
    $data = $produk[$id];
    return view('detail', ['produk' => $data]);
})->name('produk.detail');

// CHECKOUT
Route::get('/checkout/{id}', function ($id) {
    if (!session('login')) return redirect()->route('login');
    $produk = [
        'id' => $id,
        'nama' => 'Produk Futuristik #' . $id,
        'harga' => 'Rp ' . number_format(15000000 + ($id * 500000), 0, ',', '.')
    ];
    return view('checkout', compact('produk'));
})->name('checkout');

// KONFIRMASI CHECKOUT
Route::post('/checkout/konfirmasi', function (Request $request) {
    return redirect()->route('produk.index')->with('success', '✅ Pesanan kamu berhasil dikonfirmasi!');
})->name('checkout.konfirmasi');
