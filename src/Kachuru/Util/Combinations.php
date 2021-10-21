<?php

declare(strict_types=1);

namespace Kachuru\Util;

class Combinations
{
    private Math $math;

    public function __construct(Math $math)
    {
        $this->math = $math;
    }

    /**
     * @param array[] $source
     * @param int $combinationSeed
     *
     * @return array[]
     */
    public function calculate(array $source, int $combinationSeed): array
    {
        return count($source) > 1
            ? $this->slice(
                $this->rotate($source, (int) floor($combinationSeed / $this->getFactor(count($source)))),
                $combinationSeed
            )
            : $source;
    }

    /**
     * @param array[] $source
     * @param int $combinationSeed
     *
     * @return array[]
     */
    private function slice(array $source, int $combinationSeed): array
    {
        return array_merge(
            array_slice($source, 0, 1),
            $this->calculate(
                array_slice($source, 1),
                $combinationSeed % $this->getFactor(count($source))
            )
        );
    }

    /**
     * @param array[] $elements
     * @param int $times
     *
     * @return array[]
     */
    private function rotate(array $elements, int $times = 1): array
    {
        return array_merge(
            array_slice($elements, $times),
            array_slice($elements, 0, $times)
        );
    }

    private function getFactor(int $n): int
    {
        return $this->math->getFactorial($n) / $n;
    }
}
