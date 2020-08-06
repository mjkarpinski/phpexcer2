<?php
declare(strict_types=1);

namespace ChooseMyCar\Decoder;

use ChooseMyCar\Car\CarFactory;
use ChooseMyCar\Validator\Car as CarValidator;

final class Csv implements DecoderInterface
{
    private $filePath;

    public const MANUFACTURER = 0;
    public const MODEL = 1;
    public const REGISTRATION_PLATE = 2;
    public const YEAR = 3;
    public const TYPE = 4;
    public const COLOUR = 5;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function get()
    {
        $file = fopen($this->filePath, 'r');
        $cars = [];
        $rowNumber = 0;
        while ($row = fgetcsv($file)) {
            $rowNumber++;

            if ($rowNumber === 1) {
                //Skip headers;
                continue;
            }

            if (CarValidator::check($row)) {
                $cars[] = CarFactory::createCarFromCsv($row);
            } else {
                error_log('Car on row ' . $rowNumber . ' missing data');
                echo 'Car on row ' . $rowNumber . ' missing data';
            }

        }
        fclose($file);

        return $cars;
    }
}
