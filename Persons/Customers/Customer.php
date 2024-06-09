<?php

namespace Persons\Customers;

use Persons\Person;
use Restaurant\Restaurant;  
use Invoice\Invoice;
use Persons\Employees\Cashier;  

class Customer extends Person {
    private array $interestedTastesMap = [];

    public function __construct(string $name, int $age, string $address, array $interestedTastesMap) {
        parent::__construct($name, $age, $address);
        $this->interestedTastesMap = $interestedTastesMap;
        echo "{$this->name} wanted to eat " .implode(", ", array_keys($this->interestedTastesMap)). ".\n";
    }

    public function interestedCategories(Restaurant $restaurant): array {
        $orderList = [];

        foreach($this->interestedTastesMap as $itemName => $quantity) {
            foreach($restaurant->getMenu() as $foodItem) {
                if($foodItem->getName() == $itemName) {
                    for($i = 0; $i < $quantity; $i++) {
                        $orderList[] = $foodItem;
                    }
                }
            }
        }

        return $orderList;
    }

    public function order(Restaurant $restaurant): Invoice {
        $foodList = $this->interestedCategories($restaurant);

        $staffList = $restaurant->getEmployees();
        $cashier = null;
        foreach($staffList as $staff) {
            if($staff instanceof Cashier) {
                $cashier = $staff;
            }
        }

        $orders = [];
        foreach($this->interestedTastesMap as $foodName => $quantity) {
            $orders[] = "{$foodName} x {$quantity}";
        }
        $orderString = implode(", ", $orders);
        echo "{$this->name} was looking at the menu, and ordered {$orderString}." . "\n";

        $foodOrder = $cashier->generateOrder($foodList, $restaurant);
        $invoice = $cashier->generateInvoice($foodOrder);
        return $invoice;
    }
}
?>
