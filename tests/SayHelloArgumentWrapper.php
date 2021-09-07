<?php

use functions\Functions;
use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapper extends TestCase
{

    /**
     * @var Functions
     */
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new Functions();
    }


    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegativeData($arg)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->functions->sayHelloArgumentWrapper($arg);
    }

    public function negativeDataProvider(): array
    {
        return [
            [['data',123,'cool array data types :)']], //array
            [new Functions()], //object
            [null], // null
            [fopen(__DIR__ . '/GetBrandNameTest.php','r')] //resource
        ];
    }

}