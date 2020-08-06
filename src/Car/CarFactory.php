<?php
declare(strict_types=1);

namespace ChooseMyCar\Car;

use ChooseMyCar\Decoder\Csv;

final class CarFactory
{
    public static function createCarFromCsv(array $row)
    {
        $colour = isset($row[Csv::COLOUR]) ? $row[Csv::COLOUR] : '';

        return new CarDto(
            $row[Csv::MANUFACTURER],
            $row[Csv::MODEL],
            $row[Csv::REGISTRATION_PLATE],
            $row[Csv::YEAR],
            $row[Csv::TYPE],
            $colour
        );
    }
}
