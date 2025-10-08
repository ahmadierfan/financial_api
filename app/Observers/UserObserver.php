<?php
namespace App\Observers;

use App\Jobs\SyncUserChanges;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        SyncUserChanges::dispatch($user->toArray());
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        SyncUserChanges::dispatch($user->toArray());
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        SyncUserChanges::dispatch(['id' => $user->id, 'deleted' => true]);
    }
}

