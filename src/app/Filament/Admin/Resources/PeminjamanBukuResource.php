<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PeminjamanBukuResource\Pages;
use App\Models\PeminjamanBuku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

class PeminjamanBukuResource extends Resource
{
    protected static ?string $model = PeminjamanBuku::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Peminjaman Buku';
    protected static ?string $pluralLabel = 'Peminjaman Buku';
    protected static ?string $modelLabel = 'Peminjaman Buku';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('buku_id')
                    ->label('Judul Buku')
                    ->relationship('buku', 'judul')
                    ->searchable()
                    ->required(),

                TextInput::make('nama_peminjam')
                    ->label('Nama Peminjam')
                    ->required(),

                DatePicker::make('tanggal_pinjam')
                    ->label('Tanggal Pinjam')
                    ->required(),

                DatePicker::make('tanggal_kembali')
                    ->label('Tanggal Kembali')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('buku.judul')->label('Judul Buku'),
                Tables\Columns\TextColumn::make('nama_peminjam'),
                Tables\Columns\TextColumn::make('tanggal_pinjam')->date(),
                Tables\Columns\TextColumn::make('tanggal_kembali')->date(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Dibuat'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeminjamanBukus::route('/'),
            'create' => Pages\CreatePeminjamanBuku::route('/create'),
            'edit' => Pages\EditPeminjamanBuku::route('/{record}/edit'),
        ];
    }
}
