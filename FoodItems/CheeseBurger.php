<?php

namespace FoodItems;

class CheeseBurger extends FoodItem {

    protected static string $category = 'CheeseBurger';
    
    public function __construct(string $name = "CheeseBurger", string $description = "", float $price = 5.4, int $cooktime = 6) {
        parent::__construct($name, $description, $price, $cooktime);
    }
    

    public static function getCategory(): string {
        return self::$category; 
    }

    public function __toString(): string {
        return "CheeseBurger: Name: {$this->name}, Description: {$this->description}, Price: {$this->price}";
    }

}

?>