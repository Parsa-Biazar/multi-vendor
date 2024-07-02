<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesTableSeeder extends Seeder
{
    public function run(): void
    {
        $productCount = 20; // تعداد محصولاتی که دارید
        $imagePerProduct = 2; // تعداد تصاویر برای هر محصول
        $totalImages = 25; // تعداد کل تصاویر موجود

        $currentImageIndex = 1; // شاخص تصویر اولیه

        for ($i = 1; $i <= $productCount; $i++) {
            for ($j = 1; $j <= $imagePerProduct; $j++) {
                DB::table('product_images')->insert([
                    'product_id' => $i,
                    'image_path' => 'images/pro_image' . $currentImageIndex . '.jpg',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                // افزایش شاخص تصویر و برگشت به 1 در صورت عبور از تعداد کل تصاویر
                $currentImageIndex++;
                if ($currentImageIndex > $totalImages) {
                    $currentImageIndex = 1;
                }
            }
        }
    }

}
