<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("email")->unique();
            $table->string("name", 50);
            $table->integer("nis")->unique();
            $table->enum("jurusan", [
                "PENDIDIKAN AGAMA",
                "PANCASILA",
                "ADMINISTRASI SISTEM",
                "EMBEDDED SYSTEM",
                "ENTERPRISE NETWORKING",
                "ClOUD COMPUTING",
                "PEMROGRAMAN WEB",
                "PEMROGRAMAN MOBILE",
            ]);
            $table->enum("status", ["Active", "Not Active"])->default("Active");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
