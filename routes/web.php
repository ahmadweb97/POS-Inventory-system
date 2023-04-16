<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        $orders = DB::table('orders')->count();
        $users = DB::table('users')->count();
        $products = DB::table('products')->count();
        $customers = DB::table('customers')->count();
        $suppliers = DB::table('suppliers')->count();
        $employees = DB::table('employees')->count();
        $categories = DB::table('categories')->count();
        $users = DB::table('users')->count();

        return view('base', compact('orders', 'users', 'products', 'customers', 'suppliers', 'employees', 'categories', 'users'));
    })->name('dashboard');
});

Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');



Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware(['auth', 'verified']);




Route::get('/inbox', function(){
    echo"inbox";
})->name('inbox')->middleware('verified');

Route::get('/calendar', function(){
    echo"calendar";
})->name('calendar');

Route::get('/typography', function(){
    echo"typography";
})->name('typography');

// 404
Route::get('404', function () {
    return view('404-page');
});


// Search

Route::get('/search',  [SearchController::class, 'searchProducts']);


// Employees
Route::get('/add-employee', [EmployeeController::class, 'index'])->name('add.employee');
Route::get('/all-employees', [EmployeeController::class, 'show'])->name('all.employee');
Route::post('/insert-employee', [EmployeeController::class, 'store']);
Route::get('/view-employee/{id}', [EmployeeController::class, 'viewEmployee']);
Route::get('/delete-employee/{id}', [EmployeeController::class, 'deleteEmployee']);
Route::get('/edit-employee/{id}', [EmployeeController::class, 'editEmployee']);
Route::post('/update-employee/{id}', [EmployeeController::class, 'updateEmployee']);


// Customers
Route::get('/add-customer', [CustomerController::class, 'index'])->name('add.customer');
Route::post('/insert-customer', [CustomerController::class, 'store']);
Route::get('/all-customers', [CustomerController::class, 'show'])->name('all.customers');
Route::get('/view-customer/{id}', [CustomerController::class, 'viewCustomer']);
Route::get('/delete-customer/{id}', [CustomerController::class, 'deleteCustomer']);
Route::get('/edit-customer/{id}', [CustomerController::class, 'editCustomer']);
Route::post('/update-customer/{id}', [CustomerController::class, 'updateCustomer']);

// Suppliers
Route::get('/add-supplier', [SupplierController::class, 'index'])->name('add.supplier');
Route::post('/insert-supplier', [SupplierController::class, 'store']);
Route::get('/all-suppliers', [SupplierController::class, 'show'])->name('all.suppliers');
Route::get('/view-supplier/{id}', [SupplierController::class, 'viewSupplier']);
Route::get('/delete-supplier/{id}', [SupplierController::class, 'deleteSupplier']);
Route::get('/edit-supplier/{id}', [SupplierController::class, 'editSupplier']);
Route::post('/update-supplier/{id}', [SupplierController::class, 'updateSupplier']);


// Salary for employees
Route::get('/add-advance-salary', [SalaryController::class, 'addAdvanceSalary'])->name('add.advanceSalary');
Route::post('/insert-advanced-salary', [SalaryController::class, 'store']);
Route::get('/all-advance-salaries', [SalaryController::class, 'show'])->name('all.advanceSalaries');

Route::get('/pay-salary', [SalaryController::class, 'paySalary'])->name('pay.salary');


// Categories
Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add.category');
Route::post('/insert-category', [CategoryController::class, 'store']);
Route::get('/all-categories', [CategoryController::class, 'show'])->name('all.categories');
Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory']);
Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory']);
Route::post('/update-category/{id}', [CategoryController::class, 'updateCategory']);


// Products
Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add.product');
Route::post('/insert-product', [ProductController::class, 'store']);
Route::get('/all-products', [ProductController::class, 'show'])->name('all.products');
Route::get('/edit-product/{id}', [ProductController::class, 'editProduct']);
Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct']);
Route::get('/view-product/{id}', [ProductController::class, 'viewProduct']);
Route::post('/update-product/{id}', [ProductController::class, 'updateProduct']);


// Excel import and export
Route::get('/import-product', [ProductController::class, 'importProduct'])->name('import.product');
Route::get('/export', [ProductController::class, 'export'])->name('export');
Route::post('/import', [ProductController::class, 'import'])->name('import');


