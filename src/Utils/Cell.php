<?php

class Cell
{
    /**
     * @var Position
     */
    private $position;

    /**
     * @var LandscapeInterface
     */
    private $landscape;

    /**
     * @var ContentsInterface|null
     */
    private $contents;

    /**
     * Cell constructor.
     * @param Position $position
     * @param LandscapeInterface $landscape
     */
    public function __construct(Position $position, LandscapeInterface $landscape)
    {
        $this->position = $position;
        $this->landscape = $landscape;
    }

    /**
     * @return Position
     */
    public function getPosition(): Position
    {
        return $this->position;
    }

    /**
     * @return LandscapeInterface
     */
    public function getLandscape(): LandscapeInterface
    {
        return $this->landscape;
    }

    /**
     * @return ContentsInterface|null
     */
    public function getContents(): ?ContentsInterface
    {
        return $this->contents;
    }

    /**
     * @param ContentsInterface|null $contents
     */
    public function setContents(?ContentsInterface $contents): void
    {
        $this->contents = $contents;
    }
}