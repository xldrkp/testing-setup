<?php

namespace Qafoo;

class DisplayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function displays_given_text()
    {
        $display = new Display();

        ob_start();
        $display->renderText('23.42');
        $writtenText = ob_get_clean();

        $this->assertEquals(
            '23.42',
            $writtenText
        );
    }
}
