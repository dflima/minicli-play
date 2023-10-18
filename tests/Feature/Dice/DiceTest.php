<?php

declare(strict_types=1);

use App\Dice\DiceFactory;

test('Dice rolls the correct amount', function (): void {
    $quantity = rand(1, 5);
    $dice = DiceFactory::create(quantity: $quantity, faces: 6);
    $play = $dice->play();

    $this->assertEquals($quantity, count($play['dice']));
});
