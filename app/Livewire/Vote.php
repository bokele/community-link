<?php

namespace App\Livewire;

use App\Livewire\Forms\CommunityForm;
use App\Models\CommunityLink;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Vote extends Component
{
    public CommunityLink $link;

    public function vote()
    {
        if (!auth()->check()) {
            return
                Notification::make()
                ->title('You must login')
                ->success()
                ->send();;
        }



        $response =  Auth::user()->votes()->toggle($this->link);

        if ($response['attached']) {
            return
                Notification::make()
                ->title('Like the link')
                ->success()
                ->send();
        }

        return
            Notification::make()
            ->title('Unlike the link')
            ->success()
            ->send();
    }

    public function render()
    {
        return view('livewire.vote');
    }
}