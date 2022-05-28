<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('tipo',3);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        //Adicionando usuário Administrador para o sistema
        $user = new User();
        $user->name = "Administrador";
        $user->email = "admin@admin.com";
        $user->tipo = 'adm';
        $user->password = Hash::make("admin123");
        $user->save();
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
}
