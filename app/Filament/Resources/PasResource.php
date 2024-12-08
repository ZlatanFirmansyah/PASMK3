<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PasResource\Pages;
use App\Filament\Resources\PasResource\RelationManagers;
use App\Models\Pas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PasResource extends Resource
{
    protected static ?string $model = Pas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->required(),
            
            TextInput::make('price')
            ->required()
            ->label('Harga')
            ->placeholder('Masukkan harga (misal: RP25.000)')
            ->columnSpan(2),

            FileUpload::make('picture')
                ->image()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable()->label('Nama Barang'),
                TextColumn::make('price')->sortable()->label('Harga'),
                ImageColumn::make('picture')
                    ->label('Picture'),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListPas::route('/'),
            'create' => Pages\CreatePas::route('/create'),
            'edit' => Pages\EditPas::route('/{record}/edit'),
        ];
    }
}
