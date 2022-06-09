<?php

namespace spec\Kachuru\Util;

use Kachuru\Util\Dice;
use PhpSpec\ObjectBehavior;

class DiceSpec extends ObjectBehavior
{
    private const ROLL_ATTEMPTS = 20;

    function it_rolls_six_sides_by_default()
    {
        for ($i = 0; $i < self::ROLL_ATTEMPTS; $i++) {
            $this->roll()->shouldBeAnyOf([1, 2, 3, 4, 5, 6]);
        }
    }

    function it_rolls_a_d4()
    {
        for ($i = 0; $i < self::ROLL_ATTEMPTS; $i++) {
            $this->roll('d4')->shouldBeAnyOf([1, 2, 3, 4]);
        }
    }

    function it_rolls_2d6()
    {
        for ($i = 0; $i < self::ROLL_ATTEMPTS; $i++) {
            $this->roll('2d6')->shouldBeAnyOf([2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
        }
    }

    function it_roles_3d5()
    {
        for ($i = 0; $i < self::ROLL_ATTEMPTS; $i++) {
            $this->roll('3d5')->shouldBeAnyOf([3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]);
        }
    }

    function it_applies_a_modifier_d4minus1()
    {
        for ($i = 0; $i < self::ROLL_ATTEMPTS; $i++) {
            $this->roll('2d4-1')->shouldBeAnyOf([0, 1, 2, 3, 4, 5, 6, 7]);
        }
    }

    function it_applies_a_modifier_26plus2()
    {
        for ($i = 0; $i < self::ROLL_ATTEMPTS; $i++) {
            $this->roll('d6+2')->shouldBeAnyOf([3, 4, 5, 6, 7, 8]);
        }
    }

    public function getMatchers(): array
    {
        return [
            'beAnyOf' => function ($value, array $expect) {
                return in_array($value, $expect);
            }
        ];
    }
}
