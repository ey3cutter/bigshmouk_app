<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EquipmentResource\Pages;
use App\Filament\Resources\EquipmentResource\RelationManagers;
use App\Models\Supplier;
use App\Models\Equipment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EquipmentResource extends Resource
{
    protected static ?string $model = Equipment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        return false; // Отключаем создание
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('equipment_type')
                    ->label('Тип оборудования')
                    ->options([
                        'Микрофон' => 'Микрофон',
                        'Студийные мониторы' => 'Студийные мониторы',
                        'Микшер' => 'Микшер',
                        'Наушники' => 'Наушники',
                        'Другое' => 'Другое',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('equipment_brand')
                    ->label('Бренд')
                    ->required(),
                Forms\Components\TextInput::make('model')
                    ->label('Модель')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->label('Стоимость'),
                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->required()
                    ->label('Количество'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('equipment_type')
                    ->label('Тип оборудования')
                    ->searchable(),
                Tables\Columns\TextColumn::make('equipment_brand')
                    ->label('Бренд')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model')
                    ->label('Модель')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Стоимость'),
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Количество'),
                Tables\Columns\TextColumn::make('supplier.name')
                    ->label('Поставщик'),

            ])
            ->filters([
                //
            ])
            ->actions([
                //
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
            'index' => Pages\ListEquipment::route('/'),
            'create' => Pages\CreateEquipment::route('/create'),
            'edit' => Pages\EditEquipment::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Каталог продукции';
    }

    public static function getLabel(): string
    {
        return 'Продукцию';
    }

    public static function getPluralLabel(): string
    {
        return 'Каталог продукции';
    }
}
