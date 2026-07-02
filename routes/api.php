<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Admin\AdminDeliveryController;

// Routes pour l'application mobile (utilisateur)
Route::get('/delivery/status/{trackingNumber}', [DeliveryController::class, 'getStatus']);

// Routes pour le panneau Admin (gestionnaire)
Route::post('/admin/delivery/estimate', [AdminDeliveryController::class, 'estimate']);

// Route pour le suivi de colis
Route::get('/tracking/colis/{code}', [DeliveryController::class, 'track']);
