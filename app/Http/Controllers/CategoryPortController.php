<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Components\Recuise;

class CategoryPortController extends Controller
{
    private $category_post;
    public function __construct(CategoryPost $category_post)
    {

        $this->category_post = $category_post;
    }
    public function AuthLogin()
    {
        $admin_id = Session::get('id');
        if ($admin_id) {
            return  redirect()->route('dashboard');
        } else {
            return  redirect()->route('admin')->send();
        }
    }

    public function create()
    {
        $this->AuthLogin();
        //lay ra tat ca du lieu 
        $htmlOption = $this->getCategoryPost($parentId = '');
        return view('admin.category_post.add_category', compact('htmlOption')); //tiep tuc sang trang add.blade.php 
    }

    public function index()
    {
        $this->AuthLogin();
        // dd('this is index');
        $category_posts = $this->category_post->latest()->paginate(5); //đoạn code này lấy ra 5 bản ghi mới nhất từ đối tượng category và lưu chúng vào biến $category
        return view('admin.category_post.index_category', compact('category_posts'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $this->category_post->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
            'meta_des' => $request->description,
            'meta_keywords' => $request->keywords,
        ]);
        return redirect()->route(route: 'category_post.index'); //sau khi insert xong thì chuyển hướng sang file index 
    }
    public function getCategoryPost($parentId)
    {
        $data = $this->category_post->all();
        $recuise = new Recuise($data);

        $htmlOption = $recuise->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function edit($id)
    {
        $this->AuthLogin();
        $category_posts = $this->category_post->find($id);
        $htmlOption = $this->getCategoryPost($category_posts->parent_id);
        return view('admin.category_post.edit_category', compact('category_posts', 'htmlOption'));
    }
    public function update($id, Request $request)
    {
        $this->category_post->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
            'meta_des' => $request->description,
            'meta_keywords' => $request->keywords,
        ]);
        return redirect()->route(route: 'category_post.index'); //sau khi insert xong thì chuyển hướng sang file index 

    }
    public function delete($id)
    {
        $this->category_post->find($id)->delete();
        return redirect()->route(route: 'category_post.index');
    }
}
