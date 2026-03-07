<?php

namespace App\Filament\Resources\Pos;

use App\Filament\Resources\Pos\Pages\CreatePo;
use App\Filament\Resources\Pos\Pages\EditPo;
use App\Filament\Resources\Pos\Pages\ListPos;
use App\Filament\Resources\Pos\Pages\ViewPo;
use App\Filament\Resources\Pos\Schemas\PoForm;
use App\Filament\Resources\Pos\Schemas\PoInfolist;
use App\Filament\Resources\Pos\Tables\PosTable;
use App\Models\Po;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class PoResource extends Resource
{
    protected static ?string $model = Po::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-check';

    protected static string | UnitEnum | null $navigationGroup = 'Leads Customer';

    protected static ?string $navigationLabel = 'Po';

    protected static ?string $modelLabel = 'Po';

    protected static ?string $pluralModelLabel = 'Po';

    protected static ?string $recordTitleAttribute = 'no_po';

    public static function form(Schema $schema): Schema
    {
        return PoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PosTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);

        $user = Auth::user();
        if ($user?->roles()->where('id', 2)->exists()) {
            $query->where('created_by', $user->id);
        }

        return $query;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPos::route('/'),
            'create' => CreatePo::route('/create'),
            'view' => ViewPo::route('/{record}'),
            'edit' => EditPo::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        $query = parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);

        $user = Auth::user();
        if ($user?->roles()->where('id', 2)->exists()) {
            $query->where('created_by', $user->id);
        }

        return $query;
    }
}
