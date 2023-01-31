<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Auth\Access\HandlesAuthorization;

class VisitPolicy
{
    use HandlesAuthorization;

    public function myVisitors(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN, Role::IS_STAFF, Role::IS_CONTRACTOR]);
    }

    public function recentVisits(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN, Role::IS_SECURITY]);
    }

    public function taggedVisitors(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN, Role::IS_SECURITY]);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Visit $visit)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Visit $visit)
    {
        //
    }
}
