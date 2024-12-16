<?php

namespace App\Livewire;

use App\Models\ContentPage;
use Datlechin\FilamentMenuBuilder\Models\MenuItem;
use Livewire\Component;

class HomePage extends Component
{
    public $data;

    public function mount($url)  // Parameter URL untuk menangani URL dinamis
    {
        // Cek apakah ada MenuItem dengan url yang sesuai
        $menuItem = MenuItem::where('url', $url)->first();

        if ($menuItem) {
            // Jika ada MenuItem dengan URL yang sesuai, ambil slug dari MenuItem
            // dan cari ContentPage berdasarkan slug
            $this->data = ContentPage::where('slug', $menuItem->url)->firstOrFail();
        } else {
            // Jika tidak ada MenuItem dengan URL tersebut, Anda bisa menangani fallback di sini
            abort(404); // Menampilkan halaman 404 jika tidak ditemukan
        }
    }

    public function render()
    {
        return view('livewire.home-page', [
            'data' => $this->data
        ]);
    }
}
