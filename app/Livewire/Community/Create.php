<?php

namespace App\Livewire\Community;

use App\Livewire\Forms\CommunityForm;
use App\Models\Channel;
use App\Models\CommunityLink;
use Filament\Notifications\Notification;
use Livewire\Component;

class Create extends Component
{
    public $channels;
    public CommunityForm $form;

    public function mount(CommunityLink $communityLink)
    {

        $this->form->setPost($communityLink);
        $this->channels = Channel::orderBy('title')->get();
    }


    public function save()
    {
        if (!auth()->check()) {
            return to_route('login');
        }

        $response = $this->form->store();

        if ($response === 'exist') {
            // dd($response);
            Notification::make()
                ->title('That Link Has Already Been Submitted')
                ->body("We'll instead bump the timestamps and bring that link back to the top. Thanks!")
                ->success()
                ->send();
        } else {
            if (auth()->user()->isTrusted()) {
                Notification::make()
                    ->title('Thanks for the contribution!')
                    ->success()
                    ->send();
            } else {
                Notification::make()
                    ->title('Thanks!')
                    ->body('This contribution will be approved shortly.')
                    ->success()
                    ->send();
            }
        }


        return to_route('community.index');
    }

    public function render()
    {


        return view('livewire.community.create',);
    }
}