<?php
declare(strict_types=1);

namespace ChooseMyCar\Validator;

use ChooseMyCar\Decoder\Csv as CsvDecoder;

final class Car
{
    public static function check(array $row)
    {
        if (empty($row[CsvDecoder::MANUFACTURER])) {
            return false;
        }

        if (empty($row[CsvDecoder::MODEL])) {
            return false;
        }

        if (empty($row[CsvDecoder::REGISTRATION_PLATE])) {
            return false;
        }

        if (empty($row[CsvDecoder::YEAR])) {
            return false;
        }

        if (empty($row[CsvDecoder::REGISTRATION_PLATE])) {
            return false;
        }

        return true;
    }
}
