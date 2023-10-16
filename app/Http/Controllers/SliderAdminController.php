<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Menu;
use App\Models\Slider;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Exception;
use Faker\Extension\Extension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SliderAdminController extends Controller
{
    use DeleteModelTrait;
    use StorageImageTrait;
    private $slider; //thuộc phạm vi trong class
    public function __construct(Slider $slider) // Trong hàm khởi tạo này, $slider là một tham số. Nó là một instance của lớp Slider được truyền vào khi bạn tạo một đối tượng mới của lớp SliderAdminController. Tham số này chỉ có phạm vi trong hàm khởi tạo, nghĩa là bạn không thể truy cập nó bên ngoài hàm này.
    {
        $this->slider = $slider;
    }
    public function index()
    {
        $sliders = $this->slider->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.add');
    }
    public function store(SliderAddRequest $request)
    {
        try {

            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description,

            ];
            $dataImageSlider = $this->StorageTraitUpload($request, fieldName: 'image_path', folderName: 'slider');
            if (!empty($dataImageSlider)) {
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->create($dataInsert);
            return redirect()->route('slider.index');
        } catch (Exception $exception) {
            Log::error(message: 'Lỗi' . $exception->getMessage() . '-------line:' . $exception->getLine());
        }
    }
    public function edit($id)
    {
        $menuEditSlider = $this->slider->find($id);
        return view('admin.slider.edit', compact('menuEditSlider'));
    }
    public function update(Request $request, $id) // ở đây để Request bình thường, không nên để SliderAddRequest để tránh trường hợp validate j=khi mình chỉ muốn sửa 1 trường 
    {

        try {

            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,

            ];
            $dataImageSlider = $this->StorageTraitUpload($request, fieldName: 'image_path', folderName: 'slider');
            if (!empty($dataImageSlider)) {
                $dataUpdate['image_name'] = $dataImageSlider['file_name'];
                $dataUpdate['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->find($id)->update($dataUpdate);
            return redirect()->route('slider.index');
        } catch (Exception $exception) {
            Log::error(message: 'Lỗi' . $exception->getMessage() . '-------line:' . $exception->getLine());
        }
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->slider);
    }
}
//Trong hàm khởi tạo __construct(Slider $slider), giá trị của tham số $slider được gán cho thuộc tính private $slider của lớp. Do đó, 
// thuộc tính private $slider sẽ có giá trị của tham số $slider được truyền vào khi khởi tạo đối tượng mới của lớp SliderAdminController