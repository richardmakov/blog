<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Traits\HasRoles;

class PostPolicy
{

    use HandlesAuthorization;
    use HasRoles;
    
    public function author(User $user, Post $post)
    {
        if ($user->id == $post->user_id) {
            return true;
        } else {
            return false;
        }
    }

    public function published(?User $User, Post $post)
    {
        if ($post->status == 2) {
            return true;
        } else {
            return false;
        }
    }
   
    
}
