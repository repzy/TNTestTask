<?php

interface MapInterface
{
    public function getCell(Position $position): Cell;
}