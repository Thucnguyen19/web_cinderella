<?php

namespace App\Http\Controllers;

use App\Components\MenuRecuise;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class MenuController extends Controller
{
    private $menuRecuise;
    private $menu;
    public function __construct(MenuRecuise $menuRecuise, Menu $menu)
    {
        $this->menuRecuise = $menuRecuise;
        $this->menu = $menu;
    }
    public function index()
    {

        // dd('list view');
        $menus = $this->menu->paginate(10);
        return view('admin.menus.index', compact('menus'));
    }
    public function create()
    {
        $optionSelect = $this->menuRecuise->menuRecuiseAdd();

        return view('admin.menus.add', compact('optionSelect'));
    }
    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)

        ]);
        return redirect()->route('menus.index');
    }
    public function edit($id, Request $request)
    {
        $menuFollowIdEdit = $this->menu->find($id);
        $optionSelect = $this->menuRecuise->menuRecuiseEdit($menuFollowIdEdit->parent_id);
        return view('admin.menus.edit', compact('optionSelect', 'menuFollowIdEdit'));
    }
    public function update($id, Request $request)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }
    public function delete($id)
    {
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
// dc tao tu cau lenh php artisan make:controller MenuController 