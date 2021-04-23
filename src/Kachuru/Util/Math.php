<?php

namespace Kachuru\Util;

class Math
{
    public static function factorial(int $number): int
    {
        return $number > 1
            ? $number * self::factorial($number - 1)
            : 1;
    }

    public function getFactorial(int $number): int
    {
        return self::factorial($number);
    }

    public function getBytes(int $bytes): string
    {
        foreach (['KiB', 'MiB', 'GiB', 'TiB'] as $size) {
            $bytes = bcdiv((string) $bytes, '1024', 2);

            if ($bytes < 1024) {
                break;
            }
        }

        return $bytes . $size;
    }
}
