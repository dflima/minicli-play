<?php

namespace App\Command\Play;

use App\Dice\DiceFactory;
use Minicli\Command\CommandController;
use Minicli\Input;

class DefaultController extends CommandController
{
    public function handle(): void
    {
        $input = new Input('How many dice would you like to roll? ');
        $dice = $input->read();

        $input = new Input('And how many faces for those dice? ');
        $faces = $input->read();

        $dice = DiceFactory::create($dice, $faces);

        print_r($dice->play());
    }
}
