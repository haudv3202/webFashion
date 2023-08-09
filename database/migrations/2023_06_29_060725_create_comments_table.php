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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->integer('product_id');
            $table->integer('user_id');
            $table->bigInteger('status')->default(1);
            $table->timestamps();
        });


        $comments = [
            ['content' => 'Sản phẩm đẹp quá','product_id' => 1,'user_id' => 1,'status' => 2,'created_at' => \Carbon\Carbon::now()],
            ['content' => 'Sản phẩm quá chất lượng','product_id' => 1,'user_id' => 1,'status' => 2,'created_at' => \Carbon\Carbon::now()]
        ];

        DB::table('comments')->insert($comments);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
