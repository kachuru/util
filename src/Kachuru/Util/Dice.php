<?php

declare(strict_types=1);

namespace Kachuru\Util;

use Kachuru\Util\Exception\InvalidDiceDefinitionException;

class Dice
{
    private const DICE_DEFINITION_PATTERN = '^(?P<times>[0-9]+)?d?(?P<sides>[0-9]+)(?P<modifier>(\+|\-)[0-9]*)?$';

    public function roll(string $definition = 'd6'): int
    {
        if (is_numeric($definition)) {
            $definition = 'd' . $definition;
        }

        if (!preg_match(sprintf('/%s/i', self::DICE_DEFINITION_PATTERN), $definition, $result)) {
            throw new InvalidDiceDefinitionException(sprintf('The definition "%s" could not be parsed', $definition));
        }

        $times = !empty($result['times'])
            ? intval($result['times'])
            : 1;

        return $this->doRoll((int) $result['sides'], $times)
            + ((array_key_exists('modifier', $result)) ? (int) $result['modifier'] : 0);
    }

    private function doRoll(int $sides, int $times = 1): int
    {
        return (int) array_reduce(range(1, $times), function ($carry) use ($sides): int {
            return $carry + mt_rand(1, $sides);
        });
    }
}
