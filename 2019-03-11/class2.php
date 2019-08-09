<?php
echo '<pre>';

class WashingMachine
{
    protected $temperature = 30;
    protected $countTemperatureChanges = 0;
    public function getTemperature(): int
    {
        return $this->temperature;
    }
    public function setTemperature(int $temperature): void
    {
        $this->temperature = $temperature;
        ++$this->countTemperatureChanges;
    }
}
$veko = new WashingMachine;
print_r($veko);
$veko->setTemperature(15);
print_r($veko);
$veko->setTemperature(100);
print_r($veko);

echo '</pre>';

