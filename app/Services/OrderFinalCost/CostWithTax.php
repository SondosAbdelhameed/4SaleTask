<?php

namespace App\Services\OrderFinalCost;

class CostWithTax implements OrderFinalCostInterface
{ 
    public function calculateCost(int $cost)
    {
        $data['service'] = 20;
        $data['tax'] = 14;
        $data['total'] = $cost + (($cost * ($data['service'] + $data['tax']))/100);

        return $data;
    }
}