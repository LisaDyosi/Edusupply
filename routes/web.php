<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AllocationController;
use App\Http\Controllers\ContractorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/department', function () {
        return view('department.dashboard');
    })->name('department.dashboard')->middleware('checkRole:department');

    Route::get('/contractor', function () {
        return view('contractor.dashboard');
    })->name('contractor.dashboard')->middleware('checkRole:contractor');

    Route::get('/school', function () {
        return view('school.dashboard');
    })->name('school.dashboard')->middleware('checkRole:school');
});

Route::middleware(['auth', 'checkRole:department'])->group(function () {
    Route::get('/allocations', [AllocationController::class, 'index'])->name('department.allocations');
    Route::get('/allocations/create', [AllocationController::class, 'create'])->name('allocation.create');
    Route::post('/allocations/store', [AllocationController::class, 'store'])->name('allocation.store');
});

Route::middleware(['auth', 'checkRole:school'])->group(function () {
    Route::get('/school/upcoming-deliveries', function () {
        return view('school.upcoming-deliveries');
    })->name('school.upcoming.deliveries');
});

Route::middleware(['auth', 'checkRole:contractor'])->group(function () {
    Route::get('/contractor/my-deliveries', function () {
        return view('contractor.my-deliveries');
    })->name('contractor.my.deliveries');
});

Route::middleware(['auth', 'checkRole:contractor'])->group(function () {
    Route::get('/contractor/my-deliveries', [AllocationController::class, 'myDeliveries'])->name('contractor.my.deliveries');
    Route::post('/allocation/update-status/{id}', [AllocationController::class, 'updateStatus'])->name('allocation.updateStatus');
});

Route::post('/allocation/confirm-code/{id}', [AllocationController::class, 'confirmWithCode'])->name('allocation.confirmCode');

Route::get('/school/received-stationery', [AllocationController::class, 'receivedDeliveries'])->name('school.received');

Route::get('/allocation/{allocation}/log-delivery', [AllocationController::class, 'logDeliveryForm'])->name('allocation.logDeliveryForm');
Route::post('/allocation/{allocation}/log-delivery', [AllocationController::class, 'saveDelivery'])->name('allocation.saveDelivery');
Route::patch('/allocation/{allocation}/update-discrepancy-status', [AllocationController::class, 'updateDiscrepancyStatus'])->name('allocation.updateDiscrepancyStatus');

Route::post('/allocation/{allocation}/log-discrepancy', [App\Http\Controllers\AllocationController::class, 'logDiscrepancy'])->name('allocation.logDiscrepancy');
