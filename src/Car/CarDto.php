<?php
declare(strict_types=1);

namespace ChooseMyCar\Car;

use Carbon\Carbon;

final class CarDto
{
    private $manufacturer;
    private $model;
    private $registration_plate;
    private $year;
    private $type;
    private $colour;

    public function __construct(
        string $manufacturer,
        string $model,
        string $registration_plate,
        string $year,
        string $type,
        string $colour = '')
    {
        $this->manufacturer = $manufacturer;
        $this->model = $model;
        $this->registration_plate = $registration_plate;
        $this->year = Carbon::createFromFormat('Y', $year)->startOfYear();
        $this->type = $type;
        $this->colour = $colour;
    }

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getRegistrationPlate(): string
    {
        return $this->registration_plate;
    }

    public function getYear(): Carbon
    {
        return $this->year;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getColour(): string
    {
        return $this->colour;
    }

    public function toArray()
    {
        return [
            'manufacturer' => $this->getManufacturer(),
            'model' => $this->getModel(),
            'registration_plate' => $this->getRegistrationPlate(),
            'year' => $this->year->format('Y'),
            'type' => $this->getType(),
            'colour' => $this->getColour()
        ];
    }
}
