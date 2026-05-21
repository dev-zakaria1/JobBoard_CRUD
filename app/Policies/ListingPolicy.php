<?php

namespace App\Policies;

use App\Models\listings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ListingPolicy
{
    /**
     * Create a new policy instance.
     */
    
    public function action(User $user, listings $listing)
    {
        if (Auth::id() == $listing->user_id) {
            return true;
        }
        return false;
    }
}
