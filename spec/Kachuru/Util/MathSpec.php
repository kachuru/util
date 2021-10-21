<?php

namespace spec\Kachuru\Util;

use PhpSpec\ObjectBehavior;

class MathSpec extends ObjectBehavior
{
    function it_returns_the_correct_factorial()
    {
        $this->getFactorial(1)->shouldReturn(1);
        $this->getFactorial(2)->shouldReturn(2);
        $this->getFactorial(3)->shouldReturn(6);
        $this->getFactorial(4)->shouldReturn(24);
        $this->getFactorial(5)->shouldReturn(120);
    }

    function it_returns_formatted_bytes()
    {
        $this->getBytes(16)->shouldReturn('0.01KiB');
        $this->getBytes(32)->shouldReturn('0.03KiB');
        $this->getBytes(1024)->shouldReturn('1.00KiB');
        $this->getBytes(2048)->shouldReturn('2.00KiB');
        $this->getBytes(65536)->shouldReturn('64.00KiB');
        $this->getBytes(524288)->shouldReturn('512.00KiB');
        $this->getBytes(1048576)->shouldReturn('1.00MiB');
        $this->getBytes(4194304)->shouldReturn('4.00MiB');
        $this->getBytes(33554432)->shouldReturn('32.00MiB');
        $this->getBytes(134217728)->shouldReturn('128.00MiB');
        $this->getBytes(1073741824)->shouldReturn('1.00GiB');
        $this->getBytes(8589934592)->shouldReturn('8.00GiB');
        $this->getBytes(68719476736)->shouldReturn('64.00GiB');
        $this->getBytes(1099511627776)->shouldReturn('1.00TiB');
        $this->getBytes(2199023255552)->shouldReturn('2.00TiB');
        $this->getBytes(3298534883328)->shouldReturn('3.00TiB');
        $this->getBytes(4947802324992)->shouldReturn('4.50TiB');
    }
}
