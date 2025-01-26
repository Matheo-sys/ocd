<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id(); // id BIGINT(20) UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('created_by'); // created_by BIGINT(20) UNSIGNED
            $table->string('first_name'); // first_name VARCHAR(255) COLLATE utf8mb4_unicode_ci
            $table->string('last_name'); // last_name VARCHAR(255) COLLATE utf8mb4_unicode_ci
            $table->string('birth_name')->nullable(); // birth_name VARCHAR(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
            $table->string('middle_names')->nullable(); // middle_names VARCHAR(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
            $table->date('date_of_birth')->nullable(); // date_of_birth DATE DEFAULT NULL
            $table->timestamps(); // timestamps (created_at & updated_at)

            // Indexes
            $table->primary('id'); // id PRIMARY KEY
            $table->index('created_by'); // created_by INDEX
        });
    }

    public function down()
    {
        Schema::dropIfExists('people');
    }
}
