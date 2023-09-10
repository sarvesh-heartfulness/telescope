<?php

namespace App\Policies;

use App\Models\Distribution;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DistributionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Distribution $distribution): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Distribution $distribution): bool
    {
        return $distribution->user()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Distribution $distribution): bool
    {
        return $this->update($user, $distribution);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Distribution $distribution): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Distribution $distribution): bool
    {
        //
    }
}
