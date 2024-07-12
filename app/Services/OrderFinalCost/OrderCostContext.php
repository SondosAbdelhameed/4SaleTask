<?php

namespace App\Services\OrderFinalCost;

use App\Services\OrderFinalCost\OrderFinalCostInterface;
use App\Services\OrderFinalCost\CostWithoutTax;
use App\Services\OrderFinalCost\CostWithTax;
use App\Enums\OrderCostWayEnum;

class OrderCostContext
{
    private OrderFinalCostInterface $order_cost;

    public function __construct(int $paymentMethod)
    {
        $this->order_cost = match ($paymentMethod) {
            OrderCostWayEnum::WITHOUTtAX->value => new CostWithoutTax(),
            OrderCostWayEnum::WITHTAX->value => new CostWithTax()
        };
    }

    public function pay($amount)
    {
        return $this->order_cost->calculateCost($amount);
    }
}