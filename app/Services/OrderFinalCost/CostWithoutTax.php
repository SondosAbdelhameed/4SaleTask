<?php

namespace App\Services\OrderFinalCost;

class CostWithoutTax implements OrderFinalCostInterface
{ 
    public function calculateCost(int $cost)
    {
      $data['service'] = 15;
      $data['tax'] = 0;
      $data['total'] = $cost + (($cost * $data['service'])/100);

      return $data;
    }
}