<?php

namespace FoodItems;

class Fettuccine extends FoodItem {

    protected static string $category = "Fettuccine";

    public function __construct(string $name = "Fettuccine", string $description = "", float $price = 5.8, int $cooktime = 4) {
        parent::__construct($name, $description, $price, $cooktime);
    }

    public static function getCategory(): string {
        return self::$category;  
    }

    public function __toString(): string {
        return "Fettuccine: Name: {$this->name}, Description: {$this->description}, Price: {$this->price}";
    }

}

?>