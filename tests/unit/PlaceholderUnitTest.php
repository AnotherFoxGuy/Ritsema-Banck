<?php

require __DIR__ . '/../../vendor/autoload.php';

use RitsemaBanck\Calc;

class PlaceholderUnitTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    // tests
    public function testSomeFeature()
    {
        $this->assertEquals(3, calc::add(1, 2));
    }
}
