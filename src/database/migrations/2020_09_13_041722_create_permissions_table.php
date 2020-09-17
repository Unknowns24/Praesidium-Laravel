<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    public function up()
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->id();
            $table->string('name', 128)->unique();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function getTableName()
    {
        return config('praesidium.tables.permissions');
    }

    public function down()
    {
        Schema::dropIfExists($this->getTableName());
    }
}
