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
        Schema::create('portofolio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('layanan_id')->nullable();
            $table->text('uraian')->nullable();
            $table->date('tahun_pekerjaan')->nullable();
            $table->string('status_pekerjaan', 128)->nullable();
        
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('layanan_id')->references('id')->on('layanan');
            
            $this->base($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portofolio');
    }
};
