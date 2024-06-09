<?php

namespace FoodItems;

class Spaghetti extends FoodItem {

    protected static string $category = "Spaghetti";

    public function __construct(string $name = "Spaghetti", string $description = "", float $price = 9.4, int $cooktime = 6) {
        parent::__construct($name, $description, $price, $cooktime);
    }

    public static function getCategory(): string {
        return self::$category; 
    }

    public function __toString(): string {
        return "Spaghetti: Name: {$this->name}, Description: {$this->description}, Price: {$this->price}";
    }

}

?>