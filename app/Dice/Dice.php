<?php

namespace App\Dice;

class Dice
{
    public function __construct(public int $faces, public int $quantity)
    {
    }

    public function play(): array
    {
        return ['dice' => $this->roll()];
    }

    public function roll(): array
    {
        $i = 0;
        $data = [];

        while ($i < $this->quantity) {
            $data[] = rand(1, $this->faces);
            $i++;
        }

        return $data;
    }
}
