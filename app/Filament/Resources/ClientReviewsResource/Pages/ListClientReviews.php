<?php

namespace App\Filament\Resources\ClientReviewsResource\Pages;

use App\Filament\Resources\ClientReviewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClientReviews extends ListRecords
{
    protected static string $resource = ClientReviewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
