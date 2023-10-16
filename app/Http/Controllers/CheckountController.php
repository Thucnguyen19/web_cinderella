<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CheckountController extends Controller
{

    public function AuthLogin()
    {
        $admin_id = Session::get('id');
        if ($admin_id) {
            return  redirect()->route('dashboard');
        } else {
            return  redirect()->route('admin')->send();
        }
    }
    public function login_checkout()
    {
        $this->AuthLogin();
        $currentPage = '';
        $sliders = Slider::latest()->get();
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get(); //lấy tất cả parent_id =0 là get , lấy 1 là firt
        return view('front-end.product.checkout.login_checkout', compact('categoriesLimit', 'categories', 'currentPage', 'sliders'));
    }
    public function add_customer(Request $request)
    {
        $data = array();

        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_password'] = Hash::make($request->customer_password);    //mã hóa Mật khẩu
        $insert_customerId = DB::table('customer')->insertGetId($data);
        Session::put('customer_id', $insert_customerId);
        Session::put('customer_name', $request->customer_name);
        return redirect()->route('checkout');
    }
    function checkout()
    {
        $currentPage = '';
        $sliders = Slider::latest()->get();
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get(); //lấy tất cả parent_id =0 là get , lấy 1 là firt
        return view('front-end.product.checkout.checkout', compact('categoriesLimit', 'currentPage', 'categories', 'sliders'));
    }
    function checkout_saved($shipping_id)
    {
        $currentPage = '';
        $sliders = Slider::latest()->get();
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get(); //lấy tất cả parent_id =0 là get , lấy 1 là firt
        $shipping_info = DB::table('shipping')->where('shipping_id', $shipping_id)->first();
        // dd($data_shippings);
        return view('front-end.product.checkout.checkout_saved', compact('categoriesLimit', 'categories', 'currentPage', 'sliders', 'shipping_info'));
    }
    function checkout_saved_update(Request $request, $shipping_id)
    {

        $data = array();

        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_note'] = $request->shipping_note;
        $data['shipping_phone'] = $request->shipping_phone;

        // Cập nhật thông tin vận chuyển trong cơ sở dữ liệu
        DB::table('shipping')->where('shipping_id', $shipping_id)->update($data);

        return redirect()->route('payment');
    }




    public function save_checkout(Request $request)
    {
        $data = array();

        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_note'] = $request->shipping_note;
        $data['shipping_phone'] = $request->shipping_phone;
        $insert_shippingId = DB::table('shipping')->insertGetId($data);

        // Lưu shipping_id vào tài khoản khách hàng
        DB::table('customer')->where('id', Session::get('customer_id'))->update(['shipping_id' => $insert_shippingId]);


        return redirect()->route('payment');
    }
    public function payment()
    {
        $currentPage = '';
        $sliders = Slider::latest()->get();
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get(); //lấy tất cả parent_id =0 là get , lấy 1 là firt
        return view('front-end.product.checkout.payment', compact('categoriesLimit', 'currentPage', 'categories', 'sliders'));
    }
    function order_place(Request $request)
    {
        $currentPage = '';
        $sliders = Slider::latest()->get();
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $categories = Category::where('parent_id', 0)->get(); //lấy tất cả parent_id =0 là get , lấy 1 là firt
        //insert payment method 
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang Xử lý';
        $payment_id = DB::table('payment')->insertGetId($data);
        $shipping_id = DB::table('customer')->where('id', Session::get('customer_id'))->value('shipping_id');


        // return redirect()->route('payment');
        //insert order 
        $data_order = array();
        $data_order['customer_id'] = Session::get('customer_id');
        $data_order['shipping_id'] = $shipping_id;
        // dd($data_order['customer_id']);

        $data_order['payment_id'] = $payment_id;
        $data_order['order_total'] = CartFacade::getTotal();
        $data_order['order_status'] = 'Đang Xử lý';
        $order_id = DB::table('order')->insertGetId($data_order);

        //insert order details
        $content = CartFacade::getContent();
        foreach ($content as $value) {
            $data_order_detail = array();
            $data_order_detail['order_id'] = $order_id;
            $data_order_detail['product_id'] = $value->id;
            $data_order_detail['product_name'] = $value->name;
            $data_order_detail['product_price'] = $value->price;
            $data_order_detail['product_sales_quantity'] = $value->quantity;
            $order_id = DB::table('order_details')->insert($data_order_detail);
        }
        if ($data['payment_method'] == 1) {
            echo 'Thanh Toán Bằng Momo';
        } elseif ($data['payment_method'] == 2) {
            // CartFacade::remove();
            CartFacade::clear();
            return view('front-end.product.checkout.handcash', compact('categoriesLimit', 'currentPage', 'categories', 'sliders'));
        } else {
            echo 'Chuyen Khoan';
        }

        // return redirect()->route('payment');
    }
    function logout_checkout()
    {
        Session::flush();
        return redirect()->route('login-checkout');
    }
    function login_customer(Request $request)
    {
        $email = $request->customer_email;
        $password = $request->customer_password;

        $user = DB::table('customer')->where('customer_email', $email)->first();

        if ($user && Hash::check($password, $user->customer_password)) {
            Session::put('customer_id', $user->id);
            return redirect()->route('show-cart');
        } else {
            // Xử lý trường hợp đăng nhập không thành công
        }
    }
    function manage_order()
    {
        $this->AuthLogin();
        $all_order = DB::table('order')->join('customer', 'order.customer_id', '=', 'customer.id')->select('order.*', 'customer.customer_name')->orderby('order.id', 'desc')->paginate(5);
        return view('admin.manage-order.manage_order', compact('all_order'));
    }
    function view_order($order_id)
    {

        $orderById = DB::table('order')->join('customer', 'order.customer_id', '=', 'customer.id')->join('shipping', 'shipping.shipping_id', '=', 'order.shipping_id')->join('order_details', 'order_details.order_id', '=', 'order.id')
            ->select('order.*', 'customer.*', 'shipping.*', 'order_details.*')->orderby('order.id', 'desc')->first();
        // dd($orderById);
        return view('admin.manage-order.view_order', compact('orderById'));
    }
}
// Dòng lệnh Session::put('customer_id', $insert_customer); sẽ lưu giá trị của biến $insert_customer vào session với key là customer_id. Giá trị này có thể là một số nguyên, chuỗi, mảng, đối tượng, v.v., tùy thuộc vào loại dữ liệu của $insert_customer.

// Dòng lệnh Session::put('customer_id', $insert_customer['customer_name']); sẽ lưu giá trị của phần tử customer_name từ mảng $insert_customer vào session với key là customer_id. Điều này giả định rằng $insert_customer là một mảng và có phần tử customer_name.

// Trong cả hai trường hợp, bạn có thể truy xuất giá trị đã lưu trong session sau này bằng cách sử dụng Session::get('customer_id');.

// Tuy nhiên, bạn nên chú ý rằng nếu bạn sử dụng cùng một key (customer_id) cho cả hai lệnh Session::put, giá trị sau cùng sẽ ghi đè lên giá trị trước đó trong session. Nếu bạn muốn lưu cả hai giá trị, bạn nên sử dụng hai key khác nhau.
