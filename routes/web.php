<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductManufactureController;
use App\Http\Controllers\ProjectContructionController;
use App\Http\Controllers\ProjectManufactureController;
use App\Models\Product;
use App\Models\ProductManufacture;
use App\Models\ProjectContruction;
use App\Models\ProjectManufacture;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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

// -------------- Main  ---------------------------------------------------
Route::get('/', function () {
    return view('Main.master');
})->name('main');



// -------------- Manufacture ---------------------------------------------------
Route::get('/Manufacturing', function () {
    return view('Manufacture.index');
})->name('manufacture');

Route::get('/Manufacturing/About', function () {
    return view('Manufacture.about');
})->name('manufacture.about');

Route::get('/Manufacturing/Projects', [ProjectManufactureController::class, 'index'])->name('manufacture.projects');

Route::get('/Manufacturing/Projects/{id}', [ProjectManufactureController::class, 'detail'])->name('manufacture.project-details');

Route::get('/Manufacturing/Products', [ProductManufactureController::class, 'index'])->name('manufacture.products');

Route::get('/Manufacturing/Products/{nama}', [ProductManufactureController::class, 'detail'])->name('manufacture.products-details');

Route::post('/Manufacturing/Products/search',[ProductManufactureController::class,'showProducts'])->name('manufacture.search');


// -------------- Contruction ---------------------------------------------------
Route::get('/Contruction', function () {
    $projects = ProjectContruction::latest()->paginate(6);
    return view('Contruction.index', compact('projects'));
})->name('contruction');

Route::get('/Contruction/About', function () {
    return view('Contruction.about');
})->name('contruction.about');

Route::get('/Contruction/Projects', [ProjectContructionController::class, 'index'])->name('contruction.projects');

Route::get('/Contruction/Projects/{id}', [ProjectContructionController::class, 'detail'])->name('contruction.project-details');

Route::get('/Contruction/Products', [ProductController::class, 'index'])->name('contruction.products');

Route::get('/Contruction/Products/{nama}', [ProductController::class, 'detail'])->name('contruction.products-details');

Route::post('/Contruction/Products/search',[ProductController::class,'showProducts'])->name('contruction.search');


// -------------- Law ---------------------------------------------------
Route::get('/Taxes', function () {
    return view('Law.index');
})->name('law');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $productContruction = Product::latest()->paginate(6);
        $projectContruction = ProjectContruction::latest()->paginate(6);
        $productManufacture = ProductManufacture::latest()->paginate(6);
        $projectManufacture = ProjectManufacture::latest()->paginate(6);

        return view('dashboard', compact('productContruction','projectContruction','productManufacture','projectManufacture'));
    })->name('dashboard');

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    //Contruction ---------------------------------------------------
    Route::get('/dashboard/entryProduct', [ProductController::class, 'entryPage'])->name('dashboard.entry.product');
    Route::post('/dashboard/insertingProduct', [ProductController::class, 'entryAdd']) -> name('dashboard.insert.product');
    Route::get('/dashboard/dataTableProducts', [ProductController::class, 'dataTableProduct'])->name('dashboard.datatable.product');
    Route::get('/dashboard/dataTableProducts/editProduct/{nama}', [ProductController::class, 'editProduct']);
    Route::post('/dashboard/dataTableProducts/saveProduct/{id}', [ProductController::class, 'saveEdit']);
    Route::get('/dashboard/dataTableProducts/deleteProduct/{id}', [ProductController::class, 'deleteProduct']);

    Route::get('/dashboard/entryProject', [ProjectContructionController::class, 'entryPage'])->name('dashboard.entry.project');
    Route::post('/dashboard/insertingProject', [ProjectContructionController::class, 'entryAdd']) -> name('dashboard.insert.project');
    Route::get('/dashboard/dataTableProject', [ProjectContructionController::class, 'dataTableProject'])->name('dashboard.datatable.project');
    Route::get('/dashboard/dataTableProject/editProject/{nama}', [ProjectContructionController::class, 'editProject']);
    Route::post('/dashboard/dataTableProject/saveProject/{id}', [ProjectContructionController::class, 'saveEdit']);
    Route::get('/dashboard/dataTableProject/deleteProject/{id}', [ProjectContructionController::class, 'deleteProject']);


    //Manufacture ---------------------------------------------------
    Route::get('/dashboard/manufacture/entryProduct', [ProductManufactureController::class, 'entryPage'])->name('manufacture.entry.product');
    Route::post('/dashboard/manufacture/insertingProduct', [ProductManufactureController::class, 'entryAdd']) -> name('manufacture.insert.product');
    Route::get('/dashboard/manufacture/dataTableProducts', [ProductManufactureController::class, 'dataTableProduct'])->name('manufacture.datatable.product');
    Route::get('/dashboard/manufacture/dataTableProducts/editProduct/{nama}', [ProductManufactureController::class, 'editProduct']);
    Route::post('/dashboard/manufacture/dataTableProducts/saveProduct/{id}', [ProductManufactureController::class, 'saveEdit']);
    Route::get('/dashboard/manufacture/dataTableProducts/deleteProduct/{id}', [ProductManufactureController::class, 'deleteProduct']);

    Route::get('/dashboard/manufacture/entryProject', [ProjectManufactureController::class, 'entryPage'])->name('manufacture.entry.project');
    Route::post('/dashboard/manufacture/insertingProject', [ProjectManufactureController::class, 'entryAdd']) -> name('manufacture.insert.project');
    Route::get('/dashboard/manufacture/dataTableProject', [ProjectManufactureController::class, 'dataTableProject'])->name('manufacture.datatable.project');
    Route::get('/dashboard/manufacture/dataTableProject/editProject/{nama}', [ProjectManufactureController::class, 'editProject']);
    Route::post('/dashboard/manufacture/dataTableProject/saveProject/{id}', [ProjectManufactureController::class, 'saveEdit']);
    Route::get('/dashboard/manufacture/dataTableProject/deleteProject/{id}', [ProjectManufactureController::class, 'deleteProject']);

});
