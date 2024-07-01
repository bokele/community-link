<?php

namespace App\View\Components;

use App\Models\Channel;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $channels = Channel::orderBy('title', 'asc')->take(10)->get();

        return view('layouts.app', compact('channels'));
    }
}