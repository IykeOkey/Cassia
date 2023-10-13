<?php

use App\Http\Controllers\AcademicController;
use App\Http\Controllers\BankAjaxController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BankEditController;
use App\Http\Controllers\BankSchedController;
use App\Http\Controllers\CadreAjaxController;
use App\Http\Controllers\CadreController;
use App\Http\Controllers\ChartAjaxController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\CreateSchedulController;
use App\Http\Controllers\DeductionAjaxController;
use App\Http\Controllers\DeductionController;
use App\Http\Controllers\DeductnController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\DueAjaxController;
use App\Http\Controllers\DueController;
use App\Http\Controllers\EmployeeAjaxController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LawyersController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\NomrollController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\PaySalary;
use App\Http\Controllers\PayStaffController;
use App\Http\Controllers\SalaryPayrollController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StaffDeductController;
use App\Http\Controllers\StafferController;
use App\Http\Controllers\StafferEditController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\WelfareController;
use App\Models\Bank;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//    $data = Bank::all ();
    return view('welcome'); //->with( $data );
   //     return view('paysalarys');
});

Route::get('/employees/ajax', 
[EmployeeController::class,
     'getUsers'])->name('get-users');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/todo', [TodoController::class, 'index'])->name('todos.todo');

Route::get('/employview', [EmployeeController::class, 'index2'])->name('employees.employview');

Route::get('/chartedit', [ChartsController::class, 'index'])->name('charts.chartedit');
//Route::get('employee/create', [EmployeeController::class, 'create'])->name('employees.employcreate');
//Route::post('create/save', [EmployeeController::class, 'store'])->name('employees.store');

Route::get('/academic', [AcademicController::class, 'index']) ->name('academics.academic');
Route::get('/academic/create', [AcademicController::class, 'create'])->name('academics.create');
Route::post('/academic/create/save', [AcademicController::class, 'store'])->name('academics.store');
//Route::resource('/academic/create', 'AcademicController');

Route::get('bank', [BankController::class, 'index'])->name('banks.bankview');
Route::get('bank/create', [BankController::class, 'create'])->name('banks.bankcreate');
Route::post('bank/create/save', [BankController::class, 'store'])->name('banks.store');

Route::get('/bankedit', [BankEditController::class, 'index'])->name('banks.bankedit');
Route::post('/bankedit', [BankEditController::class, 'store'])->name('banks.store');

Route::get('cadre', [CadreController::class, 'index'])->name('cadres.cadre');
Route::get('cadre/create', [CadreController::class, 'create'])->name('cadres.cadrecreate');
Route::post('create/save', [CadreController::class, 'store'])->name('cadres.store');

Route::get('chart', [ChartController::class, 'index'])->name('charts.chart');
Route::get('chart/create', [ChartController::class, 'create'])->name('charts.chartcreate');
Route::post('chart/create/save', [ChartController::class, 'store'])->name('charts.store');

Route::get('court', [CourtController::class, 'index'])->name('courts.court');
Route::get('court/create', [CourtController::class, 'create'])->name('courts.chartcreate');
Route::post('create/save', [CourtController::class, 'store'])->name('courts.store');

Route::get('deduction', [DeductionController::class, 'index'])->name('deductions.deduction');
Route::get('deduction/create', [DeductionController::class, 'create'])->name('deductions.deductcreate');
Route::post('create/save', [DeductionController::class, 'store'])->name('deductions.store');

Route::get('dept', [DeptController::class, 'index'])->name('depts.dept');
Route::get('dept/create', [DeptController::class, 'create'])->name('depts.deptcreate');
Route::post('create/save', [DeptController::class, 'store'])->name('depts.store');

Route::get('division', [DivisionController::class, 'index'])->name('divisions.division');
Route::get('division/create', [DivisionController::class, 'create'])->name('divisions.divcreate');
Route::post('create/save', [DivisionController::class, 'store'])->name('divisions.store');

Route::get('due', [DueController::class, 'index'])->name('dues.due');
Route::get('due/create', [DueController::class, 'create'])->name('dues.duecreate');
Route::post('create/save', [DueController::class, 'store'])->name('dues.store');

Route::get('employee', [EmployeeController::class, 'index'])->name('employees.employee');
Route::get('employee/create', [EmployeeController::class, 'create'])->name('employees.employcreate');
Route::post('employee/create/save', [EmployeeController::class, 'store'])->name('employees.store');

