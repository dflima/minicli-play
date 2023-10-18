<?php

declare(strict_types=1);

test('Default command "play" rolls the dice', function (): void {
    $app = getApp();
    $app->runCommand(['minicli', 'play', 'dice=1', 'face=6']);
})->expectOutputRegex('/Dice #\d rolled \d/');
