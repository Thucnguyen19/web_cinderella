<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use function App\Helpers\getConfigValueFromSettingTable;




class HomeController extends Controller
{

    public function index(Request $request)
    {
        $currentPage = 'home';
        //Seo
        $meta_des = "Thời Người Lớn Và Trẻ Em, mang lại phong cách mới mẻ làn gió mới trong xu hướng thời trang hiện đại.";
        $meta_keywords = 'Thời trang người lớn, thời trang trẻ em, phụ kiện thời trang';
        $meta_title = 'H-Cinderella Thời trang người lớn và trẻ em';
        $url_canonical = $request->fullUrl(); // take full url

        //end-seo meta

        $sliders = Slider::latest()->get();

        $categories = Category::where('parent_id', 0)->get(); //lấy tất cả parent_id =0 là get , lấy 1 là firt

        $productsRecommend = Product::latest('views_count', 'desc')->take(8)->get();;
        // dd($productsRecommend);
        $value = Helper::getConfigValueFromSettingTable('config_key');
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $blog = Post::latest()->take(4)->get();
        // $categoryPostsLimit = CategoryPost::where('parent_id', 0)->get();
        $products = Product::latest()->take(8)->get(); //Giới hạn lấy 8 sản phẩm 
        return view('front-end.home', compact('sliders', 'categories', 'products', 'productsRecommend', 'value', 'categoriesLimit', 'meta_des', 'meta_keywords', 'blog', 'meta_title', 'url_canonical', 'currentPage'));
    }
    function getSearch(Request $request)
    {
        $currentPage = '';
        $sliders = Slider::latest()->get();
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get(); //lấy tất cả parent_id =0 là get , lấy 1 là firt
        $search = $request->input('search');
        $products = Product::where(function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
            if (is_numeric($request->search)) {
                $query->orWhere('price', '=', $request->search);
            }
        })->paginate(9);
        $posts = Post::where(function ($query) use ($request) {
            $query->where('post_title', 'like', '%' . $request->search . '%');
        })->paginate(9);
        // dd($products, $posts);
        return view('front-end.product.search.listProduct', compact('products', 'categories', 'categoriesLimit', 'posts', 'sliders', 'currentPage'));
    }
    //dang ky nhan tin
    function news_letter(Request $request)
    {
        $dataInsertInfo = [
            'email' => $request->email,
            'name' => $request->name,
        ];
        DB::table('news_letter')->insert($dataInsertInfo);
        return redirect()->route('home');
    }
}
