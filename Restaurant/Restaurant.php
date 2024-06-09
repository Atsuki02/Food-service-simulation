<?php

namespace Restaurant;

use Invoice\Invoice;

class Restaurant {
    private array $menu;
    private array $employees;

    public function __construct(array $menu, array $employees) {
        $this->menu = $menu;
        $this->employees = $employees;
    }

    public function order(array $categories): Invoice {
        $orderedItems = array_filter($this->menu, function($item) use ($categories) {
            return in_array($item->getName(), $categories);
        });

        $totalPrice = array_sum(array_map(function($item) {
            return $item->getPrice();
        }, $orderedItems));
        $orderTime = new \DateTime();
        $completionTime = count($orderedItems) * 5; 

        return new Invoice($orderedItems, $totalPrice, $orderTime, $completionTime);
    }

    public function getMenu(): array {
        return $this->menu;
    }

    public function getEmployees(): array {
        return $this->employees;
    }
}
?>