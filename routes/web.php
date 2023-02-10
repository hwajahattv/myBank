<?php

// use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\InvestmentSectionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\client\AuthController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\InvestmentController;
use App\Http\Controllers\client\RequestController;
use App\Http\Controllers\client\UtilityPayController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PinController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendMoneyController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\ClientAuthenticate;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\RequestContext;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.landing');
})->name('client.landingPage');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/save_image', [ProfileController::class, 'saveImage']);

    // Money transfer routes
    Route::get('transfer', [TransferController::class, 'index'])->name('transfer.index');
});

// admin routes
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/login/google', [AdminController::class, 'loginGoogle'])->name('login.google');
Route::get('/admin/google/callback', [AdminController::class, 'handleGoogleCallback']);
Route::get('/admin/login/facebook', [AdminController::class, 'loginFacebook'])->name('login.facebook');
Route::get('/admin/facebook/callback', [AdminController::class, 'handleFacebookCallback']);
Route::get('/admin/login/github', [AdminController::class, 'loginGithub'])->name('login.github');
Route::get('/admin/github/callback', [AdminController::class, 'handleGithubCallback']);


Route::get('/admin', function () {
    return redirect()->route('admin.login');
});
Route::get('login', function () {
    return redirect()->route('admin.login');
});
Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store')->middleware(AdminAuthenticate::class);

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    Route::resource('account', AccountController::class);
    Route::resource('user', UserController::class);
    Route::post('/change/role/{id}', [UserController::class, 'updateRole']);
    Route::resource('investment', InvestmentSectionController::class)->only(['index']);
    // Route::get('/user/delete/{id}', UserController::class, 'destroy')
    //     ->name('user.delete');
    Route::resource('transaction', TransactionController::class);
    Route::post('/transaction/find', [TransactionController::class, 'find'])->name('find.transaction');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Client routes
Route::get('/client/auth', [AuthController::class, 'auth'])->name('client.auth');
Route::get('/client/login', [AuthController::class, 'login'])->name('client.login');
Route::get('/client/password-change', [AuthController::class, 'changePassword'])->name('client.password.change');
Route::post('/change-password', [AuthController::class, 'changePasswordSave'])->name('postChangePassword');
Route::get('/client/register', [AuthController::class, 'register'])->name('client.register');
Route::post('/client/register/post', [RegisteredUserController::class, 'store'])->name('client.register.post');
Route::post('/client/login', [AuthenticatedSessionController::class, 'store'])->name('client.login.store')->middleware(ClientAuthenticate::class);
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create']);
Route::post('/forgot-password/newLink', [PasswordResetLinkController::class, 'sendResetLink'])->name('password.email.send');
// Route::post('/reset-password/{token}', [NewPasswordController::class, 'create']);


Route::middleware(['auth'])->group(function () {

    Route::get('/client/dashboard', [AuthController::class, 'dashboard'])->name('client.dashboard');
    Route::get('/client', [AuthController::class, 'profile'])->name('client.profile');

    // banking operations routes
    // money transfer routes
    Route::get('/send/index', [SendMoneyController::class, 'index'])->name('sendMoney.index');
    Route::get('/send/viaEmail', [SendMoneyController::class, 'viaEmail'])->name('send.viaEmail');
    Route::post('/send/viaEmail', [SendMoneyController::class, 'pay'])->name('send.viaEmail');
    Route::get('/send/viaMobile', [SendMoneyController::class, 'viaMobile'])->name('send.viaMobile');
    Route::post('/send/viaMobile', [SendMoneyController::class, 'payMobile'])->name('send.viaMobile');
    Route::get('/send/viaAccount', [SendMoneyController::class, 'viaAccount'])->name('send.viaAccount');
    Route::post('/send/viaAccount', [SendMoneyController::class, 'payAccount'])->name('send.viaAccount');
    // payment section routes
    Route::get('/pay/index', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/pay/viaEmail', [PaymentController::class, 'viaEmail'])->name('payment.viaEmail');
    Route::post('/pay/viaEmail', [PaymentController::class, 'pay'])->name('payment.viaEmail');
    Route::get('/pay/viaMobile', [PaymentController::class, 'viaMobile'])->name('payment.viaMobile');
    Route::post('/pay/viaMobile', [PaymentController::class, 'payViaMobile'])->name('payment.viaMobile');
    Route::get('/pay/viaAccount', [PaymentController::class, 'viaAccount'])->name('payment.viaAccount');
    Route::post('/pay/viaAccount', [PaymentController::class, 'payViaAccount'])->name('payment.viaAccount');
    // account related routes
    Route::get('/generate/PIN', [PinController::class, 'create'])->name('pin.create');
    Route::post('/account/viaEmail', [AccountController::class, 'viaEmail'])->name('account.viaEmail');
    Route::post('/account/viaMobile', [AccountController::class, 'viaMobile'])->name('account.viaMobile');
    Route::post('/account/viaAccount', [AccountController::class, 'viaAccount'])->name('account.viaAccount');
    Route::get('client/addMoney', [AccountController::class, 'addIndex'])->name('money.add');
    Route::post('client/addMoney', [AccountController::class, 'addMoney'])->name('money.add.post');
    // request related routes
    Route::get('/request/viaEmail', [RequestController::class, 'index'])->name('payment.request');
    Route::post('/request/viaEmail', [RequestController::class, 'store'])->name('payment.request.store');
    Route::get('/request/received', [RequestController::class, 'received'])->name('request.received');
    Route::get('/request/show/{id}', [RequestController::class, 'show'])->name('request.show');
    Route::post('/request/pay/viaAccount', [PaymentController::class, 'requestPayViaAccount'])->name('request.payment.viaAccount');
    // Route::post('/request/show{id}', [RequestController::class, 'show'])->name('request.show');
    // utility payment related routes
    Route::get('/utility', [UtilityPayController::class, 'index'])->name('utility.index');
    Route::post('/get/bill', [UtilityPayController::class, 'getData'])->name('utility.data');
    Route::post('/utility/pay', [UtilityPayController::class, 'makePayment'])->name('utility.payment');


    //investment routes
    Route::get('client/invest/index', [InvestmentController::class, 'index'])->name('client.invest.index');
    Route::get('client/invest/show/{id}', [InvestmentController::class, 'show'])->name('client.invest.show');
    // misc routes on client side
    Route::get('/client/policy', [HomeController::class, 'policy'])->name('client.policy');
    Route::get('/client/portfolio', [HomeController::class, 'portfolio'])->name('client.portfolio');
    Route::get('/client/account', [HomeController::class, 'account'])->name('client.account');
    Route::get('/client/reward', [HomeController::class, 'reward'])->name('client.reward');
    Route::get('/client/save', [HomeController::class, 'save'])->name('client.save');
    Route::get('/client/notifications/{days}', [HomeController::class, 'notifications'])->name('client.notifications');
});

Route::fallback(function () {
    return "<h1>Wooof! this route is not defined.</h1>";
});
require __DIR__ . '/auth.php';
