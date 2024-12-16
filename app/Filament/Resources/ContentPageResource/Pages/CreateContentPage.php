<?php

namespace App\Filament\Resources\ContentPageResource\Pages;

use App\Filament\Resources\ContentPageResource;
use Datlechin\FilamentMenuBuilder\Models\MenuItem;
use Filament\Resources\Pages\CreateRecord;

class CreateContentPage extends CreateRecord
{
    protected static string $resource = ContentPageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Ambil menu yang sudah ada (misalnya menu default dengan id 1)
        $defaultMenu = MenuItem::find(1); // Pastikan menu dengan id 1 ada di tabel menus

        if (!$defaultMenu) {
            // Jika menu tidak ada, buat menu default
            $defaultMenu = MenuItem::create([
                'title' => 'Default Menu',  // Sesuaikan nama menu
            ]);
        }

        // Membuat MenuItem baru dengan menu_id yang valid
        $menuItem = MenuItem::create([
            'title' => $data['title'],
            'url' => $this->generateUrl($data['title']), // Generate URL atau gunakan sesuai kebutuhan
            'menu_id' => $defaultMenu->id,  // Pastikan menu_id mengacu ke menu yang valid
        ]);

        // Menghubungkan ContentPage dengan MenuItem yang baru dibuat
        $data['menu_id'] = $menuItem->id;

        return $data;
    }

    // Fungsi untuk menghasilkan URL untuk menu (tanpa slug, hanya URL)
    protected function generateUrl(string $title): string
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title))); // Bisa disesuaikan
    }
}
