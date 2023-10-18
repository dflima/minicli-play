<?php

declare(strict_types=1);

namespace App\Command\Play;

use App\Dice\DiceFactory;
use InvalidArgumentException;
use Minicli\Command\CommandController;
use Minicli\Input;

class DefaultController extends CommandController
{
    public const DICE_INPUT = 'How many dice would you like to roll? ';
    public const FACE_INPUT = 'And how many faces for those dice? ';

    public function handle(): void
    {
        if ($this->hasParam('dice')) {
            $quantity = (int) $this->getParam('dice');
        } else {
            $input = new Input(self::DICE_INPUT);
            $quantity = (int) $input->read();
        }

        if ($this->hasParam('faces')) {
            $faces = (int) $this->getParam('faces');
        } else {
            $input = new Input(self::FACE_INPUT);
            $faces = (int) $input->read();
        }

        try {
            $dice = DiceFactory::create($quantity, $faces);
            $play = $dice->play();

            foreach ($play['dice'] as $key => $result) {
                $number = $key + 1;
                $this->info("Dice #{$number} rolled {$result}");
            }
        } catch (InvalidArgumentException $exception) {
            $this->error($exception->getMessage());
        }
    }
}
