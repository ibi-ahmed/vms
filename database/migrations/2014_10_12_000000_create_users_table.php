<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('role_id'); /* Users: 1=>Contractor, 2=>Security, 3=>Staff, 4=>Admin 5=>Super */
            $table->string('azure_id')->nullable();
            $table->text('token')->nullable();
            // $table->tinyInteger('type')->default(0); /* Users: 0=>User, 1=>Staff, 2=>Admin 3=>Super */
            // $table->boolean('changed_password')->default(false); 
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
