<?php
spl_autoload_extensions(".php");
spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $file = __DIR__ . '/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});


$cheeseBurger = new \FoodItems\CheeseBurger();
$fettuccine = new \FoodItems\Fettuccine();
$hawaiianPizze = new \FoodItems\HawaiianPizza();
$spaghetti = new \FoodItems\Spaghetti();

$Inavah = new \Persons\Employees\Chef("Inavah Lozano", 40, "Osaka", 1, 30.0);
$Nadia = new \Persons\Employees\Cashier("Nadia Valentine", 21, "Tokyo", 1, 20.0);

$saizerya = new \Restaurant\Restaurant(
    [
        $cheeseBurger,
        $fettuccine,
        $hawaiianPizze,
        $spaghetti
    ],
    [
        $Inavah,
        $Nadia
    ]
    ); 

$interestedTastesMap = [
    "Margherita" => 1,
    "CheeseBurger" => 2,
    "Spaghetti" => 1
];

$Tom = new \Persons\Customers\Customer("Tom", 20, "Saitama", $interestedTastesMap);
$invoice = $Tom->order($saizerya);
$invoice->printInvoice();

?>