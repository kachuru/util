<?php

declare(strict_types=1);

namespace Kachuru\Util;

readonly class Combinations
{
    public function __construct(
        private Math $math
    ) {
    }

    /**
     * @param array<int, mixed> $source
     * @param int $combinationSeed
     *
     * @return array<int, mixed>
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
     * @param array<int, mixed> $source
     * @param int $combinationSeed
     *
     * @return array<int, mixed>
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
     * @param array<int, mixed> $elements
     * @param int $times
     *
     * @return array<int, mixed>
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
