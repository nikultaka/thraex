<?php

namespace App\Providers;

use App\Models\Products;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $products = Products::select('products.id as products_id', 'products.product_name', 'sub_products.id as sub_products_id', 'sub_products.subproduct_name as subproduct_name')
            ->leftJoin('sub_products', 'products.id', '=', 'sub_products.product_id')
            ->where('products.status', '=', '1')
            ->orWhere('sub_products.status', '=', '1')
            ->get()
            ->toArray();

        $groupedProducts = [];

        foreach ($products as $product) {
            $productId = $product['products_id'];


            if (!isset($groupedProducts[$productId])) {
                $groupedProducts[$productId] = [
                    'products_id' => $productId,
                    'product_name' => $product['product_name'],
                    'subproducts' => [],
                ];
            }


            if (!empty($product['sub_products_id'])) {

                $groupedProducts[$productId]['subproducts'][] = [
                    'sub_products_id' => $product['sub_products_id'],
                    'subproduct_name' => $product['subproduct_name'],
                ];
            }
        }


        $groupedProducts = array_values($groupedProducts);
    
        view()->share('groupedProducts', $groupedProducts);
    }
}
