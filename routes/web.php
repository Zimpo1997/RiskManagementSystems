<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainriskController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RmAdmin\ManagementController as RmAdminManagementController;
use App\Http\Controllers\RmProgram\ManagementController as RmProgramManagementController;
use App\Http\Controllers\Boss\ManagementController as BossManagementController;
use App\Http\Controllers\Agency\ManagementController as AgencyManagementController;
use App\Http\Controllers\Agency\UploadfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Settings\Organizations\MissionController;
use App\Http\Controllers\Settings\Organizations\WorkgroupController;
use App\Models\Uploadfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

// Route::any('{slug}', function () {
//     if (isset(Auth::user()->username)) {
//         return redirect('dashboard');
//     } else {
//         return redirect('login');
//     }
// });

Route::get('/', [AuthController::class, 'index'])->name('login'); // */*
Route::post('/checklogin', [AuthController::class, 'checklogin']); // */*

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name(
    'register'
); // */*
Route::post('/checkregister', [AuthController::class, 'checkregister']); // */*
Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); // */*

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        // $user = User::find(Auth::id());
        // $member = $user->member()->first();

        // return $member;
        return view('dashboard');
    });

    Route::get('/profile', [ProfileController::class, 'index']);

    Route::get('/member', [MemberController::class, 'index']);
    Route::post('/member/create', [MemberController::class, 'import']);

    Route::get('/users', [UserController::class, 'index'])->name('users'); // */*
    Route::get('/user/create', [UserController::class, 'create']); // */*
    Route::post('/user/create', [UserController::class, 'store']); // */*
    Route::get('/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/user/update/{id}', [UserController::class, 'update']); // */*
    Route::get('/user/delete/{id}', [UserController::class, 'destroy']); // */*
    Route::post('/user/changeActive', [UserController::class, 'changeActive']);

    Route::get('/roles', [RoleController::class, 'index']); // */*
    Route::get('/roles/create', [RoleController::class, 'create']); // */*
    Route::post('/roles/create', [RoleController::class, 'store']); // */*
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit']); // */*
    Route::post('/roles/edit/{id}', [RoleController::class, 'update']); // */*
    Route::get('/roles/delete/{id}', [RoleController::class, 'destroy']); // */*

    Route::get('/permissions', [PermissionController::class, 'index']); // */*
    Route::get('/permissions/create', [PermissionController::class, 'create']); // */*
    Route::post('/permissions/create', [PermissionController::class, 'store']); // */*
    Route::get('/permissions/edit/{id}', [PermissionController::class, 'edit']); // */*
    Route::post('/permissions/edit/{id}', [
        PermissionController::class,
        'update',
    ]); // */*
    Route::get('/permissions/delete/{id}', [
        PermissionController::class,
        'destroy',
    ]); // */*

    // Settings Organizations Mission Start
    Route::get('/missions', [MissionController::class, 'index']); // */*
    Route::post('/missions/store', [MissionController::class, 'store']); // */*
    Route::get('/missions/edit/{id}', [MissionController::class, 'edit']); // */*
    Route::post('/missions/update/{id}', [MissionController::class, 'update']); // */*
    Route::get('/missions/delete/{id}', [MissionController::class, 'destroy']); // */*
    // Settings Organizations Mission End

    // Settings Organizations Workgroup Start
    Route::get('/workgroups', [WorkgroupController::class, 'index']); // */*
    Route::get('/workgroups/create', [WorkgroupController::class, 'create']); // */*
    Route::post('/workgroups/store', [WorkgroupController::class, 'store']); // */*
    Route::get('/workgroups/edit/{id}', [WorkgroupController::class, 'edit']); // */*
    Route::post('/workgroups/update/{id}', [
        WorkgroupController::class,
        'update',
    ]); // */*
    Route::get('/workgroups/delete/{id}', [
        WorkgroupController::class,
        'destroy',
    ]); // */*
    // Settings Organizations Workgroup End

    Route::get('/risks', [MainriskController::class, 'index']); // */*
    Route::get('/risks/create', [MainriskController::class, 'create']); // */*
    Route::post('/risks/create', [MainriskController::class, 'store']); // */*
    Route::get('/risks/show/{id}', [MainriskController::class, 'show']); // */*
    Route::get('/risks/edit/{id}', [MainriskController::class, 'edit']); // */*
    Route::post('/risks/update', [MainriskController::class, 'update']); // */*
    Route::get('/risks/delete/{id}', [MainriskController::class, 'destroy']); // */*

    //Rm Admin
    Route::get('/risks/rmadmin/manage', [
        RmAdminManagementController::class,
        'index',
    ]);
    Route::get('/risks/rmadmin/show', [
        RmAdminManagementController::class,
        'show',
    ]);
    Route::post('/risks/rmadmin/sendprogram', [
        RmAdminManagementController::class,
        'sendprogram',
    ]);
    Route::get('/risks/rmadmin/showbackprogram', [
        RmAdminManagementController::class,
        'showbackprogram',
    ]);

    //Rm Program
    Route::get('/risks/rmprogram/manage', [
        RmProgramManagementController::class,
        'index',
    ]);
    Route::post('/risks/rmprogram/backprogram', [
        RmProgramManagementController::class,
        'backprogram',
    ]);
    Route::post('/risks/rmprogram/sendagency', [
        RmProgramManagementController::class,
        'sendagency',
    ]);
    Route::get('/risks/rmprogram/show', [
        RmProgramManagementController::class,
        'show',
    ]);
    Route::post('/risks/rmprogram/check', [
        RmProgramManagementController::class,
        'check',
    ]);
    Route::get('/risks/rmprogram/showbackprogram', [
        RmProgramManagementController::class,
        'showbackprogram',
    ]);
    Route::post('/risks/rmprogram/sendagainagency', [
        RmProgramManagementController::class,
        'sendagainagency',
    ]);

    //Rm Boss
    Route::get('/risks/boss/manage', [
        BossManagementController::class,
        'index',
    ]);
    Route::post('/risks/boss/backprogram', [
        BossManagementController::class,
        'backprogram',
    ]);
    Route::post('/risks/boss/sendagency', [
        BossManagementController::class,
        'sendagency',
    ]);
    Route::get('/risks/boss/show', [BossManagementController::class, 'show']);
    Route::get('/risks/boss/showbackprogram', [
        BossManagementController::class,
        'showbackprogram',
    ]);

    //Rm Agency
    Route::get('/risks/agency', [AgencyManagementController::class, 'index']);
    Route::get('/risks/agency/manage', [
        AgencyManagementController::class,
        'manage',
    ]);
    Route::get('/risks/agency/edit/{id}', [
        AgencyManagementController::class,
        'edit',
    ]);
    Route::post('/risks/agency/update/', [
        AgencyManagementController::class,
        'update',
    ]);
    Route::get('/risks/agency/show', [
        AgencyManagementController::class,
        'show',
    ]);
    Route::post('/risks/agency/backprogram', [
        BossManagementController::class,
        'backprogram',
    ]);
    Route::get('/risks/agency/listevent', [
        AgencyManagementController::class,
        'listevent',
    ]);

    Route::get('/download/{id}', function ($id) {
        $file = Uploadfile::find($id)->first();
        $myFile = storage_path('app/' . $file->filepath);
        return response()->download($myFile);
    });
});
