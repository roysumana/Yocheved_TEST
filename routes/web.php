<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Modules\Student\Http\Controllers\StudentController;
use App\Modules\Report\Http\Controllers\ReportController;
use App\Modules\Session\Http\Controllers\SessionController;
use App\Modules\Template\Http\Controllers\TemplateController;

Route::get('/', function () {
    if(Auth::check()){
        return redirect('/student');
    } else {
        return redirect('/login');
    }
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::resource('student', StudentController::class);
    Route::resource('session', SessionController::class);
    Route::resource('template', TemplateController::class);
    Route::resource('report', ReportController::class);
});
Route::get('routes', function () {
    $routeCollection = Route::getRoutes();

    echo "<table style='width:100%'>";
    echo "<tr>";
    echo "<td width='10%'><h4>HTTP Method</h4></td>";
    echo "<td width='10%'><h4>Route</h4></td>";
    echo "<td width='10%'><h4>Name</h4></td>";
    echo "<td width='70%'><h4>Corresponding Action</h4></td>";
    echo "</tr>";
    foreach ($routeCollection as $value) {
        echo "<tr>";
        echo "<td>" . $value->methods()[0] . "</td>";
        echo "<td>" . $value->uri() . "</td>";
        echo "<td>" . $value->getName() . "</td>";
        echo "<td>" . $value->getActionName() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
});
