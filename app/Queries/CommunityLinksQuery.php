<?php

namespace App\Queries;


use App\Models\CommunityLink;

class CommunityLinksQuery
{
    /**
     * Fetch all relevant community links.
     *
     * @param  bool   $sortByPopular
     * @param  string $channel
     * @return mixed
     */
    public function get($sortByPopular, $channel)
    {
        $orderBy = $sortByPopular ? 'votes_count' : 'updated_at';

        return CommunityLink::with('user', 'channel')
            ->withCount('votes')
            ->forChannel($channel)
            ->isApproved()
            ->orderBy($orderBy, 'desc')
            ->paginate(20);
    }
}