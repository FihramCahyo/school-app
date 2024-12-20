<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Datlechin\FilamentMenuBuilder\Resources\MenuResource as BaseMenuResource;

class MenuResource extends BaseMenuResource
{
    // protected static ?string $model = Menu::class;

    protected static ?string $navigationGroup = 'Manajemen Konten';

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             //
    //         ]);
    // }

    // public static function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //             //
    //         ])
    //         ->filters([
    //             //
    //         ])
    //         ->actions([
    //             Tables\Actions\EditAction::make(),
    //         ])
    //         ->bulkActions([
    //             Tables\Actions\BulkActionGroup::make([
    //                 Tables\Actions\DeleteBulkAction::make(),
    //             ]),
    //         ]);
    // }

    // public static function getRelations(): array
    // {
    //     return [
    //         //
    //     ];
    // }

    // public static function getPages(): array
    // {
    //     return [
    //         'index' => Pages\ListMenus::route('/'),
    //         'create' => Pages\CreateMenu::route('/create'),
    //         'edit' => Pages\EditMenu::route('/{record}/edit'),
    //     ];
    // }
}
