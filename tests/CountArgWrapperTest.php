<?php

use functions\Functions;
use PHPUnit\Framework\TestCase;

class CountArgWrapperTest extends TestCase
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
            [['data',123,'cool array data types :)']],
            [[false,'cool array data types :)']],
            [['data',true,'cool array data types :)']],
            [['data',new Functions(),'cool array data types :)']]
        ];
    }


}