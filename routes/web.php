<?php

use App\Models\Offer;
use App\Models\Room;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

// Sitemap XML para SEO
Route::get('sitemap.xml', function () {
    $base = url('/');
    $urls = [];

    // Páginas estáticas
    $static = [
        ['url' => $base, 'lastmod' => now()->format('Y-m-d'), 'priority' => '1.0', 'changefreq' => 'weekly'],
        ['url' => route('offers'), 'lastmod' => now()->format('Y-m-d'), 'priority' => '0.9', 'changefreq' => 'weekly'],
        ['url' => route('privacy'), 'lastmod' => now()->format('Y-m-d'), 'priority' => '0.3', 'changefreq' => 'monthly'],
        ['url' => route('terms'), 'lastmod' => now()->format('Y-m-d'), 'priority' => '0.3', 'changefreq' => 'monthly'],
    ];
    foreach ($static as $s) {
        $urls[] = $s;
    }

    // Habitaciones activas
    $rooms = Room::where('active', true)->orderBy('order')->orderBy('id')->get();
    foreach ($rooms as $room) {
        $urls[] = [
            'url' => route('rooms.show', $room),
            'lastmod' => $room->updated_at->format('Y-m-d'),
            'priority' => '0.8',
            'changefreq' => 'monthly',
        ];
    }

    // Ofertas activas
    $offers = Offer::where('active', true)->orderBy('order')->orderBy('id')->get();
    foreach ($offers as $offer) {
        $urls[] = [
            'url' => route('offers.show', $offer),
            'lastmod' => $offer->updated_at->format('Y-m-d'),
            'priority' => '0.8',
            'changefreq' => 'weekly',
        ];
    }

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    foreach ($urls as $u) {
        $xml .= '  <url>' . "\n";
        $xml .= '    <loc>' . e($u['url']) . '</loc>' . "\n";
        $xml .= '    <lastmod>' . $u['lastmod'] . '</lastmod>' . "\n";
        $xml .= '    <changefreq>' . $u['changefreq'] . '</changefreq>' . "\n";
        $xml .= '    <priority>' . $u['priority'] . '</priority>' . "\n";
        $xml .= '  </url>' . "\n";
    }
    $xml .= '</urlset>';

    return response($xml, 200, [
        'Content-Type' => 'application/xml',
        'Cache-Control' => 'public, max-age=3600',
    ]);
})->name('sitemap');

// robots.txt (para incluir la URL absoluta del sitemap)
Route::get('robots.txt', function () {
    $sitemap = url('/sitemap.xml');
    $content = "User-agent: *\n";
    $content .= "Disallow: /admin\n";
    $content .= "Disallow: /_boost\n";
    $content .= "Allow: /\n\n";
    $content .= "Sitemap: {$sitemap}\n";

    return response($content, 200, [
        'Content-Type' => 'text/plain',
        'Cache-Control' => 'public, max-age=86400',
    ]);
});

Route::view('politica-de-privacidad', 'privacy')->name('privacy');
Route::view('terminos-y-condiciones', 'terms')->name('terms');

Route::get('ofertas', function () {
    return view('offers');
})->name('offers');

Route::get('ofertas/{offer}', [App\Http\Controllers\OfferController::class, 'show'])->name('offers.show');

Route::get('habitaciones/{room}', [App\Http\Controllers\RoomController::class, 'show'])->name('rooms.show');

// Ruta dummy para evitar errores de extensiones del navegador (MCP browser logger)
Route::post('_boost/browser-logs', function () {
    return response()->json(['status' => 'ok'], 200);
});

// Rutas de autenticación admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    // Rutas protegidas (requieren autenticación)
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Rutas de habitaciones: create/edit fijas para que {room} no capture 'create'
        Route::get('rooms/create', [App\Http\Controllers\Admin\RoomController::class, 'create'])->name('rooms.create');
        Route::get('rooms/{room}/edit', [App\Http\Controllers\Admin\RoomController::class, 'edit'])->name('rooms.edit');
        Route::resource('rooms', App\Http\Controllers\Admin\RoomController::class)->only(['index', 'store', 'update', 'destroy'])->names([
            'index' => 'rooms.index',
            'store' => 'rooms.store',
            'update' => 'rooms.update',
            'destroy' => 'rooms.destroy',
        ]);

        Route::get('offers/create', [App\Http\Controllers\Admin\OfferController::class, 'create'])->name('offers.create');
        Route::get('offers/{offer}/edit', [App\Http\Controllers\Admin\OfferController::class, 'edit'])->name('offers.edit');
        Route::resource('offers', App\Http\Controllers\Admin\OfferController::class)->only(['index', 'store', 'update', 'destroy'])->names([
            'index' => 'offers.index',
            'store' => 'offers.store',
            'update' => 'offers.update',
            'destroy' => 'offers.destroy',
        ]);

        Route::get('reviews/create', [App\Http\Controllers\Admin\ReviewController::class, 'create'])->name('reviews.create');
        Route::get('reviews/{review}/edit', [App\Http\Controllers\Admin\ReviewController::class, 'edit'])->name('reviews.edit');
        Route::resource('reviews', App\Http\Controllers\Admin\ReviewController::class)->only(['index', 'store', 'update', 'destroy'])->names([
            'index' => 'reviews.index',
            'store' => 'reviews.store',
            'update' => 'reviews.update',
            'destroy' => 'reviews.destroy',
        ]);
    });
});

// Cambiar texto de sección de restaurante y bar 
// Agregar pdf de carta de restaurante y bar
// Agregar URLs de Booking.com y AirBnb