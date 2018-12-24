<?php

class Manipulator
{
    /**
     * @var MapInterface
     */
    private $map;

    /**
     * @var Cell|null
     */
    private $selectedCell;

    /**
     * Manipulator constructor.
     * @param MapInterface $map
     */
    public function __construct(MapInterface $map)
    {
        $this->map = $map;
    }

    public function selectCell(Position $position): self
    {
        /** @var Cell $cell */
        $cell = $this->map->getCell($position);

        $this->selectedCell = $cell;

        return $this;
    }

    public function move(Position $position): self
    {
        /** @var Cell|null $fromCell */
        $fromCell = $this->selectedCell;
        if (!$fromCell instanceof Cell) {
            throw new LogicException('No cell selected.');
        }

        /** @var UnitInterface $fromContents */
        $fromContents = $fromCell->getContents();

        if (!$fromContents instanceof UnitInterface) {
            throw new LogicException('This cell content nothing to move.');
        }

        /** @var Cell $toCell */
        $toCell = $this->selectCell($position);
        /** @var ContentsInterface|null $toContents */
        $toContents = $toCell->getContents();

        if ($toContents instanceof ContentsInterface || !$fromContents->canMoveTo($toCell->getLandscape())) {
            throw new LogicException('Cant move to this cell.');
        }

        $fromCell->setContents(null);
        $toCell->setContents($fromContents);

        return $this;
    }

    public function attack(Position $position): self
    {
        /** @var Cell|null $fromCell */
        $fromCell = $this->selectedCell;
        if (!$fromCell instanceof Cell) {
            throw new LogicException('No cell selected.');
        }

        /** @var UnitInterface $fromContents */
        $fromContents = $fromCell->getContents();

        if (!$fromContents instanceof UnitInterface) {
            throw new LogicException('This cell content nothing that can attack.');
        }

        /** @var Cell $toCell */
        $toCell = $this->selectCell($position);
        /** @var UnitInterface $toContents */
        $toContents = $toCell->getContents();

        if (!$fromContents instanceof UnitInterface) {
            throw new LogicException('This cell content nothing that can be attacked.');
        }

        if (!$toContents instanceof ContentsInterface || !$fromContents->canAttack($toContents)) {
            throw new LogicException('This unit cant attack.');
        }

        // attack action

        return $this;
    }
}