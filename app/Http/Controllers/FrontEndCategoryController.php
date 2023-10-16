<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ReviewProduct;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndCategoryController extends Controller
{

    function index($slug, $categoryId, Request $request)
    {

        $currentPage = '';

        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get();

        $category = Category::where('slug', $slug)->first();


        $category_by_id = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->where('categories.slug', $slug)->get();
        // dd($category_by_id);
        $meta_des = '';
        $meta_keywords = '';
        $meta_title = '';
        $url_canonical = $request->url();
        foreach ($category_by_id as $value) {
            //Seo
            $meta_des = $value->meta_des;
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->name;
            //end-seo meta
        }
        // Lấy tất cả sản phẩm trong danh mục này
        $search = $request->input('search');
        $allProducts = Product::where('category_id', $categoryId)
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
                if (is_numeric($request->search)) {
                    $query->orWhere('price', '=', $request->search);
                }
            });
        // Lấy sản phẩm theo phạm vi giá
        $productsPriceRange1 = clone $allProducts;
        $productsPriceRange1 = $productsPriceRange1->whereBetween('price', [0, 200000])->get();

        $productsPriceRange2 = clone $allProducts;
        $productsPriceRange2 = $productsPriceRange2->whereBetween('price', [200001, 400000])->get();

        $productsPriceRange3 = clone $allProducts;
        $productsPriceRange3 = $productsPriceRange3->whereBetween('price', [400001, 600000])->get();

        $productsPriceRange4 = clone $allProducts;
        $productsPriceRange4 = $productsPriceRange4->whereBetween('price', [600001, 800000])->get();

        $productsPriceRange5 = clone $allProducts;
        $productsPriceRange5 = $productsPriceRange5->whereBetween('price', [800001, 5000000])->get();

        $sort = request()->query('sort');

        if ($sort == 'latest') {
            $products = clone $allProducts;
            $products = $products->latest()->paginate(9);
        } elseif ($sort == 'popularity') {
            $products = Product::orderBy('views_count', 'desc')->paginate(9);
        } elseif ($sort == 'hightToLow') {
            $products = clone $allProducts;
            $products = $products->orderBy('price', 'desc')->paginate(9);
        } elseif ($sort == 'lowTohight') {
            $products = clone $allProducts;
            $products = $products->orderBy('price', 'asc')->paginate(9);
        } else {
            // Lưu trạng thái của ô kiểm tra vào session, khi chuyển trang giữ nguyên trạng thái checked 
            $request->session()->put('price', $request->input('price'));
            // Lấy giá trị từ ô kiểm tra
            $price = $request->input('price');

            // Tách giá trị thành hai phần, tạo thành mảng 2 giá trị 
            if (strpos($price, '-') !== false) {
                $prices = explode('-', $price);
                // Lấy ra danh sách sản phẩm theo khoảng giá
                $products = clone $allProducts;
                $products = $products->whereBetween('price', [$prices[0], $prices[1]])->paginate(9)->appends(['price' => $request->input('price')]);
            } else {
                // Nếu không có giá trị nào được chọn, hiển thị tất cả sản phẩm
                $products = clone $allProducts;
                $products = $products->paginate(9);
            }
        }
        return view('front-end.product.category.list', compact('categoriesLimit', 'currentPage', 'categories', 'products', 'allProducts', 'sort', 'category', 'productsPriceRange1', 'productsPriceRange2', 'productsPriceRange3', 'productsPriceRange4', 'productsPriceRange5', 'meta_des', 'meta_keywords', 'meta_title', 'url_canonical'));
    }
    function all_product(Request $request)
    {
        $currentPage = '';
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get();
        $meta_des = '';
        $meta_keywords = '';
        $meta_title = '';
        $url_canonical = $request->url();

        // Lấy tất cả sản phẩm trong danh mục này
        $allProductsFromSlider = Product::paginate(9);

        // Tạo truy vấn ban đầu
        $allProductsQuery = Product::all();

        // Thêm điều kiện tìm kiếm nếu có
        if ($request->has('search')) {
            $search = $request->input('search');
            $allProductsQuery->where('name', 'like', '%' . $search . '%');
            if (is_numeric($search)) {
                $allProductsQuery->orWhere('price', '=', $search);
            }
        }
        $sort = request()->query('sort');

        if ($request->has('sort')) {
            if ($sort == 'latest') {
                $allProductsFromSlider = Product::orderBy('created_at', 'desc')->paginate(9);
            } elseif ($sort == 'popularity') {
                $allProductsFromSlider = Product::orderBy('views_count', 'desc')->paginate(9);
            } elseif ($sort == 'hightToLow') {
                $allProductsFromSlider =   Product::orderBy('price', 'desc')->paginate(9);
            } elseif ($sort == 'lowToHight') {
                $allProductsFromSlider =   Product::orderBy('price', 'asc')->paginate(9);
            }
        }
        // Thực thi truy vấn và phân trang kết quả
        $products = Product::paginate(9);

        return view('front-end.product.category.all_product', compact(
            'allProductsFromSlider',
            'categoriesLimit',
            'currentPage',
            'categories',
            'products',
            'sort',
            'meta_des',
            'meta_keywords',
            'meta_title',
            'url_canonical'
        ));
    }


    function product_detail($id, Request $request)
    {
        $currentPage = '';
        $sliders = Slider::latest()->get();
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get(); //lấy tất cả parent_id =0 là get , lấy 1 là firt
        $product = Product::find($id);
        foreach ($product as $key => $value) {
            $category_id = $product->category_id;
        };

        //Seo
        $meta_des = $product->content;
        $meta_keywords = $product->tags->pluck('name')->implode(',');
        $meta_title = $product->name;
        $url_canonical = $request->url();
        //end-seo meta
        $rating = ReviewProduct::where('product_id', $id)->get();
        $averageRating = ReviewProduct::where('product_id', $id)->avg('rating');
        $related_product = DB::table('products')->distinct()->join('categories', 'categories.id', '=', 'products.category_id')->where('category_id', $category_id)->whereNotIn('products.id', [$id])->get(); //ưhereNotIn yêu cầu đối số truyền vào là 1 mảng ;
        return view('front-end.product.detail.product_detail', compact('sliders', 'currentPage', 'categoriesLimit', 'categories', 'product', 'rating', 'related_product', 'averageRating', 'meta_des', 'meta_keywords', 'meta_title', 'url_canonical'));
    }
    function review_product(Request $request, $id)
    {
        // dd($request->all());
        $dataInsertReview = [
            'rating' => $request->rating,
            'review' => $request->review,
            'name' => $request->name,
            'email' => $request->email,
            'product_id' => $request->id,

        ];
        ReviewProduct::create($dataInsertReview);
        return redirect()->route('product_detail', ['id' => $id]);
    }
}
