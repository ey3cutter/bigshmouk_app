<?php

namespace App\Filament\Client\Resources\ReviewResource\Pages;

use App\Filament\Client\Resources\ReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditReview extends EditRecord
{
    protected static string $resource = ReviewResource::class;

    protected function canEdit($record): bool
    {
        // Разрешить редактирование только если текущий пользователь является автором отзыва
        return $record->client_id === Auth::id();
    }
}
