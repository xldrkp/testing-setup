<?php

namespace Qafoo;

class Checkout
{
    private $price = 0.0;

    private $display;

    public function __construct(Display $display)
    {
        $this->display = $display;
    }

    public function registerProduct($price)
    {
        $this->price += $price;
        $this->display->renderText($this->price);
    }

    public function calculateSum()
    {
         return $this->price;
    }
}
