<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    $total_balances = \App\Models\User::sum('coin_balance');
    $total_model = \App\Models\User::where('user_type', '=', 2)->count();
    $total_user = \App\Models\User::where('user_type', '=', 1)->count();
    $total_plan = \App\Models\Plan::count();
    return view('admin.dashboard', compact('total_balances', 'total_model', 'total_user', 'total_plan'));
})->middleware(['auth', 'verified', 'user_access'])->name('dashboard');
Route::get('redirect', [AuthController::class, 'check_login'])->name('check_login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(\App\Http\Controllers\FrontendController::class)->group(function () {
    Route::get('/home', 'home')->name('home');
    Route::get('/', [AuthenticatedSessionController::class, 'create'])
        ->name('login');    Route::get('/about', 'about')->name('about');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact/save', 'contact_save')->name('contact.save');
    Route::post('/job/save', 'job_save')->name('save.job');
    Route::get('/models', 'models')->name('models');
    Route::get('/job', 'job')->name('job');
    Route::get('/testimonial', 'testimonial')->name('testimonial');
    Route::get('/privacy', 'privacy')->name('privacy');
    Route::get('/model/detail/{id}', 'model_detail')->name('model.detail');
});


Route::middleware(['auth', 'user_access' ])->group(function () {

    Route::controller(\App\Http\Controllers\AdminController::class)->group(function () {
//        Route::get('admin/dashboard', 'admin_dashboard')->name('dashboard');
        Route::get('admin/user/view', 'admin_add_user_view')->name('admin.add.user.view');
        Route::get('admin/model/view', 'admin_add_model_view')->name('admin.add.model.view');
        Route::post('admin/model/update', 'admin_model_update')->name('admin.model.update');
        Route::get('admin/user/edit/{id}', 'admin_user_edit')->name('admin.user.edit');
        Route::post('admin/add/user/save', 'admin_add_user_save')->name('admin.add.user.save');
        Route::post('admin/user/update/{id}', 'admin_user_update')->name('admin.user.update');
        Route::post('admin/model/update/', 'update_model_admin')->name('update.model.admin');
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
        Route::get('admin/model/status', 'admin_model_status')->name('admin.model.status');
        Route::get('admin/model/images', 'admin_model_images')->name('admin.model.image');

        Route::post('/admin/status/update', 'admin_update_status')->name('admin.status.update');
        Route::post('/admin/image/update', 'admin_update_image')->name('admin.image.update');
        Route::post('/admin/status/delete/{id}', 'admin_status_delete')->name('admin.status.delete');
        Route::post('/admin/image/delete/{id}', 'admin_image_delete')->name('admin.image.delete');


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
        Route::get('admin/contact/us', 'admin_contact_us')->name('admin.contact');
        Route::get('admin/job/all', 'admin_job')->name('admin.job');
        Route::get('admin/policy', 'admin_policy')->name('admin.policy');
        Route::post('admin/job/delete/{id}', 'admin_job_delete')->name('admin.job.delete');
        Route::post('admin/ribbon/save', 'ribbon_save')->name('ribbon.save');
        Route::post('admin/policy/save', 'policy_save')->name('admin.policy.save');

        Route::get('/admin/chat/all', 'admin_chat_all')->name('admin.chat.all');
        Route::get('/admin/chat/detail/{id}', 'admin_chat_detail')->name('admin.chat.detail');
        Route::post('admin/chat/add', 'admin_chat_add')->name('admin.chat.add');

    });
});


Route::middleware('auth')->group(function () {
    Route::controller(ExportController::class)->group(function () {
        Route::post('admin/user/report', 'admin_user_reports')->name('admin.user.report');
        Route::post('admin/payment/report', 'admin_payment_reports')->name('admin.payment.report');

    });
});

Route::middleware(['auth', 'verified'])->group(function () {

Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/user/dashboard', 'user_dashboard')->name('user.dashboard');
    Route::post('/user/pay/images', 'pay_to_view_images')->name('pay.to.view.images');
    Route::get('/user/coins', 'user_coin')->name('user.coins');
    Route::post('/follow/model', 'follow_model')->name('follow.model');
    Route::post('/user/status/update', 'user_update_status')->name('user.status.update');
    Route::get('/user/show/chats', 'user_show_chat')->name('show.model.chat');
    Route::get('/user/show/chats/all', 'model_chat_all')->name('show.model.chat.all');
    Route::get('/model/chat/detail/{id}', 'model_chat_detail')->name('model.chat.detail');

    Route::get('model/model/images', 'model_model_images')->name('model.model.image');


    Route::get('/user/news', 'user_news')->name('user.news');
    Route::post('/spin/validate', 'spin_validate')->name('spin.validate');
    Route::post('/claim/reward', 'claim_reward')->name('claim.reward');
    Route::post('/move/reward', 'move_reward')->name('move.reward');
    Route::get('/user/news/detail/{url}', 'user_news_detail')->name('user.new.detail');
    Route::get('/user/order/history', 'user_order_history')->name('user.payment');
    Route::get('/user/profile/', 'user_profile')->name('user.profile');
    Route::get('/user/wheel', 'user_wheel')->name('user.wheel');
    Route::post('/user/move/to/wallet', 'reward_to_wallet')->name('reward_to_wallet');

    Route::post('/chat/add', 'user_chat_add')->name('user.chat.add');
    Route::post('/user/buy/gift', 'user_buy_gift')->name('user.buy.gift');
    Route::post('/user/send/gift', 'user_send_gift')->name('user.send.gift');
    Route::get('/chat/detail/{id}', 'user_chat_detail')->name('user.chat.detail');

    Route::post('user/user/update/{id}', 'user_user_update')->name('user.user.update');
    Route::post('/user/password/change/', 'user_password_change')->name('user.password.change');

    Route::post('model/model/update/', 'update_model_user')->name('update.model.user');
    Route::post('/model/image/update', 'model_update_image')->name('model.image.update');
    Route::post('/model/image/delete/{id}', 'model_image_delete')->name('model.image.delete');



});
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
