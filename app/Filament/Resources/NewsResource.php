<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom untuk menampilkan nama author
                Tables\Columns\TextColumn::make('author.name'),
                // Kolom untuk menampilkan kategori
                Tables\Columns\TextColumn::make('category.title'),
                // Kolom untuk judul berita
                Tables\Columns\TextColumn::make('title'),
                // Kolom untuk slug
                Tables\Columns\TextColumn::make('slug'),
                // Kolom untuk thumbnail
                Tables\Columns\ImageColumn::make('thumbnail'),
            ])
            ->filters([
                // Filter berdasarkan author
                Tables\Filters\SelectFilter::make('author_id')
                    ->relationship('author', 'name'),

                // Filter berdasarkan kategori berita
                Tables\Filters\SelectFilter::make('category_id')
                    ->relationship('category', 'title'),
            ])
            ->actions([
                // Aksi untuk melihat detail berita
                Tables\Actions\ViewAction::make(),
                // Aksi untuk menghapus berita
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Aksi untuk menghapus secara massal
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Tambahkan relasi jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            // Tambahkan halaman lainnya seperti 'create' atau 'edit' jika dibutuhkan
        ];
    }
}
