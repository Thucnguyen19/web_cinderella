<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recuise;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {

        $this->category = $category;
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
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.category.add', compact('htmlOption')); //tiep tuc sang trang add.blade.php 
    }

    public function index()
    {
        $this->AuthLogin();
        $categories = $this->category->latest()->paginate(5); //đoạn code này lấy ra 5 bản ghi mới nhất từ đối tượng category và lưu chúng vào biến $category
        return view('admin.category.index', compact('categories'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
            'meta_des' => $request->description,
            'meta_keywords' => $request->keywords,
        ]);
        return redirect()->route(route: 'categories.index'); //sau khi insert xong thì chuyển hướng sang file index 
    }
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recuise = new Recuise($data);

        $htmlOption = $recuise->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function edit($id)
    {
        $this->AuthLogin();
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOption'));
    }
    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
            'meta_des' => $request->description,
            'meta_keywords' => $request->keywords,
        ]);
        return redirect()->route(route: 'categories.index'); //sau khi insert xong thì chuyển hướng sang file index 

    }
    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route(route: 'categories.index');
    }
}
      // foreach ($data as $value) {
        //     if ($value['parent_id'] == 0) {
        //         echo "<option>" . $value['name'] . "</option>" . "<br>";
        //         foreach ($data as $value2) {
        //             if ($value2['parent_id'] == $value['id']) {
        //                 echo "<option>" . $value2['name'] . "</option>" . "<br>";
        //                 foreach ($data as $value3) {
        //                     if ($value3['parent_id'] == $value2['id']) {
        //                         echo "<option>" . $value3['name'] . "</option>" . "<br>";
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
// Vòng lặp foreach đầu tiên duyệt qua tất cả các bản ghi trong $data để tìm các danh mục gốc (có parent_id bằng 0) và in ra tên của chúng. Vòng lặp foreach thứ hai được thực hiện trong mỗi lần lặp của vòng lặp đầu tiên, nó cũng duyệt qua tất cả các bản ghi trong $data để tìm các danh mục con (có parent_id bằng ID của danh mục gốc) và in ra tên của chúng. Vòng lặp foreach thứ ba được thực hiện trong mỗi lần lặp của vòng lặp thứ hai, nó cũng duyệt qua tất cả các bản ghi trong $data để tìm các danh mục con cấp 2 (có parent_id bằng ID của danh mục con) và in ra tên của chúng.