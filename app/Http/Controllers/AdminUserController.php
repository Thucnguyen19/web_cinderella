<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index()
    {
        $users = $this->user->paginate(10);
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }
    public function store(UserAddRequest $request)
    {
        DB::beginTransaction(); //khởi tạo một giao dịch bằng cách bắt đầu một khối giao dịch 
        try {
            $user = $this->user->create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password), //mã hóa Mật khẩu  
                ]
            );
            $user->roles()->attach($request->role_id);
            DB::commit(); // Nếu thao tác trong khối try thành công thì DB::commit() sẽ được gọi 

        } catch (Exception $exception) {
            DB::rollBack();
            Log::error(message: 'Message' . $exception->getMessage() . '----line:' . $exception->getLine());
        }
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $roles = $this->role->all();
        $users = $this->user->find($id);
        $roleOfUser = $users->roles;
        // dd($roleOfUser);
        return view('admin.user.edit', compact('users', 'roles', 'roleOfUser'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // DB::beginTransaction(); //khởi tạo một giao dịch bằng cách bắt đầu một khối giao dịch 
        // try {

        $this->user->find($id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password), //mã hóa Mật khẩu  
            ]
        );
        $user = $this->user->find($id);

        $user->roles()->sync($request->role_id);
        DB::commit(); // Nếu thao tác trong khối try thành công thì DB::commit() sẽ được gọi 

        // } catch (Exception $exception) {
        //     DB::rollBack();
        //     Log::error(message: 'Message' . $exception->getMessage() . '----line:' . $exception->getLine());
        // }
        return redirect()->route('users.index');
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }
}
