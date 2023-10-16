<?php

namespace App\Components;

use App\Models\Menu;

class MenuRecuise
{
    private $html;
    public function __construct()
    {
        $this->html = '';
    }
    public function menuRecuiseAdd($parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            $this->html .= '<option value="' . $dataItem->id . '">' . $subMark . $dataItem->name . '</option>';
            $this->menuRecuiseAdd($dataItem->id, subMark: $subMark . '--');
        }
        return $this->html;
    }
    public function menuRecuiseEdit($parentIdMenuEdit, $parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            if ($parentIdMenuEdit == $dataItem->id) {
                $this->html .= '<option selected value="' . $dataItem->id . '">' . $subMark . $dataItem->name . '</option>';
            } else {
                $this->html .= '<option value="' . $dataItem->id . '">' . $subMark . $dataItem->name . '</option>';
            }
            // $this->html .= '<option value="' . $dataItem->id . '">' . $subMark . $dataItem->name . '</option>';
            $this->menuRecuiseEdit($parentIdMenuEdit, $dataItem->id, $subMark . '--');
        }
        return $this->html;
    }
}
// $data = Menu::where('parent_id', $parentId)->get(); là một đoạn code PHP sử dụng Eloquent ORM của Laravel. Đoạn code này truy vấn cơ sở dữ liệu để lấy ra tất cả các bản ghi từ bảng menus có cột parent_id bằng với giá trị của biến $parentId. Kết quả truy vấn được lưu vào biến $data dưới dạng một collection của các đối tượng Menu.
// Cụ thể hơn, đoạn code này thực hiện các thao tác sau:
// Gọi phương thức tĩnh where trên lớp Menu với hai tham số là 'parent_id' và $parentId. Phương thức này tạo ra một truy vấn Eloquent mới để lọc các bản ghi có cột parent_id bằng với giá trị của biến $parentId.
// Gọi phương thức get trên đối tượng truy vấn được trả về từ phương thức where. Phương thức này thực thi truy vấn và trả về kết quả dưới dạng một collection của các đối tượng Menu.
// Gán kết quả truy vấn vào biến $data.

//-----Giải thích đệ quy
// định nghĩa một phương thức menuRecuiseAdd với hai tham số đầu vào là $parentId và $subMark. Tham số $parentId có giá trị mặc định là 0, còn tham số $subMark có giá trị mặc định là một chuỗi rỗng.
// Phương thức này thực hiện các thao tác sau:
// Truy vấn cơ sở dữ liệu để lấy ra tất cả các bản ghi từ bảng menus có cột parent_id bằng với giá trị của biến $parentId. Kết quả truy vấn được lưu vào biến $data dưới dạng một collection của các đối tượng Menu.
// Duyệt qua từng phần tử trong collection $data và thực hiện các thao tác sau:
// Nối chuỗi HTML của một thẻ option vào thuộc tính html của đối tượng hiện tại ($this). Giá trị của thuộc tính value của thẻ option được gán bằng giá trị của thuộc tính id của đối tượng $dataItem, còn nội dung hiển thị của thẻ option được gán bằng giá trị của biến $subMark nối với giá trị của thuộc tính name của đối tượng $dataItem.
// Gọi đệ quy phương thức menuRecuiseAdd với giá trị của tham số $parentId được gán bằng giá trị của thuộc tính id của đối tượng $dataItem, và giá trị của tham số $subMark được gán bằng giá trị hiện tại của biến $subMark nối với chuỗi '--'.
// Trả về giá trị của thuộc tính html của đối tượng hiện tại ($this) sau khi đã được cập nhật.
// Nói cách khác, phương thức này sử dụng đệ quy để duyệt qua cây menu và tạo ra một chuỗi HTML chứa các thẻ option để hiển thị danh sách menu dưới dạng một danh sách xổ xuống (dropdown list). Giá trị của thuộc tính value của mỗi thẻ option chính là ID của menu tương ứng, còn nội dung hiển thị của mỗi thẻ option chính là tên của menu đó, được thụt vào bởi các ký tự '--' để phân biệt các cấp menu.
