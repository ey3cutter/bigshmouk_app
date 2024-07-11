<?php

namespace App\Filament\Employee\Resources;

use App\Filament\Employee\Resources\EquipmentOrderResource\Pages;
use App\Filament\Employee\Resources\EquipmentOrderResource\RelationManagers;
use App\Models\EquipmentOrder;
use App\Models\Equipment;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EquipmentOrderResource extends Resource
{
    protected static ?string $model = EquipmentOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('equipment_id')
                    ->label('Оборудование')
                    ->options(Equipment::all()->pluck('model', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->required()
                    ->label('Количество'),
                Forms\Components\TextInput::make('total_price')
                    ->numeric()
                    ->label('Общая цена')
                    ->disabled(),
                Forms\Components\Select::make('status')
                    ->label('Статус заказа')
                    ->options([
                        'Ожидает обработки' => 'Ожидает обработки',
                        'Выполнен' => 'Выполнен',
                        'Отменён' => 'Отменён',
                    ])
                    ->required()
                    ->default('Ожидает обработки')
                    ->disabled(),
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
                SelectFilter::make('employee_id')
                    ->label('Звукорежиссёр')
                    ->options(Employee::all()->pluck('name', 'id')),
                SelectFilter::make('status')
                    ->label('Статус заказа')
                    ->options([
                        'Ожидает обработки' => 'Ожидает обработки',
                        'Выполнен' => 'Выполнен',
                        'Отменён' => 'Отменён',
                    ]),
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
        return 'Заказы оборудования';
    }

    public static function getLabel(): string
    {
        return 'Заказ оборудования';
    }

    public static function getPluralLabel(): string
    {
        return 'Заказы оборудования';
    }
}
