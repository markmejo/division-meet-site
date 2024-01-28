<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedalResource\Pages;
use App\Filament\Resources\MedalResource\RelationManagers;
use App\Models\Medal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MedalResource extends Resource
{
    protected static ?string $model = Medal::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('municipality_id')
                    ->relationship('municipality', 'name')
                    ->required(),
                Forms\Components\TextInput::make('bronze'),
                Forms\Components\TextInput::make('silver'),
                Forms\Components\TextInput::make('gold'),
                Forms\Components\TextInput::make('total'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('municipality.name'),
                Tables\Columns\TextColumn::make('bronze'),
                Tables\Columns\TextColumn::make('silver'),
                Tables\Columns\TextColumn::make('gold'),
                Tables\Columns\TextColumn::make('total'),
            ])
            ->defaultSort('gold', 'desc')
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
            'index' => Pages\ListMedals::route('/'),
            'create' => Pages\CreateMedal::route('/create'),
            'edit' => Pages\EditMedal::route('/{record}/edit'),
        ];
    }
}
