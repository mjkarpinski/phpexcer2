<?php
declare(strict_types=1);

namespace ChooseMyCar;

use Carbon\Carbon;
use ChooseMyCar\Renderer\RendererInterface;

final class FeedFilterer
{
    private $filePath;
    private $feed;
    private $year;
    private $data;

    public function __construct(string $filePath)
    {
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
        $this->feed = '';

        return $renderer->render($this->data);
    }
}
