<?php

namespace FoodItems;

class HawaiianPizza extends FoodItem {

    protected static string $category = "HawaiianPizza";

    public function __construct(string $name = "HawaiianPizza", string $description = "", float $price = 4.9, int $cooktime = 8) {
        parent::__construct($name, $description, $price, $cooktime);
    }

    public static function getCategory(): string {
           return self::$category; 
    }

    public function __toString(): string {
        return "Hawaiian Pizza: Name: {$this->name}, Description: {$this->description}, Price: {$this->price}";
    }

}

?>