<?php

namespace App\Http\Controllers;

use App\Http\Requests\createProducts;
use App\Http\Requests\deleteProducts;
use App\Http\Requests\deleteProductsFromStock;
use App\Http\Requests\displayAvailableProducts;
use App\Http\Requests\displayProducts;
use App\Http\Requests\transferProducts;
use App\Http\Requests\updateProducts;
use App\Http\Requests\updateUser;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function displayProducts(displayProducts $request){

        $validated = $request->validated();

            $products = User::find($request->id)->Products;
            return  $products;
    }

    public function displayAvailableProducts(displayAvailableProducts $request){

        $validated = $request->validated();

        $results = db::select("SELECT products.id ,products.name, MAX(product_stock.Quantity) AS Quantity FROM users JOIN products ON users.id = products.user_id JOIN product_stock ON product_stock.product_id = products.id WHERE product_stock.Quantity > 0 AND users.id = ? GROUP BY products.name;", [$request->id]);

        return $results;
    }

    public function createProducts(createProducts $request){

        $validated = $request->validated();

        $product = Product::create([
            'name' => $request->name,
            'famille' => $request->famille,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'seuil' => $request->seuil,
            'prixGros' => $request->priceGros,
            'user_id' => $request->user_id
        ]);
    }

    public function updateProducts(updateProducts $request){

        $validated = $request->validated();

        $product = Product::find($request->id);

        $product->update([
            'name' => $request->name,
            'famille' => $request->famille,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'seuil' => $request->seuil,
            'priceGros' => $request->priceGros,
        ]);

    }

    public function deleteProducts(deleteProducts $request){

        $validated = $request->validated();

        $product = Product::find($request->id);

        $product->delete();

    }

}
