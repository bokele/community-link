<?php

namespace App\Livewire\Forms;

use App\Models\CommunityLink;
use Filament\Notifications\Notification;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class CommunityForm extends Form
{

    public ?CommunityLink $communityLink;
    public $channel_id = '';

    public $title = '';

    public $url = '';

    public function setPost(CommunityLink $communityLink)
    {
        $this->communityLink = $communityLink;

        $this->channel_id = $communityLink->title;
        $this->title = $communityLink->content;
        $this->url = $communityLink->url;
    }

    public function rules()
    {
        return [
            'channel_id' => ['required', 'exists:channels,id'],
            'title' => ['required', 'string'],
            'url' => ['required', 'url'],
            // 'url' => ['required', 'url', Rule::unique('community_links')->ignore($this->communityLink),],

        ];
    }

    public function store()
    {
        $this->validate();

        $communityLink = new CommunityLink();

        $response =  $communityLink->from(Auth::user())
            ->contribute($this->only(['channel_id', 'title', 'url']));


        $this->reset();


        return   $response;
    }
}