<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function query(): Builder
    {
        return parent::query()->withCount('equipmentOrders');
    }

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
                Forms\Components\Toggle::make('is_admin')
                    ->label('Права администратора')
                    ->default(false),
                Forms\Components\Toggle::make('is_working')
                    ->label('Работает ли сотрудник?')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('ФИО')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Электронная почта')->searchable(),
                Tables\Columns\TextColumn::make('phone')->label('Номер телефона')->searchable(),
                Tables\Columns\TextColumn::make('equipment_orders_count')
                    ->label('Количество заказов оборудования')
                    ->counts('equipmentOrders'),
                IconColumn::make('is_admin')
                    ->label('Права администратора')
                    ->boolean(),
                IconColumn::make('is_working')
                    ->label('Работает ли сотрудник?')
                    ->boolean(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Сотрудники';
    }

    public static function getLabel(): string
    {
        return 'Сотрудника';
    }

    public static function getPluralLabel(): string
    {
        return 'Сотрудники';
    }
}
