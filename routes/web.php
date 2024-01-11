<?php

use App\Models\Project;
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
Route::get('/projects', function(){
    //We want to fetch all of the projects
    $projects = Project::all();

    return view('projects.index', compact('projects'));
});

//Route for the post request on the ProjectsTest.php file
Route::post('projects', function () {
    //Validation

    //Perpetuation
    Project::create(request(['title', 'description']));
    //Redirection

});
