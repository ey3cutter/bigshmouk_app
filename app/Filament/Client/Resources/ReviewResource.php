<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\ReviewResource\Pages;
use App\Filament\Client\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;// Правильный импорт
use IbrahimBougaoua\FilamentRatingStar\Columns\RatingStarColumn;
use IbrahimBougaoua\FilamentRatingStar\Actions\RatingStar;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Отзыв')
                    ->schema([
                        Select::make('employee_id')
                            ->label('Звукорежиссёр')
                            ->relationship('employee', 'name')
                            ->required(),
                        RatingStar::make('rating')
                            ->label('Рейтинг')
                            ->required(),
                        Textarea::make('comment')
                            ->label('Комментарий')
                            ->nullable(),
                    ])
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('employee.name')->label('Звукорежиссёр'),
                TextColumn::make('client.name')->label('Клиент'),
                RatingStarColumn::make('rating')->label('Рейтинг'),
                TextColumn::make('comment')->label('Комментарий'),
            ])
            ->filters([
                SelectFilter::make('employee_id')
                    ->label('Звукорежиссёр')
                    ->options(Employee::all()->pluck('name', 'id')),

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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
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
