<?php

use functions\Functions;
use PHPUnit\Framework\TestCase;

class SayHelloTest extends TestCase{

    /**
     * @var Functions $functions
     */
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new Functions();
    }

    public function testSayHello(){
        $message = $this->functions->sayHello();
        $this->assertEquals('Hello', $message);
    }


}
