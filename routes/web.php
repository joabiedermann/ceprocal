<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Auth::routes(['register' => false, 'verify' => false]);
Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => ['auth']], function () {
    // Dashboard
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    //Certificates
        //Courses
            Route::get('certificates/import', [App\Http\Controllers\CertificateController::class, 'import'])->name('certificates.import');
            Route::post('certificates/upload', [App\Http\Controllers\CertificateController::class, 'upload'])->name('certificates.upload');
            Route::get('certificates/upload', [App\Http\Controllers\CertificateController::class, 'get_upload'])->name('certificates.get_upload');
            Route::get('certificates/store', [App\Http\Controllers\CertificateController::class, 'store'])->name('certificates.store');
            Route::get('certificates/shipments/', [App\Http\Controllers\CertificateController::class, 'shipments'])->name('certificates.shipments');
            Route::get('certificates/show_shipment/{id}', [App\Http\Controllers\CertificateController::class, 'show_shipment'])->name('certificates.show_shipment');
            Route::get('certificates/generate_pdf/{id}', [App\Http\Controllers\CertificateController::class, 'generate_pdf'])->name('certificates.generate_pdf');
            //Send Email
            Route::post('certificates/send/{id}', [App\Http\Controllers\CertificateController::class, 'send'])->name('certificates.send');
            Route::get('certificates/send/{id}', [App\Http\Controllers\CertificateController::class, 'send'])->name('certificates.send');
            Route::get('certificates/send_massive/{id}', [App\Http\Controllers\CertificateController::class, 'send_massive'])->name('certificates.send_massive');
        //Forums
            Route::get('forums_certificates/import', [App\Http\Controllers\ForumCertificateController::class, 'import'])->name('forums_certificates.import');
            Route::post('forums_certificates/upload', [App\Http\Controllers\ForumCertificateController::class, 'upload'])->name('forums_certificates.upload');
            Route::get('forums_certificates/upload', [App\Http\Controllers\ForumCertificateController::class, 'get_upload'])->name('forums_certificates.get_upload');
            Route::get('forums_certificates/store', [App\Http\Controllers\ForumCertificateController::class, 'store'])->name('forums_certificates.store');
            Route::get('forums_certificates/shipments/', [App\Http\Controllers\ForumCertificateController::class, 'shipments'])->name('forums_certificates.shipments');
            Route::get('forums_certificates/show_shipment/{id}', [App\Http\Controllers\ForumCertificateController::class, 'show_shipment'])->name('forums_certificates.show_shipment');
            Route::get('forums_certificates/generate_pdf/{id}', [App\Http\Controllers\ForumCertificateController::class, 'generate_pdf'])->name('forums_certificates.generate_pdf');
            //Send Email
            Route::post('forums_certificates/send/{id}', [App\Http\Controllers\ForumCertificateController::class, 'send'])->name('forums_certificates.send');
            Route::get('forums_certificates/send/{id}', [App\Http\Controllers\ForumCertificateController::class, 'send'])->name('forums_certificates.send');
            Route::get('forums_certificates/send_massive/{id}', [App\Http\Controllers\ForumCertificateController::class, 'send_massive'])->name('forums_certificates.send_massive');

    //Courses
    Route::get('courses', [App\Http\Controllers\CourseController::class, 'index'])->name('courses.index');
    Route::get('courses/show/{id}', [App\Http\Controllers\CourseController::class, 'show'])->name('courses.show');
    Route::get('courses/create', [App\Http\Controllers\CourseController::class, 'create'])->name('courses.create');
    Route::post('courses/store', [App\Http\Controllers\CourseController::class, 'store'])->name('courses.store');
    Route::get('courses/edit/{id}', [App\Http\Controllers\CourseController::class, 'edit'])->name('courses.edit');
    Route::post('courses/update/{id}', [App\Http\Controllers\CourseController::class, 'update'])->name('courses.update');
    Route::get('courses/get_status/{id}', [App\Http\Controllers\CourseController::class, 'get_status'])->name('courses.get_status');
    Route::post('courses/update_status/{id}', [App\Http\Controllers\CourseController::class, 'update_status'])->name('courses.update_status');
    Route::get('courses/get_destroy/{id}', [App\Http\Controllers\CourseController::class, 'get_destroy'])->name('courses.get_destroy');
    Route::delete('courses/destroy/{id}', [App\Http\Controllers\CourseController::class, 'destroy'])->name('courses.destroy');
    Route::post('courses/store_asociate/{id}', [App\Http\Controllers\CourseCompanyController::class, 'store'])->name('courses.store_company');
    Route::get('courses/edit_asociate/{id}', [App\Http\Controllers\CourseCompanyController::class, 'edit'])->name('courses.edit_company');
    Route::post('courses/update_asociate/{id}', [App\Http\Controllers\CourseCompanyController::class, 'update'])->name('courses.update_company');
    Route::get('courses/update_asociate/{id}', [App\Http\Controllers\CourseCompanyController::class, 'update'])->name('courses.update_company');
    Route::get('courses/get_destroy_asociate/{id}', [App\Http\Controllers\CourseCompanyController::class, 'get_destroy'])->name('courses.get_destroy_company');
    Route::delete('courses/destroy_asociate/{id}', [App\Http\Controllers\CourseCompanyController::class, 'destroy'])->name('courses.destroy_company');

    //Forums
    Route::get('forums', [App\Http\Controllers\ForumController::class, 'index'])->name('forums.index');
    Route::get('forums/show/{id}', [App\Http\Controllers\ForumController::class, 'show'])->name('forums.show');
    Route::get('forums/create', [App\Http\Controllers\ForumController::class, 'create'])->name('forums.create');
    Route::post('forums/store', [App\Http\Controllers\ForumController::class, 'store'])->name('forums.store');
    Route::get('forums/edit/{id}', [App\Http\Controllers\ForumController::class, 'edit'])->name('forums.edit');
    Route::post('forums/update/{id}', [App\Http\Controllers\ForumController::class, 'update'])->name('forums.update');
    Route::get('forums/get_status/{id}', [App\Http\Controllers\ForumController::class, 'get_status'])->name('forums.get_status');
    Route::post('forums/update_status/{id}', [App\Http\Controllers\ForumController::class, 'update_status'])->name('forums.update_status');
    Route::get('forums/get_destroy/{id}', [App\Http\Controllers\ForumController::class, 'get_destroy'])->name('forums.get_destroy');
    Route::delete('forums/destroy/{id}', [App\Http\Controllers\ForumController::class, 'destroy'])->name('forums.destroy');
    
    //Students
    Route::get('students', [App\Http\Controllers\StudentController::class, 'index'])->name('students.index');
    Route::get('students/show/{id}', [App\Http\Controllers\StudentController::class, 'show'])->name('students.show');
    Route::get('students/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('students.edit');
    Route::post('students/update/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('students.update');
    Route::get('students/get_status/{id}', [App\Http\Controllers\StudentController::class, 'get_status'])->name('students.get_status');
    Route::post('students/update_status/{id}', [App\Http\Controllers\StudentController::class, 'update_status'])->name('students.update_status');
    Route::get('students/get_email/{id}', [App\Http\Controllers\StudentController::class, 'get_email'])->name('students.get_email');
    Route::post('students/update_email/{id}', [App\Http\Controllers\StudentController::class, 'update_email'])->name('students.update_email');
    Route::get('students/get_destroy/{id}', [App\Http\Controllers\StudentController::class, 'get_destroy'])->name('students.get_destroy');
    Route::delete('students/destroy/{id}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('students.destroy');

    //Teachers
    Route::get('teachers', [App\Http\Controllers\TeacherController::class, 'index'])->name('teachers.index');
    Route::get('teachers/show/{id}', [App\Http\Controllers\TeacherController::class, 'show'])->name('teachers.show');
    Route::get('teachers/edit/{id}', [App\Http\Controllers\TeacherController::class, 'edit'])->name('teachers.edit');
    Route::post('teachers/update/{id}', [App\Http\Controllers\TeacherController::class, 'update'])->name('teachers.update');
    Route::get('teachers/get_status/{id}', [App\Http\Controllers\TeacherController::class, 'get_status'])->name('teachers.get_status');
    Route::post('teachers/update_status/{id}', [App\Http\Controllers\TeacherController::class, 'update_status'])->name('teachers.update_status');
    Route::get('teachers/get_destroy/{id}', [App\Http\Controllers\TeacherController::class, 'get_destroy'])->name('teachers.get_destroy');
    Route::delete('teachers/destroy/{id}', [App\Http\Controllers\TeacherController::class, 'destroy'])->name('teachers.destroy');

    //Users
    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('users/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::post('users/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('users/get_status/{id}', [App\Http\Controllers\UserController::class, 'get_status'])->name('users.get_status');
    Route::post('users/update_status/{id}', [App\Http\Controllers\UserController::class, 'update_status'])->name('users.update_status');
    Route::get('users/get_destroy/{id}', [App\Http\Controllers\UserController::class, 'get_destroy'])->name('users.get_destroy');
    Route::delete('users/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

        //Profile
        Route::get('my_profile/{id}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profiles.show');
        Route::post('my_profile/update/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profiles.update');
        Route::post('my_profile/update_password/{id}', [App\Http\Controllers\ProfileController::class, 'update_password'])->name('profiles.update_password');
        Route::post('my_profile/inactivate/{id}', [App\Http\Controllers\ProfileController::class, 'inactivate'])->name('profiles.inactivate');

    //Roles
    Route::get('roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/show/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('roles.show');
    Route::get('roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
    Route::post('roles/update/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::get('roles/get_status/{id}', [App\Http\Controllers\RoleController::class, 'get_status'])->name('roles.get_status');
    Route::post('roles/update_status/{id}', [App\Http\Controllers\RoleController::class, 'update_status'])->name('roles.update_status');
    Route::get('roles/get_destroy/{id}', [App\Http\Controllers\RoleController::class, 'get_destroy'])->name('roles.get_destroy');
    Route::delete('roles/destroy/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');

    //Permissions
    Route::get('permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
    Route::get('permissions/show/{id}', [App\Http\Controllers\PermissionController::class, 'show'])->name('permissions.show');

    //Company
    Route::get('company/show', [App\Http\Controllers\CompanyController::class, 'show'])->name('company.show');
    Route::get('company/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
    Route::post('company/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
    Route::get('company/edit/{id}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
    Route::post('company/update/{id}', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
});
