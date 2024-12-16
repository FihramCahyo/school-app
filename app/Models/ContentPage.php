<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    protected $casts = [
        'content' => 'json',
    ];

    
    // public function menu()
    // {
    //     return $this->belongsTo(\Datlechin\FilamentMenuBuilder\Models\MenuItem::class, 'menu_id');
    // }
}
