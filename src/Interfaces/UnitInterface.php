<?php

interface UnitInterface extends ContentsInterface
{
    public function canMoveTo(LandscapeInterface $landscape): bool;

    public function canAttack(UnitInterface $unit): bool;
}