<?php

class Figure
{
    public $image = 'src';

    protected $color;
    protected $move;
    protected $kill;
    protected $die;
    protected $position;
    protected $previousPosition;

    private $weight = 1111;

    public function __construct($position = 'A1')
    {
        $this->position = $position;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->changingProperty('weight', $weight);
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color ?? 'no color';
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    public function isActive()
    {
        return false;
    }

    private function changingProperty($propertyName, $valueNew): void
    {
        echo "<br>Property {$propertyName} changing from " .
            $this->{$propertyName} . ' to ' . $valueNew;
    }
}

class Pawn extends Figure
{
    protected $princess = false;

    /**
     * @return bool
     */
    public function isPrincess(): bool
    {
        return $this->princess;
    }

    /**
     * @param bool $princess
     */
    public function setPrincess(bool $princess): void
    {
        $this->princess = $princess;
    }

    public function getColor(): string
    {
        if ($this->color === null) {
            $this->setColor('black');
        }

        return $this->color;
    }

    public function isActive()
    {
        return true;
    }

}

echo '<pre>';

$figure1 = new Figure;
$figure2 = new Pawn('B2');
//$figure3 = $figure2;
$figure3 = clone $figure2;
$figure2->setPrincess(true);
var_dump($figure2);
var_dump($figure3);

//echo '<br>';
//echo 'f1f - ' . ($figure1 instanceof Figure ? 'Y' : 'N');
//echo '<br>';
//echo 'f1p - ' . ($figure1 instanceof Pawn ? 'Y' : 'N');
//echo '<br>';
//echo 'f2f - ' . ($figure2 instanceof Figure ? 'Y' : 'N');
//echo '<br>';
//echo 'f2p - ' . ($figure2 instanceof Pawn ? 'Y' : 'N');
//echo '<br>';



echo '</pre>';

//var_dump($figure);
//var_dump((array) $figure);

