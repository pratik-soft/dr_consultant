<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\DummyController;

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

//Frontend
// Route::get('/', function () {
//     return redirect()->route('login');
// });

//home
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

//about
// Route::get('about-us', [App\Http\Controllers\Frontend\AboutUsController::class, 'index'])->name('about-us');
// Route::get('team', [App\Http\Controllers\Frontend\TeamController::class, 'index'])->name('team');
// Route::get('testimonials', [App\Http\Controllers\Frontend\TestimonialsController::class, 'index'])->name('testimonials');

// //services
// Route::get('services', [App\Http\Controllers\Frontend\ServicesController::class, 'index'])->name('services');
// Route::get('service/category/{category}', [App\Http\Controllers\Frontend\ServicesController::class, 'category'])->name('service-category');
// Route::get('service/{tag}', [App\Http\Controllers\Frontend\ServicesController::class, 'detail'])->name('service-detail');

// //portfolio
// Route::get('portfolio', [App\Http\Controllers\Frontend\PortfolioController::class, 'index'])->name('portfolio');
// Route::get('pricing', [App\Http\Controllers\Frontend\PricingController::class, 'index'])->name('pricing');

// //blog
// Route::get('blog', [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog');
// Route::get('blog/category/{category}', [App\Http\Controllers\Frontend\BlogController::class, 'category'])->name('blog-category');
// Route::get('blog/tag/{tag}', [App\Http\Controllers\Frontend\BlogController::class, 'tag'])->name('blog-tag');
// Route::get('blog/{slug}', [App\Http\Controllers\Frontend\BlogController::class, 'detail'])->name('blog-detail');

// //contact
// Route::get('contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');
// Route::post('contact-action', [App\Http\Controllers\Frontend\ContactController::class, 'contactAction'])->name('contact-action');

// //other
// Route::get('terms-and-conditions', [App\Http\Controllers\Frontend\TermsAndConditionsController::class, 'index'])->name('terms-and-conditions');
// Route::get('privacy-policy', [App\Http\Controllers\Frontend\PrivacyPolicyController::class, 'index'])->name('privacy-policy');
// // Route::get('sitemap', [App\Http\Controllers\Frontend\SitemapController::class, 'index'])->name('sitemap');
// Route::post('subscriber-action', [App\Http\Controllers\Frontend\SubscriberController::class, 'subscriberAction'])->name('subscriber-action');
// Route::get('subscription/verify/{verified_code}', [App\Http\Controllers\Frontend\SubscriberController::class, 'verify'])->name('subscription-verify');

