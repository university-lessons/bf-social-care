<?php

namespace App\Policies;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AttendancePolicy
{
    /**
     * Determine whether the user can delete the model.
     */
    public function destroy(User $user, Attendance $attendance): bool
    {
        return $user->id === $attendance->user_id;
    }

    /**
     * Determine whether the user can set forwarding.
     */
    public function setForwarding(User $user, Attendance $attendance): bool
    {
        return $attendance->forwarding === null || $user->id === $attendance->forwarding->user_id;
    }
}
