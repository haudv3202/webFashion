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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_categories');
            $table->bigInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        $categoris = [
            ['name' => 'Quần áo','image_categories' => 'https://risingtheme.com/html/demo-suruchi-v1/suruchi/assets/img/product/small-product1.png','status' => 2],
            ['name' => 'Phụ kiện','image_categories' => 'https://risingtheme.com/html/demo-suruchi-v1/suruchi/assets/img/product/small-product5.png','status' => 2]
        ];

        DB::table('categories')->insert($categoris);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
