<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\CommunityLink;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Channel $channel)
    {
    

        $communityLinks = CommunityLink::with(['user', 'channel'])->isApproved()->forChannel($channel)->latest('updated_at')->paginate(3);


        return view('community.index', compact('communityLinks', 'channel'));
    }
}