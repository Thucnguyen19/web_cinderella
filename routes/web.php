<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/admin', 'App\Http\Controllers\AdminController@loginAdmin')->name('admin');
Route::post('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout', 'App\Http\Controllers\AdminController@logout')->name('logout-dashborad');
Route::post('/admin-dashboad', 'App\Http\Controllers\AdminController@dashboard')->name('admin-dashborad');


Route::get('/home', function () {
    return view('home');
});


Route::prefix('/admin')->group(function () {

    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'App\Http\Controllers\CategoryController@index', //để đường dẫn dầy đủ 
            'middleware' => 'can:category-list'
        ]); // định tuyến đến index và function indẽ trong CategoryController 
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'App\Http\Controllers\CategoryController@create', //để đường dẫn dầy đủ 
            'middleware' => 'can:category-add'

        ]);
        Route::get('/store', [
            'as' => 'categories.store', //them vao action trong form cua file add.blade.php
            'uses' => 'App\Http\Controllers\CategoryController@store' //để đường dẫn dầy đủ 
        ]);
        Route::get('/edit/{id}', [
            'as' => 'categories.edit', //gán vào thẻ a (nút edit) bên trang index 
            'uses' => 'App\Http\Controllers\CategoryController@edit', //để đường dẫn dầy đủ 
            'middleware' => 'can:category-edit'

        ]);
        Route::get('/update/{id}', [
            'as' => 'categories.update', //gán vào thẻ a (nút edit) bên trang index 
            'uses' => 'App\Http\Controllers\CategoryController@update' //để đường dẫn dầy đủ 

        ]);
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'App\Http\Controllers\CategoryController@delete', //để đường dẫn dầy đủ 
            'middleware' => 'can:category-delete'

        ]);
    });
    // File web.php chứa các định tuyến (route) cho ứng dụng Laravel của bạn. Các route này xác định cách ứng dụng xử lý các yêu cầu HTTP từ người dùng. Trong trường hợp này, route /create trong nhóm route có tiền tố categories sử dụng phương thức create() của class CategoryController để xử lý yêu cầu.
    // File CategoryController.php chứa định nghĩa của class CategoryController, bao gồm một phương thức create() trả về một view có tên là category.add. Phương thức này được gọi khi route /create trong nhóm route có tiền tố categories được truy cập.
    // File add.blade.php chứa định nghĩa của view category.add, được trả về bởi phương thức create() của class CategoryController. View này hiển thị nội dung HTML cho người dùng khi họ truy cập route /create trong nhóm route có tiền tố categories.
    //Thứ tự viết code : 
    // web.php -> CategoryController ->add.blade.php
    Route::prefix('category_post')->group(function () {
        Route::get('/index', [
            'as' => 'category_post.index',
            'uses' => 'App\Http\Controllers\CategoryPortController@index', //để đường dẫn dầy đủ 
            // 'middleware' => 'can:category-list'
        ]); // định tuyến đến index và function indẽ trong CategoryPost 
        Route::get('/create', [
            'as' => 'category_post.create',
            'uses' => 'App\Http\Controllers\CategoryPortController@create', //để đường dẫn dầy đủ 
            // 'middleware' => 'can:category-add'

        ]);
        Route::post('/store', [
            'as' => 'category_post.store', //them vao action trong form cua file add.blade.php
            'uses' => 'App\Http\Controllers\CategoryPortController@store' //để đường dẫn dầy đủ 
        ]);
        Route::get('/edit/{id}', [
            'as' => 'category_post.edit', //gán vào thẻ a (nút edit) bên trang index 
            'uses' => 'App\Http\Controllers\CategoryPortController@edit', //để đường dẫn dầy đủ 
            // 'middleware' => 'can:category-edit'

        ]);
        Route::get('/update/{id}', [
            'as' => 'category_post.update', //gán vào thẻ a (nút edit) bên trang index 
            'uses' => 'App\Http\Controllers\CategoryPortController@update' //để đường dẫn dầy đủ 

        ]);
        Route::get('/delete/{id}', [
            'as' => 'category_post.delete',
            'uses' => 'App\Http\Controllers\CategoryPortController@delete', //để đường dẫn dầy đủ 
            // 'middleware' => 'can:category-delete'

        ]);
    });
    Route::prefix('post')->group(function () {
        Route::get('/', [
            'as' => 'post.index',
            'uses' => 'App\Http\Controllers\PostController@index', //để đường dẫn dầy đủ 
            // 'middleware' => 'can:post-list'

        ]); // định tuyến đến index và function indẽ trong CategoryController 
        Route::get('/create', [
            'as' => 'post.create',
            'uses' => 'App\Http\Controllers\PostController@create', //để đường dẫn dầy đủ 
            // 'middleware' => 'can:post-add'

        ]);
        Route::post('/store', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'post.store',
            'uses' => 'App\Http\Controllers\PostController@store', //để đường dẫn dầy đủ 
        ]);
        Route::get('/edit/{id}', [
            'as' => 'post.edit',
            'uses' => 'App\Http\Controllers\PostController@edit', //để đường dẫn dầy đủ 
            // 'middleware' => 'can:post-edit'

        ]);
        Route::post('/update/{id}', [
            'as' => 'post.update',
            'uses' => 'App\Http\Controllers\PostController@update', //để đường dẫn dầy đủ 
        ]);
        Route::get('/delete/{id}', [
            'as' => 'post.delete',
            'uses' => 'App\Http\Controllers\PostController@delete', //để đường dẫn dầy đủ 
            // 'middleware' => 'can:post-delete'

        ]);
    });
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'App\Http\Controllers\MenuController@index', //để đường dẫn dầy đủ 
            'middleware' => 'can:menu-list'

        ]); // định tuyến đến index và function indẽ trong CategoryController 
        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'App\Http\Controllers\MenuController@create', //để đường dẫn dầy đủ 
            'middleware' => 'can:menu-add'

        ]);
        Route::get('/store', [
            'as' => 'menus.store', //them vao action trong form cua file add.blade.php
            'uses' => 'App\Http\Controllers\MenuController@store', //để đường dẫn dầy đủ 
        ]);
        Route::get('/edit/{id}', [
            'as' => 'menus.edit', //gán vào thẻ a (nút edit) bên trang index 
            'uses' => 'App\Http\Controllers\MenuController@edit', //để đường dẫn dầy đủ 
            'middleware' => 'can:menu-edit'

        ]);
        Route::get('/update/{id}', [
            'as' => 'menus.update', //gán vào thẻ a (nút edit) bên trang index 
            'uses' => 'App\Http\Controllers\MenuController@update', //để đường dẫn dầy đủ 
        ]);
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'App\Http\Controllers\MenuController@delete', //để đường dẫn dầy đủ 
            'middleware' => 'can:menu-delete'

        ]);
    });
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'App\Http\Controllers\AdminProductController@index', //để đường dẫn dầy đủ 
            'middleware' => 'can:product-list'

        ]); // định tuyến đến index và function indẽ trong CategoryController 
        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'App\Http\Controllers\AdminProductController@create', //để đường dẫn dầy đủ 
            'middleware' => 'can:product-add'

        ]);
        Route::post('/store', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'product.store',
            'uses' => 'App\Http\Controllers\AdminProductController@store', //để đường dẫn dầy đủ 
        ]);
        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'App\Http\Controllers\AdminProductController@edit', //để đường dẫn dầy đủ 
            // 'middleware' => 'can:product-edit,id'
            'middleware' => 'can:product-edit'

        ]);
        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'App\Http\Controllers\AdminProductController@update', //để đường dẫn dầy đủ 
        ]);
        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'App\Http\Controllers\AdminProductController@delete', //để đường dẫn dầy đủ 
            'middleware' => 'can:product-delete'

        ]);
    });
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'App\Http\Controllers\SliderAdminController@index', //để đường dẫn dầy đủ 
            'middleware' => 'can:slider-list'

        ]); // định tuyến đến index và function indẽ trong CategoryController 
        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'App\Http\Controllers\SliderAdminController@create', //để đường dẫn dầy đủ 
            'middleware' => 'can:slider-add'

        ]);
        Route::post('/store', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'slider.store',
            'uses' => 'App\Http\Controllers\SliderAdminController@store', //để đường dẫn dầy đủ 
        ]);
        Route::get('/edit/{id}', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'slider.edit',
            'uses' => 'App\Http\Controllers\SliderAdminController@edit', //để đường dẫn dầy đủ 
            'middleware' => 'can:slider-edit'

        ]);
        Route::post('/update/{id}', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'slider.update',
            'uses' => 'App\Http\Controllers\SliderAdminController@update', //để đường dẫn dầy đủ 
        ]);
        Route::get('/delete/{id}', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'slider.delete',
            'uses' => 'App\Http\Controllers\SliderAdminController@delete', //để đường dẫn dầy đủ 
            'middleware' => 'can:slider-delete'

        ]);
    });
    Route::prefix('settings')->group(function () {
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'App\Http\Controllers\SettingAdminController@index', //để đường dẫn dầy đủ 
            'middleware' => 'can:setting-list'

        ]); // định tuyến đến index và function indẽ trong CategoryController 
        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'App\Http\Controllers\SettingAdminController@create', //để đường dẫn dầy đủ 
            'middleware' => 'can:setting-add'

        ]);
        Route::post('/store', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'settings.store',
            'uses' => 'App\Http\Controllers\SettingAdminController@store', //để đường dẫn dầy đủ 
        ]);
        Route::get('/edit/{id}', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'settings.edit',
            'uses' => 'App\Http\Controllers\SettingAdminController@edit', //để đường dẫn dầy đủ 
            'middleware' => 'can:setting-edit'

        ]);
        Route::post('/update/{id}', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'settings.update',
            'uses' => 'App\Http\Controllers\SettingAdminController@update', //để đường dẫn dầy đủ 
        ]);
        Route::get('/delete/{id}', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'settings.delete',
            'uses' => 'App\Http\Controllers\SettingAdminController@delete', //để đường dẫn dầy đủ 
            'middleware' => 'can:setting-delete'

        ]);
    });
    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'App\Http\Controllers\AdminUserController@index', //để đường dẫn dầy đủ 
            'middleware' => 'can:user-list'

        ]); // định tuyến đến index và function indẽ trong CategoryController 
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'App\Http\Controllers\AdminUserController@create', //để đường dẫn dầy đủ 
            'middleware' => 'can:user-add'

        ]);
        Route::post('/store', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'users.store',
            'uses' => 'App\Http\Controllers\AdminUserController@store', //để đường dẫn dầy đủ 

        ]);
        Route::get('/edit/{id}', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'users.edit',
            'uses' => 'App\Http\Controllers\AdminUserController@edit', //để đường dẫn dầy đủ 
            'middleware' => 'can:user-edit'

        ]);
        Route::post('/update/{id}', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'users.update',
            'uses' => 'App\Http\Controllers\AdminUserController@update', //để đường dẫn dầy đủ 
        ]);
        Route::get('/delete/{id}', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'users.delete',
            'uses' => 'App\Http\Controllers\AdminUserController@delete', //để đường dẫn dầy đủ 
            'middleware' => 'can:user-delete'

        ]);
    });
    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'App\Http\Controllers\AdminRoleController@index', //để đường dẫn dầy đủ 
            'middleware' => 'can:user-list'

        ]); // định tuyến đến index và function indẽ trong CategoryController 
        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'App\Http\Controllers\AdminRoleController@create', //để đường dẫn dầy đủ 
            'middleware' => 'can:user-add'

        ]);
        Route::post('/store', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'roles.store',
            'uses' => 'App\Http\Controllers\AdminRoleController@store', //để đường dẫn dầy đủ 
        ]);
        Route::get('/edit/{id}', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'roles.edit',
            'uses' => 'App\Http\Controllers\AdminRoleController@edit', //để đường dẫn dầy đủ 
            'middleware' => 'can:user-edit'

        ]);
        Route::post('/update/{id}', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'roles.update',
            'uses' => 'App\Http\Controllers\AdminRoleController@update', //để đường dẫn dầy đủ 
        ]);
        Route::get('/delete/{id}', [
            //bắt buộc form phải dùng method="post" để lưu trữ ảnh 
            'as' => 'roles.delete',
            'uses' => 'App\Http\Controllers\AdminRoleController@delete', //để đường dẫn dầy đủ 
            'middleware' => 'can:user-delete'

        ]);
    });
    Route::prefix('permissions')->group(function () {

        Route::get('/create', [
            'as' => 'permissions.create',
            'uses' => 'App\Http\Controllers\AdminPermissionsController@createPermissions', //để đường dẫn dầy đủ 
            'middleware' => 'can:permissions-add'

        ]);
        Route::post('/store', [
            'as' => 'permissions.strore',
            'uses' => 'App\Http\Controllers\AdminPermissionsController@store', //để đường dẫn dầy đủ 
        ]);
    });
    Route::prefix('manage-order')->group(function () {

        Route::get('/manage-order', [
            'as' => 'manage-order',
            'uses' => 'App\Http\Controllers\CheckountController@manage_order', //để đường dẫn dầy đủ 
            // 'middleware' => 'can:permissions-add'
        ]);
        Route::get('/view-order/{order_id}', [
            'as' => 'view-order',
            'uses' => 'App\Http\Controllers\CheckountController@view_order', //để đường dẫn dầy đủ 
            // 'middleware' => 'can:permissions-add'
        ]);
        Route::get('/delete-order', [
            'as' => 'delete-order',
            'uses' => 'App\Http\Controllers\CheckountController@delete_order', //để đường dẫn dầy đủ 
            // 'middleware' => 'can:permissions-add'
        ]);
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//  Front-end 
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
// Route::get('/', [HomeController::class, 'about']);
Route::get('/category/{slug}/{id}', [
    'as' => 'category.product',
    'uses' => 'App\Http\Controllers\FrontEndCategoryController@index'
]);
Route::get('search', [
    'as' => 'search',
    'uses' => 'App\Http\Controllers\HomeController@getSearch'
]);
//Front-end product detail
Route::get('/chi-tiet-san-pham/{id}', [
    'as' => 'product_detail',
    'uses' => 'App\Http\Controllers\FrontendCategoryController@product_detail'
]);
//front-end rating for product 
Route::post('/chi-tiet-san-pham/{id}', 'App\Http\Controllers\FrontendCategoryController@review_product')->name('review_product');
// Cart 
Route::post('/save-cart', [
    'as' => 'save-cart',
    'uses' => 'App\Http\Controllers\CartController@save_cart'
]);
Route::get('/show-cart', [
    'as' => 'show-cart',
    'uses' => 'App\Http\Controllers\CartController@show_cart'
]);
Route::get('/delete-to-cart/{rowId}', [
    'as' => 'delete-cart',
    'uses' => 'App\Http\Controllers\CartController@delete_cart'
]);
Route::get('/update-to-cart/{rowId}', [
    'as' => 'update-cart',
    'uses' => 'App\Http\Controllers\CartController@update_cart',
]);

//Checkout 
Route::get('/login-checkout', [
    'as' => 'login-checkout',
    'uses' => 'App\Http\Controllers\CheckountController@login_checkout'
]);
Route::get('/logout-checkout', [
    'as' => 'logout-checkout',
    'uses' => 'App\Http\Controllers\CheckountController@logout_checkout'
]);
//Create Login/SignUp Customer 
Route::post('/add-customer', [
    'as' => 'add_customer',
    'uses' => 'App\Http\Controllers\CheckountController@add_customer'
]);
Route::post('/login-customer', [
    'as' => 'login_customer',
    'uses' => 'App\Http\Controllers\CheckountController@login_customer'
]);

Route::get('/checkout', [
    'as' => 'checkout',
    'uses' => 'App\Http\Controllers\CheckountController@checkout'
]);
Route::get('/checkout-saved/{shipping_id}', [
    'as' => 'checkout-saved',
    'uses' => 'App\Http\Controllers\CheckountController@checkout_saved'
]);
Route::post('/checkout-saved/update/{shipping_id}', [
    'as' => 'checkout-saved.update',
    'uses' => 'App\Http\Controllers\CheckountController@checkout_saved_update'
]);

Route::post('/save-checkout-shipping', [
    'as' => 'save-checkout-shipping',
    'uses' => 'App\Http\Controllers\CheckountController@save_checkout'
]);

Route::get('/payment', [
    'as' => 'payment',
    'uses' => 'App\Http\Controllers\CheckountController@payment'
]);

Route::get('/order-place', [
    'as' => 'order-place',
    'uses' => 'App\Http\Controllers\CheckountController@order_place'
]);
//create send mail 

Route::get('/send-mail', [
    'as' => 'send-mail',
    'uses' => 'App\Http\Controllers\MailController@send_mail'
]);
//Login google 
Route::get('/login-google', [
    'as' => 'login-google',
    'uses' =>  'App\Http\Controllers\AdminController@login_google'
]);
Route::get('/google/callback', [
    'as' => 'googleCallback',
    'uses' =>  'App\Http\Controllers\AdminController@call_google'
]);
//Frond-end Blog 
Route::get('/blog', [
    'as' => 'show_blog',
    'uses' =>  'App\Http\Controllers\BlogController@show_blog'
]);
Route::get('/blog/{slug}/{id}', [
    'as' => 'blog_detail',
    'uses' =>  'App\Http\Controllers\BlogController@blog_detail'
]);
//front-end Contact 
Route::get('/contact', 'App\Http\Controllers\ContactController@show_contact')->name('show_contact');
Route::post('/contact', 'App\Http\Controllers\ContactController@send_contact')->name('send_contact');
// Dang ky nhan tin 
Route::post('/news-letter', 'App\Http\Controllers\HomeController@news_letter')->name('news-letter');
//lay tat ca san pham 
Route::get('/all-products', 'App\Http\Controllers\FrontEndCategoryController@all_product')->name('all-products');
