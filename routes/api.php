<?php

//Controladores

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\ImageController; //imagen
use App\Http\Controllers\api\CommentController; //comentario
use App\Http\Controllers\api\ProjectCategoryController; //categoria
use App\Http\Controllers\api\ProjectController; //proyecto
use App\Http\Controllers\api\TechnologyController; //tecnologia
use App\Http\Controllers\api\UserController; //usuario

//Controllers with cut route

//imagen
Route::apiResource('image', App\Http\Controllers\api\ImageController::class);

//comentario
Route::apiResource('comment', App\Http\Controllers\api\CommentController::class);

//categoria
Route::apiResource('projectCategory', App\Http\Controllers\api\ProjectCategoryController::class);
Route::get('/categories/{id}/projects', [ProjectCategoryController::class, 'showWithProjects']);

//proyecto
Route::apiResource('project', App\Http\Controllers\api\ProjectController::class);

//tecnologia
Route::apiResource('technology', App\Http\Controllers\api\TechnologyController::class);

//usuario
Route::apiResource('user', App\Http\Controllers\api\UserController::class);

