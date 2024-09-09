<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('redirect', [AuthController::class, 'check_login'])->name('check_login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(\App\Http\Controllers\FrontendController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');    Route::get('/about', 'about')->name('about');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/models', 'models')->name('models');
    Route::get('/model/detail', 'model_detail')->name('model.detail');
});


Route::middleware('auth')->group(function () {

    Route::controller(\App\Http\Controllers\AdminController::class)->group(function () {
//        Route::get('admin/dashboard', 'admin_dashboard')->name('dashboard');
        Route::get('admin/user/view', 'admin_add_user_view')->name('admin.add.user.view');
        Route::get('admin/user/edit/{id}', 'admin_user_edit')->name('admin.user.edit');
        Route::post('admin/add/user/save', 'admin_add_user_save')->name('admin.add.user.save');
        Route::post('admin/user/update/{id}', 'admin_user_update')->name('admin.user.update');
        Route::get('admin/user/all', 'admin_user_all')->name('admin.user.all');
        Route::post('admin/user/delete/{id}', 'admin_user_delete')->name('admin.user.delete');
        Route::post('admin/user/visibility/{id}', 'admin_user_visibility')->name('admin.user.visibility');
        Route::post('admin/member/block/{id}', 'admin_member_block')->name('admin.member.block');
        Route::post('admin/member/password/{id}', 'admin_member_password_change')->name('admin.member.password.change');

        Route::get('admin/plan/view', 'admin_plan_view')->name('admin.plan.view');
        Route::post('admin/add/plan/save', 'admin_add_plan_save')->name('admin.add.plan');
        Route::post('admin/plan/update/{id}', 'admin_plan_update')->name('admin.plan.update');
        Route::post('admin/plan/delete/{id}', 'admin_plan_delete')->name('admin.plan.delete');


        Route::get('admin/item/view', 'admin_item_view')->name('admin.item.view');
        Route::post('admin/add/item/save', 'admin_add_item_save')->name('admin.add.item');
        Route::post('admin/item/update/{id}', 'admin_item_update')->name('admin.item.update');
        Route::post('admin/item/delete/{id}', 'admin_item_delete')->name('admin.item.delete');


        Route::get('admin/support/view', 'admin_support_view')->name('admin.support.view');
        Route::post('admin/support/update/{id}', 'admin_support_update')->name('admin.support.update');
        Route::get('/payment/all', 'admin_payment_all')->name('admin.payment.all');
        Route::get('/payment/setup', 'admin_payment_setup')->name('admin.payment.setup');
        Route::post('/payment/setup/save', 'admin_payment_setup_save')->name('admin.payment.setup.save');


        Route::get('admin/blog/view', 'admin_blog_view')->name('admin.blog.view');
        Route::get('admin/blog/all', 'admin_blog_all')->name('admin.blog.all');
        Route::post('admin/blog/save/', 'admin_blog_save')->name('admin.blog.save');
        Route::get('admin/blog/edit/{id}', 'admin_blog_edit')->name('admin.blog.edit');
        Route::post('admin/blog/update/{id}', 'admin_blog_update')->name('admin.blog.update');
        Route::post('admin/blog/delete/{id}', 'admin_blog_delete')->name('admin.blog.delete');

        Route::get('admin/ribbon/view', 'ribbon_view')->name('ribbon.view');
        Route::post('admin/ribbon/save', 'ribbon_save')->name('ribbon.save');

    });
});


Route::middleware('auth')->group(function () {
    Route::controller(ExportController::class)->group(function () {
        Route::post('admin/user/report', 'admin_user_reports')->name('admin.user.report');
        Route::post('admin/payment/report', 'admin_payment_reports')->name('admin.payment.report');

    });
});

Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/user/dashboard', 'user_dashboard')->name('user.dashboard');
    Route::get('/user/coins', 'user_coin')->name('user.coins');
    Route::get('/user/news', 'user_news')->name('user.news');
    Route::get('/user/news/detail/{url}', 'user_news_detail')->name('user.new.detail');
    Route::get('/user/order/history', 'user_order_history')->name('user.payment');
});

Route::middleware('auth')->group(function () {
    Route::controller(\App\Http\Controllers\PaymentController::class)->group(function () {
        Route::get('admin/gateway/view', 'admin_gateway_view')->name('admin.gateway.view');
        Route::post('admin/gateway/add/', 'admin_gateway_add')->name('admin.gateway.add');
        Route::post('admin/gateway/delete/{id}', 'admin_gateway_delete')->name('admin.gateway.delete');
        Route::post('admin/gateway/update/{id}', 'admin_gateway_update')->name('admin.gateway.update');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(\App\Http\Controllers\PaymentController::class)->group(function () {
        Route::post('user/buy/coin', 'user_buy_coin')->name('user.buy.coin');
        Route::get('user/paypal/success', 'paypal_success')->name('paypal.success');
        Route::get('user/paypal/failed', 'paypal_failed')->name('paypal.failed');
    });
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');


//Route::controller(\App\Http\Controllers\AdminController::class)->group(function () {
//    Route::get('/admin/dashboard', 'admin_dashboard')->name('admin.dashboard');
//});

require __DIR__.'/auth.php';
