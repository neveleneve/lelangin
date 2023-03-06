<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Livewire\LandingPageDua::class)->name('landing-page');

Route::get('lelang/{kode}-{id}', App\Http\Livewire\BidItemView::class)->name('bid-item-view');

// Route::get('pencarian', App\Http\Livewire\LandingPage::class)->name('pencarian');

Auth::routes([
  'verify' => true
]);

// Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['admin'])->group(function () {
  // 
});
Route::middleware(['pelelang'])->group(function () {
  // Route::get('lelang', App\Http\Livewire\LandingPage::class)->name('pelelang.lelang');

  // Route::get('barang', App\Http\Livewire\LandingPage::class)->name('pelelang.barang');
});
Route::middleware(['penawar'])->group(function () {
  // 
});
