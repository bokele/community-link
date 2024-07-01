<?php

namespace App\Filament\Resources\CommunityLinkResource\Pages;

use App\Filament\Resources\CommunityLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCommunityLink extends EditRecord
{
    protected static string $resource = CommunityLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
