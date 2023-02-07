<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN]);
        // return $user->role_id == Role::IS_ADMIN;
        // return $user->role_id == 4;
        // return in_array($user->role_id, [4, 5]); 
    }

    public function superDashboard(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER]); 
    }
    
    public function adminDashboard(User $user)
    {
        return in_array($user->role_id, [Role::IS_ADMIN]); 
    }
    
    public function staffDashboard(User $user)
    {
        return in_array($user->role_id, [Role::IS_STAFF]); 
    }

    public function securityDashboard(User $user)
    {
        return in_array($user->role_id, [Role::IS_SECURITY]); 
    }
    
    public function contractorDashboard(User $user)
    {
        return in_array($user->role_id, [Role::IS_CONTRACTOR]); 
    }
    
    public function userProfile(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_SECURITY, Role::IS_CONTRACTOR]); 
    }
    
    public function allUsers(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN]); 
    }
    
    public function singleUser(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN]); 
    }
    
    public function editUser(User $user)
    {
        return in_array($user->role_id, [Role::IS_SUPER, Role::IS_ADMIN]); 
    }
    
}
