<?php

namespace Kachuru\Util;

class Math
{
    public function getFactorial(int $number): int
    {
        return $number > 1
            ? $number * $this->getFactorial($number - 1)
            : 1;
    }

    public function getBytes(int $bytes): string
    {
        $scale = ['KiB', 'MiB', 'GiB', 'TiB'];

        do {
            $bytes = bcdiv((string) $bytes, '1024', 2);
            $size = array_shift($scale);
        } while ($bytes >= 1024);

        return $bytes . $size;
    }
}
