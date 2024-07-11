<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InventoryResource\Pages;
use App\Models\Inventory;
use App\Models\Equipment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InventoryResource extends Resource
{
    protected static ?string $model = Inventory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        return false; // Отключаем создание
    }

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
                    ->label('Количество')
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        $equipment = Equipment::find($get('equipment_id'));
                        if ($state > $equipment->quantity) {
                            $set('quantity', $equipment->quantity);
                            Notification::make()
                                ->title('Ошибка')
                                ->body('Количество оборудования не может превышать доступное количество.')
                                ->danger()
                                ->send();
                        }
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('equipment.equipment_type')
                    ->label('Тип оборудования'),
                Tables\Columns\TextColumn::make('equipment.equipment_brand')
                    ->label('Бренд'),
                Tables\Columns\TextColumn::make('equipment.model')
                    ->label('Модель'),
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Количество'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
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
            'index' => Pages\ListInventories::route('/'),
            'create' => Pages\CreateInventory::route('/create'),
            'edit' => Pages\EditInventory::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Склад';
    }

    public static function getLabel(): string
    {
        return 'Оборудование';
    }

    public static function getPluralLabel(): string
    {
        return 'Склад';
    }
}
