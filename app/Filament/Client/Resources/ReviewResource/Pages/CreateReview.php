<?php

namespace App\Filament\Client\Resources\ReviewResource\Pages;

use App\Filament\Client\Resources\ReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateReview extends CreateRecord
{
    protected static string $resource = ReviewResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Установить client_id текущего пользователя
        $data['client_id'] = Auth::id();
        return $data;
    }
}
