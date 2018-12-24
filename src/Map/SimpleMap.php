<?php

class SimpleMap implements MapInterface
{
    /**
     * @var int
     */
    private $height;

    /**
     * @var int
     */
    private $width;

    /**
     * @var array
     */
    private $field;

    /**
     * @var array
     */
    private $landscapes;

    /**
     * SimpleMap constructor.
     * @param int $height
     * @param int $width
     */
    public function __construct(int $height, int $width)
    {
        $this->height = $height;
        $this->width = $width;

        $this->generateLandscapes();
        $this->fill();
    }

    protected function fill(): void
    {
        for ($x = 0; $x <= $this->height; $x++) {
            for ($y = 0; $x <= $this->width; $y++) {
                $this->field[$this->getCellKey($x, $y)] = new Cell(new Position($x, $y), $this->getRandomLandscape());
            }
        }
    }

    public function getCell(Position $position): Cell
    {
        $cellKey = $this->getCellKey($position->x(), $position->y());

        if (!\array_key_exists($cellKey, $this->field)) {
            throw new \LogicException('Invalid coordinates.');
        }

        return $this->field[$cellKey];
    }

    /**
     * @param int $x
     * @param int $y
     * @return string
     */
    protected function getCellKey(int $x, int $y): string
    {
        return \sprintf("%u:%u", $x, $y);
    }

    protected function generateLandscapes(): void
    {
        $this->landscapes = [
            Hills::class,
            Plane::class,
            Pond::class,
            Swamp::class
        ];
    }

    /**
     * @return LandscapeInterface
     */
    protected function getRandomLandscape(): LandscapeInterface
    {
        $landscape = \array_rand($this->landscapes);
        return new $landscape();
    }
}