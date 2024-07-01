<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\CommunityLink;
use App\Queries\CommunityLinksQuery;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Channel $channel)
    {


        $communityLinks
            = (new CommunityLinksQuery)->get(
                request()->exists('popular'),
                $channel
            );;


        return view('community.index', compact('communityLinks', 'channel'));
    }


    // $links = (new CommunityLinksQuery)->get(
    //         request()->exists('popular'), $channel
    //     );

    //     $channels = Channel::orderBy('title', 'asc')->get();

    //     return view('community.index', compact('links', 'channels', 'channel'));
}