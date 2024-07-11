<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Notifications\Notification;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function query(): Builder
    {
        return parent::query()->withCount('clientOrders');
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('ФИО')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Электронная почта')->searchable(),
                Tables\Columns\TextColumn::make('phone')->label('Номер телефона')->searchable(),
                Tables\Columns\TextColumn::make('client_orders_count')
                    ->label('Количество заказов')
                    ->counts('clientOrders'),
            ])
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Клиенты';
    }

    public static function getLabel(): string
    {
        return 'Клиента';
    }

    public static function getPluralLabel(): string
    {
        return 'Клиенты';
    }
}
