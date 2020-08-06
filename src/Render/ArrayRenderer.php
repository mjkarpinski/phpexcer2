<?php
declare(strict_types=1);

namespace ChooseMyCar\Render;

class ArrayRenderer implements RendererInterface
{
    public function output(): array
    {
        return [];
    }

    public function render()
    {
        return $this->output();
    }
}
