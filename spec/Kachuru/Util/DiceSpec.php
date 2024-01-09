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
            $this->roll()->shouldBeAnyOf(range(1, 6));
        }
    }

    function it_rolls_a_d4()
    {
        for ($i = 0; $i < self::ROLL_ATTEMPTS; $i++) {
            $this->roll('d4')->shouldBeAnyOf(range(1, 4));
        }
    }

    function it_rolls_2d6()
    {
        for ($i = 0; $i < self::ROLL_ATTEMPTS; $i++) {
            $this->roll('2d6')->shouldBeAnyOf(range(2, 12));
        }
    }

    function it_roles_3d5()
    {
        for ($i = 0; $i < self::ROLL_ATTEMPTS; $i++) {
            $this->roll('3d5')->shouldBeAnyOf(range(3, 15));
        }
    }

    function it_applies_a_modifier_d4minus1()
    {
        for ($i = 0; $i < self::ROLL_ATTEMPTS; $i++) {
            $this->roll('2d4-1')->shouldBeAnyOf(range(0, 7));
        }
    }

    function it_applies_a_modifier_26plus2()
    {
        for ($i = 0; $i < self::ROLL_ATTEMPTS; $i++) {
            $this->roll('d6+2')->shouldBeAnyOf(range(3, 8));
        }
    }

    function it_rolls_a_twelve()
    {
        $this->roll('12')->shouldbeAnyOf(range(1, 12));
    }

    function it_rolls_a_hundred()
    {
        $this->roll('100')->shouldBeAnyOf(range(1, 100));
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
