<?php

use App\Http\Controllers\ProjectsController;
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
    return view('welcome');
});

//Route for the get request on the ProjectsTest.php file
Route::get('/projects', [ProjectsController::class, 'index']);

//Route for the get request on the ProjectsTest.php file
Route::get('/projects/{project}', [ProjectsController::class, 'show']);

//Route for the post request on the ProjectsTest.php file
Route::post('projects', [ProjectsController::class, 'store']);
