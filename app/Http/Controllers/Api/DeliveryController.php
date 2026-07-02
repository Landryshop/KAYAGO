<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Récupérer les informations de livraison pour un colis
     */
    public function getStatus($trackingNumber)
    {
        return response()->json([
            'status' => 'success',
            'data' => [
                'tracking_number' => $trackingNumber,
                'current_status' => 'in_transit',
                'message' => 'Votre colis est en route pour Kinshasa.'
            ]
        ]);
    }
}
