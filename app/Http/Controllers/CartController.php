<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Facades\CartFacade;

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        // dd($request->all());


        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $size = $request->size;
        $color = $request->color;
        // dd($size, $color);
        $product_infor = DB::table('products')->where('id', $productId)->first();
        // dd($product_infor);
        $dataInsert = [
            'id' => $product_infor->id,
            'quantity' => $quantity,
            'name' => $product_infor->name,
            'price' => $product_infor->price,
            'size' => $size,
            'color' => $color,
            'attributes' => [
                'image' => $product_infor->feature_image_path,
                'size' => $size,
                'color' => $color
            ]
        ];
        // dd($dataInsert);
        CartFacade::add($dataInsert);
        return  redirect()->route('show-cart');
    }
    // CartFacade::add(455, 'Sample Item', 100.99, 2);
    // CartFacade::remove();
    // return view('front-end.product.cart.show_cart', compact('categoriesLimit', 'categories', 'sliders'));
    public function show_cart()
    {
        $currentPage = '';
        $sliders = Slider::latest()->get();
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get(); //lấy tất cả parent_id =0 là get , lấy 1 là firt
        return view('front-end.product.cart.show_cart', compact('categoriesLimit', 'categories', 'currentPage', 'sliders'));
    }
    public function delete_cart($rowId)
    {
        CartFacade::remove($rowId);
        return  redirect()->route('show-cart');
    }
    public function update_cart(Request $request)
    {
        // dd($request->all());
        $rowId = $request->rowId_cart;
        $quantity = $request->quantity;
        CartFacade::update($rowId, array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
        ));
        // echo 'Quantity: ' . $quantity;
        // dd('Row ID: ' . $rowId . ', Quantity: ' . $quantity); // Debug line
        return redirect()->route('show-cart');
    }
}
//search laravel shopping cart de cai dat 
//Cài shopping cart trong composer bằng câu lệnh composer require "darryldecode/cart"
//sử dungk câu lệnh composer dump-autoload đẻ chạy lại file 