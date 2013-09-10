<?php

namespace Qafoo;

class CheckoutTest extends \PHPUnit_Framework_TestCase
{
    private $checkout;

    private $displayMock;

    public function setUp()
    {
        $this->markTestSkipped();
        $builder = $this->getMockBuilder('Qafoo\\Display');
        $builder->disableOriginalConstructor();

        $this->displayMock = $builder->getMock();

        $this->checkout = new Checkout(
            $this->displayMock
        );
    }

    public function testCheckoutCalculatesForSingleProduct()
    {
        $this->checkout->registerProduct(0.42);

        $this->assertEquals(
            0.42,
            $this->checkout->calculateSum()
        );
    }

    /**
     * @test
     */
    public function with_another_single_product_checkout_calculates_correct()
    {
        $this->checkout->registerProduct(0.23);

        $this->assertEquals(
            0.23,
            $this->checkout->calculateSum()
        );
    }

    /**
     * @test
     */
    public function with_two_products_checkout_calculates_correct()
    {
        $this->checkout->registerProduct(0.23);
        $this->checkout->registerProduct(0.42);

        $this->assertEquals(
            0.65,
            $this->checkout->calculateSum()
        );
    }

    /**
     * @test
     */
    public function displays_current_sum()
    {
        $this->displayMock->expects($this->once())
            ->method('renderText')
            ->with(
                $this->equalTo('0.23')
            );

        $this->checkout->registerProduct(0.23);
    }



   /* public function stub_example_without_test_execution()
    {
        $this->displayMock->expects($this->any())
            ->method('renderText')
            ->will(
                $this->returnValue('foo bar')
            );

        $this->displayMock->expects($this->any())
            ->method('renderText')
            ->will(
                $this->throwException(new \RuntimeException())
            );

        $this->displayMock->expects($this->any())
            ->method('renderText')
            ->will(
                $this->returnCallback(
                    function ($foo, $bar)
                    {
                        // ... whatever ...
                    }
                )
            );
    }*/
}
