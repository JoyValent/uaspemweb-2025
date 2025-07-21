<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PengembalianBukuResource\Pages;
use App\Models\PengembalianBuku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PengembalianBukuResource extends Resource
{
    protected static ?string $model = PengembalianBuku::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-uturn-left';
    protected static ?string $navigationLabel = 'Pengembalian Buku';
    protected static ?string $pluralLabel = 'Pengembalian Buku';
    protected static ?string $modelLabel = 'Pengembalian Buku';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('peminjaman_buku_id')
                    ->label('Peminjaman Buku')
                    ->relationship('peminjamanBuku', 'nama_peminjam')
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_pengembalian')
                    ->label('Tanggal Pengembalian')
                    ->required(),

                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('peminjamanBuku.nama_peminjam')
                    ->label('Nama Peminjam'),

                Tables\Columns\TextColumn::make('tanggal_pengembalian')
                    ->label('Tanggal Pengembalian')
                    ->date(),

                Tables\Columns\TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->limit(30),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime(),
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengembalianBukus::route('/'),
            'create' => Pages\CreatePengembalianBuku::route('/create'),
            'edit' => Pages\EditPengembalianBuku::route('/{record}/edit'),
        ];
    }
}
