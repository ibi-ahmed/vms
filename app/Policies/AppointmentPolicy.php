<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function allAppointments(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN, Role::IS_SECURITY]);
    }

    public function schedule(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN, Role::IS_STAFF, Role::IS_CONTRACTOR]);
    }
    
    public function recentAppointments(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN, Role::IS_SECURITY]);
    }
    
    public function myAppointments(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN, Role::IS_STAFF, Role::IS_CONTRACTOR]);
    }
    
    public function staffSearch(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN]);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Appointment $appointment)
    {
        //
    }
}
