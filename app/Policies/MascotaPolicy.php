<?php

namespace App\Policies;

use App\Models\Mascota;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MascotaPolicy
{
    use HandlesAuthorization;
    public function view(User $user, Mascota $mascota)
{
    return $user->id === $mascota->persona->user_id;
}

public function update(User $user, Mascota $mascota)
{
    return $user->id === $mascota->persona->user_id;
}

public function delete(User $user, Mascota $mascota)
{
    return $user->id === $mascota->persona->user_id;
}

public function create(User $user)
{
    return true;
}

public function viewAny(User $user)
{
    return true;
}

}
