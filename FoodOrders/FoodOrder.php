<?php

namespace FoodOrders;

use DateTime;

class FoodOrder {

    private array $foodItems;
    private DateTime $orderTime;

    public function __construct(array $foodItems, DateTime $orderTime) {
        $this->foodItems = $foodItems;
        $this->orderTime = $orderTime;
    }

    public function getFoodItems(): array {
        return $this->foodItems;
    }

    public function getOrderTime(): DateTime {
        return $this->orderTime;
    }
}

?>