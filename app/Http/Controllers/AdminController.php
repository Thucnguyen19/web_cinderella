<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

session_start();

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('id');
        if ($admin_id) {
            return  redirect()->route('dashboard');
        } else {
            return  redirect()->route('admin')->send();
        }
        //    Phương thức AuthLogin() được gọi.
        // Trong phương thức này, nó lấy id từ phiên hiện tại thông qua Session::get('id') và gán cho biến $admin_id.
        // Nếu $admin_id tồn tại (có nghĩa là người dùng hiện tại đã đăng nhập), nó sẽ chuyển hướng người dùng đến trang ‘dashboard’ thông qua redirect()->route('dashboard').
        // Nếu $admin_id không tồn tại (người dùng chưa đăng nhập), nó sẽ chuyển hướng người dùng đến trang ‘admin’ thông qua redirect()->route('admin')->send().
    }
    public function loginAdmin()
    {
        return view('login');
    }
    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->email;
        $admin_password = $request->password;
        if (Auth::attempt(['email' => $admin_email, 'password' => $admin_password])) {
            Session::put('name', Auth::user()->name);
            Session::put('id', Auth::user()->id);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Tài khoản hoặc mật khẩu không đúng');
            return Redirect::to('/admin');
        }
    }
    public function logout()
    {
        $this->AuthLogin();
        Auth::logout();
        return Redirect::to('/admin');
    }
    public function login_google()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback_google()
    {
        $users = Socialite::driver('google')->stateless()->user();
        // return $users->id;
        $authUser = $this->findOrCreateUser($users, 'google');
        $account_name = Login::where('admin_id', $authUser->user)->first();
        Session::put('admin_login', $account_name->admin_name);
        Session::put('admin_id', $account_name->admin_id);
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
    }
    public function findOrCreateUser($users, $provider)
    {
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if ($authUser) {

            return $authUser;
        }

        $hieu = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)

        ]);

        $orang = Login::where('admin_email', $users->email)->first();

        if (!$orang) {
            $orang = Login::create([
                'admin_name' => $users->name,
                'admin_email' => $users->email,
                'admin_password' => '',

                'admin_phone' => '',
                'admin_status' => 1
            ]);
        }
        $hieu->login()->associate($orang);
        $hieu->save();

        $account_name = Login::where('admin_id', $authUser->user)->first();
        Session::put('admin_login', $account_name->admin_name);
        Session::put('admin_id', $account_name->admin_id);
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
    }
}
