<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StudentPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Student $student): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin','teacher']);
    }

    public function update(User $user, Student $student): bool
    {
        return in_array($user->role, ['admin','teacher']);
    }

    public function delete(User $user, Student $student): bool
    {
        return $user->role == 'admin';
    }

    public function restore(User $user, Student $student): bool
    {
        return false;
    }

    public function forceDelete(User $user, Student $student): bool
    {
        return false;
    }
}
