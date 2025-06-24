<?php

use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\Notas;
use App\Controllers\Notas\CriarController;
use App\Controllers\RegisterController;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use Core\Route;

(new Route)
    ->get('/', IndexController::class, GuestMiddleware::class)
    ->get('/login', [LoginController::class, 'index'], GuestMiddleware::class)
    ->post('/login', [LoginController::class, 'login'], GuestMiddleware::class)
    ->get('/registrar', [RegisterController::class, 'index'], GuestMiddleware::class)
    ->post('/registrar', [RegisterController::class, 'register'], GuestMiddleware::class)
    ->get('/logout', LogoutController::class, AuthMiddleware::class)
    ->get('/notas', Notas\IndexController::class, AuthMiddleware::class)
    ->get('/notas/criar', [CriarController::class, 'index'], AuthMiddleware::class)
    ->post('/notas/criar', [CriarController::class, 'store'], AuthMiddleware::class)
    ->put('/nota', Notas\AtualizarController::class, AuthMiddleware::class)
    ->delete('/nota', Notas\DeletarController::class, AuthMiddleware::class)
    ->get('/confirmar', [Notas\VisualizarController::class, 'confirmar'], AuthMiddleware::class)
    ->post('/mostrar', [Notas\VisualizarController::class, 'mostrar'], AuthMiddleware::class)
    ->get('/esconder', [Notas\VisualizarController::class, 'esconder'], AuthMiddleware::class)
    ->run();
