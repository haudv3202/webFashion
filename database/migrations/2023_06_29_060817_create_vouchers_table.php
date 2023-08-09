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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity');
            $table->string('limmitd_use');
            $table->date('expiration_date');
            $table->bigInteger('status')->default(1);
            $table->timestamps();
        });

        $comments = [
            ['name' => 'Giảm Giá 50%','quantity' => 10,'limmitd_use' => 0,'expiration_date'=>now()->addDays(2),'status' => 2],
            ['name' => 'Giảm giá 20%','quantity' => 10,'limmitd_use' => 0,'expiration_date'=>now()->addDays(2),'status' => 2]
        ];

        DB::table('vouchers')->insert($comments);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
};
