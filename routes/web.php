<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AllocationController;
use App\Http\Controllers\ProvincialDashboardController;


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

Route::get('/system-overview', function () {
    return view('systemoverview');
})->name('system.overview');

Route::get('/user-roles', function () {
    return view('userroles');
})->name('user.roles');

Route::get('/system-overview', function () {
    return view('systemoverview');
})->name('system.overview');

Route::get('/system-overview', function () {
    return view('systemoverview');
})->name('system.overview');

Route::get('/guidelines', function () {
    return view('guidelines');
})->name('guidelines');

Route::get('/support', function () {
    return view('support');
})->name('support');

Route::prefix('department')->name('department.')->middleware('auth')->group(function () {
    Route::get('/schools', [ProvincialDashboardController::class, 'index'])->name('schools.index');
    Route::get('/schools/create', [ProvincialDashboardController::class, 'createSchool'])->name('schools.create');
    Route::post('/schools', [ProvincialDashboardController::class, 'storeSchool'])->name('schools.store');

    Route::get('/schools/{school}', [ProvincialDashboardController::class, 'show'])->name('schools.show');
    Route::get('/schools/{school}/allocations/create', [ProvincialDashboardController::class, 'createAllocation'])->name('schools.allocations.create');
    Route::post('/schools/{school}/allocations', [ProvincialDashboardController::class, 'storeAllocation'])->name('schools.allocations.store');

    Route::get('/schools/{school}/edit', [ProvincialDashboardController::class, 'editSchool'])->name('schools.edit');
    Route::patch('/schools/{school}', [ProvincialDashboardController::class, 'updateSchool'])->name('schools.update');
    Route::delete('/schools/{school}', [ProvincialDashboardController::class, 'destroySchool'])->name('schools.destroy');
});

Route::prefix('department')->name('department.')->middleware('auth')->group(function () {
    Route::get('/contractors', [ProvincialDashboardController::class, 'contractorsIndex'])->name('contractors.index');
    Route::get('/contractors/create', [ProvincialDashboardController::class, 'createContractor'])->name('contractors.create');
    Route::post('/contractors', [ProvincialDashboardController::class, 'storeContractor'])->name('contractors.store');
    Route::get('/contractors/{contractor}', [ProvincialDashboardController::class, 'showContractor'])->name('contractors.show');

    Route::get('/contractors/{contractor}/edit', [ProvincialDashboardController::class, 'editContractor'])->name('contractors.edit');
    Route::patch('/contractors/{contractor}', [ProvincialDashboardController::class, 'updateContractor'])->name('contractors.update');
    Route::delete('/contractors/{contractor}', [ProvincialDashboardController::class, 'destroyContractor'])->name('contractors.destroy');
});

Route::patch('/allocations/{allocation}/update-status', [AllocationController::class, 'updateDiscrepancyStatus'])
    ->name('allocations.updateDiscrepancyStatus');

Route::get('/deliveries/{allocation}/track', [AllocationController::class, 'track'])->name('deliveries.track');

// Route::post('/allocations/{allocation}/status', [AllocationController::class, 'updateStatus'])->name('allocations.updateStatus');
Route::post('/allocations/{id}/status', [AllocationController::class, 'updateStatus'])->name('allocations.updateStatus');
