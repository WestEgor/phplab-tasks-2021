<?php

use functions\Functions;
use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase{

    /**
     * @var Functions $functions
     */
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($arg, $expected)
    {
        $this->assertEquals($expected, $this->functions->sayHelloArgument($arg));
    }

    public function positiveDataProvider(): array
    {
        return [
            ['World))', 'Hello World))'],
            [123, 'Hello 123'],
            [123.321, 'Hello 123.321'],
            [false , 'Hello '],
            [true, 'Hello 1'],
            [0x321,'Hello 801']
        ];
    }
}
