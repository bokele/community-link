<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CommunityLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'channel_id',
        'title',
        'url',
        'approved',
    ];

    /**
     * Get the user that owns the CommunityLink
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function from(User $user)
    {

        $link = new static;

        $link->user_id = $user->id;

        if ($user->isTrusted()) {
            $link->approve();
        }

        return $link;
    }

    public function contribute($attributes)
    {

        if ($existing = $this->hasAlreadyBeenSubmitted($attributes['url'])) {
            $existing->touch();

            return 'exist';
        }

        return $this->fill($attributes)->save();
    }

    public function approve()
    {
        $this->approved = true;

        return $this;
    }






    protected function hasAlreadyBeenSubmitted(string $url)
    {

        return static::where('url', $url)->first();
    }

    public function scopeIsApproved(Builder $query): void
    {
        $query->where('approved', 1);
    }


    public function scopeForChannel(Builder $query, $channel)
    {

        if ($channel) {
            return $query->where('channel_id', $channel->id);
        }

        return $query;
    }



    public function votes()
    {
        return $this->hasMany(CommunityLinksVote::class, 'community_link_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }
}