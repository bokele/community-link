<?php

namespace App\Filament\Resources\CommunityLinkResource\Pages;

use App\Filament\Resources\CommunityLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCommunityLinks extends ListRecords
{
    protected static string $resource = CommunityLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
