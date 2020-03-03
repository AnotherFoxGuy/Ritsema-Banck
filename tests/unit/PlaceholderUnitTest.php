<?php

require __DIR__ . '/../../src/lib/calc.php';

use RitsemaBanck\calc;

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
