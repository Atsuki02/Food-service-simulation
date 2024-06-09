<?php

namespace Persons\Employees;

use Persons\Employees\Employee;
use FoodOrders\FoodOrder; 

class Chef extends Employee {
    public function __construct(string $name, int $age, string $address, int $employeeId, float $salary){
        parent::__construct($name, $age, $address, $employeeId, $salary);
    }

    public function prepareFood(FoodOrder $foodOrder): void {
        $totalCooktime = 0;
        foreach ($foodOrder->getFoodItems() as $item) {
            $totalCooktime += $item->getCooktime();
            echo "The chef {$this->name} cooked a " . $item::getCategory() . "\n";
        }

        echo "The chef {$this->name} took {$totalCooktime} minutes to cook."."\n"; 
    }
}
 
?>
