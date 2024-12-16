<?php

namespace App\Livewire\Layouts;

use Datlechin\FilamentMenuBuilder\Models\Menu;

// use App\Models\Menu;
use Livewire\Component;

class MenuNavigation extends Component
{
    public $menu;

    public function mount()
    {
        $this->menu = Menu::location('Header');
    }

    public function render()
    {

        return view('livewire.layouts.menu-navigation');
    }
}
