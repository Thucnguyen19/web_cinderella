<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     * 
     */

    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        return  $user->checkPermissionAccess(config('permissions.access.list-product'));
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return  $user->checkPermissionAccess(config('permissions.access.add-product'));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        return  $user->checkPermissionAccess(config('permissions.access.edit-product'));

        // // Tìm sản phẩm với id được cung cấp. Nếu không tìm thấy, trả về false.
        // $product = Product::find($id);
        // if ($product === null) {
        //     return false;
        // }

        // // Kiểm tra xem người dùng hiện tại có quyền chỉnh sửa sản phẩm và có phải là người đã tạo ra sản phẩm không.
        // if ($user->checkPermissionAccess(config('permissions.access.edit-product')) && (int)$user->id === (int)$product->user_id) {
        //     return true;
        // }

        // return false;

        // Kiểm tra xem người dùng hiện tại có quyền chỉnh sửa sản phẩm và có phải là người đã tạo ra sản phẩm không.

    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        return  $user->checkPermissionAccess(config('permissions.access.delete-product'));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product)
    {
        //
    }
}
