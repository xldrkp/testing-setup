<?php

namespace Qafoo;

class MyCheckoutTest extends \PHPUnit_Framework_TestCase
{
    private $checkout;

    public function setUp()
    {
        $this->checkout = new Checkout();
    }

    /**
     * @test
     */
    public function checkout_calculates_for_single_product()
    {
        $this->checkout->registerProduct('A');

        $this->assertEquals(
            0.5,
            $this->checkout->calculateSum()
        );
    }

    /**
     * @test
     */
    public function checkout_calculates_for_another_single_product()
    {
        $this->checkout->registerProduct('B');

        $this->assertEquals(
           0.79,
            $this->checkout->calculateSum()
        );
    }

    /**
     * @test
     */
    public function check_if_article_in_product_list()
    {
        $this->assertEquals(
            true,
            $this->checkout->isInArticleList('A')
        );
    }

    /**
     * @test
     */
    public function fail_if_article_is_not_in_product_list()
    {
        $this->assertEquals(
            false,
            $this->checkout->isInArticleList('Z')
        );
    }

    /**
     * @test
     */
    public function calculate_sum_for_several_products()
    {
        $this->checkout->registerProduct('A');
        $this->checkout->registerProduct('B');

        $this->assertEquals(
            1.29,
            $this->checkout->calculateSum()
        );
    }
}