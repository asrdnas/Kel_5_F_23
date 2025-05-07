<?php

namespace App\Filament\Author\Resources;

use App\Filament\Author\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Hidden;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // author_id disembunyikan tapi tetap dikirim
                Hidden::make('author_id')
                    ->default(fn () => Auth::guard('author')->id())
                    ->required(),

                // Field untuk kategori
                Select::make('category_id')
                    ->relationship('category', 'title')
                    ->required(),

                // Field untuk title dengan slug otomatis
                TextInput::make('title')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (callable $set, ?string $state) => 
                        $set('slug', Str::slug($state))
                    )
                    ->required(),

                // Field slug (read-only)
                TextInput::make('slug')
                    ->readOnly()
                    ->required(),

                FileUpload::make('thumbnail')
                    ->columnSpanFull()
                    ->image()
                    ->required(),

                RichEditor::make('content')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->modifyQueryUsing(fn ($query) => 
            $query->where('author_id', auth()->id())
        )
        ->columns([
            Tables\Columns\TextColumn::make('author.name'),
            Tables\Columns\TextColumn::make('category.title'),
            Tables\Columns\TextColumn::make('title'),
            Tables\Columns\TextColumn::make('slug'),
            Tables\Columns\ImageColumn::make('thumbnail'),
        ])
        ->filters([
            // Filter bisa ditambahkan di sini
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
