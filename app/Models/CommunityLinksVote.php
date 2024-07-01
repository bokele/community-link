<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityLinksVote extends Model
{
    use HasFactory;


    protected $table = 'community_links_votes';


    protected $fillable = ['user_id', 'community_link_id'];
}