Route::get('transfer', [TransferController::class, 'index'])->name('transfers.transfer');
Route::get('transfer/create', [TransferController::class, 'create'])->name('transfers.transfercreate');
Route::post('create/save', [TransferController::class, 'store'])->name('transfers.store');

Route::get('schedule', [ScheduleController::class, 'index'])->name('schedules.schedule');

Route::get('leave', [LeaveController::class, 'index'])->name('leaves.leave');
Route::get('leave/create', [LeaveController::class, 'create'])->name('leaves.leavtypecreate');
Route::post('create/save', [LeaveController::class, 'store'])->name('leaves.store');

Route::get('tablecreate', [CreateSchedulController::class, 'operate']);

Route::get('employee/create', [DropdownController::class, 'index']);

Route::get('/fetch-data/{value}', [DropdownController::class, 'fetchData']);

Route::resource('/chartajax',ChartAjaxController::class);

Route::resource('/bankajax',BankAjaxController::class);

Route::resource('/cadreajax',CadreAjaxController::class);

Route::resource('/deductionajax',DeductionAjaxController::class);

Route::resource('/dueajax', DueAjaxController::class);

Route::resource('employeeajax', EmployeeAjaxController::class);

Route::resource('/stafferedit',StafferEditController::class);

Route::get('staffers', [StafferController::class, 'index'])->name('staffers.staffers');

Route::get('welfare', [WelfareController::class, 'index'])->name('welfare.welfare');
Route::get('welfare/create', [WelfareController::class, 'create'])->name('welfares.welfarecreate');
Route::get('welfare/create/save', [WelfareController::class, 'store'])->name('welfares.store');

Route::get('lawyers', [LawyersController::class, 'index'])->name('lawyers.lawyers');
Route::get('lawyers/create', [LawyersController::class, 'create'])->name('lawyers.lawyersecreate');
Route::get('lawyers/create/save', [LawyersController::class, 'store'])->name('lawyers.store');

Route::get('deductns', [DeductnController::class, 'index'])->name('deductns.deductns');
Route::get('deductns/create', [DeductnController::class, 'create'])->name('deductns.deductnsecreate');
Route::get('deductns/create/save', [DeductnController::class, 'store'])->name('deductns.store');

Route::get('staffdeduct', [StaffDeductController::class, 'index'])->name('staffdeducts.staffdeduct');
//Route::get('staffdeduct/create', [StaffDeductController::class, 'create'])->name('staffdeducts.staffdeductcreate');
//Route::get('deductns/create/save', [StaffDeductController::class, 'store'])->name('staffdeducts.store');

Route::get('nomroll', [NomrollController::class, 'index'])->name('nomrolls.nomroll');
//Route::get('staffdeduct/create', [StaffDeductController::class, 'create'])->name('staffdeducts.staffdeductcreate');
//Route::get('deductns/create/save', [StaffDeductController::class, 'store'])->name('staffdeducts.store');

Route::get('/paysalary', [PaySalary::class, 'runDeduct'])->name('paysalary');

//Route::get('paysalarys', [PayStaffController::class, 'doPayroll'])->name('paysalarys');

Route::get('paysalarys', [PayStaffController::class, 'runSalary'])->name('paysalarys');

//Route::get('/paysalarys', [PayStaffController::class, 'addAllow'])->name('paysalarys');

//Route::get('paysalarys', [PayStaffController::class, 'addLagalAllow'])->name('paysalarys');

//Route::get('/paysalarys', [PayStaffController::class, 'runSalary'])->name('paysalarys');

//Route::get('/paysalarys', [PayStaffController::class, 'addTotalDed'])->name('paysalarys');

//Route::get('/paysalarys', [PayStaffController::class, 'addGrossPay'])->name('paysalarys');

//Route::get('/paysalarys', [PayStaffController::class, 'calcDed'])->name('paysalarys');

//Route::get('/paysalarys', [PayStaffController::class, 'addWelfare'])->name('paysalarys');

//Route::resource('payrollnow', [SalaryPayrollController::class, 'create'])->name('payrollnow');

Route::get('/processpay', [SalaryPayrollController::class, 'index'])->name('processpay');

Route::get('/banksched', [BankSchedController::class, 'index'])->name('bankscheds.banksched');

Route::get('listing', [PayController::class, 'index'])->name('listing');