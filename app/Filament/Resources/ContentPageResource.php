<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentPageResource\Pages;
use App\Filament\Resources\ContentPageResource\RelationManagers;
use App\Models\ContentPage;
use Dotswan\FilamentGrapesjs\Fields\GrapesJs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ContentPageResource extends Resource
{
    protected static ?string $model = ContentPage::class;

    protected static ?string $navigationGroup = 'Manajemen Konten';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Meta')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->required(),
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->readOnly(),
                    ]),

                Forms\Components\Section::make('Konten')
                    ->schema([
                        GrapesJs::make('content')
                            ->id('content')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContentPages::route('/'),
            'create' => Pages\CreateContentPage::route('/create'),
            'edit' => Pages\EditContentPage::route('/{record}/edit'),
        ];
    }
}
