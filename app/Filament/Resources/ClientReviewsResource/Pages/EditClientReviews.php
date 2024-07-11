<?php

namespace App\Filament\Resources\ClientReviewsResource\Pages;

use App\Filament\Resources\ClientReviewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClientReviews extends EditRecord
{
    protected static string $resource = ClientReviewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
