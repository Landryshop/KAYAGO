<?php

namespace App\Services;

class DeliveryCalculator
{
    /**
     * Calcule le coût de livraison selon la distance
     */
    public function calculatePrice(float $distance, float $weight): float
    {
        $basePrice = 1000; // Prix de base en CDF
        $pricePerKm = 500;
        
        // Logique métier : prix base + (distance * km) + (poids * forfait)
        $total = $basePrice + ($distance * $pricePerKm) + ($weight * 200);
        
        return $total;
    }
}
