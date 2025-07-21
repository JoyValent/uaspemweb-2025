<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BukuResource\Pages;
use App\Models\Buku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BukuResource extends Resource
{
    protected static ?string $model = Buku::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Manajemen Perpustakaan';

    protected static ?string $label = 'Buku';
    protected static ?string $pluralLabel = 'Data Buku';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->label('Judul Buku'),

                Forms\Components\TextInput::make('penulis')
                    ->required()
                    ->maxLength(255)
                    ->label('Penulis'),

                Forms\Components\TextInput::make('stok')
                    ->numeric()
                    ->minValue(0)
                    ->required()
                    ->label('Stok Buku'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->label('Judul'),

                Tables\Columns\TextColumn::make('penulis')
                    ->searchable()
                    ->sortable()
                    ->label('Penulis'),

                Tables\Columns\TextColumn::make('stok')
                    ->sortable()
                    ->label('Stok'),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->date('d M Y')
                    ->label('Dibuat')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }
}
