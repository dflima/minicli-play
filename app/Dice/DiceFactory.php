<?php

namespace App\Dice;

class DiceFactory
{
    public static function create(int $quantity = 1, int $faces = 6): Dice
    {
        $quantity = $quantity === 0 ? 1 : $quantity;
        $faces = $faces === 0 ? 1 : $faces;

        return new Dice($faces, $quantity);
    }
}
