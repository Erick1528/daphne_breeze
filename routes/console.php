<?php

use App\Models\Offer;
use App\Models\Room;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('rooms:generate-og-images', function () {
    $rooms = Room::whereNotNull('image')->where('image', '!=', '')->get();
    $generated = 0;
    $skipped = 0;

    Storage::disk('public')->makeDirectory('rooms/og');

    foreach ($rooms as $room) {
        $relative = str_replace('storage/', '', $room->image);
        if (! Storage::disk('public')->exists($relative)) {
            $this->warn("Imagen no encontrada: {$room->title} ({$relative})");
            $skipped++;
            continue;
        }

        $baseName = pathinfo($relative, PATHINFO_FILENAME);
        $folder = pathinfo($relative, PATHINFO_DIRNAME);
        $ogRelative = $folder . '/og/' . $baseName . '.jpg';

        if (Storage::disk('public')->exists($ogRelative)) {
            $this->line("Ya existe OG: {$room->title}");
            $skipped++;
            continue;
        }

        $fullPath = Storage::disk('public')->path($relative);
        $mime = mime_content_type($fullPath);
        if ($mime === 'image/webp') {
            $source = imagecreatefromwebp($fullPath);
        } elseif ($mime === 'image/jpeg' || $mime === 'image/jpg') {
            $source = imagecreatefromjpeg($fullPath);
        } elseif ($mime === 'image/png') {
            $source = imagecreatefrompng($fullPath);
        } else {
            $this->warn("Formato no soportado para OG: {$room->title} ({$mime})");
            $skipped++;
            continue;
        }

        if ($source === false) {
            $this->warn("No se pudo leer la imagen: {$room->title}");
            $skipped++;
            continue;
        }

        $tempJpg = tempnam(sys_get_temp_dir(), 'og_');
        imagejpeg($source, $tempJpg, 88);
        Storage::disk('public')->put($ogRelative, file_get_contents($tempJpg));
        imagedestroy($source);
        unlink($tempJpg);

        $this->info("Generado OG: {$room->title}");
        $generated++;
    }

    $this->newLine();
    $this->info("Listo. Generados: {$generated}, omitidos: {$skipped}.");
})->purpose('Genera imágenes JPG en rooms/og para Open Graph de habitaciones existentes');

Artisan::command('offers:generate-og-images', function () {
    $offers = Offer::whereNotNull('image')->where('image', '!=', '')->get();
    $generated = 0;
    $skipped = 0;

    Storage::disk('public')->makeDirectory('offers/og');

    foreach ($offers as $offer) {
        $relative = str_replace('storage/', '', $offer->image);
        if (! Storage::disk('public')->exists($relative)) {
            $this->warn("Imagen no encontrada: {$offer->title} ({$relative})");
            $skipped++;
            continue;
        }

        $baseName = pathinfo($relative, PATHINFO_FILENAME);
        $folder = pathinfo($relative, PATHINFO_DIRNAME);
        $ogRelative = $folder . '/og/' . $baseName . '.jpg';

        if (Storage::disk('public')->exists($ogRelative)) {
            $this->line("Ya existe OG: {$offer->title}");
            $skipped++;
            continue;
        }

        $fullPath = Storage::disk('public')->path($relative);
        $mime = mime_content_type($fullPath);
        if ($mime === 'image/webp') {
            $source = imagecreatefromwebp($fullPath);
        } elseif ($mime === 'image/jpeg' || $mime === 'image/jpg') {
            $source = imagecreatefromjpeg($fullPath);
        } elseif ($mime === 'image/png') {
            $source = imagecreatefrompng($fullPath);
        } else {
            $this->warn("Formato no soportado para OG: {$offer->title} ({$mime})");
            $skipped++;
            continue;
        }

        if ($source === false) {
            $this->warn("No se pudo leer la imagen: {$offer->title}");
            $skipped++;
            continue;
        }

        $tempJpg = tempnam(sys_get_temp_dir(), 'og_');
        imagejpeg($source, $tempJpg, 88);
        Storage::disk('public')->put($ogRelative, file_get_contents($tempJpg));
        imagedestroy($source);
        unlink($tempJpg);

        $this->info("Generado OG: {$offer->title}");
        $generated++;
    }

    $this->newLine();
    $this->info("Listo. Generados: {$generated}, omitidos: {$skipped}.");
})->purpose('Genera imágenes JPG en offers/og para Open Graph de ofertas existentes');
