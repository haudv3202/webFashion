<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $images = [
            "https://cdn.vuahanghieu.com/unsafe/0x900/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/product/2023/02/ao-polo-versace-jeans-couture-mau-den-63db292c6a7e6-02022023100828.jpg",
            "https://cdn.vuahanghieu.com/unsafe/0x900/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/product/2023/02/ao-polo-versace-jeans-couture-mau-den-63db292c78f80-02022023100828.jpg",
            "https://cdn.vuahanghieu.com/unsafe/0x900/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/product/2023/02/ao-polo-versace-jeans-couture-mau-den-63db292c7c6cf-02022023100828.jpg".
            "https://cdn.vuahanghieu.com/unsafe/0x900/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/product/2023/02/mu-gucci-baseball-cap-from-the-gucci-tiger-collection-phoi-mau-size-s-63dcd73688ec6-03022023164318.jpg",
            "https://cdn.vuahanghieu.com/unsafe/0x900/left/top/smart/filters:quality(90)/https://admin.vuahanghieu.com/upload/product/2023/02/mu-gucci-baseball-cap-from-the-gucci-tiger-collection-phoi-mau-size-s-63dcd7367fcf3-03022023164318.jpg"
        ];
        $images = json_encode($images);
        $categories = [1,2];
        $brand = [1,2];
        return [
            'name' => $this->faker->name,
            'images' => $this->faker->imageUrl(),
            'price' => rand(1000000, 10000000),
            'discount_price' => rand(0, 100),
            'view' => rand(100, 1000),
            'like' =>rand(0, 10000),
            'status' => 2,
            'category_id' => $categories[array_rand($categories)],
            'brand_id' =>  $brand[array_rand($brand)],
            'created_at' => now(),
            'image_avatar' => $images,
        ];
    }
}