//Backend
Route::group([], function(){
    //login, register, forgot password, reset password
    Auth::routes(['verify' => true, 'register' => false]);

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            
    Route::name('backend.')->group(function () {

        //Dashboard
        // Route::get('/', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard.index');

        //Team
        Route::get('team/delete/{id}', [App\Http\Controllers\Backend\TeamController::class, 'delete'])->name('team.delete');
        Route::post('team/list', [App\Http\Controllers\Backend\TeamController::class, 'list'])->name('team.list');
        Route::resource('team', App\Http\Controllers\Backend\TeamController::class);

        //Team
        Route::get('patient/delete/{id}', [App\Http\Controllers\Backend\PatientController::class, 'delete'])->name('patient.delete');
        Route::post('patient/list', [App\Http\Controllers\Backend\PatientController::class, 'list'])->name('patient.list');
        Route::resource('patient', App\Http\Controllers\Backend\PatientController::class);

        //Testimonials
        Route::get('testimonials/delete/{id}', [App\Http\Controllers\Backend\TestimonialController::class, 'delete'])->name('testimonials.delete');
        Route::post('testimonials/list', [App\Http\Controllers\Backend\TestimonialController::class, 'list'])->name('testimonials.list');
        Route::resource('testimonials', App\Http\Controllers\Backend\TestimonialController::class);

        //Clients
        Route::get('clients/delete/{id}', [App\Http\Controllers\Backend\ClientController::class, 'delete'])->name('clients.delete');
        Route::post('clients/list', [App\Http\Controllers\Backend\ClientController::class, 'list'])->name('clients.list');
        Route::resource('clients', App\Http\Controllers\Backend\ClientController::class);        

        //Services
        Route::get('services/delete/{id}', [App\Http\Controllers\Backend\ServiceController::class, 'delete'])->name('services.delete');
        Route::post('services/list', [App\Http\Controllers\Backend\ServiceController::class, 'list'])->name('services.list');
        Route::resource('services', App\Http\Controllers\Backend\ServiceController::class);

        //Portfolio
        Route::get('portfolio/delete/{id}', [App\Http\Controllers\Backend\PortfolioController::class, 'delete'])->name('portfolio.delete');
        Route::post('portfolio/list', [App\Http\Controllers\Backend\PortfolioController::class, 'list'])->name('portfolio.list');
        Route::resource('portfolio', App\Http\Controllers\Backend\PortfolioController::class);

        //FAQ        
        Route::get('faqs/delete/{id}', [App\Http\Controllers\Backend\FaqController::class, 'delete'])->name('faqs.delete');
        Route::post('faqs/list', [App\Http\Controllers\Backend\FaqController::class, 'list'])->name('faqs.list');
        Route::resource('faqs', App\Http\Controllers\Backend\FaqController::class);

        //Blog
        Route::get('blog/delete/{id}', [App\Http\Controllers\Backend\BlogController::class, 'delete'])->name('blog.delete');
        Route::post('blog/list', [App\Http\Controllers\Backend\BlogController::class, 'list'])->name('blog.list');
        Route::resource('blog', App\Http\Controllers\Backend\BlogController::class);
        
        //Inquiries
        Route::get('inquiries/delete/{id}', [App\Http\Controllers\Backend\InquiryController::class, 'delete'])->name('inquiries.delete');
        Route::get('inquiries/detail/{id}', [App\Http\Controllers\Backend\InquiryController::class, 'detail'])->name('inquiries.detail');
        Route::post('inquiries/list', [App\Http\Controllers\Backend\InquiryController::class, 'list'])->name('inquiries.list');
        Route::resource('inquiries', App\Http\Controllers\Backend\InquiryController::class);

        //Subscribers
        Route::get('subscribers/delete/{id}', [App\Http\Controllers\Backend\SubscriberController::class, 'delete'])->name('subscribers.delete');
        Route::post('subscribers/list', [App\Http\Controllers\Backend\SubscriberController::class, 'list'])->name('subscribers.list');
        Route::resource('subscribers', App\Http\Controllers\Backend\SubscriberController::class);

        
      
        //Categories
        Route::get('categories/delete/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'delete'])->name('categories.delete');
        Route::post('categories/list', [App\Http\Controllers\Backend\CategoryController::class, 'list'])->name('categories.list');
        Route::resource('categories', App\Http\Controllers\Backend\CategoryController::class);

        //Tags
        Route::get('tags/delete/{id}', [App\Http\Controllers\Backend\TagController::class, 'delete'])->name('tags.delete');
        Route::post('tags/list', [App\Http\Controllers\Backend\TagController::class, 'list'])->name('tags.list');
        Route::resource('tags', App\Http\Controllers\Backend\TagController::class);

        //Positions        
        Route::get('positions/delete/{id}', [App\Http\Controllers\Backend\PositionController::class, 'delete'])->name('positions.delete');
        Route::post('positions/list', [App\Http\Controllers\Backend\PositionController::class, 'list'])->name('positions.list');
        Route::resource('positions', App\Http\Controllers\Backend\PositionController::class);

        //Users        
        Route::get('users/delete/{id}', [App\Http\Controllers\Backend\UserController::class, 'delete'])->name('users.delete');
        Route::post('users/list', [App\Http\Controllers\Backend\UserController::class, 'list'])->name('users.list');
        Route::post('users/actions', [App\Http\Controllers\Backend\UserController::class, 'actions'])->name('users.actions');
        Route::resource('users', App\Http\Controllers\Backend\UserController::class);        

        //Roles
        Route::get('roles/delete/{id}', [App\Http\Controllers\Backend\RoleController::class, 'delete'])->name('roles.delete');
        Route::post('roles/list', [App\Http\Controllers\Backend\RoleController::class, 'list'])->name('roles.list');
        Route::resource('roles', App\Http\Controllers\Backend\RoleController::class);

        //Permissions
        Route::get('permissions/delete/{id}', [App\Http\Controllers\Backend\PermissionController::class, 'delete'])->name('permissions.delete');
        Route::post('permissions/list', [App\Http\Controllers\Backend\PermissionController::class, 'list'])->name('permissions.list');
        Route::post('permissions/actions', [App\Http\Controllers\Backend\PermissionController::class, 'actions'])->name('permissions.actions');
        Route::resource('permissions', App\Http\Controllers\Backend\PermissionController::class);

        //Settings        
        Route::resource('settings', App\Http\Controllers\Backend\SettingsController::class);



        //Products
        Route::get('products/laratable', [App\Http\Controllers\Backend\ProductController::class, 'laratable'])->name('products.laratable');
        Route::get('products/datatable', [App\Http\Controllers\Backend\ProductController::class, 'datatable'])->name('products.datatable');
        Route::get('products/delete/{id}', [App\Http\Controllers\Backend\ProductController::class, 'delete'])->name('products.delete');
        Route::post('products/list', [App\Http\Controllers\Backend\ProductController::class, 'list'])->name('products.list');
        Route::resource('products', App\Http\Controllers\Backend\ProductController::class);

        //Dummies                        
        // Route::controller(DummyController::class)->group(function () {
        //     Route::get('/orders/{id}', 'show');
        //     Route::post('/orders', 'store');
        //     Route::get('dummies/delete/{id}','delete')->name('dummies.delete');
        //     Route::post('dummies/list','list')->name('dummies.list');
        //     Route::post('dummies/actions','actions')->name('dummies.actions');
        //     Route::resource('dummies');
        // });
        Route::get('dummies/delete/{id}', [App\Http\Controllers\Backend\DummyController::class, 'delete'])->name('dummies.delete');
        Route::post('dummies/list', [App\Http\Controllers\Backend\DummyController::class, 'list'])->name('dummies.list');
        Route::post('dummies/actions', [App\Http\Controllers\Backend\DummyController::class, 'actions'])->name('dummies.actions');
        Route::resource('dummies', App\Http\Controllers\Backend\DummyController::class);

        //Dummy Files
        Route::get('dummy_files/delete/{id}', [App\Http\Controllers\Backend\DummyFileController::class, 'delete'])->name('dummy_files.delete');



        //My Account
        Route::get('myaccount', [App\Http\Controllers\Backend\MyaccountController::class, 'index'])->name('myaccount.index');
        Route::get('myaccount/profile', [App\Http\Controllers\Backend\MyaccountController::class, 'profile'])->name('myaccount.profile');
        Route::put('myaccount/update_profile', [App\Http\Controllers\Backend\MyaccountController::class, 'update_profile'])->name('myaccount.update_profile');
        Route::get('myaccount/change_password', [App\Http\Controllers\Backend\MyaccountController::class, 'change_password'])->name('myaccount.change_password');
        Route::put('myaccount/change_password_action', [App\Http\Controllers\Backend\MyaccountController::class, 'change_password_action'])->name('myaccount.change_password_action');
        Route::get('myaccount/change_avatar', [App\Http\Controllers\Backend\MyaccountController::class, 'change_avatar'])->name('myaccount.change_avatar');
        Route::post('myaccount/change_avatar_action', [App\Http\Controllers\Backend\MyaccountController::class, 'change_avatar_action'])->name('myaccount.change_avatar_action');
        Route::get('myaccount/logged_in_devices', [App\Http\Controllers\Backend\MyaccountController::class, 'logged_in_devices'])->name('myaccount.logged_in_devices');
        Route::get('myaccount/logout/all', [App\Http\Controllers\Backend\MyaccountController::class, 'logout_all_devices'])->name('myaccount.logout_all_devices');		
        Route::get('myaccount/logout/{device_id}', [App\Http\Controllers\Backend\MyaccountController::class, 'logout_device'])->name('myaccount.logout_device');
    });
});
