<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function roles()
    {
        return $this->belongsToMany(related: Role::class, table: 'role_user', foreignPivotKey: 'user_id', relatedPivotKey: 'role_id');
    }
    public function checkPermissionAccess($permissionCheck)
    {
        //user có quyền add, sửa dnah mục và xem menu 
        //b1: lấy đc tất cả các quyền của user đang login vào hệ thống 
        //b2:so sánh giá trị đưa vào của route hiện tại , xem có tồn tại trong các quyền mình lấy đc hay không 
        $roles = auth()->user()->roles; //lấy tất cả các vai trò của người dùng hiện tại và gán chúng vào biến $roles. Nếu người dùng chưa được xác thực, auth()->user() sẽ trả về null và code sẽ gây ra lỗi khi cố gắng truy cập roles từ null
        foreach ($roles as $role) {
            $permissions = $role->permissions;
            if ($permissions->contains('key_code', $permissionCheck)) {
                return true;
            }
        }
        return false;
    }
}
