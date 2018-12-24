<?php

class Machinery implements UnitInterface
{
    /**
     * @param LandscapeInterface $landscape
     * @return bool
     */
    public function canMoveTo(LandscapeInterface $landscape): bool
    {
        switch (true) {
            case $landscape instanceof Hills:
            case $landscape instanceof Swamp:
                return false;
        }

        return true;
    }

    /**
     * @param UnitInterface $unit
     * @return bool
     */
    public function canAttack(UnitInterface $unit): bool
    {
        switch (true) {
            case $unit instanceof Plane:
                return false;
        }

        return true;
    }
}