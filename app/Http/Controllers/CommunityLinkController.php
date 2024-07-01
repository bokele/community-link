<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommunityLinkStoreRequest;
use App\Models\Channel;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel = null)
    {
        $communityLinks = CommunityLink::with(['user', 'channel', 'votes'])->isApproved()->forChannel($channel)->latest('updated_at')->paginate(3);


        return view('community.index', compact('communityLinks', 'channel'));
    }
}