// Expenses
Route::get('/add-expense', [ExpenseController::class, 'addExpense'])->name('add.expense');
Route::post('/insert-expense', [ExpenseController::class, 'store']);
Route::get('/today-expenses', [ExpenseController::class, 'todayExpenses'])->name('today.expenses');
Route::get('/edit-today-expenses/{id}', [ExpenseController::class, 'editTodayExpenses']);
Route::get('/edit-monthly-expenses/{id}', [ExpenseController::class, 'editMonthlyExpenses']);
Route::post('/update-expense/{id}', [ExpenseController::class, 'updateExpense']);
Route::post('/update-monthly-expenses/{id}', [ExpenseController::class, 'updateMonthlyExpense']);
Route::get('/delete-todayexpense/{id}', [ExpenseController::class, 'deleteTodayExpense']);
Route::get('/delete-monthlyexpense/{id}', [ExpenseController::class, 'deleteMonthlyExpense']);

Route::get('/monthly-expenses', [ExpenseController::class, 'monthlyExpenses'])->name('monthly.expenses');
Route::get('/yearly-expenses', [ExpenseController::class, 'yearlyExpenses'])->name('yearly.expenses');

// Monthly expenses
Route::get('/january-expenses', [ExpenseController::class, 'janExpenses'])->name('january.expenses');
Route::get('/february-expenses', [ExpenseController::class, 'febExpenses'])->name('february.expenses');
Route::get('/march-expenses', [ExpenseController::class, 'marExpenses'])->name('march.expenses');
Route::get('/april-expenses', [ExpenseController::class, 'aprExpenses'])->name('april.expenses');
Route::get('/may-expenses', [ExpenseController::class, 'mayExpenses'])->name('may.expenses');
Route::get('/june-expenses', [ExpenseController::class, 'junExpenses'])->name('june.expenses');
Route::get('/july-expenses', [ExpenseController::class, 'julExpenses'])->name('july.expenses');
Route::get('/august-expenses', [ExpenseController::class, 'augExpenses'])->name('august.expenses');
Route::get('/september-expenses', [ExpenseController::class, 'sepExpenses'])->name('september.expenses');
Route::get('/october-expenses', [ExpenseController::class, 'octExpenses'])->name('october.expenses');
Route::get('/november-expenses', [ExpenseController::class, 'novExpenses'])->name('november.expenses');
Route::get('/december-expenses', [ExpenseController::class, 'decExpenses'])->name('december.expenses');


// Attendances
Route::get('/take-attendance', [AttendanceController::class, 'takeAttendance'])->name('take.attendances');
Route::post('/insert-attendance', [AttendanceController::class, 'insertAttendance']);
Route::get('/all-attendances', [AttendanceController::class, 'allAttendances'])->name('all.attendances');
Route::get('/edit-attendance/{edit_date}', [AttendanceController::class, 'editAttendance']);
Route::get('/view-attendance/{edit_date}', [AttendanceController::class, 'viewAttendance']);
Route::post('/update-attendance/{edit_date}', [AttendanceController::class, 'updateAttendance']);
Route::get('/delete-attendance/{edit_date}', [AttendanceController::class, 'deleteAttendance']);

// Settings
Route::get('/website-settings', [AttendanceController::class, 'settings'])->name('settings');
Route::post('/update-website/{id}', [AttendanceController::class, 'updateSettings']);

// POS
Route::get('/pos', [PosController::class, 'index'])->name('pos');
// Orders
Route::get('/pending/order', [PosController::class, 'pendingOrder'])->name('pending.orders');
Route::get('/delivered/order', [PosController::class, 'deliveredOrder'])->name('delivered.orders');
Route::get('/view-order-status/{id}', [PosController::class, 'viewOrder']);
Route::get('/pos-confirm/{id}', [PosController::class, 'posConfirm']);
Route::get('/delete-pending/{id}', [PosController::class, 'deletePending']);
Route::get('/delete-delivered/{id}', [PosController::class, 'deleteDeliverd']);

// Cart
Route::post('/add-cart', [CartController::class, 'index']);
Route::post('/update-cart/{rowId}', [CartController::class, 'updateCart']);
Route::get('/remove-cart/{rowId}', [CartController::class, 'removeCart']);
Route::get('/create-invoice', [CartController::class, 'createInvoice']);
Route::post('/final-invoice', [CartController::class, 'finalInvoice']);

// Profile
Route::get('/profile/{id}', [ProfileController::class, 'profile']);
Route::put('/users/{user}',  [ProfileController::class, 'updateProfile'])->name('users.update');





