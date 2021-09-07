<?php

use functions\Functions;
use PHPUnit\Framework\TestCase;

class CountArgTest extends TestCase
{

    /**
     * @var Functions $functions
     */
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new Functions();
    }


    public function testPositive()
    {
        $this->assertEquals(3, $this->functions->countArguments([123], 321, 'koala')['argument_count']);
        $this->assertEquals(3, count($this->functions->countArguments([123], 321, 'koala')['argument_values']));
    }


}