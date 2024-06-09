<?php

namespace Persons\Employees;

use Persons\Employees\Employee;
use Restaurant\Restaurant;
use FoodOrders\FoodOrder;
use Invoice\Invoice;
use Persons\Employees\Chef;
use DateTime;

class Cashier extends Employee {
    public function __construct(string $name, int $age, string $address, int $employeeId, float $salary){
        parent::__construct($name, $age, $address, $employeeId, $salary);
    }

    public function generateOrder(array $categories, Restaurant $restaurant): FoodOrder {
        $order = new FoodOrder($categories, new DateTime());

        $staffList = $restaurant->getEmployees();
        $chef = null;
        foreach ($staffList as $staff) {
            if ($staff instanceof Chef) {
                $chef = $staff;
                break;
            }
        }

        if ($chef !== null) {
            $chef->prepareFood($order);
        } 
        return $order;
    }

    public function generateInvoice(FoodOrder $order): Invoice {
        $totalPrice = 0;

        $orderTime = $order->getOrderTime()->format('Y/m/d/ H:i:s');

        $totalCooktime = 0;

        foreach($order->getFoodItems() as $foodItem) {
            $totalPrice += $foodItem->getPrice();
            $totalCooktime += $foodItem->getCookTime();
        }
        $invoice = new Invoice($totalPrice, $orderTime, $totalCooktime);
        echo "{$this->name} made the invoice."."\n";

        return $invoice;
    }
}

?>