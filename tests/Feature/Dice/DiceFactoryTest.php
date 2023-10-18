<?php

declare(strict_types=1);

use App\Dice\DiceConfig;
use App\Dice\DiceFactory;

test('DiceFactory creates a Dice with given parameters', function (): void {
    $quantity = 2;
    $faces = 20;

    $dice = DiceFactory::create(quantity: $quantity, faces: $faces);

    $this->assertEquals($quantity, $dice->quantity);
    $this->assertEquals($faces, $dice->faces);
})->group('dice', 'factory');

test('DiceFactory creates a Dice with default parameters', function (): void {
    $dice = DiceFactory::create();

    $this->assertEquals(1, $dice->quantity);
    $this->assertEquals(6, $dice->faces);
})->group('dice', 'factory');

test(
    'DiceFactory creates a Dice with default parameters when quantity and faces are 0',
    function (): void {
        $dice = DiceFactory::create(quantity: 0, faces: 0);

        $this->assertEquals(1, $dice->quantity);
        $this->assertEquals(6, $dice->faces);
    }
)->group('dice', 'factory');

test('DiceFactory throws InvalidArgumentException for invalid allowed faces value', function (): void {
    $dice = DiceFactory::create(faces: -1);
})->throws(InvalidArgumentException::class, sprintf(
    'Invalid number of faces. Allowed values: %s',
    join(', ', DiceConfig::FACE['allowed'])
));

test('DiceFactory throws InvalidArgumentException for quantity greater than the limit', function (): void {
    $dice = DiceFactory::create(quantity: 6);
})->throws(InvalidArgumentException::class, sprintf(
    'Invalid amount of dice. Maximum amount allowed: %d',
    DiceConfig::QUANTITY['limit'],
));
