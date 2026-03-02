<?php

use App\Traits\BaseModelSoftDeleteDefault;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use BaseModelSoftDeleteDefault;

    public function up(): void
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();
            $table->string('benner', 255);
            $table->string('icon', 255);
            $table->string('nama', 128);
            $table->text('deskripsi')->nullable();
            $table->json('lingkup_layanan')->nullable();
            $table->json('foto')->nullable();
            $this->base($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
