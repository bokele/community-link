<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommunityLinkStoreRequest;
use App\Models\Channel;
use App\Models\CommunityLink;
use App\Queries\CommunityLinksQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel = null)
    {
        $communityLinks
            = (new CommunityLinksQuery)->get(
                request()->exists('popular'),
                $channel
            );

        return view('community.index', compact('communityLinks', 'channel'));
    }
}