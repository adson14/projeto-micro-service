<?php

namespace Tests\Unit;

use Core\Test;
use PHPUnit\Framework\TestCase;

class TestUnitTest extends TestCase
{
    public function test_call_method_foo()
    {
        $teste = new Test();
        $this->assertEquals('foo', $teste->foo());
    }
}
