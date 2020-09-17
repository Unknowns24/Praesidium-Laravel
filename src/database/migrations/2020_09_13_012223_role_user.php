<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RoleUser extends Migration
{
    public function up()
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function getTableName()
    {
        return config('praesidium.tables.role_user');
    }

    public function down()
    {
        Schema::dropIfExists($this->getTableName());
    }
}
