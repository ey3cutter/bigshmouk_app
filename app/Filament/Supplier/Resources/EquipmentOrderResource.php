<?php

namespace App\Filament\Supplier\Resources;

use App\Filament\Supplier\Resources\EquipmentOrderResource\Pages;
use App\Filament\Supplier\Resources\EquipmentOrderResource\RelationManagers;
use App\Models\EquipmentOrder;
use App\Models\Equipment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EquipmentOrderResource extends Resource
{
    protected static ?string $model = EquipmentOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('equipment_id')
                    ->label('Оборудование')
                    ->options(Equipment::all()->pluck('model', 'id'))
                    ->required()
                    ->disabled(),
                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->required()
                    ->label('Количество')
                    ->disabled(),
                Forms\Components\TextInput::make('total_price')
                    ->numeric()
                    ->label('Общая цена')
                    ->disabled(),
                Forms\Components\Select::make('status')
                    ->label('Статус заказа')
                    ->options([
                        'Выполнен' => 'Выполнен',
                        'Отменён' => 'Отменён',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('equipment.model')
                    ->label('Оборудование'),
                Tables\Columns\TextColumn::make('employee.name')
                    ->label('Сотрудник'),
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Количество'),
                Tables\Columns\TextColumn::make('total_price')
                    ->label('Общая цена'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Статус заказа'),
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
            'index' => Pages\ListEquipmentOrders::route('/'),
            'create' => Pages\CreateEquipmentOrder::route('/create'),
            'edit' => Pages\EditEquipmentOrder::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Заказы сотрудников';
    }

    public static function getLabel(): string
    {
        return 'Заказ сотрудника';
    }

    public static function getPluralLabel(): string
    {
        return 'Заказы сотрудников';
    }
}
