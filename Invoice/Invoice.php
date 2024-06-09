<?php

namespace Invoice;

use DateTime;

class Invoice {
    private float $finalPrice;
    private string $orderTime;
    private int $estimatedTimeInMinutes;

    public function __construct(float $finalPrice, string $orderTime, int $estimatedTimeInMinutes) {
        $this->finalPrice = $finalPrice;
        $this->orderTime = $orderTime;
        $this->estimatedTimeInMinutes = $estimatedTimeInMinutes;
    }

    public function printInvoice(): void {
        echo "-------------------------" . PHP_EOL;
        echo "Date: " . $this->getOrderTime() . PHP_EOL;
        echo "Final Price: $" . $this->getFinalPrice(). PHP_EOL;
        echo "-------------------------" . PHP_EOL;
    }
    

    public function getFinalPrice(): float {
        return $this->finalPrice;
    }

    public function getOrderTime(): string {
        return $this->orderTime;
    }

    public function getEstimatedTimeInMinutes(): int {
        return $this->getEstimatedTimeInMinutes;
    }
}
?>