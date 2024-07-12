<?php

namespace App\Services\OrderFinalCost;

interface OrderFinalCostInterface
{
    public function calculateCost(int $cost);
}