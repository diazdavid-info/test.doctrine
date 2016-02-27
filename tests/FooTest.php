<?php
namespace foo\tests;

use foo\Foo;
use PHPUnit_Framework_TestCase;

class FooTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function nothing()
    {
        $foo = new Foo();
        $this->assertEquals('ok', $foo->nothing());
    }
}
