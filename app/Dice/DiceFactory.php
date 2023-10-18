<?php

declare(strict_types=1);

namespace App\Dice;

use InvalidArgumentException;

class DiceFactory
{
    public static function create(int $quantity = 1, int $faces = 6): Dice
    {
        $quantity = 0 === $quantity ? DiceConfig::QUANTITY['default'] : $quantity;
        $faces = 0 === $faces ? DiceConfig::FACE['default'] : $faces;

        if ( ! in_array($faces, DiceConfig::FACE['allowed'])) {
            throw new InvalidArgumentException(sprintf(
                'Invalid number of faces. Allowed values: %s',
                join(', ', DiceConfig::FACE['allowed'])
            ));
        }

        if ($quantity > DiceConfig::QUANTITY['limit']) {
            throw new InvalidArgumentException(sprintf(
                'Invalid amount of dice. Maximum amount allowed: %d',
                DiceConfig::QUANTITY['limit'],
            ));
        }

        return new Dice($faces, $quantity);
    }
}
