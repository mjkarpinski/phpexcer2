<?php
declare(strict_types=1);

namespace ChooseMyCar\Validator;

final class Csv
{
    public static function check(string $filename)
    {
        //This could be smarter
        return strpos($filename, '.csv');
    }
}
