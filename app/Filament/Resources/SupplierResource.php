<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('ФИО')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->label('Электронная почта')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->label('Пароль')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label('Номер телефона')
                    ->numeric()
                    ->required()
                    ->minLength(10)
                    ->maxLength(10),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('ФИО')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Электронная почта')->searchable(),
                Tables\Columns\TextColumn::make('phone')->label('Номер телефона')->searchable(),
                Tables\Columns\TextColumn::make('equipment_count')
                    ->label('Количество размещенных позиций')
                    ->counts('equipment'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Поставщики';
    }

    public static function getLabel(): string
    {
        return 'Поставщику';
    }

    public static function getPluralLabel(): string
    {
        return 'Поставщики';
    }
}
