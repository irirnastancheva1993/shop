<?php

namespace App\Policies;

use App\Categories;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriesPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

//    public function destroy(User $user, Categories $categories)
//    {
//        return $user->id === $categories->user_id;
//    }
}
