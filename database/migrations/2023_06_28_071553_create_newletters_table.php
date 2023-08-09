<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('newletters', function (Blueprint $table) {
            $table->id();
            $table->string('image_url_newletter');
            $table->string('des_newleter');
            $table->bigInteger('status')->default(0);
            $table->timestamps();
        });

        $newletter = [
            ['image_url_newletter' => 'https://template.canva.com/EADaoySm4lk/1/0/1131w-fX1ULDWXQbU.jpg','des_newleter' => 'Enter your email address to subscribe our notification of our new post & features by email.','status' => 2],
        ];

        DB::table('newletters')->insert($newletter);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newletters');
    }
};
