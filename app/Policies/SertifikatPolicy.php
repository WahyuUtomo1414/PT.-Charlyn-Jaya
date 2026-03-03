<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Sertifikat;
use Illuminate\Auth\Access\HandlesAuthorization;

class SertifikatPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Sertifikat');
    }

    public function view(AuthUser $authUser, Sertifikat $sertifikat): bool
    {
        return $authUser->can('View:Sertifikat');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Sertifikat');
    }

    public function update(AuthUser $authUser, Sertifikat $sertifikat): bool
    {
        return $authUser->can('Update:Sertifikat');
    }

    public function delete(AuthUser $authUser, Sertifikat $sertifikat): bool
    {
        return $authUser->can('Delete:Sertifikat');
    }

    public function restore(AuthUser $authUser, Sertifikat $sertifikat): bool
    {
        return $authUser->can('Restore:Sertifikat');
    }

    public function forceDelete(AuthUser $authUser, Sertifikat $sertifikat): bool
    {
        return $authUser->can('ForceDelete:Sertifikat');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Sertifikat');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Sertifikat');
    }

    public function replicate(AuthUser $authUser, Sertifikat $sertifikat): bool
    {
        return $authUser->can('Replicate:Sertifikat');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Sertifikat');
    }

}