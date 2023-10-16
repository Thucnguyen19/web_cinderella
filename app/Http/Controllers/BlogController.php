<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function show_blog()
    {
        $currentPage = '';
        $sliders = Slider::latest()->get();
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get(); //lấy tất cả parent_id =0 là get , lấy 1 là firt
        $blog = Post::paginate(9);
        return view('front-end.Blog.blog', compact('sliders', 'categoriesLimit', 'categories', 'currentPage', 'blog'));
    }
    public function blog_detail($slug, $id, Request $request)
    {
        $currentPage = '';
        $sliders = Slider::latest()->get();
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get(); //lấy tất cả parent_id =0 là get , lấy 1 là firt
        $post = Post::find($id);
        foreach ($post as $key => $value) {
            $category_post_id = $post->category_post_id;
        };
        // dd($post);
        // dd($category_by_id);

        //Seo
        if ($post) {
            $meta_des = $post->post_meta_des;
            $meta_keywords = $post->post_meta_keywords;
            $meta_title = $post->post_title;
            $url_canonical = $request->url();
        }
        //end-seo meta

        // dd($category_id);
        $related_post = DB::table('post')->distinct()->join('category_post', 'category_post.id', '=', 'post.category_post_id')->where('category_post_id', $category_post_id)->whereNotIn('post.id', [$id])->take(2)->get(); //WhereNotIn yêu cầu đối số truyền vào là 1 mảng ;
        return view('front-end.Blog.blog_detail', compact('sliders', 'categoriesLimit', 'categories', 'post', 'currentPage', 'meta_des', 'meta_keywords', 'related_post', 'meta_title', 'url_canonical'));
    }
}
