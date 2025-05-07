<?php

namespace App\Policies;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user) { return true; }
    public function view(User $user, Persona $persona) { return $user->id === $persona->user_id; }
    public function create(User $user) { return true; }
    public function update(User $user, Persona $persona) { return $user->id === $persona->user_id; }
    public function delete(User $user, Persona $persona) { return $user->id === $persona->user_id; }

}
