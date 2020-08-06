<?php
declare(strict_types=1);

namespace ChooseMyCar;

use Carbon\Carbon;
use ChooseMyCar\Decoder\Csv as CsvDecoder;
use ChooseMyCar\Decoder\Csv;
use ChooseMyCar\Exception\WrongMimeTypeException;
use ChooseMyCar\Renderer\RendererInterface;
use ChooseMyCar\Validator\Csv as CsvValidator;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

final class FeedFilterer
{
    private $filePath;
    private $feed;
    /** @var Carbon $year */
    private $year;
    private $data;

    public function __construct(string $filePath)
    {
        $this->feed = collect();
        $this->filePath = $filePath;
        $this->data = collect();
    }

    public function setYear($year): self
    {
        $this->year = Carbon::createFromFormat('Y', $year);

        return $this;
    }

    public function render(RendererInterface $renderer)
    {
        try {
            $this->runChecks();
        } catch (FileNotFoundException | WrongMimeTypeException $e) {
            echo $e->getMessage();
            die;
        }

        $this->feed = collect((new CsvDecoder($this->filePath))->get());

        $this->runFilters();

        return $renderer->render($this->feed);
    }

    private function runFilters()
    {
        if ($this->year !== null) {
            $this->feed = $this->feed->filter(function ($car) {
                return $this->year->format('Y') === $car->getYear()->format('Y');
            });
        }
    }

    private function runChecks()
    {
        if (!file_exists($this->filePath)) {
            throw new FileNotFoundException('File: ' . $this->filePath . ' does not exist');
        }

        if (!CsvValidator::check($this->filePath))
        {
            throw new WrongMimeTypeException('Wrong extension type');
        }
    }
}
