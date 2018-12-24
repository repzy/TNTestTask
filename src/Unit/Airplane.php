<?php

class Airplane implements UnitInterface, ContentsInterface
{
    public function canMoveTo(LandscapeInterface $landscape): bool
    {
        return true;
    }

    public function canAttack(UnitInterface $unit): bool
    {
        return true;
    }
}