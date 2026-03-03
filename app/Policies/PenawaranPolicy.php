<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Penawaran;
use Illuminate\Auth\Access\HandlesAuthorization;

class PenawaranPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Penawaran');
    }

    public function view(AuthUser $authUser, Penawaran $penawaran): bool
    {
        return $authUser->can('View:Penawaran');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Penawaran');
    }

    public function update(AuthUser $authUser, Penawaran $penawaran): bool
    {
        return $authUser->can('Update:Penawaran');
    }

    public function delete(AuthUser $authUser, Penawaran $penawaran): bool
    {
        return $authUser->can('Delete:Penawaran');
    }

    public function restore(AuthUser $authUser, Penawaran $penawaran): bool
    {
        return $authUser->can('Restore:Penawaran');
    }

    public function forceDelete(AuthUser $authUser, Penawaran $penawaran): bool
    {
        return $authUser->can('ForceDelete:Penawaran');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Penawaran');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Penawaran');
    }

    public function replicate(AuthUser $authUser, Penawaran $penawaran): bool
    {
        return $authUser->can('Replicate:Penawaran');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Penawaran');
    }

}