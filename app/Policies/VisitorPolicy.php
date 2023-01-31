<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Auth\Access\HandlesAuthorization;

class VisitorPolicy
{
    use HandlesAuthorization;

    public function add(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN, Role::IS_SECURITY]);
    }

    public function allVisitors(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN]);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Visitor $visitor)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Visitor $visitor)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Visitor $visitor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Visitor $visitor)
    {
        //
    }
}
