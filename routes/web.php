<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\FaqPageController;
use App\Http\Controllers\Admin\ServicePageController;
use App\Http\Controllers\Admin\FranchisePageController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\FranchiseController;
use App\Http\Controllers\Admin\InquiryController;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\FranchiseHomeController;
use App\Http\Controllers\Front\ContactMessageController;
use App\Http\Controllers\Front\ApplicationFormController;
use App\Http\Controllers\Front\LanguageController;

Route::get('/', [HomeController::class, 'home']);
Route::get('/index', [HomeController::class, 'home'])->name('index');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/service', [ServiceController::class, 'service'])->name('service');
Route::get('/service-detail/{slug}', [ServiceController::class, 'serviceDetail'])->name('service-detail');
Route::get('/faq-page', [FaqController::class, 'faqs'])->name('faq-page');
Route::get('/franchise', [FranchiseHomeController::class, 'franchise_brand'])->name('franchise');
Route::post('/contact/submit', [ContactMessageController::class, 'store'])->name('contact.submit');
Route::post('/application/submit', [ApplicationFormController::class, 'store'])->name('application.submit');
Route::get('/change-language/{lang}', [LanguageController::class, 'changeLanguage'])->name('change.language');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth:admin'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        
        Route::get('/home', [HomePageController::class, 'index'])->name('admin.home.index');
        Route::post('/home/save', [HomePageController::class, 'save'])->name('admin.home.save');
        Route::delete('/client-logos/{id}', [HomePageController::class, 'destroy'])->name('client-logos.destroy');

        Route::get('/contact', [ContactPageController::class, 'index'])->name('admin.contact.index');
        Route::post('/contact/save', [ContactPageController::class, 'store'])->name('admin.contact.save');

        Route::get('/faq', [FaqPageController::class, 'index'])->name('admin.faq.index');
        Route::post('/faq/save', [FaqPageController::class, 'store'])->name('admin.faq.save');

        Route::get('/service', [ServicePageController::class, 'index'])->name('admin.service.index');
        Route::post('/service/save', [ServicePageController::class, 'store'])->name('admin.service.save');

        Route::get('/franchise', [FranchisePageController::class, 'index'])->name('admin.franchise.index');
        Route::post('/franchise/save', [FranchisePageController::class, 'store'])->name('admin.franchise.save');

        Route::get('/brands', [BrandController::class, 'index'])->name('admin.brands.index');
        Route::get('/brands/create', [BrandController::class, 'create'])->name('admin.brands.create');
        Route::post('/brands/save', [BrandController::class, 'store'])->name('admin.brands.save');
        Route::get('/brands/edit/{id}', [BrandController::class, 'edit'])->name('admin.brands.edit');
        Route::put('/brands/update/{id}', [BrandController::class, 'store'])->name('admin.brands.update');
        Route::delete('/brands/delete/{id}', [BrandController::class, 'destroy'])->name('admin.brands.delete');

        Route::get('/franchises', [FranchiseController::class, 'index'])->name('admin.franchises.index');
        Route::get('/franchises/create', [FranchiseController::class, 'create'])->name('admin.franchises.create');
        Route::post('/franchises/save', [FranchiseController::class, 'store'])->name('admin.franchises.save');
        Route::get('/franchises/edit/{id}', [FranchiseController::class, 'edit'])->name('admin.franchises.edit');
        Route::put('/franchises/update/{id}', [FranchiseController::class, 'store'])->name('admin.franchises.update');
        Route::delete('/franchises/delete/{id}', [FranchiseController::class, 'destroy'])->name('admin.franchises.delete');

        Route::post('/franchise/save-brand', [FranchisePageController::class, 'storeBrand'])->name('admin.franchise.saveBrand');
        Route::post('/franchise/save-franchise', [FranchisePageController::class, 'storeFranchise'])->name('admin.franchise.saveFranchise');

        Route::get('contact-inquiries', [InquiryController::class, 'contactInquiry'])->name('admin.inquiries.contact');
        Route::get('service-training-inquiries', [InquiryController::class, 'serviceTrainingInquiry'])->name('admin.inquiries.training');
        Route::get('specific-service-inquiries', [InquiryController::class, 'specificServiceInquiry'])->name('admin.inquiries.specific');
    });
});