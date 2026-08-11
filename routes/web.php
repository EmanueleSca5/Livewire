<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get("/product/index" , [ProductController::class , "index"])->name("index");
Route::get("/product/{product}/edit" , [ProductController::class , "edit"])->name("edit");
Route::get("/product/create" , [ProductController::class , "create"])->name("create");
Route::put("/product/{product}/update" , [ProductController::class , "update"])->name("update");
Route::delete("/product/{product}/delete" , [ProductController::class , "destroy"])->name("delete");
Route::get("/product/show/{product}" , [ProductController::class , "show"])->name("show");



