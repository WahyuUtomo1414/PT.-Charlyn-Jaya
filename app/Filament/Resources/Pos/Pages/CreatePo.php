<?php

namespace App\Filament\Resources\Pos\Pages;

use App\Filament\Resources\Pos\PoResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePo extends CreateRecord
{
    protected static string $resource = PoResource::class;
}
