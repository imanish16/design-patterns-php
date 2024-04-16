<?php

interface pricingModel{
    function calculatePrice($items);
}

class RegularPricing implements pricingModel{
    
    public function calculatePrice($items){
        $total_price = 0;
        foreach ($items as $key => $value) {
           $total_price += $value;
        }
        return $total_price;
    }
}


class DiscountPricing implements pricingModel{
    
    public function calculatePrice($items){
        $total_price = 0;
        foreach ($items as $key => $value) {
           $total_price += $value;
        }
        return $total_price * 0.9;
    }
}

class ShoppingCart{
    private $strategy;

    public function setPricingStrategy(pricingModel  $pricingStrategy){
        $this->strategy = $pricingStrategy;
    }

    public function getTotal($items){
        return $this->strategy->calculatePrice($items);
    }
}



$obj = new ShoppingCart();
$obj->setPricingStrategy(new DiscountPricing());
$arr = [
    'item1'=>42,
    'item2'=>48,
    'item3'=>87,
];
echo $obj->getTotal($arr);