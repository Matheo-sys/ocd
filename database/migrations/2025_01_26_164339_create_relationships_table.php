<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function (Blueprint $table) {
            $table->id(); // id : bigint(20) unsigned
            $table->unsignedBigInteger('created_by'); // created_by : bigint(20) unsigned
            $table->unsignedBigInteger('parent_id'); // parent_id : bigint(20) unsigned
            $table->unsignedBigInteger('child_id'); // child_id : bigint(20) unsigned
            $table->timestamps(); // created_at & updated_at

            // Indexes
            $table->primary('id'); // Index pour id
            $table->index('created_by'); // Index pour created_by
            $table->index('parent_id'); // Index pour parent_id
            $table->index('child_id'); // Index pour child_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
}
