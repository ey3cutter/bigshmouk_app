<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientReviewsResource\Pages;
use App\Filament\Resources\ClientReviewsResource\RelationManagers;
use App\Models\Review;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use IbrahimBougaoua\FilamentRatingStar\Columns\RatingStarColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientReviewsResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function canCreate(): bool
    {
        return false; // Отключаем создание
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.name')->label('Звукорежиссёр'),
                Tables\Columns\TextColumn::make('client.name')->label('Клиент'),
                RatingStarColumn::make('rating')->label('Рейтинг'),
                Tables\Columns\TextColumn::make('comment')->label('Комментарий'),
            ])
            ->filters([
                SelectFilter::make('employee_id')
                    ->label('Звукорежиссёр')
                    ->options(Employee::all()->pluck('name', 'id')),

            ])
            ->actions([
                // Оставляем пустым, чтобы отключить действия
            ])
            ->bulkActions([
                // Оставляем пустым, чтобы отключить массовые действия
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClientReviews::route('/'),
            'create' => Pages\CreateClientReviews::route('/create'),
            'edit' => Pages\EditClientReviews::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Отзывы';
    }

    public static function getLabel(): string
    {
        return 'Отзыв';
    }

    public static function getPluralLabel(): string
    {
        return 'Отзывы';
    }
}
