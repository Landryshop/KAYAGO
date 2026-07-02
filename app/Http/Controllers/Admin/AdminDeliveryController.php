<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DeliveryCalculator;
use Illuminate\Http\Request;

class AdminDeliveryController extends Controller
{
    protected $calculator;

    // Injection du service : Laravel comprend tout seul qu'il doit utiliser votre calculateur
    public function __construct(DeliveryCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    public function estimate(Request $request)
    {
        $price = $this->calculator->calculatePrice(
            $request->input('distance'), 
            $request->input('weight')
        );

        return response()->json([
            'message' => 'Estimation calculée avec succès',
            'estimated_price' => $price,
            'currency' => 'CDF'
        ]);
    }
}
