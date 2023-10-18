<?php

declare(strict_types=1);

namespace App\Dice;

class DiceConfig
{
    public const FACE = [
        'allowed' => [4, 6, 8, 10, 12, 13, 14, 15, 16, 17, 18, 19, 20],
        'default' => 6,
    ];

    public const QUANTITY = [
        'default' => 1,
        'limit' => 5,
    ];
}
